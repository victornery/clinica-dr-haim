<?php get_template_part('templates/global/html','header'); ?>
<section class="haim-archive">
    <div class="container">
        <header class="haim-header--internal">
            <h1><?php post_type_archive_title(); ?></h1>
        </header>
        <div class="haim-content">
            <ul class="haim-procedures__list">
        <?php $procedures = new WP_Query(array('post_type' => 'procedimentos', 'posts_per_page' => -1)); ?>
        <?php while($procedures->have_posts()) : $procedures->the_post(); ?>
                <li class="haim-procedures__item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="haim-procedures__mask"></div>
                        <?php the_post_thumbnail('full'); ?>
                        <span><?php the_title(); ?></span>
                    </a>
                </li>
                <?php $i++; endwhile; wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</section>
<?php get_template_part('templates/global/html','newsletter'); ?>
<?php get_template_part('templates/global/html','footer'); ?>