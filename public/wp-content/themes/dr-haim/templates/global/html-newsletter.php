<?php if(is_home()): ?>
    <section class="haim-cta">
        <div class="container">
            <?php $setting = get_option('configuracoes_tema'); $settings = $setting['group_ends']; ?>
            <h2>Marque uma consulta</h2>
            <?php foreach($settings['end_telefone'] as $tel): ?>
				<span><a href="tel:<?php echo $tel ?>"><?php echo $tel; ?></a></span>
			<?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
<section class="haim-newsletter">
    <div class="container">
        <span class="haim-newsletter__cta"><b>Fique por dentro</b> | Cadastre-se e receba nossa newsletter</span>
        <div class="haim-newsletter__form">
            <?php echo do_shortcode('[contact-form-7 id="45" title="Newsletter"]'); ?>
        </div>
    </div>
</section>