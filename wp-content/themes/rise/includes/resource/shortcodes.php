<?php
$sh_sc = array();

/* Rise Shortcodes   */
$sh_sc['sh_donate_now']		=	array(
									"name" => __("Donte Now", SH_NAME),
									"base" => "sh_donate_now",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Donate Now', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title 1 ", SH_NAME),
										   "param_name" => "title1",
										   "description" => __("Enter title before Donate Now.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text 1 ", SH_NAME),
										   "param_name" => "text1",
										   "description" => __("Enter text before Donate Now.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title 2", SH_NAME),
										   "param_name" => "title2",
										   "description" => __("Enter title of Donate Now", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text 2", SH_NAME),
										   "param_name" => "text2",
										   "description" => __("Enter text of Donate Now", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Target Amount", SH_NAME),
										   "param_name" => "target",
										   "description" => __("Enter Target Amount.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Raised Amount", SH_NAME),
										   "param_name" => "raised",
										   "description" => __("Enter Raised Amount.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Dropdown", SH_NAME),
										   "param_name" => "type",
										   "description" => __("Dropdown For Links.", SH_NAME),
										   'value'=> array(__( 'Paypal', SH_NAME )=>'paypal', __( 'Custom Link', SH_NAME )=>'custom')
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Custom Link", SH_NAME),
										   "param_name" => "custom_link",
										   "description" => __("Enter Custom Link.", SH_NAME)
										),
									)
								);
$sh_sc['sh_projects']		=	array(
									"name" => __("Projects", SH_NAME),
									"base" => "sh_projects",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Project Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Project Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text", SH_NAME),
										   "param_name" => "text",
										   "description" => __("Enter Text for Project Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Project to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
										   sh_get_categories( array( 
																'taxonomy' => 'projects_category',
																'hide_empty' => false)
																) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
										array(
										   "type" => "attach_images",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __('Background Image', SH_NAME ),
										   "param_name" => "bg",
										   "description" => __('Upload Background Image.', SH_NAME )
										),
										
									)
								);
$sh_sc['sh_causes']			=	array(
									"name" => __("Causes", SH_NAME),
									"base" => "sh_causes",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Cause Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Cause Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text", SH_NAME),
										   "param_name" => "text",
										   "description" => __("Enter Text for Cause Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Cause to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
										   sh_get_categories( array( 
																'taxonomy' => 'causes_category',
																'hide_empty' => false)
																) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
									)
								);
$sh_sc['sh_events']			=	array(
									"name" => __("Events", SH_NAME),
									"base" => "sh_events",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Events Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Events Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Events to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
										   sh_get_categories( array( 
																'taxonomy' => 'events_category',
																'hide_empty' => false)
																) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
										array(
										   "type" => "attach_images",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __('Background Image', SH_NAME ),
										   "param_name" => "bg",
										   "description" => __('Upload Background Image.', SH_NAME )
										),
										
									)
								);
$sh_sc['sh_gallery']		=	array(
									"name" => __("Gallery", SH_NAME),
									"base" => "sh_gallery",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Gallery Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Gallery Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text", SH_NAME),
										   "param_name" => "text",
										   "description" => __("Enter Text for Gallery Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Images to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( sh_get_posts_array( 'sh_gallery' ) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
									)
								);
$sh_sc['sh_testimonials']	=	array(
									"name" => __("Testimonial", SH_NAME),
									"base" => "sh_testimonials",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Testimonial Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Testimonial to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
														sh_get_categories( array('taxonomy'=>'testimonials_category','hide_empty'=>false)) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),						
									)
								);
$sh_sc['sh_donors']			=	array(
									"name" => __("Donors", SH_NAME),
									"base" => "sh_donors",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Donors Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Donors Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text", SH_NAME),
										   "param_name" => "text",
										   "description" => __("Enter Text for Donors Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("Number of Donors to show.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
										   sh_get_categories( array( 
																'taxonomy' => 'donors_category',
																'hide_empty' => false)
																) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
										array(
										   "type" => "attach_images",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __('Background Image', SH_NAME ),
										   "param_name" => "bg",
										   "description" => __('Upload Background Image for Donors Section.', SH_NAME )
										),
										
									)
								);
$sh_sc['sh_team']			=	array(
									"name" => __("Team", SH_NAME),
									"base" => "sh_team",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									'description' => __('Team Section.', SH_NAME),
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter title for Team Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Text", SH_NAME),
										   "param_name" => "text",
										   "description" => __("Enter Text for Team Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Number", SH_NAME),
										   "param_name" => "number",
										   "description" => __("How many members of Team to show?", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __( 'Category', SH_NAME ),
										   "param_name" => "cat",
										   "value" => array_flip( 
										   sh_get_categories( array( 
																'taxonomy' => 'team_category',
																'hide_empty' => false)
																) ),
										   "description" => __( 'Choose Category.', SH_NAME )
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order By", SH_NAME),
										   "param_name" => "sort",
										   'value' => array_flip( array(
																	'date'=>__('Date', SH_NAME),
																	'title'=>__('Title', SH_NAME) ,
																	'name'=>__('Name', SH_NAME) ,
																	'author'=>__('Author', SH_NAME),
																	'comment_count' =>__('Comment Count', SH_NAME),
																	'random' =>__('Random', SH_NAME) 
																	) ),			
										   "description" => __("Enter the sorting order.", SH_NAME)
										),
										array(
										   "type" => "dropdown",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Order", SH_NAME),
										   "param_name" => "order",
										   'value' => array(
														'ASC'=>__('Ascending', SH_NAME),
														'DESC'=>__('Descending', SH_NAME) 
													  ),			
										   "description" => __("Enter the Order.", SH_NAME)
										),
									)
								);
$sh_sc['sh_newsletter']		=	array(
									"name" => __("Newsletter Bar", SH_NAME),
									"base" => "sh_newsletter",
									"class" => "",
									"category" => __('Rise', SH_NAME),
									"icon" => 'fa-briefcase' ,
									"params" => array(
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Title", SH_NAME),
										   "param_name" => "title",
										   "description" => __("Enter Title for Newsletter Section.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Botton Text", SH_NAME),
										   "param_name" => "button_text",
										   "description" => __("Enter Botton Text.", SH_NAME)
										),
										array(
										   "type" => "textfield",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Feed ID", SH_NAME),
										   "param_name" => "f_id",
										   "description" => __("Enter Feed.", SH_NAME)
										),
									)
								);
														
$sh_sc = apply_filters( '_sh_shortcodes_array', $sh_sc );
	
return $sh_sc;