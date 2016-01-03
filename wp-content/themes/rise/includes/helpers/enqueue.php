<?php

class SH_Enqueue
{


	function __construct()

	{

		add_action( 'wp_enqueue_scripts', array( $this, 'sh_enqueue_scripts' ) );

		add_action( 'wp_head', array( $this, 'wp_head' ) );

		add_action( 'wp_footer', array( $this, 'wp_footer' ) );

	}


	function sh_enqueue_scripts()
	{
		global $post;
		$options = get_option(SH_NAME.'_theme_options');
		
		$protocol = is_ssl() ? 'https' : 'http';
		if(sh_set($options , 'show_rtl')){
		$styles = array( 'fonts.googleapis' => $protocol.'://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600',
						 'font-awesome' => 'css/font-awesome.css',
						 'revolution-slider-settings' => 'css/revolution-slider/settings.css', 
						 'bootstrap' => 'css/bootstrap.css',
						 'style' => 'style.css',
						 'color' => 'css/color.css',
						 'prettyPhoto' => 'css/prettyPhoto.css',
						 'responsive' => 'css/responsive.css',
						 'animate' => 'css/animate.css',
						 'rtl' => 'css/rtl.css',
					   );
		}
		else{
		$styles = array( 'fonts.googleapis' => $protocol.'://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600',
						 'font-awesome' => 'css/font-awesome.css',
						 'revolution-slider-settings' => 'css/revolution-slider/settings.css', 
						 'bootstrap' => 'css/bootstrap.css',
						 'style' => 'style.css',
						 'color' => 'css/color.css',
						 'prettyPhoto' => 'css/prettyPhoto.css',
						 'responsive' => 'css/responsive.css',
						 'animate' => 'css/animate.css',
					   );
		}
		foreach( $styles as $name => $style )
		{

			if(strstr($style, 'http') || strstr($style, 'https') ) 
				wp_enqueue_style( $name, $style);
			else {
				if( file_exists( get_stylesheet_directory().'/'.$style ) ) wp_enqueue_style( $name, get_stylesheet_directory_uri().'/'.$style);
				else wp_enqueue_style( $name, SH_URL.$style);
			}
		}

		$scripts = array( 
						  
						  'bootstrap.min' => 'js/bootstrap.min.js',
						  'dscountdown.min'	=> 'js/dscountdown.min.js',
						  'jquery.appear'	=> 'js/jquery.appear.js',
						  'jquery.prettyPhoto'	=> 'js/jquery.prettyPhoto.js',
						  'jquery.carouFredSel-6.2.1-packed' => 'js/jquery.carouFredSel-6.2.1-packed.js',
						  //'jquery.themepunch.revolution.min' => 'js/jquery.themepunch.revolution.min.js',
						  //'maps.googleapis' => $protocol.'://maps.googleapis.com/maps/api/js?v=3.exp',
						  'script' => 'js/script.js',
						  'jflickrfeed.min'=>'js/jflickrfeed.min.js',
						 );
		foreach( $scripts as $name => $js )
		{
			if(strstr($js, 'http') || strstr($js, 'https') ) 
				wp_register_script( $name, $js, '', '', true);
			else
				wp_register_script( $name, SH_URL.$js, '', '', true);
			
		}
		wp_enqueue_script( array(
						'jquery',
						'bootstrap.min',
						'dscountdown.min',
						'jquery.appear',
						'jquery.prettyPhoto',
						'jquery.carouFredSel-6.2.1-packed',
						'script',
						'maps.googleapis',
						'jflickrfeed.min',
						));
		
		if( is_singular() ) wp_enqueue_script('comment-reply');
				
		
	}
	function wp_head()
	{
		$opt = _WSH()->option();
		
		sh_theme_color_scheme();?>
		
		<style type="text/css">
			<?php
			if( sh_set( $opt, 'body_custom_font') )
			echo sh_get_font_settings( array( 'body_font_size' => 'font-size', 'body_font_family' => 'font-family', 'body_font_style' => 'font-style', 'body_font_color' => 'color', 'body_line_height' => 'line-height' ), 'body, p {', '}' );
			
			if( sh_set( $opt, 'use_custom_font' ) ){
				echo sh_get_font_settings( array( 'h1_font_size' => 'font-size', 'h1_font_family' => 'font-family', 'h1_font_style' => 'font-style', 'h1_font_color' => 'color', 'h1_line_height' => 'line-height' ), 'h1 {', '}' );
				echo sh_get_font_settings( array( 'h2_font_size' => 'font-size', 'h2_font_family' => 'font-family', 'h2_font_style' => 'font-style', 'h2_font_color' => 'color', 'h2_line_height' => 'line-height' ), 'h2 {', '}' );
				echo sh_get_font_settings( array( 'h3_font_size' => 'font-size', 'h3_font_family' => 'font-family', 'h3_font_style' => 'font-style', 'h3_font_color' => 'color', 'h3_line_height' => 'line-height' ), 'h3 {', '}' );
				echo sh_get_font_settings( array( 'h4_font_size' => 'font-size', 'h4_font_family' => 'font-family', 'h4_font_style' => 'font-style', 'h4_font_color' => 'color', 'h4_line_height' => 'line-height' ), 'h4 {', '}' );
				echo sh_get_font_settings( array( 'h5_font_size' => 'font-size', 'h5_font_family' => 'font-family', 'h5_font_style' => 'font-style', 'h5_font_color' => 'color', 'h5_line_height' => 'line-height' ), 'h5 {', '}' );
				echo sh_get_font_settings( array( 'h6_font_size' => 'font-size', 'h6_font_family' => 'font-family', 'h6_font_style' => 'font-style', 'h6_font_color' => 'color', 'h6_line_height' => 'line-height' ), 'h6 {', '}' );
			}

			echo sh_set( $opt, 'header_css' );
			?>
		</style>
	
		<?php 
	}
	
	function wp_footer()
	{

		$analytics = sh_set( _WSH()->option(), 'footer_analytics');
				
		if( $analytics ): ?>
			<script type="text/javascript">
                <?php echo $analytics;?>
            </script>
        <?php endif;
	}

}