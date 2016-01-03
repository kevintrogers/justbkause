<?php
return array(
    'title' => __( 'Rise Theme Options', SH_NAME ),
    'logo' => get_template_directory_uri() . '/images/logo.png',
    'menus' => array(

        // General Settings
         array(
             'title' => __( 'General Settings', SH_NAME ),
            'name' => 'general_settings',
            'icon' => 'font-awesome:icon-magic',
            'menus' => array(
                 
				 array(
                     'title' => __( 'General Settings', SH_NAME ),
                    'name' => 'general_settings',
                    'icon' => 'font-awesome:icon-foursquare',
                    'controls' => array(
                         array(
                             'type' => 'section',
                            'repeating' => true,
                            'sortable' => true,
                            'title' => __( 'Color Scheme', SH_NAME ),
                            'name' => 'color_schemes',
                            'description' => __( 'This section is used for theme color settings', SH_NAME ),
                            'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'show_rtl',
									'label' => __( 'RTL ???', SH_NAME ) 
								),
                                array(
                                     'type' => 'select',
                                    'name' => 'color_selection',
                                    'label' => __( 'Color Scheme', SH_NAME ),
                                    'description' => __( 'Enable to choose from Default Color Schemes', SH_NAME ),
                                    'items' => array(
                                         array(
                                             'value' => 'custom',
                                            'label' => 'Custom Color' 
                                        ),
                                        array(
                                             'value' => 'default',
                                            'label' => 'Default Color Schemes ' 
                                        ) 
                                    ),
                                    'default' => 'custom' 
                                ),
                                array(
									'type' => 'color',
									'name' => 'custom_color_scheme',
									'label' => __( 'Color Scheme', SH_NAME ),
									'description' => __( 'Choose the Custom color scheme for the theme.', SH_NAME ),
									'default' => '#AA1F43',
									'dependency' => array(
														'field' => 'color_selection',
														'function' => 'vp_dep_is_custom_color' 
													)
								),
                                array(
                                     'type' => 'select',
                                    'name' => 'default_color_scheme',
                                    'label' => __( 'Color Scheme', SH_NAME ),
                                    'description' => __( 'Choose from Default color schemes for the theme.', SH_NAME ),
                                    'deafault' => 'no',
                                    'items' => array(
                                         array(
                                             'value' => '',
                                            'label' => 'No Color' 
                                        ),
                                        array(
                                             'value' => 'color-cyan',
                                            'label' => 'Cyan' 
                                        ),
                                        array(
                                             'value' => 'color-green',
                                            'label' => 'Green' 
                                        ),
                                        array(
                                             'value' => 'color-grey',
                                            'label' => 'Grey' 
                                        ),
                                        array(
                                             'value' => 'color-orange',
                                            'label' => 'Orange' 
                                        ),
                                        array(
                                             'value' => 'color-pink',
                                            'label' => 'Pink' 
                                        ),
                                        array(
                                             'value' => 'color-purple',
                                            'label' => 'Purple' 
                                        ),
                                        array(
                                             'value' => 'color-red',
                                            'label' => 'Red' 
                                        ),
                                        array(
                                             'value' => 'color-yellow',
                                            'label' => 'Yellow' 
                                        ) 
                                    ),
                                    'dependency' => array(
                                         'field' => 'color_selection',
                                        'function' => 'vp_dep_is_default_color' 
                                    ) 
                                ),

                            ) 
                        ),
												
							array(
								 'type' => 'section',
								'repeating' => true,
								'sortable' => true,
								'title' => __( 'Purchase Information', SH_NAME ),
								'name' => 'purchase_information',
								'description' => __( 'To get the auto theme updates provide purchase information', SH_NAME ),
								'fields' => array(
								 
								array(
									'type' => 'textbox',
									'name' => 'sh_purchase_code',
									'label' => __( 'Purchase Code', SH_NAME ),
									'description' => __( 'To find the purchase code to TF downloads tab click on Download then choose "License and Purchase code"', SH_NAME ),
									'default' => '',
								),
								array(
									'type' => 'textbox',
									'name' => 'sh_purchase_user',
									'label' => __( 'Themeforest Username', SH_NAME ),
									'description' => __( 'Enter your themeforest username', SH_NAME ),
									'default' => '',
										),
										
									) 
								),
						
                    ) 
                ),
                
				/** Submenu for heading settings */
                array(
					'title' => __( 'Header Settings', SH_NAME ),
					'name' => 'header_settings',
					'icon' => 'font-awesome:icon-credit-card',
					'controls' => array(
						array(
							 'type' => 'upload',
							'name' => 'favicon',
							'label' => __( 'Favicon', SH_NAME ),
							'description' => __( 'Upload the favicon, should be 16x16', SH_NAME ),
							'default' => '' 
						),
						array(
							 'type' => 'textbox',
							'name' => 'header_email',
							'label' => __( 'Email', SH_NAME ),
							'description' => __( 'Enter Email to display in Header.', SH_NAME ),
							'default' => '' 
						),
						array(
							 'type' => 'textbox',
							'name' => 'header_phone',
							'label' => __( 'Phone #', SH_NAME ),
							'description' => __( 'Enter Phone Number to display in Header.', SH_NAME ),
							'default' => '' 
						),
						
						array(
							 'type' => 'builder',
							'repeating' => true,
							'sortable' => true,
							'label' => __( 'Social Media', SH_NAME ),
							'name' => 'header_social_media',
							'description' => __( 'This section is used to add Social Media.', SH_NAME ),
							'fields' => array(
								 array(
									 'type' => 'textbox',
									'name' => 'title',
									'label' => __( 'Title', SH_NAME ),
									'description' => __( 'Enter the title of the social media.', SH_NAME ), 
								),
								 array(
									 'type' => 'textbox',
									'name' => 'social_link',
									'label' => __( 'Link', SH_NAME ),
									'description' => __( 'Enter the Link for Social Media.', SH_NAME ),
									'default' => '#'
								),
								array(
									'type' => 'select',
									'name' => 'social_icon',
									'label' => __( 'Icon', SH_NAME ),
									'description' => __( 'Choose Icon for Social Media.', SH_NAME ),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_social_medias',
											),
										),
									),
								)  
							) 
						),
						// Header Logo
						array(
							 'type' => 'section',
							'title' => __( 'Logo with Image', SH_NAME ),
							'name' => 'logo_with_image',
							
							'fields' => array(
								array(
                                     'type' => 'select',
                                    'name' => 'logo_selection',
                                    'label' => __( 'Header Logo', SH_NAME ),
                                    'description' => __( 'Choose logo style', SH_NAME ),
                                    'items' => array(
                                         array(
                                             'value' => 'image',
                                            'label' => 'Image Logo' 
                                         ),
										 array(
											 'value' => 'text',
											'label' => 'Text Logo ' 
										 ) 
                                    ),
                                ),
								 array(
									 'type' => 'upload',
									'name' => 'logo_image',
									'label' => __( 'Logo Image', SH_NAME ),
									'description' => __( 'Upload the logo image', SH_NAME ),
									'default' => get_template_directory_uri() . '/images/logo.png' ,
									'dependency' => array(
															'field' => 'logo_selection',
															'function' => 'vp_dep_is_logo' 
														),
								),
								array(
									 'type' => 'slider',
									'name' => 'logo_width',
									'label' => __( 'Logo Width', SH_NAME ),
									'description' => __( 'choose the logo width', SH_NAME ),
									'default' => '144',
									'min' => 20,
									'max' => 400 ,
									'dependency' => array(
															'field' => 'logo_selection',
															'function' => 'vp_dep_is_logo' 
														),
								),
								array(
									 'type' => 'slider',
									'name' => 'logo_height',
									'label' => __( 'Logo Height', SH_NAME ),
									'description' => __( 'choose the logo height', SH_NAME ),
									'default' => '45',
									'min' => 20,
									'max' => 400 ,
									'dependency' => array(
															'field' => 'logo_selection',
															'function' => 'vp_dep_is_logo' 
														),
								),
								array(
									'type' => 'textbox',
									'name' => 'header_logo_name',
									'label' => __( 'Site Logo Text', SH_NAME ),
									'description' => __( 'Enter Text for Site Logo.', SH_NAME ),
									'default' => '' ,
									'dependency' => array(
															'field' => 'logo_selection',
															'function' => 'vp_dep_is_text' 
														),
								), 
								
							) 
						),
						// Custom HEader Style End
                        array(
                             'type' => 'codeeditor',
                            'name' => 'header_css',
                            'label' => __( 'Custom CSS', SH_NAME ),
                            'description' => __( 'Write your custom css to include in header.', SH_NAME ),
                            'theme' => 'github',
                            'mode' => 'css' 
                        ) 
					) 
                ),
                
                /** Submenu for footer area */
                array(
                     'title' => __( 'Footer Settings', SH_NAME ),
                    'name' => 'sub_footer_settings',
                    'icon' => 'font-awesome:icon-hdd',
                    'controls' => array(
									array(
										 'type' => 'toggle',
										'name' => 'show_footer',
										'label' => __( 'Show Footer', SH_NAME ) 
									),
									array(
										 'type' => 'textarea',
										'name' => 'copyright_text',
										'label' => __( 'Copyright Text', SH_NAME ),
										'description' => __( 'Enter the Copyright Text', SH_NAME ),
										'default' => '' ,
										'dependency' => array(
															'field' => 'show_footer',
															'function' => 'vp_dep_boolean' 
														),
                        			),
									array(
										'type' => 'builder',
										'repeating' => true,
										'sortable' => true,
										'label' => __( 'Social Media', SH_NAME ),
										'name' => 'footer_social_media',
										'description' => __( 'This section is used to add Social Media.', SH_NAME ),
										'fields' => array(
											 array(
												 'type' => 'textbox',
												'name' => 'title',
												'label' => __( 'Title', SH_NAME ),
												'description' => __( 'Enter the title of the social media.', SH_NAME ), 
											),
											 array(
												 'type' => 'textbox',
												'name' => 'social_link',
												'label' => __( 'Link', SH_NAME ),
												'description' => __( 'Enter the Link for Social Media.', SH_NAME ),
												'default' => '#'
											),
											array(
												'type' => 'select',
												'name' => 'social_icon',
												'label' => __( 'Icon', SH_NAME ),
												'description' => __( 'Choose Icon for Social Media.', SH_NAME ),
												'items' => array(
													'data' => array(
														array(
															'source' => 'function',
															'value' => 'vp_get_social_medias',
														),
													),
												),
											),
										) 
									),
									array(
										'type' => 'toggle',
										'name' => 'colored_map',
										'label' => __( 'Show Map before Footer', SH_NAME ) 
									),
									array(
										'type' => 'color',
										'name' => 'map_color_scheme',
										'label' => __( 'Color Scheme', SH_NAME ),
										'description' => __( 'Choose the Custom color scheme for Map.', SH_NAME ),
										'default' => __('#a1f43',SH_NAME),
										'dependency' => array(
															'field' => 'colored_map',
															'function' => 'vp_dep_boolean' 
														),
										
									),
									array(
										'type' => 'textbox',
										'name' => 'map_latitude',
										'label' => __('Map Latitude', SH_NAME),
										'description' => __('Enter Latitude For Map.', SH_NAME),
										'default' => '',
										'dependency' => array(
															'field' => 'colored_map',
															'function' => 'vp_dep_boolean' 
														),
									),
									array(
										'type' => 'textbox',
										'name' => 'map_longitude',
										'label' => __( 'Map Longitude', SH_NAME ),
										'description' => __( 'Enter Longitude For Map', SH_NAME ),
										'default' => '',
										'dependency' => array(
															'field' => 'colored_map',
															'function' => 'vp_dep_boolean' 
														),
									),
									array(
										 'type' => 'codeeditor',
										'name' => 'footer_analytics',
										'label' => __( 'Footer Analytics / Scripts', SH_NAME ),
										'description' => __( 'In this area you can put Google Analytics Code or any other Script that you want to be included in the footer before the Body tag.', SH_NAME ),
										'theme' => 'twilight',
										'mode' => 'javascript' 
									)         
                    ) 
                ),
               array(
                     'title' => __( 'Permalinks Settings', SH_NAME ),
                    'name' => 'permalinks_settings',
                    'icon' => 'font-awesome:fa fa-link',
                    'controls' => array(
                         array(
                             'type' => 'section',
                            'name' => 'post_type_permalink_section',
                            'title' => 'Post Type Permalinks',
                            'fields' => array(
                              array(
                                     'type' => 'textbox',
                                    'name' => 'projects_permalink',
                                    'label' => __( 'Projects Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Projects Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                 array(
                                    'type' => 'textbox',
                                    'name' => 'causes_permalink',
                                    'label' => __( 'Causes Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Causes Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                
                                array(
                                     'type' => 'textbox',
                                    'name' => 'events_permalink',
                                    'label' => __( 'Events Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Events Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'gallery_permalink',
                                    'label' => __( 'Gallery Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Gallery Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'media_permalink',
                                    'label' => __( 'Media Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Media Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                  array(
                                    'type' => 'textbox',
                                    'name' => 'testimonials_permalink',
                                    'label' => __( 'Testimonials Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Testimonials Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                  array(
                                    'type' => 'textbox',
                                    'name' => 'donars_permalink',
                                    'label' => __( 'Donars Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Donars Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                                  array(
                                    'type' => 'textbox',
                                    'name' => 'teams_permalink',
                                    'label' => __( 'Teams Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Teams Post Type.', SH_NAME ),
                                    'default' => '' 
                                ),
                            ) 
                        ),
                        array(
                             'type' => 'section',
                            'name' => 'category_permalink_section',
                            'title' => 'Category Permalinks',
                            'fields' => array(
                               array(
                                    'type' => 'textbox',
                                    'name' => 'projects_category_permalink',
                                    'label' => __( 'Projects Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Permalink for Projects Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                   
                                array(
                                    'type' => 'textbox',
                                    'name' => 'causes_category_permalink',
                                    'label' => __( 'Causes Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Causes Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                   
                                array(
                                    'type' => 'textbox',
                                    'name' => 'events_category_permalink',
                                    'label' => __( 'Events Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Events Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                   
                                array(
                                    'type' => 'textbox',
                                    'name' => 'gallery_category_permalink',
                                    'label' => __( 'Gallery Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Gallery Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                   
                                array(
                                    'type' => 'textbox',
                                    'name' => 'testimonials_category_permalink',
                                    'label' => __( 'Testimonials Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Testimonials Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                   
                                array(
                                    'type' => 'textbox',
                                    'name' => 'donars_category_permalink',
                                    'label' => __( 'Donars Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Donars Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                                 array(
                                    'type' => 'textbox',
                                    'name' => 'team_category_permalink',
                                    'label' => __( 'Team Category Permalink', SH_NAME ),
                                    'description' => __( 'Enter Slug for Team Taxonomy.', SH_NAME ),
                                    'default' => '' 
                                ),
                             
                             
                                 
                            ) 
                        ) 
                    ) 
                ) //End of submenu
            ) 
        ),

		// Pages , Blog Pages Settings
        array(
             'title' => __( 'Page Settings', SH_NAME ),
            'name' => 'general_settings',
            'icon' => 'font-awesome:icon-file-text',
            'menus' => array(
                
                // Search Page Settings 
                 array(
                     'title' => __( 'Search Page Settings', SH_NAME ),
                    'name' => 'search_page_settings',
                    'icon' => 'font-awesome:icon-search',
                    'controls' => array(
                         array(
                             'type' => 'textbox',
                            'name' => 'search_page_title',
                            'label' => __( 'Page Title', SH_NAME ),
                            'description' => __( 'Enter the Title you want to show on search page', SH_NAME ),
                            'default' => 'Search Results' 
                        ),
						array(
                            'type' => 'upload',
                            'name' => 'search_page_bg',
                            'label' => __( 'Background  Image', SH_NAME ),
                            'description' => __( 'Upload Image for Search Page Background', SH_NAME ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'search_page_sidebar',
                            'label' => __( 'Sidebar', SH_NAME ),
                            'items' => array(
                                 'data' => array(
                                     array(
                                         'source' => 'function',
                                        'value' => 'sh_get_sidebars_2' 
                                    ) 
                                ) 
                            ),
                        ),
                    ) 
                ),
                
                 // Archive Page Settings 
                array(
					'title' => __( 'Archive Page Settings', SH_NAME ),
					'name' => 'archive_page_settings',
					'icon' => 'font-awesome:icon-user',
					'controls' => array(
								array(
									'type' => 'upload',
									'name' => 'archive_bg_image',
									'label' => __( 'Header Background Image', SH_NAME ),
									'description' => __( 'Upload Image of Full Width.', SH_NAME ),
									'default' => '' 
								),
								array(
									'type' => 'toggle',
									'name' => 'archive_breadcrum',
									'label' => __( 'Show Breadcrum', SH_NAME ) 
								),
								array(
									'type' => 'select',
									'name' => 'archive_column_number',
									'label' => __( 'Post Columns', SH_NAME ),
									'description' => __( 'Choose Column to show Posts', SH_NAME ),
									'items' => array(
												array(
													'value' => '1',
													'label' => __('1 Column', SH_NAME),
												),
												array(
													'value' => '2',
													'label' => __('2 Columns', SH_NAME),
												),
												array(
													'value' => '3',
													'label' => __('3 Columns', SH_NAME),
												),
												array(
													'value' => '4',
													'label' => __('4 Columns', SH_NAME),
												),
											  ),
									'default' => '1',
								),
								array(
									 'type' => 'select',
									'name' => 'archive_page_sidebar',
									'label' => __( 'Sidebar', SH_NAME ),
									'items' => array(
												 'data' => array(
															 array(
																 'source' => 'function',
																'value' => 'sh_get_sidebars_2' 
															 ) 
														   ) 
											   ),
									'description' => __( 'Choose Sidebar to show on this Page.', SH_NAME ),
								),
								
							  ) 
					),
                
                // Author Page Settings 
                array(
                     'title' => __( 'Author Page Settings', SH_NAME ),
                    'name' => 'author_page_settings',
                    'icon' => 'font-awesome:icon-user',
                    'controls' => array(
									array(
										'type' => 'upload',
										'name' => 'author_bg_image',
										'label' => __( 'Header Background Image', SH_NAME ),
										'description' => __( 'Upload Image of Full Width.', SH_NAME ),
										'default' => '' 
									),
									array(
										'type' => 'toggle',
										'name' => 'author_breadcrum',
										'label' => __( 'Show Breadcrum', SH_NAME ) 
									),
									array(
										'type' => 'select',
										'name' => 'author_column_number',
										'label' => __( 'Post Columns', SH_NAME ),
										'description' => __( 'Choose Column to show Posts', SH_NAME ),
										'items' => array(
													array(
														'value' => '1',
														'label' => __('1 Column', SH_NAME),
													),
													array(
														'value' => '2',
														'label' => __('2 Columns', SH_NAME),
													),
													array(
														'value' => '3',
														'label' => __('3 Columns', SH_NAME),
													),
													array(
														'value' => '4',
														'label' => __('4 Columns', SH_NAME),
													),
												  ),
										'default' => '1',
									),
									array(
										 'type' => 'select',
										'name' => 'author_page_sidebar',
										'label' => __( 'Sidebar', SH_NAME ),
										'items' => array(
													 'data' => array(
																 array(
																	 'source' => 'function',
																	'value' => 'sh_get_sidebars_2' 
																 ) 
															   ) 
												   ),
										'description' => __( 'Choose Sidebar to show on this Page.', SH_NAME ),
									),
									
                    			  ) 
                ),
				
				// Category Page Settings 
                array(
					'title' => __( 'Category Page Settings', SH_NAME ),
					'name' => 'category_page_settings',
					'icon' => 'font-awesome:icon-user',
					'controls' => array(
								array(
									'type' => 'upload',
									'name' => 'category_bg_image',
									'label' => __( 'Header Background Image', SH_NAME ),
									'description' => __( 'Upload Image of Full Width.', SH_NAME ),
									'default' => '' 
								),
								array(
									'type' => 'toggle',
									'name' => 'category_breadcrum',
									'label' => __( 'Show Breadcrum', SH_NAME ) 
								),
								array(
									'type' => 'select',
									'name' => 'category_column_number',
									'label' => __( 'Post Columns', SH_NAME ),
									'description' => __( 'Choose Column to show Posts', SH_NAME ),
									'items' => array(
												array(
													'value' => '1',
													'label' => __('1 Column', SH_NAME),
												),
												array(
													'value' => '2',
													'label' => __('2 Columns', SH_NAME),
												),
												array(
													'value' => '3',
													'label' => __('3 Columns', SH_NAME),
												),
												array(
													'value' => '4',
													'label' => __('4 Columns', SH_NAME),
												),
											  ),
									'default' => '1',
								),
								array(
									 'type' => 'select',
									'name' => 'category_page_sidebar',
									'label' => __( 'Sidebar', SH_NAME ),
									'items' => array(
												 'data' => array(
															 array(
																 'source' => 'function',
																'value' => 'sh_get_sidebars_2' 
															 ) 
														   ) 
											   ),
									'description' => __( 'Choose Sidebar to show on this Page.', SH_NAME ),
								),
								
							  ) 
					),
				
				// Tag Page Settings 
                array(
					'title' => __( 'Tag Page Settings', SH_NAME ),
					'name' => 'tag_page_settings',
					'icon' => 'font-awesome:icon-user',
					'controls' => array(
								array(
									'type' => 'upload',
									'name' => 'tag_bg_image',
									'label' => __( 'Header Background Image', SH_NAME ),
									'description' => __( 'Upload Image of Full Width.', SH_NAME ),
									'default' => '' 
								),
								array(
									'type' => 'toggle',
									'name' => 'tag_breadcrum',
									'label' => __( 'Show Breadcrum', SH_NAME ) 
								),
								array(
									'type' => 'select',
									'name' => 'tag_column_number',
									'label' => __( 'Post Columns', SH_NAME ),
									'description' => __( 'Choose Column to show Posts', SH_NAME ),
									'items' => array(
												array(
													'value' => '1',
													'label' => __('1 Column', SH_NAME),
												),
												array(
													'value' => '2',
													'label' => __('2 Columns', SH_NAME),
												),
												array(
													'value' => '3',
													'label' => __('3 Columns', SH_NAME),
												),
												array(
													'value' => '4',
													'label' => __('4 Columns', SH_NAME),
												),
											  ),
									'default' => '1',
								),
								array(
									 'type' => 'select',
									'name' => 'tag_page_sidebar',
									'label' => __( 'Sidebar', SH_NAME ),
									'items' => array(
												 'data' => array(
															 array(
																 'source' => 'function',
																'value' => 'sh_get_sidebars_2' 
															 ) 
														   ) 
											   ),
									'description' => __( 'Choose Sidebar to show on this Page.', SH_NAME ),
								),
								
							  ) 
					),
				
				//404 Page Options
				array(
					'title' => __('404 Page Settings', SH_NAME),
					'name' => 'page_settings',
					'icon' => 'font-awesome:icon-ban-circle',
					'controls' => array(
									array(
										'type' => 'textbox',
										'name' => 'page_title',
										'label' => __( 'Page Title', SH_NAME ),
										'description' => __( 'Enter 404 Page Title', SH_NAME ),
										'default' => '404' 
									),
									array(
										'type' => 'textbox',
										'name' => 'page_text',
										'label' => __( 'Page Text', SH_NAME ),
										'description' => __( 'Enter 404 Page Text', SH_NAME ),
										'default' => 'Ups, Page Not Found' 
									),
									array(
										'type' => 'textbox',
										'name' => 'page_tag_line',
										'label' => __( 'Page Description', SH_NAME ),
										'description' => __( 'Enter 404 Page Description', SH_NAME ),
										'default' => 'We are sorry, but the page<br>you were looking for doesnot exist.' 
									),
								  )
				),
            ) 
        ),
        
        // Dynamic Social Media Creator
        array(
             'title' => __( 'Social Media ', SH_NAME ),
            'name' => 'social_media_section',
            'icon' => 'font-awesome:icon-globe',
            'controls' => array(
                 array(
                     'type' => 'builder',
                    'repeating' => true,
                    'sortable' => true,
                    'label' => __( 'Social Media', SH_NAME ),
                    'name' => 'social_media',
                    'description' => __( 'This section is used to add Social Media.', SH_NAME ),
                    'fields' => array(
                         array(
                             'type' => 'textbox',
                            'name' => 'title',
                            'label' => __( 'Title', SH_NAME ),
                            'description' => __( 'Enter the title of the social media.', SH_NAME ), 
                        ),
						 array(
                             'type' => 'textbox',
                            'name' => 'social_link',
                            'label' => __( 'Link', SH_NAME ),
                            'description' => __( 'Enter the Link for Social Media.', SH_NAME ),
                            'default' => '#'
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'social_icon',
                            'label' => __( 'Icon', SH_NAME ),
                            'description' => __( 'Choose Icon for Social Media.', SH_NAME ),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_social_medias',
									),
								),
							),
                        )  
                    ) 
                ), 
            ) 
        ),
			
		//Contact Us Options
      	array(
				'title' => __('Contact Us Settings', SH_NAME),
				'name' => 'contact_us',
				'icon' => 'font-awesome:icon-link',
				'controls' => array(
					array(
						'type' => 'section',
						'repeating' => false,
						'sortable'  => false,
						'label' => __('Contact Us', SH_NAME),
						'name' => 'contact',
						'description' => __('This section is used for Contact Us Settings', SH_NAME),
						'fields' => array(
							
							array(
								'type' => 'textbox',
								'name' => 'address',
								'label' => __('Address / Location', SH_NAME),
								'description' => '',
								'default' => '',
							),
							array(
								'type' => 'textbox',
								'name' => 'phone',
								'label' => __('Contact Number', SH_NAME),
								'description' => '',
								'default' => '',
							),
							array(
								'type' => 'textbox',
								'name' => 'email',
								'label' => __('Email', SH_NAME),
								'description' => '',
								'default' => '',
							),
							array(
								'type' => 'textbox',
								'name' => 'skype',
								'label' => __('Skype Name', SH_NAME),
								'description' => '',
								'default' => '',
							),
							array(
								'type' => 'textarea',
								'name' => 'iframe',
								'label' => __('Google Map Iframe', SH_NAME),
								'description' => '',
								'default' => '',
							),
							array(
								'type' => 'textbox',
								'name' => 'contact_email',
								'label' => __('Contact Email', SH_NAME),
								'description' => __('Enter Email on which viewer can send mails.', SH_NAME),
								'default' => '',
							),
						),
					),
				)
			),
			
		//Paypal Options
      	array(
				'title' => __('Paypal Settings', SH_NAME),
				'name' => 'paypal_settings',
				'icon' => 'font-awesome:icon-link',
				'controls' => array(
								array(
                                    'type' => 'select',
                                    'name' => 'paypal_type',
                                    'label' => __( 'Paypal Type', SH_NAME ),
                                    'description' => __( 'Select Paypal type.', SH_NAME ),
                                    'items' => array(
													array(
														'value' => 'live',
														'label' => 'Live' 
													),
													array(
														'value' => 'sandbox',
														'label' => 'Sandbox' 
													) 
												),
                                ),
								array(
									'type' => 'textbox',
									'name' => 'paypal_username',
									'label' => __('Paypal Username', SH_NAME),
								),
								array(
									'type' => 'textbox',
									'name' => 'paypal_api_username',
									'label' => __('Paypal API Username', SH_NAME),
								),
								array(
									'type' => 'textbox',
									'name' => 'paypal_api_password',
									'label' => __('Paypal API Password', SH_NAME),
								),
								array(
									'type' => 'textbox',
									'name' => 'paypal_api_signature',
									'label' => __('Paypal API Signature', SH_NAME),
								),
								array(
									'type' => 'textbox',
									'name' => 'paypal_currency_code',
									'label' => __('Paypal Currency', SH_NAME),
								),
				)
			),
			 /* Font settings */
				array(
					 'title' => __( 'Font Settings', SH_NAME ),
					'name' => 'font_settings',
					'icon' => 'font-awesome:icon-font',
					'menus' => array(
						/** heading font settings */
						 array(
							 'title' => __( 'Heading Font', SH_NAME ),
							'name' => 'heading_font_settings',
							'icon' => 'font-awesome:icon-text-height',
							
							'controls' => array(
								
								 array(
									 'type' => 'toggle',
									'name' => 'use_custom_font',
									'label' => __( 'Use Custom Font', SH_NAME ),
									'description' => __( 'Use custom font or not', SH_NAME ),
									'default' => 0 
								),
								array(
									'type' => 'section',
									'title' => __( 'H1 Settings', SH_NAME ),
									'name' => 'h1_settings',
									'description' => __( 'heading 1 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h1_font_family',
											'description' => __( 'Select the font family to use for h1', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										
										array(
											 'type' => 'color',
											'name' => 'h1_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h1', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								),
								array(
									 'type' => 'section',
									'title' => __( 'H2 Settings', SH_NAME ),
									'name' => 'h2_settings',
									'description' => __( 'heading h2 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h2_font_family',
											'description' => __( 'Select the font family to use for h2', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
										),
										array(
											 'type' => 'color',
											'name' => 'h2_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h1', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								),
								array(
									 'type' => 'section',
									'title' => __( 'H3 Settings', SH_NAME ),
									'name' => 'h3_settings',
									'description' => __( 'heading h3 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h3_font_family',
											'description' => __( 'Select the font family to use for h3', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										array(
											 'type' => 'color',
											'name' => 'h3_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h3', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								),
								
								array(
									 'type' => 'section',
									'title' => __( 'H4 Settings', SH_NAME ),
									'name' => 'h4_settings',
									'description' => __( 'heading h4 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h4_font_family',
											'description' => __( 'Select the font family to use for h4', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										array(
											 'type' => 'color',
											'name' => 'h4_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h4', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								),
								
								array(
									 'type' => 'section',
									'title' => __( 'H5 Settings', SH_NAME ),
									'name' => 'h5_settings',
									'description' => __( 'heading h5 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h5_font_family',
											'description' => __( 'Select the font family to use for h5', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										array(
											 'type' => 'color',
											'name' => 'h5_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h5', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								),
								
								array(
									 'type' => 'section',
									'title' => __( 'H6 Settings', SH_NAME ),
									'name' => 'h6_settings',
									'description' => __( 'heading h6 font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'use_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'h6_font_family',
											'description' => __( 'Select the font family to use for h6', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										array(
											 'type' => 'color',
											'name' => 'h6_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading h6', SH_NAME ),
											'default' => '#98ed28' 
										) 
									) 
								) 
							) 
						),
						
						/** body font settings */
						array(
							 'title' => __( 'Body Font', SH_NAME ),
							'name' => 'body_font_settingss',
							'icon' => 'font-awesome:icon-text-width',
							'controls' => array(
								 array(
									 'type' => 'toggle',
									'name' => 'body_custom_font',
									'label' => __( 'Use Custom Font', SH_NAME ),
									'description' => __( 'Use custom font or not', SH_NAME ),
									'default' => 0 
								),
								array(
									 'type' => 'section',
									'title' => __( 'Body Font Settings', SH_NAME ),
									'name' => 'body_font_settings',
									'description' => __( 'body font settings', SH_NAME ),
									'dependency' => array(
										 'field' => 'body_custom_font',
										'function' => 'vp_dep_boolean' 
									),
									'fields' => array(
										
										 array(
											 'type' => 'select',
											'label' => __( 'Font Family', SH_NAME ),
											'name' => 'body_font_family',
											'description' => __( 'Select the font family to use for body', SH_NAME ),
											'items' => array(
												 'data' => array(
													 array(
														 'source' => 'function',
														'value' => 'vp_get_gwf_family' 
													) 
												) 
											) 
											
										),
										
										array(
											 'type' => 'color',
											'name' => 'body_font_color',
											'label' => __( 'Font Color', SH_NAME ),
											'description' => __( 'Choose the font color for heading body', SH_NAME ),
											'default' => '#686868' 
										) 
									) 
								) 
							) 
						) 
					) 
				) 
    ) 
);

/**
 *EOF
 */