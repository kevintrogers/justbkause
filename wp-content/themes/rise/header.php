<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php $theme_options = _WSH()->option();
	$header_social_section = sh_set(sh_set($theme_options , 'header_social_media') , 'header_social_media');
		echo ( sh_set( $theme_options, 'favicon' ) ) ? 
						'<link rel="icon" type="image/png" href="'.sh_set( $theme_options, 'favicon' ).'">':'' ;
	?>
	<?php //printr($theme_options); exit('aaaaa'); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php (is_home() || is_front_page()) ? bloginfo('name') : wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
	<header class="site-header">
        <?php if( (sh_set($theme_options, 'header_phone' ) || sh_set( $theme_options, 'header_email' ) ) || is_array($header_social_section)): ?>
        <div class="tp-bar">
            <div class="container">
                <div class="col-sm-6">
                    <ul class="list-inline">
						<?php if(sh_set( $theme_options, 'header_phone' )):?>
                        <li>
							<i class="fa fa-phone"></i>
							<?php _e("Call" , SH_NAME);?> <?php echo sh_set( $theme_options, 'header_phone' ); ?>
						</li>
						<?php endif; if(sh_set( $theme_options, 'header_email' )):?>
                        <li>
							<i class="fa fa-envelope-o"></i>
							<?php _e("Mail" , SH_NAME);?> : 
							<a href="mailto:<?php echo sh_set( $theme_options, 'header_email' ); ?>">
								<?php echo sh_set( $theme_options, 'header_email' ); ?>
							</a>
						</li>
						<?php endif; ?>
                    </ul>
                </div>
				<?php if(is_array($header_social_section)): ?>
                <div class="col-sm-6">
                    <ul class="social-links">
					<?php 
					
						foreach($header_social_section as $social): 

							$s_icon = sh_set($social , 'social_icon');//str_replace('iconcebook' , 'facebook' , $icon) ;
							if( isset( $social['tocopy'] ) ) continue;
					?>
							<li>
								<a href="<?php echo sh_set($social , 'social_link'); ?>" class="fa <?php echo esc_attr($s_icon);  ?>" data-placement="bottom" data-toggle="tooltip" title="<?php echo sh_set($social , 'title'); ?>"></a>
							</li>
					<?php 
						endforeach; 
					?>
                    </ul>
                </div>
				<?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="logo-bar">
            <div class="container"> 
                
                <!-- logo -->
                <?php if(sh_set($theme_options , 'logo_image') || sh_set($theme_options , 'header_logo_name')): ?>

					<div class="logo"> 
					
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
						
							<?php if(sh_set($theme_options , 'logo_selection')== 'text'): ?>
							
								<span><?php echo sh_set($theme_options , 'header_logo_name'); ?></span> 
							
							<?php else: ?>
							
								<img src="<?php echo sh_set($theme_options , 'logo_image', 'test'); ?>" alt="" height="<?php echo sh_set($theme_options , 'logo_height'); ?>" width="<?php echo sh_set($theme_options , 'logo_width'); ?>">
							
							<?php endif ;?>
						
						</a> 
	
					</div>

				<?php endif; ?>

                <span class="nav-button"></span>
                
                <div class="site-search"> <span class="search-btn"></span>
                    <div class="search-contain">
                        <form method="get" action="<?php echo esc_url(home_url()); ?>">
                            <input type="text" name="s" placeholder="<?php _e("Search..." , SH_NAME); ?>">
                            <input type="submit">
                        </form>
                    </div>
                </div>
				<?php 
					wp_nav_menu(
								array(  
									'theme_location'=>'header_menu', 
									'menu_class'=>'nav navbar-nav' , 
									'container' =>'div' , 
									'container_class'=> 'collapse navbar-collapse pull-right' ,
									'depth' => 2 ,
									'fallback_cb' => null
								)); 
				?>
                
                <!--/.nav-collapse --> 
                
            </div>
        </div>
    </header>