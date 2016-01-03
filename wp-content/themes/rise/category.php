<?php $options = _WSH()->option(); //printr($options);
	get_header();
	global $wp_query;
	
	$qo = get_queried_object();
	$sizes = array( 1 => '1142x470', 2 => '1142x470', 3 => '360x200', 4 => '264x150' );
	
	$col_num = sh_set( $options, 'category_column_number', 1 );
	$image = sh_set( $options, 'category_bg_image' );
	$image = ( $image ) ? $image : get_template_directory_uri().'/images/resource/banner-1.jpg';
	$is_home = true;
	$sidebar = sh_set( $options, 'category_page_sidebar', 'default-sidebar' );
	
	
	$size = sh_set( $sizes, $col_num );
	
if($image): ?>

	<article class="banner" style="background-image:url(<?php echo $image; ?>);">
		<div class="container">
			<h1><?php echo wp_title(''); ?></h1>
			<?php if(!$is_home) echo get_the_breadcrumb(); ?>
		</div>
	</article>

<?php endif; ?>

<article class="section">

	<div class="container">
	
		<?php if($sidebar): ?> 
			<div class="row">
				<div class="col-md-9 contents">	
		<?php endif ;
			
		echo sh_blogposts( '' , $col_num , $size); 
		
		_the_pagination(); 
		
		wp_reset_query();
		
		if($sidebar): ?> 
			</div>
		<?php endif ; 
			
		if($sidebar): ?>        
			<div class="col-md-3 sidebar">
				   <?php dynamic_sidebar($sidebar); ?>     
			</div>
		</div>
		<?php endif; ?>
	
	</div>

</article>

<?php get_footer(); ?>