(async () => {
    const fs = require('fs');
    const cp = require('child_process');
    const axios = require('axios');
    const crypto = require('crypto')

    console.log("Fetching projects... GitLab");
    let gitlabProjects = [];
    let smallestId = -1;

    while (smallestId !== 0) {
        let gitlabProjectsRaw;

        if (smallestId > 0) {
            gitlabProjectsRaw = (await axios.get(`https://gitlab.minteck.org/api/v4/users/minteck/projects?order_by=id&archived=false&id_before=${smallestId}`)).data;
        } else {
            gitlabProjectsRaw = (await axios.get(`https://gitlab.minteck.org/api/v4/users/minteck/projects?order_by=id&archived=false`)).data;
        }
        for (let project of gitlabProjectsRaw) {
            let readme;
            try {
                readme = Buffer.from((await axios.get("https://gitlab.minteck.org/api/v4/projects/" + project.id + "/repository/blobs/" + (await axios.get("https://gitlab.minteck.org/api/v4/projects/" + project.id + "/repository/tree")).data.filter(i => i.type === "blob" && (i.name.toLowerCase() === "readme.md" || i.name.toLowerCase() === "readme"))[0].id + "/raw")).data).toString("base64")
            } catch (e) {
                readme = "";
            }
            gitlabProjects.push({
                archive: false,
                gitlab_id: project.id,
                youtrack_id: null,
                path: project.path_with_namespace,
                name: project.name,
                description: project.description,
                issues: null,
                vcs: project.http_url_to_repo,
                web: project.web_url,
                icon: project.avatar_url ? project.avatar_url.replace("http://", "https://") : null,
                showcase: project.topics.includes("Showcase"),
                flagship: project.topics.includes("Flagship"),
                date: project.last_activity_at,
                event: (await axios.get(`https://gitlab.minteck.org/api/v4/projects/${project.id}/events`)).data[0],
                tags: project.topics,
                readme: readme
            })
            smallestId = project.id;

        }
        if (gitlabProjectsRaw.length === 0) {
            smallestId = 0;
        }
    }

    console.log("Fetching projects... GitLab archives");
    let gitlabArchiveProjects = [];
    smallestId = -1;

    while (smallestId !== 0) {
        let gitlabProjectsArchiveRaw;

        if (smallestId > 0) {
            gitlabProjectsArchiveRaw = (await axios.get(`https://gitlab.minteck.org/api/v4/users/minteck/projects?order_by=id&archived=true&id_before=${smallestId}`)).data;
        } else {
            gitlabProjectsArchiveRaw = (await axios.get(`https://gitlab.minteck.org/api/v4/users/minteck/projects?order_by=id&archived=true`)).data;
        }
        for (let project of gitlabProjectsArchiveRaw) {
            let readme;
            try {
                readme = Buffer.from((await axios.get("https://gitlab.minteck.org/api/v4/projects/" + project.id + "/repository/blobs/" + (await axios.get("https://gitlab.minteck.org/api/v4/projects/" + project.id + "/repository/tree")).data.filter(i => i.type === "blob" && (i.name.toLowerCase() === "readme.md" || i.name.toLowerCase() === "readme"))[0].id + "/raw")).data).toString("base64")
            } catch (e) {
                readme = "";
            }
            gitlabProjects.push({
                archive: true,
                gitlab_id: project.id,
                youtrack_id: null,
                path: project.path_with_namespace,
                name: project.name,
                description: project.description,
                issues: null,
                vcs: project.http_url_to_repo,
                web: project.web_url,
                icon: project.avatar_url ? project.avatar_url.replace("http://", "https://") : null,
                showcase: project.topics.includes("Showcase"),
                date: project.last_activity_at,
                event: (await axios.get(`https://gitlab.minteck.org/api/v4/projects/${project.id}/events`)).data[0],
                tags: project.topics,
                readme: readme
            })
            smallestId = project.id;
        }
        if (gitlabProjectsArchiveRaw.length === 0) {
            smallestId = 0;
        }
    }

    console.log("Fetching projects... YouTrack");
    let youtrackProjects = [];
    let unusedBase = [];
    let unusedYoutrackProjects = [];
    let projects = {};
    let projectsPlusYoutrack = {};

    try {
        const youtrackProjectsRaw = (await axios.get(`https://youtrack.minteck.org/api/admin/projects?fields=id,name,shortName,description`)).data;
        for (let project of youtrackProjectsRaw) {
            youtrackProjects.push({
                archive: false,
                gitlab_id: null,
                youtrack_id: project.id,
                name: project.name,
                description: project.description,
                issues: project.shortName,
                vcs: null,
                web: null,
                icon: null,
                showcase: false,
                date: null,
                event: null,
                tags: [],
                readme: ""
            })
        }

        console.log("Merging data...")
        for (let project of youtrackProjects) {
            nameCompareYoutrack = project.name.toLowerCase().replace(/[^a-z]+/gm, "");
            descCompareYoutrack = project.description.toLowerCase().replace(/[^a-z]+/gm, "");

            for (let gprj of gitlabProjects) {
                nameCompareGitlab = gprj.name.toLowerCase().replace(/[^a-z]+/gm, "");
                descCompareGitlab = gprj.description.toLowerCase().replace(/[^a-z]+/gm, "");

                if (nameCompareGitlab === nameCompareYoutrack || descCompareGitlab === descCompareYoutrack) {
                    gprj.youtrack_id = project.youtrack_id;
                    gprj.issues = project.youtrack_id;
                }

                if (gprj.youtrack_id === null) {
                    id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + "null").digest('hex');
                } else {
                    id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + gprj.youtrack_id.toString()).digest('hex');
                    projectsPlusYoutrack[id] = gprj;
                }
                projects[id] = gprj;
            }

            for (let gprj of gitlabArchiveProjects) {
                nameCompareGitlab = gprj.name.toLowerCase().replace(/[^a-z]+/gm, "");
                descCompareGitlab = gprj.description.toLowerCase().replace(/[^a-z]+/gm, "");

                if (nameCompareGitlab === nameCompareYoutrack || descCompareGitlab === descCompareYoutrack) {
                    gprj.youtrack_id = project.youtrack_id;
                    gprj.issues = project.youtrack_id;
                }

                if (gprj.youtrack_id === null) {
                    id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + "null").digest('hex');
                } else {
                    id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + gprj.youtrack_id.toString()).digest('hex');
                    projectsPlusYoutrack[id] = gprj;
                }
                projects[id] = gprj;
            }
        }

        const knownYoutrackIds = Object.keys(projectsPlusYoutrack).map((i) => { return projectsPlusYoutrack[i].youtrack_id; });
        for (let project of youtrackProjectsRaw) {
            if (!knownYoutrackIds.includes(project.id)) {
                project.name_compare = project.name.toLowerCase().replace(/[^a-z]+/gm, "");
                project.description_compare = project.description.toLowerCase().replace(/[^a-z]+/gm, "");
                unusedYoutrackProjects.push(project);
            }
        }

        for (let project of gitlabProjects) {
            project.name_compare = project.name.toLowerCase().replace(/[^a-z]+/gm, "");
            project.description_compare = project.description.toLowerCase().replace(/[^a-z]+/gm, "");
            unusedBase.push(project);
        }

        projects = Object.keys(projects).map((i) => {
            return {
                id: i,
                ...projects[i]
            }
        })
        projects.sort((a, b) => (new Date(b.date) - new Date(a.date)));

        fs.writeFileSync("projects.json", JSON.stringify(projects, null, 4));
        fs.writeFileSync("unused-live.json", JSON.stringify(unusedYoutrackProjects, null, 4));
        fs.writeFileSync("unused-base.json", JSON.stringify(unusedBase, null, 4));
        console.log("Done merging, found " + Object.keys(projects).length + " projects (" + Object.keys(projectsPlusYoutrack).length + " on YouTrack, " + unusedYoutrackProjects.length + " unused)");
    } catch (e) {
        console.log("Failed to fetch YouTrack projects (" + e.message + ")");

        for (let gprj of gitlabProjects) {
            if (gprj.youtrack_id === null) {
                id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + "null").digest('hex');
            } else {
                id = crypto.createHash('sha1').update(gprj.gitlab_id.toString() + gprj.youtrack_id.toString()).digest('hex');
                projectsPlusYoutrack[id] = gprj;
            }
            projects[id] = gprj;
        }

        projects = Object.keys(projects).map((i) => {
            return {
                id: i,
                ...projects[i]
            }
        })
        projects.sort((a, b) => (new Date(b.date) - new Date(a.date)));

        fs.writeFileSync("projects.json", JSON.stringify(projects, null, 4));
        console.log("Done fetching, found " + Object.keys(projects).length + " projects");
    }

    let known = [];
    fs.writeFileSync("./projects.json", JSON.stringify(JSON.parse(fs.readFileSync('./projects.json').toString()).map((i) => {
        if (!known.includes(i.gitlab_id)) {
            known.push(i.gitlab_id);
            return i;
        } else {
            return null;
        }
    }).filter(i => i !== null), null, 4));

    try {
        if (fs.existsSync("personal")) fs.rmSync("personal", { recursive: true })
        console.log("Cloning minteck/minteck from GitHub...");
        cp.execSync("git clone https://github.com/minteck/minteck personal");
        let list = [];
        for (let project of require('./projects.json')) {
            if (!project.archive) {
                list.push(project.name + " | [" + project.path + "](https://gitlab.minteck.org/" + project.path + ")");
            }
        }
        for (let project of require('./projects.json')) {
            if (project.archive) {
                list.push("*" + project.name + "* | *[" + project.path + "](https://gitlab.minteck.org/" + project.path + ")*");
            }
        }
        console.log("Saving...");
        fs.writeFileSync("./personal/README.md", "<!-- WARNING: Do not modify this file, modify README.mdt instead. This file will get overwritten whenever the project fetcher runs. Publish date: " + new Date().toISOString() + " -->\n" + fs.readFileSync("./personal/README.mdt").toString().replace("%GITLABFILLHERE%", list.join("\n")));
        console.log("Publishing changes to GitHub...");
        cp.execSync("git add -A", { cwd: "personal" });
        cp.execSync("git commit -m \"Update: " + new Date().toISOString() + "\"", { cwd: "personal" });
        cp.execSync("git push origin main", { cwd: "personal" });
    } catch (e) {
        if (e.stdout && e.stdout.toString().includes("nothing to commit, working tree clean")) {
            console.log("No changes to publish");
        } else {
            console.error(e);
        }
    }
})()