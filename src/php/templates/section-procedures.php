<section class="haim-procedures">
    <div class="container">
        <span>Cirurgias & Procedimentos - <b>Veja os mais procurados</b></span>

        <ul class="haim-procedures__list">
            <?php $procedures = new WP_Query(array('post_type' => 'procedimentos', 'posts_per_page' => -1)) ?>
            <?php while($procedures->have_posts()) : $procedures->the_post(); ?>

                <li class="haim-procedures__item">
                    <div class="haim-procedures__mask"></div>
                    <?php the_post_thumbnail('full'); ?>
                    <span><?php the_title(); ?></span>
                </li>
            <?php endwhile; wp_reset_query(); ?>
        </ul>
    </div>
</section>