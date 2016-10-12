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
        'layout' => 'table',
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
        'layout' => 'table',
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
  register_field_group([
    'id' => 'acf_modular',
    'title' => 'Modular',
    'fields' => [
      [
        'key' => 'field_57fe9186e9466',
        'label' => 'Flex Content',
        'name' => 'flex_content',
        'type' => 'flexible_content',
        'instructions' => 'Start building by using the modules',
        'layouts' => [
          [
            'label' => 'Slider',
            'name' => 'slider',
            'display' => 'row',
            'min' => '',
            'max' => '',
            'sub_fields' => [
              [
                'key' => 'field_57fe91cde9467',
                'label' => 'Slide',
                'name' => 'slide',
                'type' => 'repeater',
                'instructions' => 'Add a slide to the slider.',
                'required' => 1,
                'column_width' => '',
                'sub_fields' => [
                  [
                    'key' => 'field_57fe92e3e9468',
                    'label' => 'Slide Image',
                    'name' => 'slide_image',
                    'type' => 'image',
                    'instructions' => 'Add an image for this slide.',
                    'required' => 1,
                    'column_width' => '',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                  ],
                  [
                    'key' => 'field_57fe9323e9469',
                    'label' => 'Overlay',
                    'name' => 'overlay',
                    'type' => 'true_false',
                    'instructions' => 'Will this slide have an overlay?',
                    'column_width' => '',
                    'message' => '',
                    'default_value' => 0,
                  ],
                  [
                    'key' => 'field_57fe93a6e946a',
                    'label' => 'Overlay Image',
                    'name' => 'overlay_image',
                    'type' => 'image',
                    'instructions' => 'Add the image/icon for the overlay',
                    'required' => 1,
                    'conditional_logic' => [
                      'status' => 1,
                      'rules' => [
                        [
                          'field' => 'field_57fe9323e9469',
                          'operator' => '==',
                          'value' => '1',
                        ],
                      ],
                      'allorany' => 'all',
                    ],
                    'column_width' => '',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                  ],
                  [
                    'key' => 'field_57fe93c9e946b',
                    'label' => 'Overlay Heading',
                    'name' => 'overlay_heading',
                    'type' => 'text',
                    'instructions' => 'Add the heading to this slide\'s overlay',
                    'required' => 1,
                    'conditional_logic' => [
                      'status' => 1,
                      'rules' => [
                        [
                          'field' => 'field_57fe9323e9469',
                          'operator' => '==',
                          'value' => '1',
                        ],
                      ],
                      'allorany' => 'all',
                    ],
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => 'Overlay heading.',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                  ],
                  [
                    'key' => 'field_57fe93f0e946c',
                    'label' => 'Overlay Text',
                    'name' => 'overlay_text',
                    'type' => 'text',
                    'instructions' => 'Add the copy to the overlay',
                    'required' => 1,
                    'conditional_logic' => [
                      'status' => 1,
                      'rules' => [
                        [
                          'field' => 'field_57fe9323e9469',
                          'operator' => '==',
                          'value' => '1',
                        ],
                      ],
                      'allorany' => 'all',
                    ],
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => 'Overlay Copy',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                  ],
                  [
                    'key' => 'field_57fe9408e946d',
                    'label' => 'Overlay Link',
                    'name' => 'overlay_link',
                    'type' => 'page_link',
                    'instructions' => 'Add the ',
                    'required' => 1,
                    'conditional_logic' => [
                      'status' => 1,
                      'rules' => [
                        [
                          'field' => 'field_57fe9323e9469',
                          'operator' => '==',
                          'value' => '1',
                        ],
                      ],
                      'allorany' => 'all',
                    ],
                    'column_width' => '',
                    'post_type' => [
                      0 => 'all',
                    ],
                    'allow_null' => 0,
                    'multiple' => 0,
                  ],
                ],
                'row_min' => 1,
                'row_limit' => 5,
                'layout' => 'table',
                'button_label' => 'Add Slide',
              ],
            ],
          ],
          [
            'label' => 'Full Width Text',
            'name' => 'full_width_text',
            'display' => 'table',
            'min' => '',
            'max' => '',
            'sub_fields' => [
              [
                'key' => 'field_57fe9b3b7a7d2',
                'label' => 'Full Text Headline',
                'name' => 'full_text_headline',
                'type' => 'text',
                'instructions' => 'Add the headline for the module',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Headline',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
              ],
              [
                'key' => 'field_57fe9b5d7a7d3',
                'label' => 'Full Text Copy',
                'name' => 'full_text_copy',
                'type' => 'text',
                'instructions' => 'Add the copy to the module.',
                'required' => 1,
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => 'Add the copy.',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
              ],
            ],
          ],
          [
            'label' => 'Three Column Icon Grid',
            'name' => 'three_column_icon_grid',
            'display' => 'row',
            'min' => 0,
            'max' => 0,
            'sub_fields' => [
              [
                'key' => 'field_58fe9a4b7a2d3',
                'label' => 'Icon Grid Headline',
                'name' => 'icon_grid_headline',
                'type' => 'text',
                'instructions' => 'Add the headline for the grid.',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Headline',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
              ],
              [
                'key' => 'field_57fe9d36326ce',
                'label' => 'Column',
                'name' => 'column',
                'type' => 'repeater',
                'instructions' => 'Add a column to the Module',
                'required' => 1,
                'column_width' => '',
                'sub_fields' => [
                  [
                    'key' => 'field_57fe9d79326cf',
                    'label' => 'Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'instructions' => 'Add the icon and/or image to the column',
                    'required' => 1,
                    'column_width' => '',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                  ],
                  [
                    'key' => 'field_57fe9da7326d0',
                    'label' => 'Column Headline',
                    'name' => 'column_headline',
                    'type' => 'text',
                    'instructions' => 'Add the headline to the column. 48 max char.',
                    'required' => 1,
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => 'Headline',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => 48,
                  ],
                  [
                    'key' => 'field_57fe9dbc326d1',
                    'label' => 'Column Copy',
                    'name' => 'column_copy',
                    'type' => 'textarea',
                    'instructions' => 'Add the copy to the column. 185 max char',
                    'required' => 1,
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => 'Copy',
                    'maxlength' => 185,
                    'rows' => '',
                    'formatting' => 'br',
                  ],
                  [
                    'key' => 'field_57fe9e26326d2',
                    'label' => 'Link Text',
                    'name' => 'link_text',
                    'type' => 'text',
                    'instructions' => 'Add the text of the link',
                    'required' => 1,
                    'column_width' => '',
                    'default_value' => '',
                    'placeholder' => 'Link Text',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                  ],
                  [
                    'key' => 'field_57fe9e4f326d3',
                    'label' => 'Link URL',
                    'name' => 'link_url',
                    'type' => 'page_link',
                    'instructions' => 'Add the page to link to.',
                    'required' => 1,
                    'column_width' => '',
                    'post_type' => [
                      0 => 'all',
                    ],
                    'allow_null' => 0,
                    'multiple' => 0,
                  ],
                ],
                'row_min' => 3,
                'row_limit' => 3,
                'layout' => 'table',
                'button_label' => 'Add Column',
              ],
            ],
          ],
          [
            'label' => 'Video or Image with Info',
            'name' => 'video_or_image_with_info',
            'display' => 'table',
            'min' => '',
            'max' => '',
            'sub_fields' => [
              [
                'key' => 'field_57fea14231e99',
                'label' => 'Section Headline',
                'name' => 'section_headline',
                'type' => 'text',
                'instructions' => 'Add the headline to the Module. 40 chars max',
                'required' => 1,
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Headline',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 40,
              ],
              [
                'key' => 'field_57fea16d31e9a',
                'label' => 'Section Subheadline',
                'name' => 'section_subheadline',
                'type' => 'text',
                'instructions' => 'Add the subheading to the section. 40 chars max.',
                'required' => 1,
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Subheading',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 40,
              ],
              [
                'key' => 'field_57fea1b931e9b',
                'label' => 'Section Copy',
                'name' => 'section_copy',
                'type' => 'textarea',
                'instructions' => 'Add the copy to the section. 500 chars. max.',
                'required' => 1,
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Copy/Text',
                'maxlength' => 500,
                'rows' => '',
                'formatting' => 'br',
              ],
              [
                'key' => 'field_57fea1e931e9c',
                'label' => 'Section Link Text',
                'name' => 'section_link_text',
                'type' => 'text',
                'instructions' => 'Add the text of the link.  Link is not required in this section',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Link text',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 40,
              ],
              [
                'key' => 'field_57fea26531e9d',
                'label' => 'Link Page',
                'name' => 'link_page',
                'type' => 'page_link',
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'null',
                      'operator' => '==',
                      'value' => '',
                    ],
                  ],
                  'allorany' => 'any',
                ],
                'column_width' => '',
                'post_type' => [
                  0 => 'all',
                ],
                'allow_null' => 0,
                'multiple' => 0,
              ],
              [
                'key' => 'field_57fea73aa090a',
                'label' => 'Video or Image',
                'name' => 'video_or_image',
                'type' => 'select',
                'instructions' => 'Select whether you will add an image or video to this module. Recommended image size is 560 x 315',
                'required' => 1,
                'column_width' => '',
                'choices' => [
                  'video' => 'Video',
                  'image' => 'Image',
                ],
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
              ],
              [
                'key' => 'field_57fea6f4a0909',
                'label' => 'Video Link',
                'name' => 'video_link',
                'type' => 'text',
                'instructions' => 'Drop in the vimeo/youtube embed code.',
                'required' => 1,
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'field_57fea73aa090a',
                      'operator' => '==',
                      'value' => 'video',
                    ],
                  ],
                  'allorany' => 'all',
                ],
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Youtube/Vimeo embed code',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
              ],
              [
                'key' => 'field_57fea7c6a090b',
                'label' => 'Section Image',
                'name' => 'section_image',
                'type' => 'image',
                'instructions' => 'Add the image to this module. Recommended size is 560 x 315',
                'required' => 1,
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'field_57fea73aa090a',
                      'operator' => '==',
                      'value' => 'image',
                    ],
                  ],
                  'allorany' => 'all',
                ],
                'column_width' => '',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
              ],
            ],
          ],
          [
            'label' => 'Background Image with Text',
            'name' => 'background_image_with_text',
            'display' => 'table',
            'min' => '',
            'max' => '',
            'sub_fields' => [
              [
                'key' => 'field_57fea2ecb4a20',
                'label' => 'Background Image',
                'name' => 'background_image',
                'type' => 'image',
                'instructions' => 'Add the background image to the module.  Recommended image size is 1440 x 395  ',
                'required' => 1,
                'column_width' => '',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
              ],
              [
                'key' => 'field_57fea451b4a21',
                'label' => 'Background Image Headline',
                'name' => 'background_image_headline',
                'type' => 'text',
                'instructions' => 'Add the Headline to the module. Max chars is 40',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Headline',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 40,
              ],
              [
                'key' => 'field_57fea48eb4a22',
                'label' => 'Background Image Copy',
                'name' => 'background_image_copy',
                'type' => 'wysiwyg',
                'instructions' => 'Add the copy to the module',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
              ],
              [
                'key' => 'field_57fea4adb4a23',
                'label' => 'Background Module Link Text',
                'name' => 'background_module_link_text',
                'type' => 'text',
                'instructions' => 'Add the text of the link.  Max chars 50.',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => 'Link Text',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 50,
              ],
              [
                'key' => 'field_57fea4d7b4a24',
                'label' => 'Link URL',
                'name' => 'link_url',
                'type' => 'page_link',
                'instructions' => 'Add the destination of the link',
                'column_width' => '',
                'post_type' => [
                  0 => 'all',
                ],
                'allow_null' => 0,
                'multiple' => 0,
              ],
            ],
          ],
        ],
        'button_label' => 'Add Module',
        'min' => '',
        'max' => '',
      ],
      [
        'key' => 'field_57feab9933352',
        'label' => 'Twitter Feed',
        'name' => 'twitter_feed',
        'type' => 'true_false',
        'instructions' => 'Check this box if you would like to show the twitter feed slider before the footer.',
        'required' => 0,
        'message' => '',
        'default_value' => 0,
      ],
    ],
    'location' => [
      [
        [
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-modular.php',
          'order_no' => 0,
          'group_no' => 0,
        ],
      ],
    ],
    'options' => [
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => [
        0 => 'the_content',
        1 => 'excerpt',
        2 => 'discussion',
        3 => 'slug',
        4 => 'format',
        5 => 'featured_image',
      ],
    ],
    'menu_order' => 0,
  ]);
}

