<!doctype html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">


		<?php wp_head();  ?>
<script type="text/javascript" src="/js/fonts.js"></script> 
		<script type="text/javascript" src="/js/team_show.js"></script> 
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/team_show.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fonts.js"></script>

	</head>
	<body <?php body_class(); ?>>

		
		

			<!-- header -->
<header>



  <div class="container-fluid" id ="top">
    <nav class="navbar navbar-inverse">

    <div class="row navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
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
        <ul class='nav main_nav nav-bar nav-bar-center'>
            <li><a href='#Home'>Home</a></li>
            <li><a href='justbkause-justbkause.c9.io/causes/'>Causes</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/our-events/'>Events</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/team/'>Team</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/projects-4/'>Projects</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/projects/sponsors-3'>Sponsors</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/projects/media'>Media</a></li>
          <ul class='social_list'>
            <li><a href='https://www.facebook.com/Just-B-Kause-413609302144464/?ref=hl'>
              <img src='http://justbkause.org/wp-content/uploads/2015/11/facebook_border.png'></a></li>
            <li><a href='https://twitter.com/JustBKause'>
              <img src='http://justbkause.org/wp-content/uploads/2015/11/twitter_t_border.png'></a></li>
            <li><a href='#'>
              <img src='http://justbkause.org/wp-content/uploads/2015/11/instagram_color.png'></a></li>
          </ul>
        </ul>
        

       
      </div>
   </div>
    

  </nav>
  


<div class="container">
  <div class="col-xs-12 row">
  	<div class='col-xs-2'></div>
      	<div class ="col-xs-8" id="logo"><img src="http://justbkause.org/wp-content/uploads/2015/09/just-B-Kause-logo.png"></div>
      	<div class='col-xs-2'></div>
  </div>
  
  

</header>
			<!-- /header -->

