<?php
	ob_start() ;
	$data_delay = 200;
	$paypal = $GLOBALS['_sh_base']->donation;
	$theme_options = _WSH()->option();
	$currency=$theme_options['paypal_currency_code'];
?>
<article class="section">
        <div class="container">
            <header class="heading text-center animated" data-animation="fadeInUp" data-delay="0">
                <h2><?php echo $title; ?></h2>
            </header>
            <p class="text-center margn-btm-80 animated" data-animation="fadeInUp" data-delay="200"><?php echo $text; ?></p>
            <div class="row">
			<?php 
			  $args = array('post_type' => 'sh_causes' , 'posts_per_page' => $number ) ; 
			  if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'causes_category','field' => 'id','terms' => $cat));
			  query_posts($args);
			  if(have_posts()):  while(have_posts()): the_post(); 
			  $meta = get_post_meta(get_the_ID() , 'causes_meta' , true); 
			  $target = sh_set($meta, 'target') ;
			  $raised = sh_set($meta, 'raised') ;
			  if ($target!=0)
			  $percentage = ( $raised / $target ) * 100 ;
			?>
                <div class="col-md-6 col-sm-12 col-xs-12 animated" data-animation="pulse" data-delay="<?php echo $data_delay; ?>">
                    <div class="causes-box paypal_form">
                        <figure> <?php the_post_thumbnail('thumbnail'); ?>
                            <figcaption> 
							<?php echo $paypal->button(array('currency_code' =>sh_set($theme_options , 'paypal_currency_code'),'item_name'=>get_bloginfo('name'), 'return'=>home_url()));?>
							</figcaption>
                        </figure>
                        <div class="causes-detail">
                            <h6><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                            <p class="post-meta"><?php _e("We need to collect " , SH_NAME); ?><strong class="color-theme"><?php echo $currency.$target ; ?></strong></p>
                            <div class="effect">
                                <p><?php echo substr(get_the_excerpt(), 0,150); ?> ...</p>
                                <div class="causes-hover">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ceil($percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        <span class="min-val"><?php _e($currency."0.0" , SH_NAME); ?></span> 
										<span class="current-val"><?php echo $currency.$raised ?></span> 
										<span class="max-val"><?php  echo $currency.$target ; ?></span> 
								</div>
                                    <p class="help-text"><?php _e("Help to Collect this..." , SH_NAME); ?></p>
                                </div>
                            </div>
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
<?php $output = ob_get_contents(); 
	  ob_end_clean(); 
	  return $output ; ?>
	  