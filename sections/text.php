<section id="<?php echo $id_section; ?>">
	<div class="container">

		<h1><?php echo $title; ?></h1>
		<?php if($img_left): ?>
			<div class="col-md-12">
				<img class="image_left width_sixty_percent" src="http://localhost:3000/wordpress/wp-content/uploads/custom/<?php echo $img_left; ?>"/>
			</div>
		<?php endif; ?>

		<div class="col-md-12 text">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
</section>
