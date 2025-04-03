<?php
get_header();
?>
<main>
    <section class="products">
        <h2>Search results</h2>
        <?php

        generate_article($wp_query);
        ?>
    </section>
</main>
<?php
get_footer();
