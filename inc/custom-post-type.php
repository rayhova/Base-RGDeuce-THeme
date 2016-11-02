<?php /*
* Custom Post Types
*/
function news_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'News', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'News', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'News', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent News', 'rgdeuce' ),
		'all_items'           => __( 'All News', 'rgdeuce' ),
		'view_item'           => __( 'View News', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New News', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit News', 'rgdeuce' ),
		'update_item'         => __( 'Update News', 'rgdeuce' ),
		'search_items'        => __( 'Search News', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'news', 'rgdeuce' ),
		'description'         => __( 'News', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'newscat','newstag', ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/news.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'news', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'news_post_type', 0 );


// register two taxonomies to go with the post type
function news_cat_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'News Categories',
		'singular_name'     => 'News Category',
		'search_items'      => 'Search News Categories',
		'all_items'         => 'All News Categories',
		'edit_item'         => 'Edit News Category',
		'update_item'       => 'Update News Categories',
		'add_new_item'      => 'Add New News Category',
		'new_item_name'     => 'New News Category',
		'menu_name'         => 'News Categories'
	);
	// register taxonomy
	register_taxonomy( 'newscat', 'news', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'news_cat_register_taxonomy' );

// register two taxonomies to go with the post type
function news_tag_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Tags',
		'singular_name'     => ' Tag',
		'search_items'      => 'Search Tags',
		'all_items'         => 'All Tags',
		'edit_item'         => 'Edit Tag',
		'update_item'       => 'Update Tags',
		'add_new_item'      => 'Add New Tag',
		'new_item_name'     => 'New Tag',
		'menu_name'         => 'Tags'
	);
	// register taxonomy
	register_taxonomy( 'newstag', 'news', array(
		'hierarchical' => false,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'news_tag_register_taxonomy' );


function team_members_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'Team Members', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent Team Member', 'rgdeuce' ),
		'all_items'           => __( 'All Team Members', 'rgdeuce' ),
		'view_item'           => __( 'View Team Members', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New Team Members', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit Team Member', 'rgdeuce' ),
		'update_item'         => __( 'Update Team Member', 'rgdeuce' ),
		'search_items'        => __( 'Search Team Members', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'team-members	', 'rgdeuce' ),
		'description'         => __( 'Team Members', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'departments' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/team.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'team-members', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'team_members_post_type', 0 );



// register two taxonomies to go with the post type
function team_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Team Departments',
		'singular_name'     => 'Team Department',
		'search_items'      => 'Search Team Departments',
		'all_items'         => 'All Team Departments',
		'edit_item'         => 'Edit Team Department',
		'update_item'       => 'Update Team Departments',
		'add_new_item'      => 'Add New Team Department',
		'new_item_name'     => 'New Team Department',
		'menu_name'         => 'Team Departments'
	);
	// register taxonomy
	register_taxonomy( 'teamcat', 'team-members', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'team_register_taxonomy' );

function portfolio_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Portfolio', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'Portfolio', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent Portfolio', 'rgdeuce' ),
		'all_items'           => __( 'All Portfolio', 'rgdeuce' ),
		'view_item'           => __( 'View Portfolio', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New Portfolio', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit Portfolio', 'rgdeuce' ),
		'update_item'         => __( 'Update Portfolio', 'rgdeuce' ),
		'search_items'        => __( 'Search Portfolio', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'portfolio', 'rgdeuce' ),
		'description'         => __( 'Portfolio', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'portfoliocat','portfolioskills', ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/portfolio.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'portfolio', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'portfolio_post_type', 0 );


// register two taxonomies to go with the post type
function portfolio_cat_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Portfolio Categories',
		'singular_name'     => 'Portfolio Category',
		'search_items'      => 'Search Portfolio Categories',
		'all_items'         => 'All Portfolio Categories',
		'edit_item'         => 'Edit Portfolio Category',
		'update_item'       => 'Update Portfolio Categories',
		'add_new_item'      => 'Add New Portfolio Category',
		'new_item_name'     => 'New Portfolio Category',
		'menu_name'         => 'Portfolio Categories'
	);
	// register taxonomy
	register_taxonomy( 'portfoliocat', 'portfolio', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'portfolio_cat_register_taxonomy' );

// register two taxonomies to go with the post type
function portfolio_skills_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Skills',
		'singular_name'     => ' Skill',
		'search_items'      => 'Search Skills',
		'all_items'         => 'All Skills',
		'edit_item'         => 'Edit Skill',
		'update_item'       => 'Update Skills',
		'add_new_item'      => 'Add New Skill',
		'new_item_name'     => 'New Skill',
		'menu_name'         => 'Skills'
	);
	// register taxonomy
	register_taxonomy( 'portfolioskills', 'portfolio', array(
		'hierarchical' => false,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'portfolio_skills_register_taxonomy' );

function services_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'Services', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent Service', 'rgdeuce' ),
		'all_items'           => __( 'All Services', 'rgdeuce' ),
		'view_item'           => __( 'View Services', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New Services', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit Service', 'rgdeuce' ),
		'update_item'         => __( 'Update Service', 'rgdeuce' ),
		'search_items'        => __( 'Search Services', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'services', 'rgdeuce' ),
		'description'         => __( 'Services', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'departments' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/services.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'services', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'services_post_type', 0 );

function testimonials_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'rgdeuce' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'rgdeuce' ),
		'menu_name'           => __( 'Testimonials', 'rgdeuce' ),
		'parent_item_colon'   => __( 'Parent Testimonial', 'rgdeuce' ),
		'all_items'           => __( 'All Testimonials', 'rgdeuce' ),
		'view_item'           => __( 'View Testimonials', 'rgdeuce' ),
		'add_new_item'        => __( 'Add New Testimonials', 'rgdeuce' ),
		'add_new'             => __( 'Add New', 'rgdeuce' ),
		'edit_item'           => __( 'Edit Testimonial', 'rgdeuce' ),
		'update_item'         => __( 'Update Testimonial', 'rgdeuce' ),
		'search_items'        => __( 'Search Testimonials', 'rgdeuce' ),
		'not_found'           => __( 'Not Found', 'rgdeuce' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rgdeuce' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'testimonials', 'rgdeuce' ),
		'description'         => __( 'Testimonials', 'rgdeuce' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'departments' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/testimonials.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'testimonials', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'testimonials_post_type', 0 );
