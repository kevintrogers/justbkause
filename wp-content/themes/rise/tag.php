<?php 
	get_header(); 
	$theme_options = _WSH()->option();
	$template_file = array('column_number' => sh_set($theme_options , 'tag_column_number') );
	$column_size = sh_set($theme_options , 'tag_column_number');
	$size = '1142x470';
	if ($column_size == 2):
		$size = '1142x470'; 
	endif;
	
	if ($column_size == 3):
		$size = '360x200'; 
	endif;
	
	if ($column_size == 4):
		$size = '264x150'; 
	endif;
	
	if(sh_set($theme_options , 'tag_bg_image')):
?>
<article class="banner" style="background-image:url(<?php echo sh_set($theme_options , 'tag_bg_image');?>);">
	<div class="container">
		<h1><?php echo single_tag_title(); ?></h1>
		<?php if(sh_set($theme_options , 'tag_breadcrum'))echo get_the_breadcrumb(); ?>
	</div>
</article>
<?php endif; ?>
<article class="section">
	<div class="container">
	<?php if(sh_set($theme_options , 'tag_page_sidebar')): ?> 
		<div class="row">
			<div class="col-md-9 contents">	
	<?php 
		endif ;
		
		echo sh_blogposts( '' , $template_file , $size); 
		
		_the_pagination(); 
		
		wp_reset_query();
		
		if(sh_set($theme_options , 'tag_page_sidebar')): 
	?> 
		</div>
	<?php 
		endif ; 
		
		if(sh_set($theme_options , 'tag_page_sidebar')): ?>        
			<div class="col-md-3 sidebar">
				   <?php dynamic_sidebar(sh_set($theme_options , 'tag_page_sidebar')); ?>     
			</div>
		</div>
	<?php endif; ?>
	</div>
</article>
<?php get_footer(); ?>