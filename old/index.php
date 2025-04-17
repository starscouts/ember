<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; global $Parsedown; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>

<div id="homepage">
    <div id="hero">
        <br>
        <img src="/assets/img/icon.svg" id="hero-img" alt="">
        <br>
        <br>
        <br>
        <h1>Minteck</h1>
        <h4>Your typical keyboard-addicted pony</h4>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <?php foreach (json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/includes/fetcher/projects.json"), true) as $project): if (!$project['archive'] && $project['showcase']): ?>
                <div class="col-lg-4">
                    <div class="card stylized-card">
                        <div class="card-body">
                            <img class="stylized-card-icon" <?php if (!isset($project["icon"])): ?>style="background: hsla(<?= hexdec(substr($project['id'], 0, 2)) ?>, 100%, 50%, 0.1) !important;"<?php endif; ?> src="<?= isset($project["icon"]) ? $project["icon"] . "?width=96" : "/assets/img/letters/" . getLetters($project['name']) . ".png" ?>" alt="">
                            <h4 class="card-title"><?= $project["name"] ?></h4>
                            <p class="card-text"><?= preg_replace('/[|.?!;](.*)/m', '', strip_tags($Parsedown->line(trim($project["description"])))) ?></p>
                            <a href="/projects?<?= $project["id"] ?>" class="btn btn-outline-light">View Project</a>
                            <div class="small text-muted" style="margin-top:10px;">Updated <?= timeAgo($project['date']) ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>