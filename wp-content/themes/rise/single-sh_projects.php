<?php 
	get_header();
	$meta = get_post_meta(get_the_ID() , 'projects_meta' , true); 
	$target = sh_set($meta, 'terget') ;
	$raised = sh_set($meta, 'raised') ;
	$location = sh_set($meta, 'location');
	$cover_photo = sh_set($meta , 'image');
	$outer_class = (!sh_set($meta , 'sidebar')) ? 'col-md-12' : 'col-md-9' ;
	$date = explode ('-' , sh_set($meta , 'date'));
	$post_title = get_the_title();
	$month = array (
				'01' => 'January' ,
				'02' => 'February' ,
				'03' => 'March' ,
				'04' => 'April' ,
				'05' => 'May' ,
				'06' => 'June' ,
				'07' => 'July' ,
				'08' => 'August' ,
				'09' => 'September' ,
				'10' => 'October' ,
				'11' => 'November' ,
				'12' => 'December'
				);
	if($cover_photo):
	
?>

<article class="banner" style="background-image:url(<?php echo $cover_photo ?>);">

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

                    <figure class="hover-strip hovered-strip animated" data-animation="bounceIn" data-delay="0">

                        <?php the_post_thumbnail('825x380'); ?>

                        <figcaption>

                            <div class="btm-wrap">

                                <span><i class="fa fa-crosshairs"></i><?php echo "$$raised / $$target raised"; ?></span>

                                <span><i class="fa fa-map-marker"></i><?php echo $location ; ?></span>

                            </div>

                        </figcaption>

                    </figure>

                    <h4><?php echo get_the_title(); ?></h4>

                    <ul class="options">

                        <li>
							<i class="fa fa-calendar"></i>
							<?php echo sh_set($month , sh_set($date , 1))." $date[2] ,  $date[0]" ; ?>
						</li>

                    </ul>

                    <?php the_content(); ?>

                </div>    
				<?php if (sh_set($meta , 'checkbox')): ?>
                <div class="related-posts grid-2">

                    <h4><?php _e("Related Projects" , SH_NAME); ?></h4>

                    <ul class="media-list">
					  <?php
					  	$count3 = 1 ;
						$args = array('post_type' => 'sh_projects', 'posts_per_page' => 3 ) ;
						$data_delay = 0 ; 
						if( $cat ) 
						  $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => $cat));
						query_posts($args);
						if(have_posts()):  while(have_posts()): the_post(); 
							$related_post_title = get_the_title();
							if($related_post_title == $post_title) continue;
							$metas = get_post_meta(get_the_ID() , 'projects_meta' , true);
							$r_target = sh_set($metas, 'terget') ;
							$r_raised = sh_set($metas, 'raised') ;
							$r_location = sh_set($metas, 'location');
					  ?>
                        <li class="media animated" data-animation="fadeInLeft" data-delay="<?php echo $data_delay ; ?>">

                            <figure class="pull-left">

                                <a class="pull-left" href="<?php the_permalink(); ?>">

                                    <?php the_post_thumbnail('thumbnail'); ?>

                                </a>

                            </figure>

                            <div class="media-body">

                                <h5 class="media-heading">
								
									<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									
								</h5>

                                <ul class="options">

                                    <li>
										<i class="fa fa-crosshairs"></i><?php echo "$$r_raised / $$r_target"; ?>
									</li>

                                    <li>
										<i class="fa fa-map-marker"></i><?php _e("In" , SH_NAME); ?> <?php echo $r_location ; ?>
									</li>

                                </ul>

                                <p><?php echo substr(get_the_excerpt(), 0,80); ?>... <a href="<?php the_permalink(); ?>"><?php _e("[Read More]" , SH_NAME); ?></a></p>

                            </div>

                        </li>
					  <?php
					  	if($count3 == 2) break;
							$count3++;
					  	$data_delay = $data_delay + 200 ;
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