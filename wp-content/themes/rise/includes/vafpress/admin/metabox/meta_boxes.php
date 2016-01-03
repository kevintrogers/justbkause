<?php
$options = array();

/* Page options */
$options[] =  array(
	'id'          => 'page_meta',
	'types'       => array('page'),
	'title'       => __('Page Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'toggle',
							'name' => 'is_home',
							'label' => __('Don\'t Show Breadcrumb banner area', SH_NAME),
							'default' => '',
							'description' => ''
						),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => get_template_directory_uri().'/images/resource/banner-1.jpg',
							'description' => __('Uplaod Image', SH_NAME),
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
						array(
							'type' => 'toggle',
							'name' => 'is_blog_page',
							'label' => __('Show Posts', SH_NAME),
							'default' => '',
							'description' => __('Select if you want to show blog posts in this page.', SH_NAME)
						),
						array(
							'type' => 'select',
							'name' => 'column_number',
							'label' => __('Column', SH_NAME),
							'default' => '2',
							'description' => __('Only for Blog and Gallery Pages.', SH_NAME),
							'items' =>  array(
											array(
												'value' => '1',
												'label' => __('1 Column', SH_NAME),
											),
											array(
												'value' => '2',
												'label' => __('2 Column', SH_NAME),
											),
											array(
												'value' => '3',
												'label' => __('3 Column', SH_NAME),
											),
											array(
												'value' => '4',
												'label' => __('4 Column', SH_NAME),
											),
										),
						),
					),
				);

/* Post options */
$options[] =  array(
	'id'          => 'post_meta',
	'types'       => array('post'),
	'title'       => __('Post Settings', SH_NAME),
	'priority'    => 'high',
	'template'    =>  array(
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
					
				),);

