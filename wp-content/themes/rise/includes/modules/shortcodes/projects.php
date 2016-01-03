<?php
	ob_start() ;
	$data_delay = 200;
?>
<article class="parallex-section" style="background-image:url(<?php echo sh_set(wp_get_attachment_image_src($bg , 'full') , 0 ) ?>);">
        <div class="container">
            <div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="flipInX" data-delay="0">
                <div class="portfolio-left">
                    <header class="heading text-center">
                        <h3><?php echo $title; ?></h3>
                    </header>
                    <p class="text-center"><?php echo $text; ?></p>
                </div>
            </div>
			<?php 
			  $args = array('post_type' => 'sh_projects' , 'posts_per_page' => $number ) ; 
			  if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => $cat));
			  query_posts($args);
			  if(have_posts()):  while(have_posts()): the_post(); 
			  global $post ; 
			  $meta = get_post_meta(get_the_ID() , 'projects_meta' , true); 
			  $img_src = sh_set(wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'full') , 0);
			?>
            <div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="flipInX" data-delay="<?php echo $data_delay; ?>">
                <div class="portfolio-box">
                    <figure> <?php the_post_thumbnail('thumbnail'); ?>
                        <figcaption> 
							<a title="<?php echo get_the_title(); ?>" data-rel="prettyPhoto" href="<?php echo $img_src ; ?> " class="zoom">
								<?php _e("+" , SH_NAME); ?>
							</a> 
						</figcaption>
                    </figure>
                    <div class="portfolio-detail">
                        <h4><?php echo get_the_title(); ?></h4>
                        <p><?php echo substr(get_the_excerpt(), 0,180); ?></p>
                        <a href="<?php the_permalink(); ?>" class="more-link">+</a> </div>
                </div>
            </div>
			<?php 
			$data_delay = $data_delay + 200;
			endwhile ; endif ;
			wp_reset_query();
			?>
        </div>
    </article>
<?php $output = ob_get_contents(); 
	  ob_end_clean(); 
	  return $output ; ?>
	  