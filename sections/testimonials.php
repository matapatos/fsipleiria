<?php

			echo '<section class="testimonial" id="testimonials">';

				echo '<div class="container">';

					echo '<div class="section-header">';

						$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title',__('Testimonials','zerif-lite'));

						if( !empty($zerif_testimonials_title) ):

							echo '<h2 class="white-text">'.$zerif_testimonials_title.'</h2>';

						endif;

						$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

						if( !empty($zerif_testimonials_subtitle) ):

							echo '<h6 class="white-text section-legend">'.$zerif_testimonials_subtitle.'</h6>';

						endif;

					echo '</div>';

					echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';

						echo '<div class="col-md-12">';

							$pinterest_style = '';
							$zerif_testimonials_pinterest_style = get_theme_mod('zerif_testimonials_pinterest_style');
							if( isset($zerif_testimonials_pinterest_style) && $zerif_testimonials_pinterest_style != 0 ) {
								$pinterest_style = 'testimonial-masonry';
							}

							echo '<div id="client-feedbacks" class="owl-carousel owl-theme ' . $pinterest_style . ' ">';

									if(is_active_sidebar( 'sidebar-testimonials' )):

										dynamic_sidebar( 'sidebar-testimonials' );
									endif;

							echo '</div>';

						echo '</div>';

					echo '</div>';

				echo '</div>';

			echo '</section>';

?>
