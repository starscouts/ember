<?php

$sel = array_keys($_GET)[0];
$projects = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/includes/fetcher/projects.json"), true);
$prj = null;

foreach ($projects as $project) {
    if ($project["id"] === $sel) {
        $prj = $project;
    }
}

if ($prj === null) {
    header("Location: /projects");
    die();
}

$title = $prj["name"] . " | Projects"; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; global $Parsedown; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>

    <br>
    <div class="container">
        <a class="ln small-ln" href="/projects">&larr; Go back to projects list</a>
        <h1><img class="stylized-card-icon" <?php if (!isset($project["icon"])): ?>style="background: hsla(<?= hexdec(substr($prj['id'], 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= isset($prj["icon"]) ? $prj["icon"] . "?width=128" : "/assets/img/letters/" . getLetters($prj['name']) . ".png" ?>" alt=""> <?= $prj["name"] ?><?php if ($prj['archive']): ?> <span style="font-size: initial;vertical-align: middle;"><span class="badge bg-warning">Deprecated</span></span><?php endif; ?></h1>

        <p><?= preg_replace('/[|.?!;](.*)/m', '', strip_tags($Parsedown->line(trim($prj["description"])))) ?><?php foreach ($prj['tags'] as $tag): if ($tag !== "Flagship" && $tag !== "Showcase"): ?> <span class="badge bg-secondary rounded-pill"><a class="ln ln-hidden" href="https://gitlab.minteck.org/explore/projects/topics/<?= str_replace("%2520", "%20", urlencode(str_replace(" ", "%20", $tag))) ?>" target="_blank"><?= $tag ?></a></span><?php endif; endforeach; ?></p>

        <div class="list-group">
            <span class="list-stylized list-group-item list-stylized-static">
                <?= "<a class='ln' href='https://gitlab.minteck.org/' target='_blank'>".$prj['event']['author']['name']." (@".$prj['event']['author']['username'].")</a> ".$prj['event']['action_name']." ".(isset($prj['event']['push_data']) ? $prj['event']['push_data']['ref_type']." <code>".$prj['event']['push_data']['ref']."</code> " : (isset($prj['event']['wiki_page']) ? "wiki page <a href='" . $prj['web'] . "/-/wikis/" . $prj['event']['wiki_page']['slug'] . "' target='_blank' class='ln'><code>" . $prj['event']['wiki_page']['slug'] . "</code></a> " : "project ")) . timeAgo($prj['event']['created_at']) ?>
                <?php if (isset($prj['event']['push_data']['commit_title'])): ?>
                <blockquote class="stylized-quote">
                    <?= strip_tags($prj['event']['push_data']['commit_title']); ?>
                </blockquote>
                <?php endif; ?>
            </span>
        </div>

        <div style="width:max-content;margin: 10px auto;">
            <div class="btn-group">
                <a type="button" class="btn btn-outline-light" href="<?= $prj['web'] ?>" target="_blank">Source Code</a>
                <a type="button" class="btn btn-outline-light" href="<?= $prj['web'] ?>/activity" target="_blank">Project Activity</a>
                <a type="button" class="btn btn-outline-light<?php if (!isset($prj['issues'])): ?> disabled<?php endif; ?>" href="<?php if (isset($prj['issues'])): ?>https://youtrack.minteck.org/issues/<?= $prj['issues'] ?><?php endif; ?>" target="_blank">Bug Reports</a>
                <a type="button" class="btn btn-outline-light disabled" href="" target="_blank">Continuous Integration</a>
            </div>
        </div>

        <?= $Parsedown->text(base64_decode($prj['readme'])) ?>

    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>