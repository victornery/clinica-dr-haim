<?php get_template_part('templates/global/html','header'); ?>
<section class="haim-archive">
        <header class="haim-header--internal">
            <div class="container">
                <h1><?php post_type_archive_title(); ?></h1>
            </div>
        </header>
    <div class="container">
        <div class="haim-content">
            <ul class="haim-procedures__list">
        <?php $cirurgias = new WP_Query(array('post_type' => 'cirurgias', 'posts_per_page' => -1)); ?>
        <?php while($cirurgias->have_posts()) : $cirurgias->the_post(); ?>
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