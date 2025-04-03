<?php

function generate_article($products)
{
    if ($products->have_posts()) :
        while ($products->have_posts()) :
            $products->the_post();
?>
            <article class="product">
                <?php
                the_post_thumbnail();
                the_title('<h3>', '</h3>');
                $excerpt = get_the_excerpt();
                ?>
                <p>
                    <?php echo substr($excerpt, 0, 50); ?>...
                </p>
                <a href="<?php echo get_permalink(); ?>">Read More</a>
            </article>
<?php
        endwhile;
    endif;
} // end generate_article()