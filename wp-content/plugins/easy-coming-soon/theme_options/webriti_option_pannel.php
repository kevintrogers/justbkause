<div class="wrap settings-wrap" id="page-settings">
    <h2><?php _e('Settings >>','commingsoon'); ?></h2>
    <div id="option-tree-header-wrap">
        <ul id="option-tree-header">
            <li id=""><a href="" target="_blank"></a></li>
            <li id="option-tree-version"><span><?php _e('Easy Coming Soon Plugin','commingsoon'); ?></span></li>
			<a style="margin-right:16px;" target="_blank" href="<?php bloginfo("url"); ?>/?my_preview=true&TB_iframe=true&width=500&height=532" class="button button-primary button-large fb-btn"><?php _e('Preview','commingsoon'); ?></a>
			<a style="margin-right:16px;" target="_blank" href="http://webriti.com/easy-coming-soon-pro-detail-page/" class="button button-primary button-large fb-btn"><?php _e('Upgrade to Pro version','commingsoon'); ?></a>
            <a style="margin-right:16px;" target="_blank" href="https://wordpress.org/plugins/easy-coming-soon" class="button button-primary button-large fb-btn"><?php _e('Rate us on wordpress','commingsoon'); ?></a>
        </ul>
		
    </div>
    <div id="option-tree-settings-api">
    <div id="option-tree-sub-header"></div>
        <div class = "ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul>
				
                <li id="tab_create_setting"><a href="#section_general"><?php _e('General Settings','commingsoon');?></a>
                </li>
				<li id="tab_design_setting"><a href="#section_design"><?php _e('Design','commingsoon');?></a>
                </li>
                <li id="tab_notification_setting"><a href="#section_notification"><?php _e('Notification','commingsoon');?></a>
                </li>
                <li id="tab_templates_setting"><a href="#section_templates"><?php _e('Templates','commingsoon');?></a>
                </li>
                <li id="tab_live_preview_setting"><a href="#section_live_preview"><?php _e('Live Preview','commingsoon');?></a>
                </li>
                <li id="tab_pro_features_setting"><a href="#section_pro_features"><?php _e('Pro Features','commingsoon');?></a>
                </li>
                <li id="tab_aboutpro_version_setting"><a href="#section_aboutpro_version"><?php _e('Whats included in the Pro Version','commingsoon');?></a>
                </li>
				<li id="tab_about_show_some_love"><a href="#section_about_show_some_love"><?php _e('Show Some Love','commingsoon');?></a>
                </li>
                <li id="tab_about_vid_tutorial"><a href="#section_about_vid_tutorial"><?php _e('Video Tutorial','commingsoon');?></a>
                </li>
               
            </ul>
    <div id="poststuff" class="metabox-holder">
        <div id="post-body">
			<div id="post-body-content">
                <div id="section_general" class = "postbox">
                    <div class="inside">
                        <div id="setting_theme_options_ui_text" class="format-settings">
                            <div class="format-setting-wrap">             
                    <?php load_template( dirname( __FILE__ ) . '/pages/header_page_settings.php' );  ?>    
                </div>
            </div>
        </div>
    </div>

    
	<div id="section_design" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
		<?php  load_template( dirname( __FILE__ ) . '/pages/design_page_settings.php' ); ?>
                                              
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>


    <div id="section_notification" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
        <?php  load_template( dirname( __FILE__ ) . '/pages/notification_page_setting.php' ); ?>
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section_templates" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
        <?php  load_template( dirname( __FILE__ ) . '/pages/template_page_settings.php' ); ?>
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="section_live_preview" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
        <?php  load_template( dirname( __FILE__ ) . '/pages/live_preview_settings.php' ); ?>
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="section_pro_features" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
        <?php  load_template( dirname( __FILE__ ) . '/pages/pro_features_settings.php' ); ?>
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="section_aboutpro_version" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
        <?php  load_template( dirname( __FILE__ ) . '/pages/aboutpro_version_settings.php' ); ?>
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div id="section_about_show_some_love" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
				  <div class = "format-setting type-textarea has-desc">
					<div class = "format-setting-inner">
						<div class="block ui-tabs-panel active" id="option-ui-id-5" >
							<form method="post" id="commingsoon_lite_theme_options_5">
									<div id="heading">
										<table style="width:100%;"><tr>
											<td><h2><?php _e('Show Some Love','commingsoon');?></h2>
											<br>
											<p>Like this plugin? Show your support by:</p>
											</td>
											<td style="width:30%;">
											</td>
											<td style="text-align:right;">					
												
											</tr>
										</table>			
									</div>

									<div class="section">
										<a class="button button-primary button-large" target="_blank" href="https://wordpress.org/support/view/plugin-reviews/easy-coming-soon">Rate It</a>
										<a class="button button-primary button-large" target="_blank" href="http://twitter.com/share?url=https%3A%2F%2Fwordpress.org%2Fplugins%2Feasy-coming-soon%2F&amp;text=Check out this awesome %23WordPress Plugin I'm using,  Easy Coming Soon by @webriti"><i class="fa fa-twitter"></i>Tweet It</a>
										<a class="button button-primary button-large" target="_blank" href="http://webriti.com/easy-coming-soon-pro-detail-page/">Buy Pro</a>
									</div>	
							</form>
						</div>								  
					</div>
				</div>
				</div>
			</div>
		</div>
    </div>
	



	<div id="section_about_vid_tutorial" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
				  <div class = "format-setting type-textarea has-desc">
					<div class = "format-setting-inner">
						<div class="block ui-tabs-panel active" id="option-ui-id-5" >
							<form method="post" id="commingsoon_lite_theme_options_5">
									<div id="heading">
										<table style="width:100%;"><tr>
											<td><h2><?php _e('Fully Functional Coming Soon Page in 30 minutes','commingsoon');?></h2>
											<br>
											<p>In this <a target = "_blank" href = "https://www.youtube.com/watch?v=jwXOO9DDSpY"> Video Tutorial </a> , I will demonstrate how you can create a fully functional Coming Soon Page in as little as 30 minutes.</p>
											<p> Here is what we the Landing page will look like.
											<div class="span6" style="width:100%">
		<img  style="height:50%; width:50%" src="<?php echo plugins_url('/pages/images/img/video-thumb.jpg',__FILE__);?>" alt="" style="width:100%"> 
	</div>
                                            <br></br>
											
											<b>This video tutorial is for the premium version of the plugin. As you can see, it has:</b>
										    <br></br>
											
											<ul>1. Company Logo</ul>
											<ul>2. An Image Slide Show BackGround</ul>
											<ul>3. Email Capture Box, with option to Capture First Name and Last Name</ul>
											<ul>4. CountDown Timer</ul>
											<ul>5. A Progress Bar</ul>
											<ul>6. Social Media Icons</ul>
											<ul>7. The Video also contains a brief overview of the features like Multiple Templates, Ip based access, Newsletter Integration etc. </ul>
											
											
										</p>The premium version is priced at 29 USD and lets you use the plugin on unlimited website. </p>
											<p>Here is the <a target = "_blank" href = "https://youtu.be/JEbKUdvbzys">link to the Video.</a> Enjoy!!!</p>
											</td>
											<td style="width:30%;">
											</td>
											<td style="text-align:right;">					
												
											</tr>
										</table>			
									</div>

									
							</form>
						</div>								  
					</div>
				</div>
				</div>
			</div>
		</div>
    </div>






		</div>
    </div>
    </div>
	<div class="webriti-submenu" style="height:35px;">			
            <div class="webriti-submenu-links" style="margin-top:5px;">
			<form method="POST">
				<input type="submit" onclick="return confirm( 'Click OK to reset Plugin data. Theme settings will be lost!' );" value="Restore All Defaults" name="restore_all_defaults" id="restore_all_defaults" class="reset-button btn">
			<form>
            </div><!-- webriti-submenu-links -->
        </div>
        <div class="clear"></div>
        </div>
    </div>
</div>

<?php
$general_default_settings = array(

    // general page settings

    'status'=>'1',
    'background'=>'',
    'title'=>'',
    'descrip'=>'',
    'google_code'=>'',
    'fb'=>'',
    'twit'=>'',
    'gp'=>''

    );
$design_page_setting =  array(

    // design page settings
    'background_color'=>'#21759B',
    'title_color'=>'#ffffff',
    'descrip_color'=>'#ffffff',
    'title_font_size'=>'30',
    'title_font_format'=>'Arial Black, sans-serif',
    'description_font_size'=>'20',
    'description_font_format'=>'Verdana, Geneva, sans-serif',
    'background_effect'=>'0'

    );
$notification_default_settings = array(

    // notification page settings

    'mailto'=>'no',
    'email_address'=>'',
    'message'=>'Thanks for subscribing this page',
    'sb_btn'=>'',
    'placeholder_text'=>''

    );
// Restore all defaults
if(isset($_POST['restore_all_defaults'])) 
	{
		update_option('soon_page_settings',$general_default_settings);
        update_option('soon_page_desgin_settings',$design_page_setting);
        update_option('soon_page_notification_settings',$notification_default_settings);
	}
?>