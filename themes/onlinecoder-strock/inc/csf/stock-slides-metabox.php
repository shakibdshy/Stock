<?php if ( ! defined( 'ABSPATH' )  ) { die; }
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

   //
   // Set a unique slug-like ID
   $prefix = 'stock_slides_options';
 
   //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
      'title'        => esc_html__('Stock Slides Options', 'stock'),
      'post_type' => 'slides',
      'show_restore' => true,
  ) );
 
   //
   // Create a section
   CSF::createSection( $prefix, array(
      'title'  => esc_html__('Slider Button', 'stock'),
      'fields' => array(
         // A text field
         array(
            'id'                 => 'button',
            'type'               => 'group',
            'accourdion_title'   => esc_html__('Add New Button', 'stock'),
            'fields'    => array(
               array(
                  'id'        => 'text',
                  'type'      => 'text',
                  'title'     => esc_html__('Button Text', 'stock'),
                  'desc'      => esc_html__('Type Yout Button Text Here', 'stock'),
                  'default'   => esc_html__('Get Free Consaltetion', 'stock'),
               ),
               array(
                  'id'       => 'type',
                  'type'     => 'select',
                  'title'    => esc_html__('Button Type', 'stock'),
                  'desc'     => 'Select Your Button Type',
                  'options'  => array(
                     'bordered' => 'Bordered Button',
                     'filled'   => 'Filled Button',
                  ),
               ),
               array(
                  'id'       => 'link_type',
                  'type'     => 'select',
                  'title'    => esc_html__('Link Type', 'stock'),
                  'options'  => array(
                     '1'  => 'Wordpress Page',
                     '2'  => 'External Link',
                  ),
               ),
               array(
                  'id'           => 'link_to_page',
                  'type'         => 'select',
                  'title'        => esc_html__('Select Page', 'stock'),
                  'options'      => 'page',
                  'dependency'   => array( 'link_type', '==', '1' ),
               ),
               array(
                  'id'           => 'link_to_external',
                  'type'         => 'text',
                  'title'        => esc_html__('Type Url', 'stock'),
                  'dependency'   => array( 'link_type', '==', '2' ),
               ),
            ),
         ),
         
      ),//End Field 
   ));

   // Create a section
   CSF::createSection( $prefix, array(
      'title'  => esc_html__('Overlay', 'stock'),
      'fields' => array(
  
         array(
            'id'        => 'enable_overlay',
            'type'      => 'switcher',
            'default'   => true,
            'title'     => esc_html__('Enable Overlay', 'stock'),
         ),
         array(
            'id'        => 'overlay_percentage',
            'type'      => 'text',
            'default'   => '70',
            'title'     => esc_html__('Overlay Percentage', 'stock'),
            'desc'      => esc_html__('Type Overlay Percentage in Number', 'stock'),
            'dependency'   => array( 'enable_overlay', '==', true ),
         ),
         array(
            'id'      => 'overlay_color',
            'type'    => 'color',
            'title'   => esc_html__('Overlay Color', 'stock'),
            'default' => '#181a1f',
            'dependency'   => array( 'enable_overlay', '==', true ),
         ),
  
      )
   ) );

}
