<?php

if (!defined('ABSPATH')) {
    exit;
}

global $wp_query;
get_header();

$category = get_queried_object();

?>
<section class="hero">
    <div class="hero-text">
        <?php
        echo '<p>' . category_description() . '</p>';
        ?>
    </div>
    <img src="<?php echo get_random_post_image(get_queried_object_id()); ?>" alt="randomkuva">
</section>
<main>
    <section class="section-header">
        <h1><?php echo esc_html($category->name); ?></h1>
    </section>
    <section class="products">
        <?php

        generate_article($wp_query);
        ?>
    </section>
</main>
<?php
get_footer();
