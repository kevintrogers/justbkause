<!doctype html>
<html>
<head>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
  <script>
    $(document).ready(function(){
      $( ".team_bio" ).hide();
  
      $("#bio_btn_1").click(function(){
        $("#team_bio_1").show("slow");
        $("#bio_btn_1").hide();
      });
       $("#bio_btn_2").click(function(){
        $("#team_bio_2").show("slow");
        $("#bio_btn_2").hide();
      });
       $("#bio_btn_3").click(function(){
        $("#team_bio_3").show("slow");
        $("#bio_btn_3").hide();
      });
    
    });

  </script>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen">
<title><?php wp_title(); ?></title>
</head>
<header>
<div class="col-xs-2 margin"></div>
<div class="col-xs-8 row">
    <div class ="col-xs-3" id="logo"><img src="http://justbkause.org/wp-content/uploads/2015/09/just-B-Kause-logo.png"</div>
    <div class='col-xs-5'></div>
</div>

<div class ='row col-xs-8'>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class='nav nav-bar nav-bar-center'>
            <li><a href='#Home'>Home</a></li>
            <li><a href='#Charities'>Charities</a></li>
            <li><a href='#Events'>Events</a></li>
            <li><a href='#Team'>Team</a></li>
            <li><a href='https://justbkause-justbkause.c9.io/projects-4/'>Projects</a></li>
            <li><a href='#Sponsors'>Sponsors</a></li>
        </ul>
    </div>
</div>
<div class="col-xs-2 margin"></div>
</header>
<body>