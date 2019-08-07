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
	// Create a section
	CSF::createSection( $prefix, array(
	  'title'  => 'Tab Title 1',
	  'fields' => array(
 
		 //
		 // A text field
		 array(
			'id'    => 'opt-text',
			'type'  => 'text',
			'title' => 'Simple Text',
		 ),
 
	  )
	) );
 
	//
	// Create a section
	CSF::createSection( $prefix, array(
	  'title'  => 'Tab Title 2',
	  'fields' => array(
 
		 // A textarea field
		 array(
			'id'    => 'opt-textarea',
			'type'  => 'textarea',
			'title' => 'Simple Textarea',
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
 echo prefix_get_option( 'opt-text', 'default value' );