<?php
/**
 * Registering meta boxes
 *
 *	
 * MAD PROPS:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'STORY_';

global $meta_boxes;

$meta_boxes = array();


// STORYTELLER INFO meta box
$meta_boxes[] = array(
	'title' => 'About The Contributor(s)',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'story' ),
	
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(
		// CONTRIBUTOR
		array(
			// Field name - Will be used as label
			'name'  => 'Contributor',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}contributor",
			// Field description (optional)
			'desc'  => 'Your name',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '',
			// CLONES: make the field cloneable (i.e., can have multiple values)
			'clone' => true
		),
		// STORYTELLER
		array(
			// Field name - Will be used as label
			'name'  => 'Storyteller',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}storyteller",
			// Field description (optional)
			'desc'  => 'The author of this story (if this is not you)',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '',
			// CLONES: make the field cloneable (i.e. can have multiple values)
			'clone' => true
		),
		// DISPLAY STORYTELLER NAME(S)
		array(
			'name' => 'Anonymous',
			'id'   => "{$prefix}isAnonymous",
			// Field description (optional)
			'desc'  => 'Please check if you wish to remain anonymous',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		)
	)
);


// STORY INFO meta box
$meta_boxes[] = array(
	'title' => 'About This Story',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'story' ),
	
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(
	
		// STORY DATE
		array(
			'name' => 'Date of Story',
			'id'   => "{$prefix}date",
			'desc'  => 'Please indicate the date (as close as possible) on which this story took place',
			'type' => 'date',

			// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
			'js_options' => array(
				'appendText'      => '(yyyy-mm-dd)',
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true
			),
		),
		// LOCATION - SPECIFIC
		array(
			'name'    => 'Specific Location',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}location_specific",
			// Field description (optional)
			'desc'  => 'The specific location of the story, if applicable (in addition to borough and neighborhood)',
			'type'  => 'text',
			// Default value (optional)
			'std'   => ''
		)
	)
);


// STORY CONTENT meta box
$meta_boxes[] = array(
	'title' => 'Story Content',
	
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'story' ),
	
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	'fields' => array(
	
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => 'Upload Images',
			'id'               => "{$prefix}images",
			// Field description (optional)
			'desc'  => 'If this story includes additional images, please upload the files (up to 5) here.  Acceptable formats include : PNG, GIF, JPG.  Bigger and better quality is best.',
			'type'             => 'plupload_image',
			'max_file_uploads' => 5
		),
		// AUDIO UPLOAD
		array(
			'name' => 'Upload Audio File',
			'id'   => "{$prefix}audio",
			// Field description (optional)
			'desc'  => 'If this story has audio, please upload the audio file here.  Bigger and better quality is best.  Acceptable formats include : MP3, WAV',
			'type' => 'file'
		),
		// VIDEO LINK
		array(
			// Field name - Will be used as label
			'name'  => 'Add Video Link',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}video_link",
			// Field description (optional)
			'desc'  => 'If this story includes video, please add the video URL here.  Bigger and better quality is best.  Please include a Vimeo or YouTube URL.',
			'type'  => 'text',
			// Default value (optional)
			'std'   => ''
		)
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function STORY_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'STORY_register_meta_boxes' );