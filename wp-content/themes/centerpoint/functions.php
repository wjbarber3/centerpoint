<?php

//---------------------------------------------------//
//---- BASIC WORDPRESS SUPPORT ----------------------//
//---------------------------------------------------//

// Featured Images
add_theme_support( 'post-thumbnails' );

//---------------------------------------------------//
//---- ENQUEUE SCRIPTS AND STYLES -------------------//
//---------------------------------------------------//

function metromont_scripts() {
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/compiled_css/main.style.css' , false, filemtime( get_template_directory() . '/compiled_css/main.style.css' ), 'screen' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome/font-awesome.min.css' , false, filemtime( get_template_directory() . '/font-awesome/font-awesome.min.css' ), 'screen' );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime( get_template_directory() . '/js/main.js' ), false );
}
add_action( 'wp_enqueue_scripts', 'metromont_scripts' );	

//---------------------------------------------------//
//---- PAGE SLUG BODY CLASS -------------------------//
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
//---- CUSTOMIZE DASHBOARD WELCOME ------------------//
//---------------------------------------------------//

// example custom dashboard widget
function custom_dashboard_widget() {
	echo "<p>Welcome to the admin section of your site</p>
			<ol>
				<li>Adding an entry to the Employees tab with automatically add that entry to the company page</li>
				<li>The homepage is an example of our custom Page Builder template, you can build custom pages on the site and add any combinations of modules that you see on the homepage</li>
				<li>Adding a product will generate that product on the Products page</li>
				<li>You can add menu items under 'Appearance->Themes->Customize->Menus'</li>
			</ol>";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'CenterPoint Admin', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');


//---------------------------------------------------//
//---- 'FIELD LABEL' VISIBILITY FOR GRAVITY FORMS ----//
//---------------------------------------------------//

// add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

//---------------------------------------------------//
//---- REGISTER CUSTOM POST TYPES ------------------//
//--------------------------------------------------//

function employees_custom_post_type() {
  $labels = [
    'name'               => _x( 'Employees', 'post type general name' ),
    'singular_name'      => _x( 'Employee', 'post type singular name' ),
    'add_new'            => _x( 'Add New Employee', '' ),
    'add_new_item'       => __( 'Add New Employee' ),
    'edit_item'          => __( 'Edit Employee' ),
    'new_item'           => __( 'New Employee' ),
    'all_items'          => __( 'All Employees' ),
    'view_item'          => __( 'View Employee' ),
    'search_items'       => __( 'Search Employees' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Employees',
 ];
  $args = [
    'labels'        => $labels,
    'description'   => 'Holds our employee information',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  ];
  register_post_type( 'employee', $args ); 
}
add_action( 'init', 'employees_custom_post_type' );

function products_custom_post_type() {
  $labels = [
    'name'               => _x( 'Products', 'post type general name' ),
    'singular_name'      => _x( 'Product', 'post type singular name' ),
    'add_new'            => _x( 'Add New Product', '' ),
    'add_new_item'       => __( 'Add New Product' ),
    'edit_item'          => __( 'Edit Product' ),
    'new_item'           => __( 'New Product' ),
    'all_items'          => __( 'All Products' ),
    'view_item'          => __( 'View Product' ),
    'search_items'       => __( 'Search Products' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Products',
 ];
  $args = [
    'labels'        => $labels,
    'description'   => 'Holds our product information',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  ];
  register_post_type( 'product', $args ); 
}
add_action( 'init', 'products_custom_post_type' );

//-----------------------------------//
//----REGISTER CUSTOM TAXONOMIES-----//
//-----------------------------------//

function my_taxonomies_employee() {
  $labels = array(
    'name'              => _x( 'Employee Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Employee Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Employee Categories' ),
    'all_items'         => __( 'All Employee Categories' ),
    'parent_item'       => __( 'Parent Employee Category' ),
    'parent_item_colon' => __( 'Parent Product Category:' ),
    'edit_item'         => __( 'Edit Employee Category' ), 
    'update_item'       => __( 'Update Employee Category' ),
    'add_new_item'      => __( 'Add New Employee Category' ),
    'new_item_name'     => __( 'New Employee Category' ),
    'menu_name'         => __( 'Employee Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'employee_category', 'employee', $args );
}
add_action( 'init', 'my_taxonomies_employee', 0 );

//-------------------------------------//
//---- ADVANCED CUSTOM FIELDS ---------//
//-------------------------------------//

