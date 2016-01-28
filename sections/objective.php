<?php
			echo '<section class="our-team" id="objective">';

				echo '<div class="container">';

					echo '<div class="section-header">';

						$zerif_ourteam_title = get_theme_mod('zerif_ourteam_title',__('Objective','zerif-lite'));

						if( !empty($zerif_ourteam_title) ):
							echo '<h2 class="dark-text">'.$zerif_ourteam_title.'</h2>';
						endif;

						$zerif_ourteam_subtitle = get_theme_mod('zerif_ourteam_subtitle',__('This is our objective as a team.','zerif-lite'));

						if( !empty($zerif_ourteam_subtitle) ):

							echo '<div class="section-legend">'.$zerif_ourteam_subtitle.'</div>';

						endif;

					echo '</div>';

				echo '</div>';

			echo '</section>';

?>
