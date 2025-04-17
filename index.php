<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php";

global $conepone;
global $domainMode;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $conepone ? "Cloudburst System" : "Raindrops System" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/common/css/fonts.css">
    <link rel="stylesheet" href="/assets/common/css/common.css">
    <link rel="stylesheet" href="/assets/common/css/container.css">
    <link rel="shortcut icon" type="image/png" href="<?= $conepone ? "https://static.equestria.horse/ponies/uploads/cloudburst.png" : "https://static.equestria.horse/ponies/uploads/raindrops.png" ?>">
</head>
<body>
    <a rel="me" href="https://equestria.social/@<?= $conepone ? "cloudburstsys" : "minteck" ?>" style="display:none"></a>
    <br><br><br>

    <div class="container" id="intro">
        <img alt="" id="intro-avatar" style="border-radius:999px;" src="<?= $conepone ? "https://static.equestria.horse/ponies/uploads/cloudburst.png" : "https://static.equestria.horse/ponies/uploads/raindrops.png" ?>">
        <h1 id="intro-title"><a id="intro-sys-link" href="https://ponies.equestria.horse/<?= $conepone ? "cloudburst" : "raindrops" ?>"><?= $conepone ? "Cloudburst System" : "Raindrops System" ?></a></h1>
        <p id="intro-ref">
        <?php if ($conepone): ?>
        Plural system of many ponies!
        <?php else: ?>
            <a href="https://www.youtube.com/watch?v=RkwbAR9aAqo&t=67s" target="_blank" id="intro-ref-link">I'll soar into that sky, on these wings small and pure</a>
        <?php endif; ?>
        </p>
    </div>

    <div id="social" class="container">
        <a href="https://twitter.com/<?= $conepone ? "leahpone" : "miapone_" ?>" target="_blank" id="social-twitter" class="social-item">
            <img id="social-twitter-icon" class="social-item-icon" alt="" src="/assets/common/social/twitter.png">
            <div id="social-twitter-text" class="social-item-text">Twitter</div>
        </a>
        <a href="https://matrix.to/#/@<?= $conepone ? "cloudburst" : "moonshine" ?>:equestria.horse" target="_blank" id="social-matrix" class="social-item">
            <img id="social-matrix-icon" class="social-item-icon" alt="" src="/assets/common/social/matrix.png">
            <div id="social-matrix-text" class="social-item-text">Matrix</div>
        </a>
        <a href="https://reddit.com/user/<?= $conepone ? "Cloudburst_Sys" : "Minteck" ?>" target="_blank" id="social-reddit" class="social-item">
            <img id="social-reddit-icon" class="social-item-icon" alt="" src="/assets/common/social/reddit.png">
            <div id="social-reddit-text" class="social-item-text">Reddit</div>
        </a>
        <?php if ($conepone): ?>
        <a href="https://tumblr.conep.one" target="_blank" id="social-tumblr" class="social-item">
            <img id="social-tumblr-icon" class="social-item-icon" alt="" src="/assets/common/social/tumblr.png">
            <div id="social-tumblr-text" class="social-item-text">Tumblr</div>
        </a>
        <?php else: ?>
            <a href="https://www.youtube.com/channel/UCfjxe9cs-ovoP1rBVwdMq0Q" target="_blank" id="social-youtube" class="social-item">
                <img id="social-youtube-icon" class="social-item-icon" alt="" src="/assets/common/social/youtube.png">
                <div id="social-youtube-text" class="social-item-text">YouTube</div>
            </a>
        <?php endif; ?>
        <a href="https://equestria.social/@<?= $conepone ? "cloudburstsys" : "minteck" ?>" target="_blank" id="social-mastodon" class="social-item">
            <img id="social-mastodon-icon" class="social-item-icon" alt="" src="/assets/common/social/mastodon.png">
            <div id="social-mastodon-text" class="social-item-text">Mastodon</div>
        </a>
        <a href="https://github.com/<?= $conepone ? "CloudburstSys" : "minteck" ?>" target="_blank" id="social-github" class="social-item">
            <img id="social-github-icon" class="social-item-icon" alt="" src="/assets/common/social/github.png">
            <div id="social-github-text" class="social-item-text">GitHub</div>
        </a>
    </div>

    <div id="social-mobile-outer" class="container">
        <div id="social-mobile">
            <a href="https://twitter.com/<?= $conepone ? "leahpone" : "MinteckPony" ?>" target="_blank" id="social-mobile-twitter" class="social-mobile-item">
                <img id="social-mobile-twitter-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/twitter.png">
                <div id="social-mobile-twitter-text" class="social-mobile-item-text">Twitter</div>
            </a>
            <a href="https://matrix.to/#/@<?= $conepone ? "cloudburst" : "moonshine" ?>:equestria.horse" target="_blank" id="social-mobile-matrix" class="social-mobile-item">
                <img id="social-mobile-matrix-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/matrix.png">
                <div id="social-mobile-matrix-text" class="social-mobile-item-text">Matrix</div>
            </a>
            <a href="https://reddit.com/user/<?= $conepone ? "Cloudburst_Sys" : "Minteck" ?>" target="_blank" id="social-mobile-reddit" class="social-mobile-item">
                <img id="social-mobile-reddit-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/reddit.png">
                <div id="social-mobile-reddit-text" class="social-mobile-item-text">Reddit</div>
            </a>
            <?php if ($conepone): ?>
                <a href="https://tumblr.conep.one" target="_blank" id="social-mobile-tumblr" class="social-mobile-item">
                    <img id="social-mobile-tumblr-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/tumblr.png">
                    <div id="social-mobile-tumblr-text" class="social-mobile-item-text">Tumblr</div>
                </a>
            <?php else: ?>
                <a href="https://www.youtube.com/channel/UCfjxe9cs-ovoP1rBVwdMq0Q" target="_blank" id="social-mobile-youtube" class="social-mobile-item">
                    <img id="social-mobile-youtube-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/youtube.png">
                    <div id="social-mobile-youtube-text" class="social-mobile-item-text">YouTube</div>
                </a>
            <?php endif; ?>
            <a href="https://equestria.social/@<?= $conepone ? "cloudburstsys" : "minteck" ?>" target="_blank" id="social-mobile-mastodon" class="social-mobile-item">
                <img id="social-mobile-mastodon-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/mastodon.png">
                <div id="social-mobile-mastodon-text" class="social-mobile-item-text">Mastodon</div>
            </a>
            <a href="https://github.com/<?= $conepone ? "CloudburstSys" : "minteck" ?>" target="_blank" id="social-mobile-github" class="social-mobile-item">
                <img id="social-mobile-github-icon" class="social-mobile-item-icon" alt="" src="/assets/common/social/github.png">
                <div id="social-mobile-github-text" class="social-mobile-item-text">GitHub</div>
            </a>

            <hr>
        </div>
    </div>

    <div id="links" class="container">
        <a href="https://equestria.horse" class="social-mobile-item" id="link-1">
            <img class="link-icon" id="link-1-icon" alt="" src="/assets/common/social/link.png">
            <span class="link-text" id="link-1-text">Equestria.horse, our shared website with the <?= $conepone ? "Raindrops System" : "Cloudburst System" ?></span>
        </a>
        <a href="https://ponies.equestria.horse" class="social-mobile-item" id="link-2">
            <img class="link-icon" id="link-2-icon" alt="" src="/assets/common/social/link.png">
            <span class="link-text" id="link-2-text">Cold Haze, our joined plurality website with the <?= $conepone ? "Raindrops System" : "Cloudburst System" ?></span>
        </a>
        <?php if (!$conepone): ?>
        <a href="https://scoots.equestria.horse" class="social-mobile-item" id="link-3">
            <img class="link-icon link-icon-svg" id="link-3-icon" alt="" src="/assets/minteck.org/links/blog.svg">
            <span class="link-text" id="link-3-text">Blog</span>
        </a>
        <a href="https://gitlab.minteck.org" class="social-mobile-item" id="link-4">
            <img class="link-icon link-icon-svg" id="link-4-icon" alt="" src="/assets/minteck.org/links/code.svg">
            <span class="link-text" id="link-4-text">(Mostly old) source code (GitLab)</span>
        </a>
        <?php endif; ?>
    </div>

    <div id="footer" class="container">
        <div id="relationships">
            <div class="relationship-1">
                <?= $conepone ? "Twi" : "Scoots" ?>
            </div>
            <div class="relationship-2">
                &hearts;
            </div>
            <div class="relationship-3">
                <?= $conepone ? "Scoots" : "Twi" ?>
            </div>

            <div class="relationship-1">
                <?= $conepone ? "Sunny" : "Scoots" ?>
            </div>
            <div class="relationship-2">
                &hearts;
            </div>
            <div class="relationship-3">
                <?= $conepone ? "Scoots" : "Sunny" ?>
            </div>
        </div>
        <br><br>
    </div>
</body>
</html>
