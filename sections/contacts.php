<?php
	function getMapStreet(){
		$zerif_contacts_maps_street = get_theme_mod('zerif_contacts_maps_street', '');
		$search = '';
		if($zerif_contacts_maps_street)
			$search = ' search=\'' . $zerif_contacts_maps_street . '\'';

		return $search;
	}

	function getMapLat(){
		$zerif_contacts_maps_lat = get_theme_mod('zerif_contacts_maps_lat', '');
		$lat = '';
		if($zerif_contacts_maps_lat)
			$lat = ' lat=\'' . $zerif_contacts_maps_lat . '\'';

		return $lat;
	}

	function getMapLng(){
		$zerif_contacts_maps_lng = get_theme_mod('zerif_contacts_maps_lng', '');
		$lng = '';
		if($zerif_contacts_maps_lng)
			$lng = ' lng=\'' . $zerif_contacts_maps_lng . '\'';

		return $lng;
	}

	function getMapZoom(){
		$zerif_contacts_maps_zoom = get_theme_mod('zerif_contacts_maps_zoom', '');
		$zoom = '';
		if($zerif_contacts_maps_zoom)
			$zoom = ' zoom=\'' . $zerif_contacts_maps_zoom . '\'';

		return $zoom;
	}

	function getMapHeight(){
		$zerif_contacts_maps_height = get_theme_mod('zerif_contacts_maps_height', '');
		$height = '';
		if($zerif_contacts_maps_height)
			$height = ' height=\'' . $zerif_contacts_maps_height . '\'';

		return $height;
	}

	function getMapWidth(){
		$zerif_contacts_maps_width = get_theme_mod('zerif_contacts_maps_width', '');
		$width = '';
		if($zerif_contacts_maps_width)
			$width = ' width=\'' . $zerif_contacts_maps_width . '\'';

		return $width;
	}

	function getMapScroll(){
		$zerif_contacts_maps_scroll = get_theme_mod('zerif_contacts_maps_scroll', false);
		if(wp_is_mobile())
			$zerif_contacts_maps_scroll = false;

		return ' scroll=\'' . $zerif_contacts_maps_scroll . '\'';
	}

	function getMapDrawable(){
		$zerif_contacts_maps_draggable = get_theme_mod('zerif_contacts_maps_draggable', false);
		if(wp_is_mobile())
			$zerif_contacts_maps_draggable = false;

		return ' draggable=\'' . $zerif_contacts_maps_draggable . '\'';
	}
?>
<section id="contacts">
	<?php
		$zerif_contacts_hide = get_theme_mod('zerif_contacts_show', false);
		if(!$zerif_contacts_hide){
			//FORM SECTION
			/* CONTACT US */
			?>
			<section class="contact-us" id="contact">
				<div class="container">
					<div class="col-md-8">
						<div class="section-header">

							<?php

								global $wp_customize;

								$zerif_contactus_title = get_theme_mod('zerif_contactus_title',__('Get in touch','zerif-lite'));
								if ( !empty($zerif_contactus_title) ):
									echo '<h2>'.wp_kses_post( $zerif_contactus_title ).'</h2>';
								elseif ( isset( $wp_customize ) ):
									echo '<h2 class="zerif_hidden_if_not_customizer"></h2>';
								endif;

								$zerif_contactus_subtitle = get_theme_mod('zerif_contactus_subtitle');
								if(isset($zerif_contactus_subtitle) && $zerif_contactus_subtitle != ""):
									echo '<div class="section-legend">'.wp_kses_post( $zerif_contactus_subtitle ).'</div>';
								elseif ( isset( $wp_customize ) ):
									echo '<h6 class="section-legend zerif_hidden_if_not_customizer">'.$zerif_contactus_subtitle.'</h6>';
								endif;
							?>
						</div>
						<!-- / END SECTION HEADER -->

							<!-- CONTACT FORM-->
							<div class="row">

								<div class="notification success"><p></p></div>

								<div class="notification error"><p></p></div>

								<form id="contact-us-form" role="form" class="contact-form">

									<div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
										<label for="myname" class="screen-reader-text"><?php _e( 'Your Name', 'zerif-lite' ); ?></label>
										<input required type="text" name="myname" id="myname" placeholder="<?php _e('Your Name','zerif-lite'); ?>" class="form-control input-box">
									</div>

									<div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
										<label for="myemail" class="screen-reader-text"><?php _e( 'Your Email', 'zerif-lite' ); ?></label>
										<input required type="email" name="myemail" id="myemail" placeholder="<?php _e('Your Email','zerif-lite'); ?>" class="form-control input-box">
									</div>

									<div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
										<label for="mysubject" class="screen-reader-text"><?php _e( 'Subject', 'zerif-lite' ); ?></label>
										<input required type="text" name="mysubject" id="mysubject" placeholder="<?php _e('Subject','zerif-lite'); ?>" class="form-control input-box">
									</div>

									<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
										<label for="mymessage" class="screen-reader-text"><?php _e( 'Your Message', 'zerif-lite' ); ?></label>
										<textarea required name="mymessage" id="mymessage" class="form-control textarea-box" placeholder="<?php _e('Your Message','zerif-lite'); ?>"></textarea>
									</div>

									<?php
									$zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message','zerif-lite'));
									if( !empty($zerif_contactus_button_label) ):
										// echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s" onclick="sendForm()">'.$zerif_contactus_button_label.'</button>';
										echo '<button class="btn btn-primary custom-button red-btn" type="submit">'.$zerif_contactus_button_label.'</button>';
									elseif ( isset( $wp_customize ) ):
										echo '<button class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer" type="submit" data-scrollreveal="enter left after 0s over 1s"></button>';
									endif;
									?>

								</form>

							</div>
						</div>

						<!-- / END CONTACT FORM-->

						<div class="col-md-4">

					<?php

							//GOOGLE MAPS SECTION
							$zerif_contacts_maps_hide = get_theme_mod('zerif_contacts_maps_show', false);
							if(!$zerif_contacts_maps_hide){
								do_shortcode( '[map' . getMapStreet() . getMapLng() . getMapLat() . getMapZoom() . getMapWidth() . getMapHeight() . getMapScroll() . getMapDrawable() . '][/map]' );
							}

							if($content)
								do_shortcode($content);
						}
					?>

				</div>

				</div> <!-- / END CONTAINER -->

			</section> <!-- / END CONTACT US SECTION-->

</section>
