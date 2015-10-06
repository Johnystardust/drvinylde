<?php

	register_nav_menus( array( 'Hoofdnavigatie' => 'Hoofd navigatie' ) );
	register_nav_menus( array( 'Quicklinks' => 'Quicklinks' ) );
	register_nav_menus( array( 'Interieur' => 'Interieur' ) );
	register_nav_menus( array( 'Exterieur' => 'Exterieur' ) );
	register_nav_menus( array( 'Bouwsector' => 'Bouwsector' ) );
	register_nav_menus( array( 'Openbaar vervoer' => 'Openbaar vervoer' ) );
	register_nav_menus( array( 'Luchtvaart' => 'Luchtvaart' ) );
	register_nav_menus( array( 'Scheepvaart' => 'Scheepvaart' ) );
	register_nav_menus( array( 'Herstellen' => 'Herstellen' ) );
	
	add_filter('mce_css', 'my_editor_style');

	// custom functions
	function crop_url($image, $width, $height, $ratio) {
	
		$image = base64_encode($image);
		$url = get_bloginfo("template_url")."/images/crop.php?image=".$image."&height=".$height."&width=".$width."&cropratio=".$ratio;
		
		return $url;
	}
	
	
	function dutch_month($string) {
	
		$months[1] = "januari";
		$months[2] = "februari";
		$months[3] = "maart";
		$months[4] = "april";
		$months[5] = "mei";
		$months[6] = "juni";
		$months[7] = "juli";
		$months[8] = "augustus";
		$months[9] = "september";
		$months[10] = "oktober";
		$months[11] = "november";
		$months[12] = "december";
		
		if(array_key_exists($string, $months)) {
			return $months[$string];
		} else {
			return false;
		}
	
	}
	
	function my_editor_style($url) {

	  if ( !empty($url) )
	    $url .= ',';

	  // Change the path here if using sub-directory
	  $url .= trailingslashit( get_stylesheet_directory_uri() ) . 'editor.css';

	  return $url;
	}
	
	function my_excerpt_length($length) {
		return 20; // Or whatever you want the length to be.
	}
	
	function excerpt_ellipse($text) {
   		return str_replace('[...]', ' <a href="'.get_permalink().'">Lees meer.</a>', $text);
	}

	add_filter('get_the_excerpt', 'excerpt_ellipse');
	add_filter('excerpt_length', 'my_excerpt_length');
	
	
?>