<?php $title = "Projects"; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; global $Parsedown; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>

    <br>
    <div class="container">
        <h1>Projects</h1>
        <br>

        <div class="row">
            <?php foreach (json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/includes/fetcher/projects.json"), true) as $project): if (!$project['archive'] && $project['flagship']): ?>
                <div class="col-lg-4">
                    <div class="card stylized-card">
                        <div class="card-body">
                            <img class="stylized-card-icon" <?php if (!isset($project["icon"])): ?>style="background: hsla(<?= hexdec(substr($project['id'], 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= isset($project["icon"]) ? $project["icon"] . "?width=96" : "/assets/img/letters/" . getLetters($project['name']) . ".png" ?>" alt="">
                            <h4 class="card-title"><?= $project["name"] ?></h4>
                            <p class="card-text"><?= preg_replace('/[|.?!;](.*)/m', '', strip_tags($Parsedown->line(trim($project["description"])))) ?></p>
                            <a href="?<?= $project["id"] ?>" class="btn btn-outline-light">View Project</a>
                            <div class="small text-muted" style="margin-top:10px;">Updated <?= timeAgo($project['date']) ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </div>

        <hr>

        <div class="row">
            <?php foreach (json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/includes/fetcher/projects.json"), true) as $project): if (!$project['archive'] && !$project['flagship']): ?>
                <div class="col-lg-4">
                    <div class="card stylized-card">
                        <div class="card-body">
                            <img class="stylized-card-icon" <?php if (!isset($project["icon"])): ?>style="background: hsla(<?= hexdec(substr($project['id'], 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= isset($project["icon"]) ? $project["icon"] . "?width=96" : "/assets/img/letters/" . getLetters($project['name']) . ".png" ?>" alt="">
                            <h4 class="card-title"><?= $project["name"] ?></h4>
                            <p class="card-text"><?= preg_replace('/[|.?!;](.*)/m', '', strip_tags($Parsedown->line(trim($project["description"])))) ?></p>
                            <a href="?<?= $project["id"] ?>" class="btn btn-outline-light">View Project</a>
                            <div class="small text-muted" style="margin-top:10px;">Updated <?= timeAgo($project['date']) ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </div>

        <hr>

        <p>The following projects are projects I don't maintain anymore, they are not all guaranteed to work or be complete. You may use the source code as you wish as long as you don't claim it is 100% your work.</p>
        <div class="list-group">
            <?php foreach (json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/includes/fetcher/projects.json"), true) as $project): if ($project['archive']): ?>
                <a href="?<?= $project["id"] ?>" class="list-stylized list-group-item list-group-item-action">
                    <img <?php if (!isset($project["icon"])): ?>style="background: hsla(<?= hexdec(substr($project['id'], 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= isset($project["icon"]) ? $project["icon"] . "?width=96" : "/assets/img/letters/" . getLetters($project['name']) . ".png" ?>" class="memberview-icon archive-icon">
                    <?= $project["name"] ?><span style="opacity:.5;"> · Updated <?= timeAgo($project['date']) ?></span>
                </a>
            <?php endif; endforeach; ?>
            <?php $files = scandir($_SERVER["DOCUMENT_ROOT"] . "/assets/archives");
            $files = array_filter($files, function ($i) {
                return str_ends_with($i, ".json");
            });
            usort($files, function ($a, $b) {
                $da = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/assets/archives/" . $a), true);
                $db = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/assets/archives/" . $b), true);
                $ta = strtotime(explode("/", $da['date'])[1] . "-" . explode("/", $da['date'])[0] . "-01");
                $tb = strtotime(explode("/", $db['date'])[1] . "-" . explode("/", $db['date'])[0] . "-01");

                return $tb - $ta;
            });
            foreach ($files as $id): $project = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/assets/archives/" . $id), true); ?>
                <a href="https://archive.cdn.minteck.org/<?= substr($id, 0, -5) ?>.zip" class="list-stylized list-group-item list-group-item-action">
                    <img <?php if (!file_exists($_SERVER["DOCUMENT_ROOT"] . "/assets/archives/" . substr($id, 0, -5) . ".png")): ?>style="background: hsla(<?= hexdec(substr(md5($id), 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= file_exists($_SERVER["DOCUMENT_ROOT"] . "/assets/archives/" . substr($id, 0, -5) . ".png") ? "/assets/archives/" . substr($id, 0, -5) . ".png" : "/assets/img/letters/" . getLetters($project['title']) . ".png" ?>" class="memberview-icon archive-icon">
                    <?= $project["title"] ?><span style="opacity:.5;"> · Updated <?= timeAgo(explode("/", $project['date'])[1] . "-" . explode("/", $project['date'])[0] . "-01") ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>