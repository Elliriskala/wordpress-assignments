<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="hero">
    <div class="hero-text">
        <?php
        echo '<p>' . category_description() . '</p>';
        ?>
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

    $args = ['child_of' => get_queried_object_id()];
    $subcategories = get_categories($args);

    foreach ($subcategories as $subcategory) :
    ?>
        <section class="products">
            <?php
            $args = [
                'post_type' => 'post',
                'cat' => $subcategory->term_id,
                'posts_per_page' => 3,
            ];
            $products = new WP_Query($args);
            generate_article($products);
            wp_reset_postdata();
            ?>
        </section>
    <?php
    endforeach;
    ?>
</main>
<?php
get_footer();
