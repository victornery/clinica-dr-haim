<section class="haim-side">
        <span class="haim-side__highlight"><b>Notícias</b> | Clínica Haim Erel</span>
        <?php $lastArticles = new WP_Query(array('posts_per_page' => 2)); ?>
        <?php while($lastArticles->have_posts()) : $lastArticles->the_post(); ?>
            <div class="haim-side__icon"><img src="<?php echo get_template_directory_uri() ?>/dist/images/male-icon.png" alt="Ícone de Notícia - Usuário"></div>
            <span class="haim-side__notice"><?php the_title(); ?></span>
            <?php the_content(); ?>
        <?php endwhile; wp_reset_query(); ?>
</section>