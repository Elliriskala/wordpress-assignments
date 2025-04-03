<?php
get_header();
?>
<section class="hero">
    <div class="hero-text">
        <?php
        echo '<h1>' . single_cat_title('', false) . '</h1>';
        echo '<p>'  . category_description() . '</p>';
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
    <section class="products">
        <?php
        $args = ['child_of' => get_queried_object_id()];
        $subcategories = get_categories($args);

        foreach ($subcategories as $subcategory) :
            echo '<h2>' . $subcategory->name . '</h2>';

            $args = [
                'post_type' => 'post',
                'cat' => $subcategory->term_id,
                'posts_per_page' => 3,
            ];
            $products = new WP_Query($args);
            generate_article($products);
        ?>
            <article class="product all">
                <a href="<?php echo get_category_link($subcategory->term_id); ?>">View all</a>
            </article>
        <?php
            wp_reset_postdata();
        endforeach;
        ?>
    </section>
</main>
<?php
get_footer();
