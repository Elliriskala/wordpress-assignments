<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$term = get_queried_object();
?>
<section class="hero">
    <div class="hero-text">
        <p><?php echo term_description($term, 'size'); ?></p>
    </div>
    <?php
    $header_images = get_uploaded_header_images();
    array_shift($header_images);
    ?>
    <img src="<?php echo $header_images[0]['url'] ?>" alt="headerkuva"
        width="<?php echo get_custom_header()->width; ?>"
        height="<?php echo get_custom_header()->height; ?>">
</section>

<main>
    <?php
    echo do_shortcode('[searchandfilter fields="category,size" headings="Band,Size" submit_label="Filter" class="filter"]');

    $args = [
        'post_type' => 'post',
        'tax_query' => [
            [
                'taxonomy' => 'size',
                'field' => 'slug',
                'terms' => $term->slug,
            ],
        ],
        'posts_per_page' => -1,
    ];

    $products = new WP_Query($args);

    if ($products->have_posts()) : ?>
        <section class="section-header">
            <h1><?php echo esc_html($term->name); ?></h1>
        </section>
        <section class="products">
            <?php generate_article($products); ?>
        </section>
    <?php else : ?>
        <section class="products">
            <p>No shirts found for "<?php echo esc_html($term->name); ?>" size.</p>
        </section>
    <?php endif;

    wp_reset_postdata();
    ?>
</main>

<?php
get_footer();
