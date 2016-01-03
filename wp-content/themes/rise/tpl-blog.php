<?php 
	/* Template Name: Blog Page */
	get_header();
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
	$size = '1142x470';
	
	if (sh_set($template_file , 'column_number') == 2):
		$size = '1142x470'; 
	endif;
	
	if (sh_set($template_file , 'column_number') == 3):
		$size = '360x200'; 
	endif;
	
	if (sh_set($template_file , 'column_number') == 4):
		$size = '264x150'; 
	endif;
	
	if(sh_set($template_file , 'image')): 
?>
<article class="banner" style="background-image:url(<?php echo sh_set($template_file , 'image'); ?>);">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php if(!sh_set($template_file , 'is_home')) echo get_the_breadcrumb(); ?>
	</div>
</article>
<?php endif; ?>
<article class="section">
	<div class="container">
	<?php if(sh_set($template_file , 'sidebar')): ?> 
		<div class="row">
			<div class="col-md-9 contents">	
	<?php 
		endif ;
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array('post_type' => 'post', 'paged'=>$paged) ;
		
		query_posts($args);
				
		echo sh_blogposts( '' , sh_set($template_file , 'column_number') , $size); 
		
		_the_pagination(); 
		
		wp_reset_query();
		
		if(sh_set($template_file , 'sidebar')): 
	?> 
		</div>
	<?php 
		endif ; 
		
		if(sh_set($template_file , 'sidebar')): ?>        
			<div class="col-md-3 sidebar">
				   <?php dynamic_sidebar(sh_set($template_file , 'sidebar')); ?>     
			</div>
		</div>
	<?php endif; ?>
	</div>
</article>
<?php get_footer(); ?>