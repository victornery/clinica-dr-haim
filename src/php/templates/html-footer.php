</main>

<footer>
	<div class="haim-footer">
		<div class="container">
			<?php $setting = get_option('configuracoes_tema'); $settings = $setting['group_ends']; ?>
			<div class="haim-flex">
				<div class="haim-footer__item">
					<b>Clínica Dr. Haim Erel</b>
					<span><?php echo $settings['endereco']; ?></span>
				</div>
				<div class="haim-footer__item">
					<?php foreach($settings['end_telefone'] as $endereco): ?>
						<span><?php echo $endereco; ?></span>
					<?php endforeach; ?>
				</div>
				<div class="haim-footer__item">
					<img src="<?php echo get_template_directory_uri() ?>/dist/images/logo-derme-laser.png" alt="Derme&Laser">
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