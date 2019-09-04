<?php if ( ! defined( 'ABSPATH' )  ) { die; }

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'stock_framework';
 
	//
	// Create options
	CSF::createOptions( $prefix, array(
	  'menu_title' => 'Stock Theme',
	  'menu_slug'  => 'stock-framework',
	) );
 
	//
	// Header section
	CSF::createSection( $prefix, array(
	  'name'  => 'stock_header_settings',
	  'title'  => 'Header',
	  'fields' => array(
 
		 //
		 array(
			'id'        		=> 'header_iconic_boxes',
			'type'      		=> 'group',
			'title'     		=> 'Iconic boxes',
			'button_title'    => 'Add New',
			'accordion_title' => 'Add New box',
			'fields'    => array(
				array(
					'id'    => 'title',
					'type'  => 'text',
					'title' => 'Title'
				),
				array(
					'id'    => 'icon',
					'type'  => 'icon',
					'title' => 'Box icon',
				),
				array(
					'id'    => 'big_title',
					'type'  => 'text',
					'title' => 'Big title',
				),
			),
		 ),
		),
		
	) );

	// Social Link
	CSF::createSection( $prefix, array(
	  'name'  => 'stock_social_Link',
	  'title'  => 'Social Link',
	  'fields' => array(
		 //
		 array(
			'id'        					=> 'social_link',
			'type'      					=> 'group',
			'title'     					=> 'Social Link',
			'button_title'    			=> 'Add New',
			'accordion_title_prefix' 	=> 'Add New link',
			'fields'    => array(
				array(
					'id'    => 'icon',
					'type'  => 'icon',
					'title' => 'Icon'
				),
				array(
					'id'    => 'link',
					'type'  => 'text',
					'title' => 'Link'
				),
			),
		 ),
		),
		
	) );
 
	//
	// Logo section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_logo_settings',
		'title'  => 'Logo Settings',
		'fields' => array(
			// A textarea field
			array(
			'id'    		=> 'enable_image_logo',
			'type'  		=> 'switcher',
			'title' 		=> 'Enable image logo',
			'default' 	=> true
			),
			array(
			'id'    			=> 'image_logo',
			'type'  			=> 'media',
			'title' 			=> 'Upload site logo',
			'default' 		=> false,
			'dependency' 	=> array('enable_image_logo','==','true')
			),
			array(
			'id'    		=> 'text_logo',
			'type'  		=> 'text',
			'title' 		=> 'Logo text',
			'default' 	=> 'Stock',
			'dependency' 	=> array('enable_image_logo','==','false')
			),

		)

	) );

	// Typography section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_typography_settings',
		'title'  => 'Typography Settings',
		'fields' => array(
			// A textarea field
			array(
				'id'      => 'body_font',
				'type'    => 'typography',
				'title'   => 'Body Font',
				'default' => array(
					'color'          => '#333333',
					'font-family'    => 'Roboto',
					'font-weight'    => '400',
					'font-size'      => '16',
					'line-height'    => '20',
					'letter-spacing' => '1',
					'text-align'     => 'center',
					'text-transform' => 'uppercase',
					'subset'         => 'latin-ext',
					'type'           => 'google',
					'unit'           => 'px',
				),
			),
			array(
				'id'      => 'heading_font',
				'type'    => 'typography',
				'title'   => 'Heading Font',
				'default' => array(
					'color'          => '#333333',
					'font-family'    => 'Noto Serif',
					'font-weight'    => '700',
					'font-size'      => '20',
					'line-height'    => '30',
					'letter-spacing' => '1',
					'text-align'     => 'center',
					'text-transform' => 'uppercase',
					'subset'         => 'latin-ext',
					'type'           => 'google',
					'unit'           => 'px',
				),
			),
		)

	) );

	// Styling section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_styling_settings',
		'title'  => 'Styling Settings',
		'fields' => array(
			// A textarea field
			array(
				'id'      => 'enable_preloader',
				'type'    => 'switcher',
				'title'   => 'Enable Preloader',
				'default' => true,
			),
			array(
				'id'      => 'enable_box_layout',
				'type'    => 'switcher',
				'title'   => 'Enable Box layout',
				'default' => false,
			),
			array(
				'id'           => 'body_bg',
				'type'         => 'upload',
				'title'        => 'Body background image',
				'library'      => 'image',
				'placeholder'  => 'http://',
				'button_title' => 'Add Image',
				'remove_title' => 'Remove Image',
				'dependency' 	=> array('enable_box_layout','==','true'),
			),
			array(
				'id'          => 'body_bg_repeat',
				'type'        => 'select',
				'title'       => 'Body Background Repeat',
				'placeholder' => 'Select an option',
				'default'     => 'repeat',
				'options'     => array(
					'repeat'  	=> 'Repeat',
					'no-repeat' => 'No Repeat',
					'cover'  	=> 'Cover',
				),
				'dependency' 	=> array('enable_box_layout','==','true'),
			),
			array(
				'id'          => 'body_bg_attachment',
				'type'        => 'select',
				'title'       => 'Body Background attachment',
				'placeholder' => 'Select an option',
				'default'     => 'scroll',
				'options'     => array(
					'scroll'  	=> 'Scroll',
					'fixed'  	=> 'Fixed',
				),
				'dependency' 	=> array('enable_box_layout','==','true'),
			),
		)

	) );

	//Blog Section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_blog_settings',
		'title'  => 'Blog Settings',
		'fields' => array(
			// A textarea field
			array(
				'id'      => 'display_post_by',
				'type'    => 'switcher',
				'title'   => 'Display post By?',
				'default' => true,
			),
			array(
				'id'      => 'display_post_date',
				'type'    => 'switcher',
				'title'   => 'Display post date?',
				'default' => true,
			),
			array(
				'id'      => 'display_comment_count',
				'type'    => 'switcher',
				'title'   => 'Display comment count?',
				'default' => true,
			),
			array(
				'id'      => 'display_post_category',
				'type'    => 'switcher',
				'title'   => 'Display post in categories?',
				'default' => true,
			),
			array(
				'id'      => 'display_post_tag',
				'type'    => 'switcher',
				'title'   => 'Display post in tag?',
				'default' => true,
			),
		)

	) );

	//Footer Section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_footer_settings',
		'title'  => 'Footer Settings',
		'fields' => array(
			// A textarea field
			array(
				'id'      => 'footer_bg',
				'type'    => 'color',
				'title'   => 'Footer background color',
				'default' => '#2a2d2f',
			),
			array(
				'id'      => 'footer_text_color',
				'type'    => 'color',
				'title'   => 'Footer Text color',
				'default' => '#afb9c0',
			),
			array(
				'id'      => 'footer_heading_color',
				'type'    => 'color',
				'title'   => 'Footer Heading color',
				'default' => '#fff',
			),
			array(
				'id'      => 'footer_copyright_text',
				'type'    => 'text',
				'title'   => 'Footer Copyright Text',
				'default' => 'Copyright © 2017 FairDealLab - All Rights Reserved',
			),
		)

	) );

	//Script Section
	CSF::createSection( $prefix, array(
		'name'  => 'stock_scripts_settings',
		'title'  => 'Script Settings',
		'fields' => array(
			// A textarea field
			array(
				'id'      	=> 'head_scripts',
				'type'    	=> 'textarea',
				'title'   	=> 'Head Scripts',
				'sanitize' 	=> false,
				'desc' 		=> 'Scripts gose before closing < / head >',
			),
			array(
				'id'      	=> 'body_start_scripts',
				'type'    	=> 'textarea',
				'title'   	=> 'Body Start Scripts',
				'sanitize' 	=> false,
				'desc' 		=> 'Scripts gose before closing < body >',
			),
			array(
				'id'      	=> 'body_end_scripts',
				'type'    	=> 'textarea',
				'title'   	=> 'Body End Scripts',
				'sanitize' 	=> false,
				'desc' 		=> 'Scripts gose just before < / body >',
			),
		)

	) );
 
 }

 // A Custom function for get an option
if ( ! function_exists( 'prefix_get_option' ) ) {
   function prefix_get_option( $option = '', $default = null ) {
     $options = get_option( 'stock_framework' ); // Attention: Set your unique id of the framework
     return ( isset( $options[$option] ) ) ? $options[$option] : $default;
   }
 }
 
 echo prefix_get_option( 'opt-text' );