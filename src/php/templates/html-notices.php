<section class="haim-notices">
        <span class="haim-notices__highlight"><b>Notícias</b> | Clínica Haim Erel</span>
        <?php $lastArticles = new WP_Query(array('posts_per_page' => 2)); ?>
        <?php while($lastArticles->have_posts()) : $lastArticles->the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
        <?php endwhile; wp_reset_query(); ?>
</section>