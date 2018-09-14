<?php get_template_part('templates/global/html','header'); ?>
<section class="haim-page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <header class="haim-header--internal">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <?php if(is_singular('cirurgias')): ?>
                <span>Detalhes sobre a cirurgia</span>
            <?php else: ?>
                <span>Detalhes sobre o procedimento</span>
            <?php endif; ?>
        </div>
    </header>
    <div class="haim-content">
        <div class="container">
            <?php the_content(); ?>
            <?php if(is_singular('cirurgias')): ?>
                <h2 class="haim-content__title">Outras cirurgias</h2>
            <?php else: ?>
                <h2 class="haim-content__title">Outros procedimentos</h2>
            <?php endif; ?>
            <ul class="haim-procedures__list haim-procedures__list--internal">
            <?php if(is_singular('cirurgias')): ?>
                <?php $cirurgias = new WP_Query(array('post_type' => 'cirurgias', 'posts_per_page' => 4, 'orderby' => 'rand')); ?>
                <?php while($cirurgias->have_posts()) : $cirurgias->the_post(); ?>
                    <li class="haim-procedures__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="haim-procedures__mask"></div>
                            <?php the_post_thumbnail('full'); ?>
                            <span><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php $i++; endwhile; wp_reset_query(); ?>
            <?php endif;?>

            <?php if(is_singular('procedimentos')): ?>
                <?php $procedures = new WP_Query(array('post_type' => 'procedimentos', 'posts_per_page' => 4, 'orderby' => 'rand')); ?>
                <?php while($procedures->have_posts()) : $procedures->the_post(); ?>
                    <li class="haim-procedures__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="haim-procedures__mask"></div>
                            <?php the_post_thumbnail('full'); ?>
                            <span><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php $i++; endwhile; wp_reset_query(); ?>
            <?php endif;?>
            </ul>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_query(); ?>
</section>
<?php get_template_part('templates/global/html','newsletter'); ?>
<?php get_template_part('templates/global/html','footer'); ?>