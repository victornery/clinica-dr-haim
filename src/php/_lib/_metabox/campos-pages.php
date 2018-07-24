<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes_pages' );
function wpcf_meta_boxes_pages($meta_boxes) {

//=========================================================================================
// PAGES: CONTATO
//=========================================================================================

// $meta_boxes[] = array(
//     'id' => 'local-sobre',
//     'title' => 'Local',
//     'pages' => array( 'page' ),
//     'context' => 'normal',
//     'priority' => 'high',
//     'include' => array(
//         'relation'  => 'OR',
//         'template'  => array('page-institucional.php','page-institucional-en.php'),
//     ),
//     'fields' => array(
//         array(
//             'name'          => '',
//             'id'            => 'local_tit',
//             'desc'          => 'Subtitulo',
//             'type'          => 'textarea',
//         ),
//         array(
//             'name'          => '',
//             'id'            => 'local',
//             'desc'          => 'Texto',
//             'type'          => 'wysiwyg',
//             'options'   => array(
//                 'textarea_rows' => 7,
//                 'teeny'         => true,
//                 'media_buttons' => false,
//             ),
//         ),
//     )
// );

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
    return $meta_boxes;
}