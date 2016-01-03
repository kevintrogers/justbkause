<?php
define('DOMAIN' , 'wp_rise');

define('SH_NAME', 'wp_rise');

define('SH_VERSION', 'v1.0');

define('SH_ROOT', get_template_directory().'/');

define('SH_URL', get_template_directory_uri().'/');

include_once('includes/loader.php');
add_action('after_setup_theme', 'sh_theme_setup');

function sh_theme_setup()
{

	global $wp_version;
	
	load_theme_textdomain(SH_NAME, get_template_directory() . '/languages');

	add_editor_style();

	//ADD THUMBNAIL SUPPORT

	add_theme_support('post-thumbnails');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'header_menu' => __('Main Menu', SH_NAME),
			)
		);
	}
	
	if ( ! isset( $content_width ) ) 
		$content_width = 960;

	add_image_size( '253x310', 253, 310, true );
	add_image_size( '209x236', 209, 236, true );
	add_image_size( '300x370', 300, 370, true );
	add_image_size( '825x380', 825, 380, true );
	add_image_size( '1142x470', 1142, 470, true );
	add_image_size( '555x311', 555, 311, true );
	add_image_size( '360x232', 360, 232, true );
	add_image_size( '370x280', 370, 280, true );

}


function sh_widget_init()
{

	register_widget("TW_featured_posts");
	register_widget("TW_Flickr");
	register_widget("TW_Contact_info");
	register_widget("TW_Contact_form");
	register_widget("TW_Twitter");
	register_widget("TW_Rise_info");
	

	global $wp_registered_sidebars;

	

	register_sidebar(array(

	  'name' => __( 'Default Sidebar', SH_NAME ),

	  'id' => 'default-sidebar',

	  'description' => __( 'Widgets in this area will be shown on the right-hand side.', SH_NAME ),

	  'class'=>'',

	  'before_widget'=>'<div class="widget animated fadeInUp in  %s" data-delay="0" data-animation="fadeInUp">',

	  'after_widget'=>'</div>',

	  'before_title' => '<header class="heading"><h4>',

	  'after_title' => '</h4></header>'

	));

	

	register_sidebar(array(

	  'name' => __( 'Footer Sidebar', SH_NAME ),

	  'id' => 'footer-sidebar',

	  'description' => __( 'Widgets in this area will be shown in Footer Area.', SH_NAME ),

	  'class'=>'',

	  'before_widget'=>'<div class="col-md-3 col-sm-6 col-xs-12"><div class="widget %s">',

	  'after_widget'=>'</div></div>',

	  'before_title' => '<div class="heading"><h4>',

	  'after_title' => '</h4></div>'

	));
	



	$sidebars = sh_set(sh_set( get_option(SH_NAME.'_theme_options'), 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 



	foreach( array_filter((array)$sidebars) as $sidebar)

	{

		if(sh_set($sidebar , 'topcopy')) break ;

		$slug = sh_slug( $sidebar ) ;

		

		register_sidebar( array(

			'name' => sh_set($sidebar , 'sidebar_name'),

			'id' =>  sh_set($slug , 'sidebar_name') ,

			'before_widget' => '<div class="widget">',

			'after_widget' => "</div>",

			'before_title' => '<div class="widget-title"><h4>',

			'after_title' => '</h4></div>',

		) );		

	}

	

	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;

}

add_action( 'widgets_init', 'sh_widget_init' );


// Update items in cart via AJAX
add_filter('add_to_cart_fragments', 'sh_woo_add_to_cart_ajax');
function sh_woo_add_to_cart_ajax( $fragments ) {
    global $woocommerce;

    ob_start();
    ?>
	
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
		<?php echo sprintf(_n('%d item ', '%d items ', $woocommerce->cart->cart_contents_count, SH_NAME), $woocommerce->cart->cart_contents_count); ?> 
		- <?php echo WC()->cart->get_cart_subtotal(); ?>
	</a>
    <?php $fragments['a.cart-contents'] = ob_get_clean();
	
	ob_start();
	
    return $fragments;
}