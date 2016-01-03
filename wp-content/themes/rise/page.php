<?php 
	$page_meta = get_post_meta(get_the_ID() , 'page_meta' , true);
	if(!sh_set($page_meta , 'is_blog_page')):
	
	get_header();	
	$meta = get_post_meta(get_the_ID() , 'page_meta' , true);
	$sidebar = sh_set($meta , 'sidebar');
	$cover_photo = sh_set($meta , 'image');
	$outer_class = (!$sidebar) ? 'col-md-12' : 'col-md-9' ;
	//printr ($meta); exit;
	if(!(is_home() || is_front_page()) && $cover_photo):
?>
<article class="banner" style="background-image:url(<?php echo $cover_photo ?>);">

	<div class="container">
	
	
		<h1><?php  the_title(); ?></h1>
	
		<?php if(!sh_set($page_meta , 'is_home')) echo get_the_breadcrumb(); ?>
	
	</div>

</article>
<?php endif; ?>
<article class="section">

        <div class="container">
		
		  
		<div class="<?php echo $outer_class ; ?> contents">

			<?php while(have_posts()): the_post(); ?>
				<div class="details">
	
					<figure class="image animated" data-animation="fadeIn" data-delay="0">
	
						<?php the_post_thumbnail('825x380'); ?>
	
					</figure>
	
					<h4><?php echo get_the_title(); ?></h4>
	
					<ul class="options">
	
						<li><i class="fa fa-user"></i><?php echo get_the_author(); ?></li>
	
						<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
						
						<?php if(the_category()): ?>
	
						<li><i class="fa fa-tag"></i><?php echo the_category( ' , '); ?></li>
						
						<?php endif; ?>
	
					</ul>
	
					<div class="entry-cotent clearfix"><?php the_content(); ?></div>
	
					
	
					<div class="share-bar animated" data-animation="fadeInUp" data-delay="0">
	
						<div class="addthis_toolbox addthis_default_style">
	
							<p><?php _e("Share this post" , SH_NAME); ?></p>
	
							<?php echo sh_share_buttons(); ?>
	
						</div>
	
					</div>
	
				</div>

				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		  
		  
			<?php if($sidebar): ?>        
				<div class="col-md-3 sidebar">
					   <?php dynamic_sidebar($sidebar); ?>     
				</div>
			<?php endif; ?>

            

        </div>

    </article>
<?php get_footer(); ?>

<?php 
	elseif(sh_set($page_meta , 'is_blog_page')):
	
	get_header();
	
	global $wp_query;
	$qo = get_queried_object();
	$template_file = get_post_meta($qo->ID , 'page_meta', true);
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
		<h1><?php echo wp_title(''); ?></h1>
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
		
		echo sh_blogposts( '' , $template_file , $size); 
		
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
<?php endif; ?>