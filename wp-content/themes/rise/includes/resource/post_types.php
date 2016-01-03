<?php

$theme_option = _WSH()->option(); 
$projects_slug = sh_set($theme_option , 'projects_permalink' , 'projects') ;
$causes_slug = sh_set($theme_option , 'causes_permalink' , 'causes') ;
$events_slug = sh_set($theme_option , 'events_permalink' , 'events') ;
$gallery_slug = sh_set($theme_option , 'gallery_permalink' , 'events') ;
$testimonials_slug = sh_set($theme_option , 'testimonials_permalink' , 'testimonials') ;
$donars_slug = sh_set($theme_option , 'donars_permalink' , 'donars') ;
$teams_slug = sh_set($theme_option , 'teams_permalink' , 'teams') ;


$options = array();

$options['sh_projects']		= array(
								'labels' => array(__('Project', SH_NAME), __('Project', SH_NAME)),
								'slug' =>$projects_slug ,
								'label_args' => array('menu_name' => __('Projects', SH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail'),
								'label' => __('Project', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/Projects.png' , 
											'taxonomies'=>array('projects_category')
								)
							);
$options['sh_causes'] 		= array(
								'labels' => array(__('Cause', SH_NAME), __('Cause', SH_NAME)),
								'slug' => $causes_slug ,
								'label_args' => array('menu_name' => __('Causes', SH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail'),
								'label' => __('Cause', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/Causes.png' , 
											'taxonomies'=>array('team_category')
								)
							);
$options['sh_events'] 		= array(
								'labels' => array(__('Event', SH_NAME), __('Event', SH_NAME)),
								'slug' =>$events_slug ,
								'label_args' => array('menu_name' => __('Events', SH_NAME)),
								'supports' => array( 'title' , 'editor' , 'thumbnail' ),
								'label' => __('Event', SH_NAME),
								'args'=>array(
										'menu_icon'=>get_template_directory_uri().'/images/Events.png' , 
										'taxonomies'=>array('team_category')
								));
$options['sh_gallery'] 		= array(
								'labels' => array(__('Gallery', SH_NAME), __('Gallery', SH_NAME)),
								'slug' => $gallery_slug,
								'label_args' => array('menu_name' => __('Gallery', SH_NAME)),
								'supports' => array( 'title' , 'thumbnail'),
								'label' => __('Gallery', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/Galleries.png' , 
											'taxonomies'=>array('gallery_category')
								));
$options['sh_testimonials'] = array(
								'labels' => array(__('Testimonial', SH_NAME), __('Testimonial', SH_NAME)),
								'slug' => $testimonials_slug ,
								'label_args' => array('menu_name' => __('Testimonials', SH_NAME)),
								'supports' => array( 'title' ,'editor', 'thumbnail'),
								'label' => __('Testimonial', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/testimonials.png' , 
											'taxonomies'=>array('team_category')
								));
$options['sh_donors'] 		= array(
								'labels' => array(__('Donor', SH_NAME), __('Donor', SH_NAME)),
								'slug' => $donars_slug ,
								'label_args' => array('menu_name' => __('Donors', SH_NAME)),
								'supports' => array( 'title' ,'editor', 'thumbnail'),
								'label' => __('Donor', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/doners.png' , 
											'taxonomies'=>array('team_category')
								));
$options['sh_team'] 		= array(
								'labels' => array(__('Member', SH_NAME), __('Member', SH_NAME)),
								'slug' => $teams_slug ,
								'label_args' => array('menu_name' => __('Teams', SH_NAME)),
								'supports' => array( 'title', 'editor' , 'thumbnail'),
								'label' => __('Member', SH_NAME),
								'args'=>array(
											'menu_icon'=>get_template_directory_uri().'/images/team.png' , 
											'taxonomies'=>array('team_category')
								)
							);