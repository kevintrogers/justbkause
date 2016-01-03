<?php 
	/* Template Name: Gallery Page */
	get_header();
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
	$size = '555x311';
	
	if (sh_set($template_file , 'column_number') == 1):
		$size = '1142x470'; 
	endif;	
	if (sh_set($template_file , 'column_number') == 3):
		$size = '360x232'; 
	endif;
	
	if (sh_set($template_file , 'column_number') == 4):
		$size = '360x232'; 
	endif;
	$gallery_post_meta = get_post_meta(get_the_ID(), 'gallery_meta', true);
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
		<div class="col-md-9 contents">
	<?php endif ; ?>
	
		<div class="gallery grid-<?php echo sh_set($template_file , 'column_number'); ?>">
			<ul>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('post_type' => 'sh_gallery' , 'paged'=>$paged ) ; 
				query_posts($args);
				if(have_posts()):  while(have_posts()): the_post(); 
				global $post ;
				$img_src = sh_set(wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'full') , 0);
				
				if(has_post_thumbnail()):
				?>
				<li>
					<div class="image-box">
						<figure class="image">
						<?php the_post_thumbnail($size); ?>
							<figcaption>
								<a title="<?php echo get_the_title(); ?>" data-rel="prettyPhoto" href="<?php echo $img_src; ?>" class="image-zoom"><i class="glyphicon glyphicon-zoom-in"></i></a>
								<a href="<?php the_permalink(); ?>" class="image-anchor"><i class="glyphicon glyphicon-link"></i></a>
							</figcaption>
						</figure>
					</div>
				</li>
				<?php 
					endif;
					
					endwhile ; endif ;
				?>
			</ul>
		</div>
		
		<?php 
			_the_pagination(); 
			wp_reset_query();
		?>
		
	<?php if(sh_set($template_file , 'sidebar')): ?> 
		</div>
	<?php 
		endif ; 
		
		if(sh_set($template_file , 'sidebar')): ?>        
			<div class="col-md-3 sidebar">
				   <?php dynamic_sidebar(sh_set($template_file , 'sidebar')); ?>     
			</div>
	<?php endif; ?>
	
	</div>
</article>	




<?php get_footer(); ?>