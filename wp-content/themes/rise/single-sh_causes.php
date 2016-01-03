<?php 
	get_header();
	$paypal = $GLOBALS['_sh_base']->donation;
	$theme_options = _WSH()->option();
	$meta = get_post_meta(get_the_ID() , 'causes_meta' , true); 
	$target = sh_set($meta, 'target') ;
	$raised = sh_set($meta, 'raised') ;
	$location = sh_set($meta, 'location');
	$cover_photo = sh_set($meta , 'image');
	$currency=$theme_options['paypal_currency_code'];
	$outer_class = (!sh_set($meta , 'sidebar')) ? 'col-md-12' : 'col-md-9' ;
	$post_title = get_the_title();
	if ($target!=0)
		$percentage = ( $raised / $target ) * 100 ;
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

                    <figure class="image animated" data-animation="fadeIn" data-delay="0">

                        <?php the_post_thumbnail('825x380'); ?>

                    </figure>

                    <header class="caption">

                        <h4><?php echo get_the_title(); ?></h4>

                        

                        <div class="causes-pik animated" data-animation="fadeInDown" data-delay="200">

                            <h5><?php _e("Help to Collect" , SH_NAME); ?></h5>

                            <p>we need to collect <strong class="color-theme"><?php echo $currency.$target; ?></strong></p>

							<?php if (sh_set($meta , 'donation_type') == 'custom'): ?>  
                               
                           	<a class="donate-btn btn" href="<?php echo esc_url( sh_set( $meta, 'link' ) ); ?>"><?php _e('Donate Now', SH_NAME); ?></a>
                            <?php else: ?>
                            
                            <?php echo $paypal->button(array('currency_code' =>sh_set($theme_options , 'paypal_currency_code'),'item_name'=>get_bloginfo('name'), 'return'=>home_url()));?>
							
							<?php endif; ?>
                            
                            <div class="progress">

                                <div style="width: 30%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo ceil($percentage); ?>" role="progressbar" class="progress-bar"></div>

                                <span class="min-val"><?php _e($currency."0.0" , SH_NAME); ?></span>

                                <span class="current-val"><?php $currency.$raised ?></span>

                                <span class="max-val"><?php echo $currency.$target; ?></span>

                            </div>                        

                        </div>

                    </header>

                    <ul class="options">

                        <li><i class="fa fa-map-marker"></i><?php echo $location; ?></li>

                    </ul>

					<?php the_content(); ?>

                

                </div>

    
				<?php if (sh_set($meta , 'checkbox')): ?>
                <div class="related-posts grid-2">

                    <h4><?php _e("Related Posts" , SH_NAME); ?></h4>

                    <ul class="media-list">
					<?php
					$count3 = 1 ;
					$args = array('post_type' => 'sh_causes', 'posts_per_page' => 3 ) ; 
					if( $cat ) 
						$args['tax_query'] = array(array('taxonomy' => 'causes_category','field' => 'id','terms' => $cat));
					query_posts($args);
					if(have_posts()):  while(have_posts()): the_post(); 
					$related_post_title = get_the_title();
					if($related_post_title == $post_title) continue;
					$metas = get_post_meta(get_the_ID() , 'causes_meta' , true);
				    ?>
                        <li class="media animated" data-animation="fadeInLeft" data-delay="0">

                            <figure class="pull-left">

                                <a class="pull-left" href="<?php the_permalink(); ?>">

                                    <?php the_post_thumbnail('thumbnail'); ?>

                                </a>

                            </figure>

                            <div class="media-body">

                                <h5 class="media-heading">
								
									<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									
								</h5>

                                <p class="post-meta">
									<?php _e("We need to collect" , SH_NAME); ?> 
									<strong class="color-theme"><?php _e($currency , SH_NAME); ?><?php echo sh_set($metas, 'target') ?>
									</strong>
								</p>

                                <?php echo substr(get_the_excerpt(), 0,80); ?>...<a href="<?php the_permalink(); ?>"><?php _e("[Read More]" , SH_NAME); ?></a>

                            </div>

                        </li>
					<?php
						if($count3 == 2) break;
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