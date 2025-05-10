<?php

/**
 * Template Name: Your likes page
 * Template Post Type: page
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();

global $wpdb;

$user_id = get_current_user_id();

$results = $wpdb->get_col(
    $wpdb->prepare("SELECT post_id FROM wp_likes WHERE user_id = %d", $user_id)
);

$liked_posts = is_array($results) ? array_map('intval', $results) : [];

?>
<section class="hero">
    <div class="hero-text">
        <p></p>
    </div>
    <?php
    $header_images = get_uploaded_header_images();
    array_shift($header_images);
    ?>
    <img src="<?php echo $header_images[0]['url']; ?>" alt="headerkuva"
        width="<?php echo get_custom_header()->width; ?>"
        height="<?php echo get_custom_header()->height; ?>">
</section>

<main>
    <section class="section-header">
        <h1>Liked products</h1>
    </section>

    <section class="products">
        <?php
        if (!empty($liked_posts)) {
            $args = [
                'post_type' => 'post',
                'post__in' => $liked_posts,
                'orderby' => 'post__in',
                'posts_per_page' => -1,
            ];
            $liked_query = new WP_Query($args);

            if ($liked_query->have_posts()) :
                while ($liked_query->have_posts()) : $liked_query->the_post(); ?>
                    <article class="product">
                        <?php if (has_post_thumbnail()) : ?>
                            <div>
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h2><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>" class="read-more-link">Read More</a>
                        </div>
                    </article>
        <?php endwhile;
            else :
                echo '<p>You have not liked any product yet.</p>';
            endif;

            wp_reset_postdata();
        }
        ?>
    </section>
</main>

<?php get_footer();
