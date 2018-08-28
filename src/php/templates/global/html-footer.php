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
				</div>
			</div>
		</div>
	</div>
	<div class="haim-copyright">
		<div class="container haim-copyright__content">
			<span>Todos os direitos reservados ao Dr. Haim Erel</span>

			<div class="haim-copyright__socials">
				<a href="<?php echo $settings['end_fb']; ?>" target="_blank" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#3a7579"><path d="M9 8H6v4h3v12h5V12h3.6l.4-4h-4V6.3c0-1 .2-1.3 1.1-1.3H18V0h-3.8C10.6 0 9 1.6 9 4.6V8z"/></svg></a>
				<a href="<?php echo $settings['end_ig']; ?>" target="_blank" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 169.1 169.1"><g fill="#3a7579"><path d="M122.4 0H46.7C20.9 0 0 21 0 46.7v75.7c0 25.7 21 46.7 46.7 46.7h75.7c25.7 0 46.7-21 46.7-46.7V46.7C169 20.9 148 0 122.4 0zm31.7 122.4a31.7 31.7 0 0 1-31.7 31.7H46.7A31.7 31.7 0 0 1 15 122.4V46.7A31.7 31.7 0 0 1 46.7 15h75.7a31.7 31.7 0 0 1 31.7 31.7v75.7z"/><path d="M84.5 41a43.6 43.6 0 1 0 .1 87.2 43.6 43.6 0 0 0 0-87.2zm0 72a28.6 28.6 0 1 1 0-57.1 28.6 28.6 0 0 1 0 57.2zM130 28.3a11 11 0 0 0-11 11 11 11 0 0 0 11 11 11 11 0 0 0 7.8-18.8 11 11 0 0 0-7.9-3.2z"/></g></svg></a>
				<a href="<?php echo $settings['ends_yt']; ?>" target="_blank" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 90 90" fill="#3a7579"><path d="M71 65.8h-5V63c0-1.3 1-2.4 2.3-2.4h.4c1.2 0 2.3 1 2.3 2.4v2.8zm-18.6-6.1c-1.2 0-2.3.8-2.3 1.9v14c0 1 1 1.8 2.3 1.8 1.3 0 2.3-.9 2.3-1.9v-14c0-1-1-1.8-2.3-1.8zm30.1-7.8v26.5C82.5 84.8 77 90 70.2 90H19.8C13 90 7.5 84.8 7.5 78.4V52c0-6.4 5.5-11.6 12.3-11.6h50.4c6.8 0 12.3 5.2 12.3 11.6zM23.1 81.3v-28h6.3v-4.1H12.7v4H18v28.1h5.2zM42 57.5h-5.2v18.6c-.5 1.1-2.4 2.3-3.1 0V57.6h-5.2V77c.1 1.4 0 3 1.3 3.9 2.4 1.7 6.9-.3 8-2.7v3l4.2.1V57.5zm16.7 17.1V62.2c0-4.8-3.6-7.6-8.4-3.8v-9.2H45v31.9h4.3l.4-2c5.4 5 8.9 1.5 8.9-4.5zM74.9 73h-4v2.7c0 1.2-.9 2.1-2 2.1H68c-1.2 0-2.2-1-2.2-2.1V70h9v-3.4c0-2.5 0-5-.3-6.3-.6-4.5-6.9-5.2-10-3-1 .8-1.8 1.7-2.2 3-.5 1.3-.7 3-.7 5.3V73c0 12.3 15 10.6 13.2 0zm-20-40.3c.2.7.6 1.2 1.2 1.6.5.4 1.3.6 2.1.6s1.4-.2 2-.6c.6-.4 1-1 1.5-1.9l-.1 2h5.8V9.8h-4.6V29a2 2 0 0 1-3.8 0V9.7h-4.8v16.7l.1 4.3.5 2zm-17.7-14c0-2.3.2-4.2.6-5.5A6.2 6.2 0 0 1 40 10c1-.8 2.4-1.2 4-1.2 1.3 0 2.5.2 3.4.8 1 .5 1.8 1.2 2.3 2a8 8 0 0 1 1 2.6c.2.9.3 2.2.3 4v6.3c0 2.3 0 4-.2 5a8 8 0 0 1-1.2 3c-.6 1-1.3 1.6-2.2 2-1 .5-2 .7-3.2.7-1.3 0-2.4-.1-3.3-.5-1-.4-1.7-1-2.2-1.7-.5-.8-.8-1.7-1-2.8-.3-1-.4-2.7-.4-4.9v-6.5zm4.6 9.9c0 1.4 1 2.5 2.3 2.5 1.3 0 2.3-1.1 2.3-2.5V15.4c0-1.4-1-2.5-2.3-2.5-1.3 0-2.3 1.1-2.3 2.5v13.2zm-16.1 6.6h5.5v-19L37.7 0h-6l-3.5 12.1L24.7 0h-6l7 16.3v19z"/></svg></a>
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