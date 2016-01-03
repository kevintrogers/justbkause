<?php
	ob_start() ;
	$data_delay = 200;
?>
<article class="parallex-section" style="background-image:url(<?php echo sh_set(wp_get_attachment_image_src($bg , 'full') , 0 ) ?>);">
        <div class="container">
            <header class="heading text-center animated" data-animation="flipInX" data-delay="0">
                <h2><?php echo $title; ?></h2>
            </header>
            <div class="row">
			<?php 
				$data_delay = 0;
				$args = array('post_type' => 'sh_events' , 'posts_per_page' => $number ) ; 
				if( $cat ) 
					$args['tax_query'] = array(array('taxonomy' => 'events_category','field' => 'id','terms' => $cat));
				query_posts($args);
				if(have_posts()):  while(have_posts()): the_post(); 
				$outer_class = ($data_delay==0) ? 'col-md-6  col-sm-12' : 'col-md-3  col-sm-6' ; 
				$inner_class = ($data_delay==0) ? 'event-box-featured' : '' ; 
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
			?>
                <div class="<?php echo $outer_class; ?> col-xs-12">
				
                    <div class="event-box <?php echo $inner_class;  ?> animated" data-animation="fadeIn" data-delay="<?php echo $data_delay; ?>">
                        <figure class="image"> 
							<?php 
							if($data_delay == 0)
								the_post_thumbnail('825x380'); 
							if ($data_delay != 0): 
								the_post_thumbnail('555x311');
							?>
								<figcaption>
									<h6><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
									<span>
										<i class="fa fa-clock-o"></i>
										<?php echo sh_set($meta , 'start_time' ); ?>
									</span> 
								</figcaption>
							<?php endif; ?> 
						</figure>
                        <div class="text">
                            <h5>
								<a href="<?php the_permalink(); ?>">
									<?php echo get_the_title(); ?>
								</a>
							</h5>
                            <ul class="options">
                                <li class="event-date">
									<i class="fa fa-calendar"></i>
									<span><?php echo $date[2] ; ?></span>
									<?php echo sh_set($month , $date[1]) ?> 
								</li>
                                <li class="event-time">
									<i class="fa fa-clock-o"></i>
									<?php echo sh_set($meta , 'start_time' ); ?>
								</li>
                                <li class="event-location">
									<i class="fa fa-map-marker"></i>
									<?php echo sh_set( $meta , 'location') ?>
								</li>
                            </ul>
                            <p><?php echo substr(get_the_excerpt(), 0,220); ?></p>
                        </div>
                    </div>
                </div>
			<?php 
				$data_delay = $data_delay + 200;
				endwhile ; endif ;
				wp_reset_query();
			?>
            </div>
        </div>
    </article>
<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output ; 
?>