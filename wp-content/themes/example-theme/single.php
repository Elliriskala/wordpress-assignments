<?php
get_header();
?>
<main class="full-width">
    <section class="single">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_title('<h1>', '</h1>');
                the_content();
            endwhile;
        else :
            _e('Sorry, no post to display', 'textdomain');
        endif;
        ?>
    </section>
</main>
<?php
get_footer();
