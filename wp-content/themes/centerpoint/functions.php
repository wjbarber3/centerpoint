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
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'has_archive'   => true,
    'rewrite' => [ 'slug' => 'employee' ]
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

//---------------------------------------//
//---- REWRITE EMPLOYEE PERMALINKS -----//
//-------------------------------------//

// Rewrite permalink structure
function employee_rewrite() {
    global $wp_rewrite;
    $queryarg = 'post_type=employee&p=';
    $wp_rewrite->add_rewrite_tag( '%cpt_id%', '([^/]+)', $queryarg );
    $wp_rewrite->add_permastruct( 'employee', '/employee/%cpt_id%/', false );
}
add_action( 'init', 'employee_rewrite' );

function employee_permalink( $post_link, $id = 0, $leavename ) {
    global $wp_rewrite;
    $post = &get_post( $id );
    if ( is_wp_error( $post ) )
        return $post;
        $newlink = $wp_rewrite->get_extra_permastruct( 'employee' );
        $newlink = str_replace( '%cpt_id%', $post->ID, $newlink );
        $newlink = home_url( user_trailingslashit( $newlink ) );
    return $newlink;
}
add_filter('post_type_link', 'employee_permalink', 1, 3);

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

if(function_exists("register_field_group")) {
  register_field_group([
    'id' => 'acf_company-fields',
    'title' => 'Company Fields',
    'fields' => [
      [
        'key' => 'field_57fd53b56bb88',
        'label' => 'Quick Links',
        'name' => 'quick_links',
        'type' => 'repeater',
        'instructions' => 'Use this section to add quick links to the right side of the page. You can add between 1-4 QuickLinks.',
        'required' => 1,
        'sub_fields' => [
          [
            'key' => 'field_57fd54326bb89',
            'label' => 'QuickLink Text',
            'name' => 'quicklink_text',
            'type' => 'text',
            'instructions' => 'Add the actual copy for the link',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'Link Text',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => 70,
          ],
          [
            'key' => 'field_57fd54a76bb8a',
            'label' => 'QuickLink Link',
            'name' => 'quicklink_link',
            'type' => 'page_link',
            'instructions' => 'Add the page that this QuickLink will direct to.',
            'required' => 1,
            'column_width' => '',
            'post_type' => [
              0 => 'all',
            ],
            'allow_null' => 0,
            'multiple' => 0,
          ],
        ],
        'row_min' => '1',
        'row_limit' => '4',
        'layout' => 'row',
        'button_label' => 'Add QuickLink',
      ],
      [
        'key' => 'field_33aa44b56cb88',
        'label' => 'Values',
        'name' => 'values',
        'type' => 'repeater',
        'instructions' => 'Use this section to add Company values.',
        'required' => 1,
        'sub_fields' => [
          [
            'key' => 'field_33aa44b56cb89',
            'label' => 'Value Headline',
            'name' => 'value_headline',
            'type' => 'text',
            'instructions' => 'Add the value headline. Max characters = 20',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'Headline',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => 20,
          ],
          [
            'key' => 'field_33aa44b56cb90',
            'label' => 'Value Description',
            'name' => 'value_description',
            'type' => 'text',
            'instructions' => 'Add the value description. Max characters = 240',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'Description (max 240 characters)',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => 240,
          ],
        ],
        'row_min' => '3',
        'row_limit' => '6',
        'layout' => 'row',
        'button_label' => 'Add Value',
      ],
    ],
    'location' => [
      [
        [
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-company.php',
          'order_no' => 0,
          'group_no' => 0,
        ],
      ],
    ],
    'options' => [
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => [
      ],
    ],
    'menu_order' => 0,
  ]);
  register_field_group([
    'id' => 'acf_employee-fields',
    'title' => 'Employee Fields',
    'fields' => [
      [
        'key' => 'field_57fd750d49775',
        'label' => 'Employee Title',
        'name' => 'employee_title',
        'type' => 'text',
        'instructions' => 'Add the position/title of the employee.',
        'required' => 1,
        'default_value' => '',
        'placeholder' => 'Employee Title',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ],
    ],
    'location' => [
      [
        [
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'employee',
          'order_no' => 0,
          'group_no' => 0,
        ],
      ],
    ],
    'options' => [
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => [
      ],
    ],
    'menu_order' => 0,
  ]);
}

