<?php
/* Job Post Type */


// let's create the function for the Job Post Type
function job_post_type() { 
	// creating (registering) the Job Post Type
	register_post_type( 'jobs', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Jobs', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Job', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Jobs', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Job', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Jobs', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Job', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Job', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Jobs', 'bonestheme'), /* Search Position Title Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Add job positions that are open from employment', 'bonestheme' ), /* Position Title Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			/*'menu_icon' => get_stylesheet_directory_uri() . '/library/images/job-post-icon.png',  the icon for the Job post type menu */
			'rewrite'	=> array( 'slug' => 'job-post', 'with_front' => false ),  /* you can specify its url slug */
			'has_archive' => 'job-post',  /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'Job-fields', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post Types to your Job post type */
	register_taxonomy_for_object_type('Type', 'jobs');
	/* this adds your post tags to your Job post type 
	register_taxonomy_for_object_type('post_tag', 'job_post');*/
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'job_post_type');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
    // now let's add Companies (these act like categories)
    register_taxonomy( 'company', 
    	array('jobs'), /* if you change the name of register_post_type( 'job_post', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like Types */             
    		'labels' => array(
    			'name' => __( 'Companies', 'bonestheme' ), /* name of the Job taxonomy */
    			'singular_name' => __( 'Company', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Companies', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Companies', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Company', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Company:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Company', 'bonestheme' ), /* edit Job taxonomy title */
    			'update_item' => __( 'Update Company', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Company', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Company Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'Job-slug' ),
    	)
    );  
    
	// now let's add Job tags (these act like tags)
    register_taxonomy( 'job_tag', 
    	array('jobs'), /* if you change the name of register_post_type( 'job_post', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Job Tags', 'bonestheme' ), /* name of the Job taxonomy */
    			'singular_name' => __( 'Job Tag', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Job Tags', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Job Tags', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Job Tag', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Job Tag:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Job Tag', 'bonestheme' ), /* edit Job taxonomy title */
    			'update_item' => __( 'Update Job Tag', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Job Tag', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Job Tag Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    
    /*
    	looking for Job meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Job-Metaboxes-and-Fields-for-WordPress
    */
	

?>
