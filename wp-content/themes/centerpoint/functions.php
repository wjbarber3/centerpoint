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
//---- CUSTOMIZE DASHBOARD WELCOME -----//
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
//----'FIELD LABEL' VISIBILITY FOR GRAVITY FORMS-----//
//---------------------------------------------------//

// add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

//---------------------------------------------------//
//----REGISTER CUSTOM POST TYPES-----//
//---------------------------------------------------//

// Register Employees Custom Post Type
function employees_custom_post_type() {

	$labels = array(
		'name'                  => 'Employees',
		'singular_name'         => 'Employee',
		'menu_name'             => 'Employees',
		'name_admin_bar'        => 'Employee',
		'archives'              => 'Item Archives',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Employee',
		'description'           => 'A List of CenterPoint Employees categorized by role',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'post_type', $args );

}
add_action( 'init', 'employees_custom_post_type', 0 );

//---------------------------------------------------//
//----REGISTER CUSTOM TAXONOMIES-----//
//---------------------------------------------------//

//-------------------------------------//
//---- ADVANCED CUSTOM FIELDS ---------//
//-------------------------------------//