/** Projects Options*/
$options[] =  array(
	'id'          => 'projects_meta',
	'types'       => array('sh_projects'),
	'title'       => __('Projects Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'date',
							'name' => 'date',
							'label' => __('Date', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'terget',
							'label' => __('Target Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'raised',
							'label' => __('Raised Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'location',
							'label' => __('Location', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
							'type' => 'toggle',
							'name' => 'checkbox',
							'label' => __('Related Posts', SH_NAME),
							'default' => '',
							'description' => __('Check if you want to Show Related Posts', SH_NAME)
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
									
	),);
	
/** Causes Options*/
$options[] =  array(
	'id'          =>'causes_meta',
	'types'       => array('sh_causes'),
	'title'       => __('Causes Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'textbox',
							'name' => 'target',
							'label' => __('Target Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'raised',
							'label' => __('Raised Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'location',
							'label' => __('Location', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
                            'type' => 'select',
                            'name' => 'donation_type',
                            'label' => __( 'Donation Type', SH_NAME ),
                            'description' => __( 'Choose whether you want get donation via paypal or custom link', SH_NAME ),
                            'items' => array(
                                       array(
                                           'value' => 'paypal',
                                           'label' => 'Paypay Link' 
                                        ),
                                        array(
                                           'value' => 'custom',
                                          'label' => 'Custom Link' 
                                      ) 
                                  ),
                                  'default' => 'paypal' 
                              ),
						array(
							'type' => 'textbox',
							'name' => 'link',
							'label' => __('Donation Custom Link', SH_NAME),
							'default' => '',
							'description' => __('Only required when you choose the Donation Type "custom"')
						),
						array(
							'type' => 'toggle',
							'name' => 'checkbox',
							'label' => __('Related Posts', SH_NAME),
							'default' => '',
							'description' => __('Check if you want to Show Related Posts', SH_NAME)
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
									
	),);
	
/** Events Options*/
$options[] =  array(
	'id'          => 'events_meta',
	'types'       => array('sh_events'),
	'title'       => __('Events Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'textbox',
							'name' => 'target',
							'label' => __('Target Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'raised',
							'label' => __('Raised Amount', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'location',
							'label' => __('Location', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'date',
							'name' => 'start_date',
							'label' => __('Start Date', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'date',
							'name' => 'end_date',
							'label' => __('End Date', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'start_time',
							'label' => __('Start Time', SH_NAME),
							'default' => '09:35:59',
							'description' => __('Pattern must be H:M:S (24 Hours)', SH_NAME),
						),
						array(
							'type' => 'textbox',
							'name' => 'end_time',
							'label' => __('End Time', SH_NAME),
							'default' => '22:49:15',
							'description' => __('Pattern must be H:M:S (24 Hours)', SH_NAME),
						),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
							'type' => 'toggle',
							'name' => 'checkbox',
							'label' => __('Related Posts', SH_NAME),
							'default' => '',
							'description' => __('Check if you want to Show Related Posts', SH_NAME)
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
									
	),);
	
// Gallary Options for Image
$options[] =  array(
	'id'          => 'gallery_meta',
	'types'       => array('sh_gallery'),
	'title'       => __('Image Gallery Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => array(		
						array(
							'type'      => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name'      => 'column',
							'title'     => __('Images', SH_NAME),
							'fields'    => array(
												array(
													'type'                 => 'upload',
													'label'                => __('Image', SH_NAME),
													'name'                 => 'image',
													'use_external_plugins' => 1,
													'validation'           => 'required',
												),
							),
				
		),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
							'type' => 'select',
							'label' => __('Sidebar', SH_NAME),
							'name'  => 'sidebar',
							'default' => '',
							'description' => __('Sidebar', SH_NAME),
							'items' =>  sh_get_sidebars('multi' == true) ,
						),
	),);

/** Testimonial Options*/
$options[] =  array(
	'id'          => 'testimonials_meta',
	'types'       => array('sh_testimonials'),
	'title'       => __('Testimonials Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Cover Photo', SH_NAME),
						),
						array(
							'type' => 'textbox',
							'name' => 'designation',
							'label' => __('Designation', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'company',
							'label' => __('Company Name', SH_NAME),
							'default' => '',
						)
	),);
	
/** Donor Options*/
$options[] =  array(
	'id'          => 'donor_meta',
	'types'       => array('sh_donors'),
	'title'       => __('Donor Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'textbox',
							'name' => 'designation',
							'label' => __('Designation', SH_NAME),
							'default' => '',
						),
						array(
							'type'      => 'group',
							'repeating' => true,
							'length'    => 1,
							'name'      => 'sh_donor_social',
							'title'     => __('Social Profile', SH_NAME),
							'fields'    => array(
								
								array(
									'type' => 'fontawesome',
									'name' => 'social_icon',
									'label' => __('Social Icon', SH_NAME),
									'default' => '',
								),
								
								array(
									'type' => 'textbox',
									'name' => 'social_link',
									'label' => __('Link', SH_NAME),
									'default' => '',
									
								),
								
								
							),
						),
	),);

/** Team Options*/
$options[] =  array(
	'id'          => 'team_meta',
	'types'       => array('sh_team'),
	'title'       => __('Team Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						array(
							'type' => 'textbox',
							'name' => 'designation',
							'label' => __('Designation', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'tag_line',
							'label' => __('Tag Line', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'email',
							'label' => __('Email', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'phone',
							'label' => __('Phone', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'link',
							'label' => __('Link', SH_NAME),
							'default' => '',
						),
						array(
							'type'      => 'group',
							'repeating' => true,
							'length'    => 1,
							'name'      => 'sh_team_social',
							'title'     => __('Social Profile', SH_NAME),
							'fields'    =>  array(
												array(
													'type' => 'textbox',
													'name' => 'social_title',
													'label' => __('Title For Social Icon', SH_NAME),
													'default' => '',
												),
												array(
													'type' => 'fontawesome',
													'name' => 'social_icon',
													'label' => __('Social Icon', SH_NAME),
													'default' => '',
												),
												
												array(
													'type' => 'textbox',
													'name' => 'social_link',
													'label' => __('Link', SH_NAME),
													'default' => '',
												),
											),
						),
						array(
							'type'      => 'group',
							'repeating' => true,
							'length'    => 1,
							'name'      => 'sh_team_skill',
							'title'     => __('Skills', SH_NAME),
							'fields'    =>  array(
												array(
													'type' => 'fontawesome',
													'name' => 'social_icon',
													'label' => __('Social Icon', SH_NAME),
													'default' => '',
												),
												array(
													'type' => 'textbox',
													'name' => 'skill_name',
													'label' => __('Skill Name', SH_NAME),
													'default' => '',
												),
												array(
													'type' => 'slider',
													'name' => 'skill_percent',
													'label' => __('Skill  Percentage', SH_NAME),
													'min' => '1',
													'max' => '100',
													'step' => '1',
													'default' => '50',
												),
											),
						),
						array(
							'type'      => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name'      => 'column',
							'title'     => __('Images', SH_NAME),
							'fields'    => array(
											array(
												'type'                       => 'upload',
												'label'                      => __('Image for Photo Slide', SH_NAME),
												'name'                       => 'image',
												'use_external_plugins'       => 1,
												'validation'                 => 'required',
											),
										 ),
						),
						array(
							'type' => 'upload',
							'label' => __('Top Image', SH_NAME),
							'name'  => 'image',
							'default' => '',
							'description' => __('Uplaod Image', SH_NAME),
						),
						array(
							'type' => 'toggle',
							'name' => 'checkbox',
							'label' => __('Check Box', SH_NAME),
							'default' => '',
							'description' => __('Check if you want to Show last box', SH_NAME)
						),
						array(
							'type' => 'textbox',
							'name' => 'small_text',
							'label' => __('Small Text', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'large_text',
							'label' => __('Large Text', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'button_box_link',
							'label' => __('Button Link', SH_NAME),
							'default' => '',
						),
	),);

/**
 * EOF
 */
 
 
return $options;
 
 
 
 
 
 
 
 