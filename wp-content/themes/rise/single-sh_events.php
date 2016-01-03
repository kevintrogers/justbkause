<?php 
	get_header();
	$meta = get_post_meta(get_the_ID() , 'events_meta' , true);
	$target = sh_set($meta, 'target') ;
	$raised = sh_set($meta, 'raised') ;
	$location = sh_set($meta, 'location');
	$tagline = sh_set($meta, 'tag_line');
	$cover_photo = sh_set($meta , 'image');
	$date = explode ('-' , sh_set($meta , 'start_date'));
	$end_date = explode ('-' , sh_set($meta , 'end_date'));
	
	$time = sh_set($meta , 'start_time');
	$end_time = sh_set($meta , 'end_time');
	$post_title = get_the_title();
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
	
	$outer_class = (!sh_set($meta , 'sidebar')) ? 'col-md-12' : 'col-md-9' ;
	$data_delay = 0;
	if($cover_photo):
?>
<article class="banner" style="background-image:url(<?php echo $cover_photo; ?>);">

	<div class="container">
	
		<h1><?php  the_title(); ?></h1>
	
		<?php echo get_the_breadcrumb(); ?>
	
	</div>

</article>
<?php endif; ?>
<article class="section">

	<div class="container">
	
	  <?php while(have_posts()): the_post(); ?>
	  
		<div class="<?php echo $outer_class ; ?> contents">

			<div class="details">

				<figure class="hover-strip hovered-strip animated" data-animation="fadeIn" data-delay="0">

					<?php the_post_thumbnail('825x380'); ?>

					<figcaption>

						<div class="date-tag">
							<span><?php echo $date[2] ; ?></span>
							<?php echo sh_set($month , $date[1]) ?>
						</div>

						<div class="counter">

							<h6><?php _e("Time Left" , SH_NAME); ?></h6>

							<div class="count-down"></div>
							
							<script>
								jQuery(document).ready(function($) {
									//counter
									$('.count-down').dsCountDown({
										endDate: new Date("<?php echo sh_set($month , $end_date[1]); ?> <?php echo $end_date[2] ; ?>, <?php echo $end_date[0] ; ?> 23:59:00")
									});
								});
							</script>
						</div>

					</figcaption>

				</figure>

				<h4><?php echo get_the_title(); ?></h4>

				<ul class="options">

					<?php if( $raised || $target ): ?>
					<li><i class="fa fa-crosshairs"></i><?php echo "$$raised / $$target" ; _e("raised" , SH_NAME); ?></li>
					<?php endif; ?>
					
					<li><i class="fa fa-map-marker"></i><?php echo $location ; ?></li>
					
					<li>
						<i class="fa fa-calendar"></i>
						<?php
							//echo '<strong>'.__("From ",SH_NAME).'</strong>';
							echo '&nbsp;'.date( get_option('date_format'), strtotime(sh_set( $meta, 'start_date'))).' &nbsp; &mdash;';

							echo '&nbsp;'.date( get_option('date_format'), strtotime(sh_set( $meta, 'end_date')));
						?>
					</li>
					
					<li>
						<i class="fa fa-clock-o"></i>
						<?php
							//_e("From ",SH_NAME);
							echo date('h:i a', strtotime($time)).' &mdash; '.date('h:i a', strtotime($end_time));
							
							//echo $end_time;
						?>
					</li>

				</ul>


				<?php the_content() ; ?>

			</div>

			<?php if (sh_set($meta , 'checkbox')): ?>

			<div class="related-posts grid-3">

				<h4><?php _e("Related Events" , SH_NAME); ?></h4>

				<ul class="related-events">
				
				  <?php
				  	$count3 = 1 ;
					$args = array('post_type' => 'sh_events') ; 
					if( $cat ) 
						$args['tax_query'] = array(array('taxonomy' => 'events_category','field' => 'id','terms' => $cat));
					query_posts($args);
					if(have_posts()):  while(have_posts()): the_post(); 
						$related_post_title = get_the_title();
						if($related_post_title == $post_title) continue;
						$metas = get_post_meta(get_the_ID() , 'events_meta' , true);
						$date = explode ('-' , sh_set($metas , 'start_date'));
						
				  ?>
				  
					<li class="animated" data-animation="fadeInLeft" data-delay="0">

						<div class="event-box">

							<figure class="image">

								<?php the_post_thumbnail('555x311'); ?>

							</figure>

							<div class="text">

								<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ; ?></a></h5>

								<ul class="options">

									<li class="event-date">
										<i class="fa fa-calendar"></i>
										<span><?php echo $date[2] ; ?></span> <?php echo sh_set($month , $date[1]) ?>
									</li>

									<li class="event-time">
										<i class="fa fa-clock-o"></i><?php echo sh_set($metas , 'start_time' ); ?>
									</li>

									<li class="event-location">
										<i class="fa fa-map-marker"></i><?php echo sh_set($metas , 'location' ); ?>
									</li>

								</ul>

							</div>

						</div>

					</li>
					
				  <?php
				  		if($count3 == 3) break;
							$count3++;
						endwhile ; endif ;
						wp_reset_query();
					?>
					
				</ul>

			</div>

			<?php endif; ?>	

		</div>

	  <?php endwhile; ?>

		<?php if(sh_set($meta , 'sidebar')): ?>  
		      
            <div class="col-md-3 sidebar">
			
				   <?php dynamic_sidebar(sh_set($meta , 'sidebar')); ?>     
            
			</div>
			
		<?php endif; ?>

		

	</div>

</article>

<?php get_footer(); ?>