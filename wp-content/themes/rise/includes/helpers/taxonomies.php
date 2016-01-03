<?php



class SH_Taxonomies
{
	

	
	function __construct()
	{
		// Hook into the 'init' action
		add_action( 'init', array($this, 'taxonomies'), 0 );
		$theme_option = _WSH()->option() ; 
		$this->team_cat_slug = sh_set($theme_option , 'team_category_permalink' , 'team_category') ;
        $this->projects_cat_slug = sh_set($theme_option , 'projects_category_permalink' , 'projects_category') ;
	    $this->causes_cat_slug = sh_set($theme_option , 'causes_category_permalink' , 'causes_category') ;
		$this->events_cat_slug = sh_set($theme_option , 'events_category_permalink' , 'events_category') ;
        $this->gallery_cat_slug = sh_set($theme_option , 'gallery_category_permalink' , 'gallery_category') ;
        $this->testimonials_cat_slug = sh_set($theme_option , 'testimonials_category_permalink' , 'testimonials_category') ;
	    $this->donars_cat_slug = sh_set($theme_option , 'donars_category_permalink' , 'donars_category');
	}
	
	// Register Custom Taxonomy
	function taxonomies()  {
		
		// Projects
		$labels		= array(
			'name'                       => _x( 'Category', 'Project Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->projects_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'projects_category' , 'sh_projects' , $args );
		
		// Testimonials
		$labels		= array(
			'name'                       => _x( 'Category', 'Testimonial Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->testimonials_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'testimonials_category', 'sh_testimonials', $args );
		
		// Team
		$labels		= array(
			'name'                       => _x( 'Category', 'Team Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->team_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'team_category', 'sh_team', $args );
		
		// Gallery
		$labels		= array(
			'name'                       => _x( 'Category', 'Gallery Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Gallery Category', SH_NAME ),
			'parent_item_colon'          => __( 'Gallery Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->gallery_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'gallery_category', 'sh_gallery', $args );
		
		// Events
		$labels		= array(
			'name'                       => _x( 'Category', 'Event Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->events_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('events_category', 'sh_events', $args );
		
		// Causes
		$labels		= array(
			'name'                       => _x( 'Category', 'Cause Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->causes_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('causes_category', 'sh_causes', $args );
		
		//Donors
		$labels		= array(
			'name'                       => _x( 'Category', 'Donor Category', SH_NAME ),
			'singular_name'              => _x( 'Category', 'Category', SH_NAME ),
			'menu_name'                  => __( 'Category', SH_NAME ),
			'all_items'                  => __( 'All Categories', SH_NAME ),
			'parent_item'                => __( 'Parent Category', SH_NAME ),
			'parent_item_colon'          => __( 'Parent Category:', SH_NAME ),
			'new_item_name'              => __( 'New Category Name', SH_NAME ),
			'add_new_item'               => __( 'Add New Category', SH_NAME ),
			'edit_item'                  => __( 'Edit Category', SH_NAME ),
			'update_item'                => __( 'Update Category', SH_NAME ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', SH_NAME ),
			'search_items'               => __( 'Search Categories', SH_NAME ),
			'add_or_remove_items'        => __( 'Add or remove Categories', SH_NAME ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', SH_NAME ),
		);
		$rewrite	= array(
			'slug'                       => $this->donars_cat_slug,
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('donors_category', 'sh_donors', $args );
		
	}
}