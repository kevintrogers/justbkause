<?php 
	/* Template Name: Events */
	get_header();
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
	$outer_class = (!sh_set($template_file , 'sidebar')) ? 'col-md-12' : 'col-md-9' ;
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
		<div class="<?php echo $outer_class ; ?> contents">
			<div class="projects events-list">
				<ul class="media-list">
				<?php 
				$data_delay = 0;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('post_type' => 'sh_events' , 'paged'=>$paged ) ;
				query_posts($args);
				if(have_posts()):  while(have_posts()): the_post();  
				$meta = get_post_meta(get_the_ID() , 'events_meta' , true);
				$date = explode ('-' , sh_set($meta , 'start_date'));
				$month = array (
							'01' => 'Jan' ,
							'02' => 'Feb' ,
							'03' => 'March' ,
							'04' => 'April' ,
							'05' => 'May' ,
							'06' => 'June' ,
							'07' => 'July' ,
							'08' => 'Aug' ,
							'09' => 'Sep' ,
							'10' => 'Oct' ,
							'11' => 'Nov' ,
							'12' => 'Dec'
							);
				$img_src = sh_set(wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'full') , 0);
			?>
					<li class="media animated" data-animation="fadeInLeft" data-delay="0">
						<figure class="image-appear pull-left full_width">
							<?php the_post_thumbnail('555x311'); ?>
							<figcaption>
								<a class="image-zoom" href="<?php echo $img_src ; ?>" data-rel="prettyPhoto" title="<?php echo get_the_title(); ?>">
									<i class="glyphicon glyphicon-zoom-in"></i>
								</a>
								<a class="image-anchor" href="<?php the_permalink(); ?>">
									<i class="glyphicon glyphicon-link"></i>
								</a>
							</figcaption>                            
						</figure>
						<div class="media-body">
							<header class="post-heading">
								<div class="date-tag">
									<span><?php echo $date[2] ; ?></span>
									<?php echo sh_set($month , $date[1]) ?>
								</div>
								<h4 class="media-heading">
									<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
								</h4>
								<ul class="options">
									<li><i class="fa fa-clock-o"></i><?php echo sh_set($meta , 'start_time' ); ?></li>
									<li><i class="fa fa-map-marker"></i><?php echo sh_set( $meta , 'location') ?></li>
								</ul>
							</header>
							<p>
								<?php echo substr(get_the_excerpt(), 0,180); ?>...
								<a href="<?php the_permalink(); ?>"><?php _e("[Read More]" , SH_NAME); ?></a>
							</p>
						</div>
					</li>
				<?php 
					endwhile ; endif ;
					
				?>
				</ul>
			</div>
			<?php _the_pagination(); 
			wp_reset_query();
			?>
			
		</div>
		<?php if(sh_set($template_file , 'sidebar')): ?>        
		<div class="col-md-3 sidebar">
			   <?php dynamic_sidebar(sh_set($template_file , 'sidebar')); ?>     
		</div>
		<?php endif; ?>
	</div>

</article>
<?php get_footer(); ?>