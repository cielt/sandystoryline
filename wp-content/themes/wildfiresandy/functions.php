<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */

// STORY post type metaboxes
//include('story-metaboxes.php');




/* STORY custom post type */
add_action('init', 'register_story', 1); // Set priority to avoid plugin conflicts
function register_story() { // A unique name for our function
 	$labels = array( // Used in the WordPress admin
		'name' => _x('Stories', 'post type general name'),
		'singular_name' => _x('Story', 'post type singular name'),
		'add_new' => _x('Add New', 'Story'),
		'add_new_item' => __('Add New Story'),
		'edit_item' => __('Edit Story'),
		'new_item' => __('New Story'),
		'view_item' => __('View Story'),
		'search_items' => __('Search Stories'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	$args = array(
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 5, // Appear right below "Posts"
		'has_archive' => true, // Activate the archive
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'story', $args ); // Create the post type, use options above
	
	register_taxonomy_for_object_type('category', 'story');
	register_taxonomy_for_object_type('post_tag', 'story');
	
	flush_rewrite_rules();
}


/* STORY custom taxonomy : location [neighborhood - borough (state)] */
$labels_location = array(
	'name' => _x( 'Locations', 'taxonomy general name' ),
	'singular_name' => _x( 'Location', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Locations' ),
	'popular_items' => __( 'Popular Locations' ),
	'all_items' => __( 'All Locations' ),
	'edit_item' => __( 'Edit Location' ),
	'update_item' => __( 'Update Location' ),
	'add_new_item' => __( 'Add New Location' ),
	'new_item_name' => __( 'New Location Name' ),
	'separate_items_with_commas' => __( 'Separate locations with commas' ),
	'add_or_remove_items' => __( 'Add or remove locations' ),
	'choose_from_most_used' => __( 'Choose from the most used locations' )
);

register_taxonomy(
	'locations', // name of custom taxonomy
	array( 'story' ), // associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array( // Use "location" instead of "locations" in the permalink
			'slug' => 'location'
			),
		'labels' => $labels_location
		)
	);


/* STORY custom taxonomy : theme [as in topic] */
$labels_themes = array(
	'name' => _x( 'Themes', 'taxonomy general name' ),
	'singular_name' => _x( 'Theme', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Themes' ),
	'all_items' => __( 'All Themes' ),
	'parent_item' => __( 'Parent Theme' ),
	'parent_item_colon' => __( 'Parent Theme:' ),
	'edit_item' => __( 'Edit Theme' ),
	'update_item' => __( 'Update Theme' ),
	'add_new_item' => __( 'Add New Theme' ),
	'new_item_name' => __( 'New Theme Name' ),
);

register_taxonomy(
	'themes', // The name of the custom taxonomy
	array( 'story' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'theme', // Use "topic" instead of "topics" in permalinks
			'hierarchical' => true // Allows sub-topics to appear in permalinks
			),
		'labels' => $labels_themes
		)
	);

/* STORY custom taxonomy : media-types */
$labels_media_types = array(
	'name' => _x( 'Media Types', 'taxonomy general name' ),
	'singular_name' => _x( 'Media Type', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Media Types' ),
	'popular_items' => __( 'Popular Media Types' ),
	'all_items' => __( 'All Media Types' ),
	'edit_item' => __( 'Edit Media Type' ),
	'update_item' => __( 'Update Media Type' ),
	'add_new_item' => __( 'Add New Media Type' ),
	'new_item_name' => __( 'New Media Type Name' ),
	'separate_items_with_commas' => __( 'Separate media types with commas' ),
	'add_or_remove_items' => __( 'Add or remove media types' ),
	'choose_from_most_used' => __( 'Choose from the most used media types' )
);

register_taxonomy(
	'media_types', // name of custom taxonomy
	array( 'story' ), // associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array( // Use "location" instead of "locations" in the permalink
			'slug' => 'media-type'
			),
		'labels' => $labels_media_types
		)
	);

/* STORY : metaboxes 
   Add the Story Meta Boxes via story-metaboxes.php */ 




/**
 * Enqueue scripts and styles
 */
function sandy_scripts() {

	wp_enqueue_style( 'sandyfonts-opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700', array( 'style' ) );
	wp_enqueue_style( 'sandyfonts-leaguegothic', get_stylesheet_directory_uri() . '/css/league-gothic.css', array( 'style' ) );
	wp_enqueue_style( 'sandystyles', get_stylesheet_directory_uri() . '/css/sandy.css', array( 'style' ) );
	
	//cowbird collection embed script 
	if ( is_page_template('page-cowbird.php')  ) {
	
		wp_enqueue_script( 'cowbird-embed', 'http://cdn1.cowbird.com/assets/js/embed/cb-embedded.js', array( 'jquery' ), '20120206', false );
	 	wp_enqueue_style( 'cowbird-css', 'http://cdn1.cowbird.com/assets/css/embed/cb-embedded.css', array( 'style' ) );
		wp_enqueue_script( 'cowbird-sandy', get_stylesheet_directory_uri() . '/js/cowbird-galleries.js', array( 'jquery' ), '20120402', false );
	 }
	
	//story audio 
	if ( is_singular( 'story' ) ) {
	 	wp_enqueue_script( 'story-audio', get_stylesheet_directory_uri() . '/js/story-audio.js', array( 'jquery' ), '20120313', false );
	 }
	
	//stories page 
	if ( is_page_template('page-stories.php')  ) {
	 	wp_enqueue_script( 'colorbox', get_stylesheet_directory_uri() . '/js/libs/jquery.colorbox-min.js', array( 'jquery' ), '20120320', false );
		wp_enqueue_script( 'storyline', get_stylesheet_directory_uri() . '/js/storyline.js', array( 'jquery' ), '20120320', false );
	 	wp_enqueue_style( 'colorbox-css', get_stylesheet_directory_uri() . '/css/colorbox-sandy.css', array( 'style' ) );
	 }
	
	
}
add_action( 'wp_enqueue_scripts', 'sandy_scripts' );
?>