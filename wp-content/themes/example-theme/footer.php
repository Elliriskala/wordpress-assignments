<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<footer class="footer-nav">
    <div class="footer-right">
        <p>&copy; 2001 Hellthread Vintage</p>
    </div>
    <div class="footer-left">
        <?php wp_nav_menu(["theme-location" => "main-menu", "container" => "nav"]); ?>
    </div>
</footer>
</div>
<dialog id="single-post">
    <button id="close">Close</button>
    <article class="single" id="modal-content">

    </article>

</dialog>
<?php wp_footer(); ?>

</body>

</html>