<?php
/**
* Registering meta sections for taxonomies
* All the definitions of meta sections are listed below with comments, please read them carefully.
* Note that each validation method of the Validation Class MUST return value.
* You also should read the changelog to know what has been changed
*/

// Hook to 'admin_init' to make sure the class is loaded before
// (in case using the class in another plugin)

add_action( 'rwmb_meta_boxes', 'wpcf_register_taxonomy_meta_boxes' );
function wpcf_register_taxonomy_meta_boxes( $meta_boxes ) {

  // $meta_boxes[] = array(
  //       'title'      => '',
  //       'taxonomies' => 'categorias', // List of taxonomies. Array or string
  //       'fields' => array(
  //           array(
  //               'name'             => 'Posição',
  //               'id'               => 'posicao',
  //               'type'             => 'text',
  //           ),
  //          array(
  //               'name'             => 'Produto de Capa',
  //               'id'               => 'imgadv',
  //               'type'             => 'image_advanced',
  //               'force_delete'     => false,
  //               'max_file_uploads' => 1,
  //               'max_status'       => true,
  //           ),
  //          array(
  //               'name'             => 'Header',
  //               'id'               => 'imgadv_topo',
  //               'type'             => 'image_advanced',
  //               'force_delete'     => false,
  //               'max_file_uploads' => 1,
  //               'max_status'       => true,
  //           ),
  //       ),
  //   );
  return $meta_boxes;
}