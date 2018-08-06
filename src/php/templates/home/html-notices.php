<section class="haim-notices">
        <span class="haim-notices__highlight"><b>Notícias</b> | Clínica Haim Erel</span>
        <?php $lastArticles = new WP_Query(array('posts_per_page' => 2)); ?>
        <?php $i = 1; ?>
        <?php while($lastArticles->have_posts()) : $lastArticles->the_post(); ?>
            <div class="haim-notices__item">
                <a href="<?php the_permalink(); ?>">
                    <div class="haim-notices__icon<?php echo ($i === 1 ? ' haim-notices__icon--last' : ''); ?>"><img src="<?php echo get_template_directory_uri() ?>/dist/images/male-icon.png" alt="Ícone de Notícia - Usuário"></div>
                    <div class="haim-notices__details">
                        <span class="haim-notices__title haim-notices__title--home"><?php the_title(); ?></span>
                        <span class="haim-notices__content haim-notices__content--home"><?php the_excerpt(); ?></span>
                    </div>
                </a>
            </div>
        <?php $i++; endwhile; wp_reset_query(); ?>
</section>