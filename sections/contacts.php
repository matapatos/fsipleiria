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
			$zerif_contacts_tel = get_theme_mod('zerif_contacts_phone', '');
			$tel = ($tel ? $tel : $zerif_contacts_tel);
			if($tel){
				echo '<div id="phone">
						<h3>' . __( 'Phone', 'fsipleiria' ) . ':</h3>
						<p>' . $tel . '></p>
					</div>';
			}

			$zerif_contacts_email = get_theme_mod('zerif_contacts_email', '');
			$email = ($email ? $email : $zerif_contacts_email);
			if($email){
				echo '<div id="email">
						<h3>' . __( 'Email', 'fsipleiria' ) . ':</h3>
						<p>' . $email . '</p>
					</div>';
			}

			$zerif_contacts_address = get_theme_mod('zerif_contacts_street', '' );
			$street = ($street ? $street : $zerif_contacts_address);
			if($street){
				echo '<div id="street">
						<h3>' . __( 'Street', 'fsipleiria' ) . ':</h3>
						<p>' . $street . '</p>
					</div>';
			}

			$zerif_contacts_maps_hide = get_theme_mod('zerif_contacts_maps_show', false);
			if(!$zerif_contacts_maps_hide){
				do_shortcode( '[map' . getMapStreet() . getMapLng() . getMapLat() . getMapZoom() . getMapWidth() . getMapHeight() . getMapScroll() . getMapDrawable() . '][/map]' );
			}

			if($content)
				do_shortcode($content);
		}
	?>

</section>
