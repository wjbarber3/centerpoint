<?php

//---------------------------------------------------//
//----BASIC WORDPRESS SUPPORT-----//
//---------------------------------------------------//

// Featured Images
add_theme_support( 'post-thumbnails' );

//---------------------------------------------------//
//----ENQUEUE SCRIPTS AND STYLES-----//
//---------------------------------------------------//

function metromont_scripts() {
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/compiled_css/main.style.css' , false, filemtime( get_template_directory() . '/compiled_css/main.style.css' ), 'screen' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome/font-awesome.min.css' , false, filemtime( get_template_directory() . '/font-awesome/font-awesome.min.css' ), 'screen' );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime( get_template_directory() . '/js/main.js' ), false );
}
add_action( 'wp_enqueue_scripts', 'metromont_scripts' );	

//---------------------------------------------------//
//----PAGE SLUG BODY CLASS-----//
//---------------------------------------------------//

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );


//---------------------------------------------------//
//----'FIELD LABEL' VISIBILITY FOR GRAVITY FORMS-----//
//---------------------------------------------------//

// add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

//---------------------------------------------------//
//----REGISTER CUSTOM POST TYPES-----//
//---------------------------------------------------//

//---------------------------------------------------//
//----REGISTER CUSTOM TAXONOMIES-----//
//---------------------------------------------------//

//-------------------------------------//
//---- ADVANCED CUSTOM FIELDS ---------//
//-------------------------------------//

