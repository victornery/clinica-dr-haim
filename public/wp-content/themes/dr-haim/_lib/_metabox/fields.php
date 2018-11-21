<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes' );
function wpcf_meta_boxes($meta_boxes) {

	$meta_boxes[] = array(
		'id' => 'video-box',
		'title' => 'Video',
		'pages' => array('procedimentos', 'cirurgias'),
		'context' => 'normal',
		'priority' => 'high',
		
		'clone'      => true,
	  
		'fields' => array(
			array(
			  'name' => 'ID do Video',
			  'id'   => 'video-about',
			  'type' => 'text'
			),
		),
	  );
	

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
	return $meta_boxes;
}

