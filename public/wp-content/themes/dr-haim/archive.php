<?php get_template_part('templates/global/html','header'); ?>
<section class="haim-archive">
    <div class="container">
        <header class="haim-header--internal">
            <h1><?php the_title(); ?></h1>
        </header>
        <div class="haim-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_template_part('templates/html','newsletter'); ?>
<?php get_template_part('templates/html','footer'); ?>