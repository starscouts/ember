<?php $title = "Minteck and JetBrains"; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; global $Parsedown; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"; ?>

<br>
<div style="margin-top: -25px;padding-top:10px;" class="bg-white text-black">
    <div class="container text-center text-black">
        supported by<br>
        <img src="/assets/proprietary/jetbrains_full.svg" alt="JetBrains">
        <p class="text-black">(this does <b class="text-black">NOT</b> mean sponsorship or endorsement of my projects by JetBrains)</p>
        <br>
    </div>
</div>

<div class="bg-white text-black">
    <div class="container text-center text-black">
        <h2 class="text-black">I use the following products from JetBrains:</h2>
        <div id="jb-grid">
            <div>
                <img src="/assets/proprietary/webstorm.svg" alt="">
                <div class="jb-product">WebStorm</div>
            </div>
            <div>
                <img src="/assets/proprietary/phpstorm.svg" alt="">
                <div class="jb-product">PhpStorm</div>
            </div>
            <div>
                <img src="/assets/proprietary/toolbox.svg" alt="">
                <div class="jb-product">Toolbox</div>
            </div>
            <div>
                <img src="/assets/proprietary/teamcity.svg" alt="">
                <div class="jb-product">TeamCity</div>
            </div>
            <div>
                <img src="/assets/proprietary/youtrack.svg" alt="">
                <div class="jb-product">YouTrack</div>
            </div>
            <div>
                <img src="/assets/proprietary/qodana.svg" alt="" style="width:100px;">
                <div class="jb-product">Qodana</div>
            </div>
        </div>
        <br>

        <div id="jb-experiences" class="text-start">
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/webstorm_full.svg" style="width:440px;">
                </div>
                <p class="text-black">JavaScript is one of the first programming languages I used, and the way I develop in this language changed throughout the years. Today, WebStorm's intelligent autocompletion helps me code in JavaScript faster than ever and makes me spend more time designing new features rather than writing actual code.</p>
            </div>
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/phpstorm_full.svg" style="width:440px;">
                </div>
                <p class="text-black">I started programming in PHP back in 2019, and the way I use the language now changed a lot. PhpStorm helps me make sure my code uses new optimized features from new versions of PHP so I can always keep my code up-to-date with the language.</p>
            </div>
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/teamcity_full.svg" style="width:440px;">
                </div>
                <p class="text-black">TeamCity was such a total change for me. I didn't want to use CI before because it always seemed complicated, but TeamCity makes it very easy to create build configurations and deploy my code to production servers as soon as possible. It is also compatible with a wide range of languages, and your own build script.</p>
            </div>
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/youtrack_full.svg" style="width:440px;">
                </div>
                <p class="text-black">YouTrack is my personal favorite issue tracker. GitLab's issue tracker is bundled to a Git repository which may not be ideal to track issues related to infrastructure, it's also much more limited than YouTrack. YouTrack allows to connect a Git repository and TeamCity build configuration with the issue tracker.</p>
            </div>
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/toolbox_full.svg" style="width:440px;">
                </div>
                <p class="text-black">With JetBrains' Toolbox app, I never need to worry about running the latest version of the IDEs, they are all updated automatically whenever a new version releases. With a single click, I can install the latest version of my favorite IDEs. And I can install a new IDE whenever I need it with a single click.</p>
            </div>
            <div>
                <div class="text-center">
                    <img src="/assets/proprietary/qodana_full.svg" style="width:440px;">
                </div>
                <p class="text-black">JetBrains' IDEs already provide code insights, but Qodana summarizes everything and displays fixes publicly so other developers who may not have access to the IDEs can improve the code quality. Qodana makes improving my code more intuitive and an after-programming task, so I focus on writing code instead.</p>
            </div>
        </div>
        <br>
        <p class="text-black">JetBrains has been giving me free licenses to help me develop my open-source projects for <b class="text-black"><?= (int)date('m') > 4 ? (int)date('Y') - 2020 : (int)date('Y') - 2021 ?> year<?= ((int)date('m') > 4 ? (int)date('Y') - 2019 : (int)date('Y') - 2020) > 1 ? "s" : "" ?></b>, huge thanks to them for supporting me!</p>
        <br>
    </div>
</div>

<br>
<div class="container">
    <p class="small">
        Copyright © 2000-<?= date('Y') ?> JetBrains s.r.o. JetBrains, the JetBrains logo, YouTrack, the YouTrack logo, TeamCity, the TeamCity logo, Qodana, the Qodana logo, JetBrains Toolbox, the JetBrains Toolbox logo, WebStorm, the WebStorm logo, PhpStorm and the PhpStorm logo are registered trademarks of JetBrains s.r.o.
    </p>
</div>

<!--
<!> Link back to jetbrains.com <!>
Logo: square: min 50px; bg from color palette (see screenshot) or photograph (does not compromise legibility)
> Please note that free product subscriptions granted by JetBrains do not constitute sponsorship or endorsement.
> If you receive a free product subscription from JetBrains, you may mention that JetBrains granted you a free
> product license for your meetup/event, OSS project, programming course, or particular community activity.
> You may also use JetBrains Brand logos or other brand assets for this purpose. You may, for example, say
> ‘supported by JetBrains’ or ‘product subscriptions provided by JetBrains’.
-->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>