<?php get_template_part('templates/global/html','header'); ?>

<section class="haim-page">
        <?php if (have_posts()) : while(have_posts()) : the_post();?>
<section class="profissional">
  <div class="container">
    <figure class="profissional__item">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?> - Dr. Érico Diógenes">
    </figure>
    <article class="profissional__item profissional__content">
      <h2>Dr. Haim Erel</h2>
      <p><?php the_content() ?></p>
    </article>
  </div>
</section>

<section class="galeria">
  <div class="container">
    <h2>A Clínica</h2>
    <?php do_shortcode('[Best_Wordpress_Gallery id="2" gal_title="Fotos da Clínica"]') ?>
  </div>
</section>

        <?php endwhile; endif; wp_reset_query(); ?>
    </div>
</section>

<?php get_template_part('templates/global/html','footer'); ?>