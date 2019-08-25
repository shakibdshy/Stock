<?php if ( ! defined( 'ABSPATH' )  ) { die; }
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

   //
   // Set a unique slug-like ID
   $prefix = 'my_post_options';
 
   //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
      'title'        => esc_html__('Stock Page Options', 'stock'),
      'post_type' => 'page',
      'show_restore' => true,
  ) );
 
   //
   // Create a section
  CSF::createSection( $prefix, array(
    'title'  => esc_html__('Header','stock'),
    'fields' => array(
      
      // A text field
      array(
        'id'        => 'enable_title',
        'type'      => 'switcher',
        'title'     => esc_html__('Enable Title', 'stock'),
        'default'   => true,
        'desc'      => esc_html__('If you enable title ? Select Yes......', 'stock'),
      ),
      array(
        'id'        => 'custom_title',
        'type'      => 'text',
        'title'     => esc_html__('Custom Title', 'stock'),
        'default'   => true,
        'desc'      => esc_html__('If you want to custom title ?', 'stock'),
          'dependency'  => array('enable_title','==','true'),
      ),

    )
   ));
 


   //
   // Create a section
   CSF::createSection( $prefix, array(
     'title'  => 'Tab Title 2',
     'fields' => array(
 
       // A textarea field
       array(
         'id'       => 'enable_title',
         'type'     => 'switcher',
         'title'    => esc_html__('Enable title', 'stock'),
         'default'  => true,
         'desc'     => esc_html__('If you want to enable title, select yes.', 'stock'),
       ),
 
     )
   ) );
 
 }
