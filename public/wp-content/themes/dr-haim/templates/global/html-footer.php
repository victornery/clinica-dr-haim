</main>

<footer>
	<div class="haim-footer">
		<div class="container">
			<?php $setting = get_option('configuracoes_tema'); $settings = $setting['group_ends']; ?>
			<div class="haim-flex">
				<address class="haim-footer__item">
					<b>Clínica Dr. Haim Erel</b>
					<span><?php echo $settings['endereco']; ?></span>
				</address>
				<div class="haim-footer__item">
					<?php foreach($settings['end_telefone'] as $tel): ?>
						<span><a href="tel:<?php echo $tel ?>"><?php echo $tel; ?></a></span>
					<?php endforeach; ?>
				</div>
				<div class="haim-footer__item">
					<img src="<?php echo get_template_directory_uri() ?>/dist/images/logo-derme-laser.png" alt="Derme&Laser">
					<div class="haim-footer__socials">
						<a href="<?php echo $settings['end_fb']; ?>" target="_blank" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#fff"><path d="M9 8H6v4h3v12h5V12h3.6l.4-4h-4V6.3c0-1 .2-1.3 1.1-1.3H18V0h-3.8C10.6 0 9 1.6 9 4.6V8z"/></svg></a>
						<a href="<?php echo $settings['end_ig']; ?>" target="_blank" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 169.1 169.1"><g fill="#FFF"><path d="M122.4 0H46.7C20.9 0 0 21 0 46.7v75.7c0 25.7 21 46.7 46.7 46.7h75.7c25.7 0 46.7-21 46.7-46.7V46.7C169 20.9 148 0 122.4 0zm31.7 122.4a31.7 31.7 0 0 1-31.7 31.7H46.7A31.7 31.7 0 0 1 15 122.4V46.7A31.7 31.7 0 0 1 46.7 15h75.7a31.7 31.7 0 0 1 31.7 31.7v75.7z"/><path d="M84.5 41a43.6 43.6 0 1 0 .1 87.2 43.6 43.6 0 0 0 0-87.2zm0 72a28.6 28.6 0 1 1 0-57.1 28.6 28.6 0 0 1 0 57.2zM130 28.3a11 11 0 0 0-11 11 11 11 0 0 0 11 11 11 11 0 0 0 7.8-18.8 11 11 0 0 0-7.9-3.2z"/></g></svg></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="haim-signature">
		<div class="container">
			<a href="http://medicos.globalconsultoria.online/" target="_blank" target="noopener"><img class="haim-signature__logo" src="<?php echo get_template_directory_uri() ?>/dist/images/logo-global.png" alt="Global Consultoria"></a>
		</div>
	</div>
</footer>

<?php wp_footer();?>

</body>
</html>