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
		<script type="text/javascript" src="../js/team_show.js"></script>

		<?php wp_head();  ?>

 

	</head>
	<body <?php body_class(); ?>>

		
		

			<!-- header -->
<header>
<div class = "row col-lg-12 col-md-12 col-sm-12 col-xs-12">



  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>

    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class='nav main_nav nav-bar nav-bar-center'>
              <li><a href='#Home'>Home</a></li>
              <li><a href='#Charities'>Charities</a></li>
              <li><a href='#Events'>Events</a></li>
              <li><a href='#Team'>Team</a></li>
              <li><a href='#Projects'>Projects</a></li>
              <li><a href='#Sponsors'>Sponsors</a></li>
          </ul>
      </div>
    </div>
  </nav>
  

</div>
<div class="container">
  <div class="col-xs-12 row">
  	<div class='col-xs-2'></div>
      	<div class ="col-xs-8" id="logo"><img src="http://justbkause.org/wp-content/uploads/2015/09/just-B-Kause-logo.png"></div>
      	<div class='col-xs-2'></div>
  </div>
  
  

</header>
			<!-- /header -->

