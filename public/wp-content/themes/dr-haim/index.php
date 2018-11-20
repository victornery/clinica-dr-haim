<?php get_template_part('templates/global/html','header'); ?>
<section class="haim-page">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="haim-header--internal">
            <h1><?php the_title(); ?></h1>
        </header>
        <aside>
            <span class="haim-content__data"><?php the_date() ?> · <?php the_author(); ?></span>
        </aside>
        <article class="haim-content">
            <?php the_content(); ?>
        </article>
        <?php endwhile; endif; wp_reset_query(); ?>
    </div>
</section>
<?php get_template_part('templates/global/html','footer'); ?>