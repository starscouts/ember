    <hr>
    <div id="footer-container">
        <div id="footer" class="container">
            <p>
                <a href="#" class="footer-link">Legal Notices</a> · <a href="/jetbrains" class="footer-link">Minteck and JetBrains</a> · <a href="#" class="footer-link">Copyright</a> · <a href="#" class="footer-link">Website source code</a> · <a href="#" class="footer-link">Report an issue with this website</a>
            </p>
            <div id="footer-links">

            </div>
            © <?= date('Y') ?> Minteck | <a href="https://tumblr.conep.one" target="_blank" class="footer-link-mini"><span id="cutie">❤️ Twi <span id="cutie-inner">(cutie ^^)</span></span></a> | <a href="https://gitlab.minteck.org/minteck/ember/-/tree/<?= version() ?>" target="_blank" class="footer-link-mini">version <?= version() ?></a> (#<?= build_dom() ?>)
        </div>

        <br>
    </div>

    <style>
        #cutie-inner {
            display: none;
        }

        #cutie:hover #cutie-inner {
            display: inline-block;
        }
    </style>
</body>
</html>
