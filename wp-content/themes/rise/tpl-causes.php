<?php 
	/* Template Name: Causes */
	get_header();
	$paypal = $GLOBALS['_sh_base']->donation;
	$theme_options = _WSH()->option();
	$currency=$theme_options['paypal_currency_code'];
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
	$outer_class = (sh_set($template_file , 'sidebar')) ? 'col-md-9' : 'col-md-12' ;
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
                <div class="causes causes-list">
                    <ul>
					<?php 
					  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					  $args = array('post_type' => 'sh_causes' , 'paged'=>$paged ) ; 
					  query_posts($args);
					  if(have_posts()):  while(have_posts()): the_post(); 
					  $meta = get_post_meta(get_the_ID() , 'causes_meta' , true); 
					  $target = sh_set($meta, 'target') ;
					  $raised = sh_set($meta, 'raised') ;
					  if ($target!=0)
					  	$percentage = ( $raised / $target ) * 100 ;
					?>
                        <li class="animated" data-animation="fadeInLeft" data-delay="0">
                            <div class="causes-box">
                                <figure>
									<?php the_post_thumbnail('thumbnail'); ?>
                                </figure>
                                <div class="causes-detail">
                                   <div class="text">
                                        <h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                        <p class="post-meta">
											<?php _e("We Need To Collect" , SH_NAME); ?> <strong class="color-theme"><?php echo $currency.$target; ?></strong>
										</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ceil($percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            <span class="min-val"><?php echo $currency ?>0.0</span>
                                            <span class="current-val"><?php echo $currency.$raised ; ?></span>
                                            <span class="max-val"><?php echo $currency.$target; ?></span>
                                        </div>                        	
                                        <p>
											<?php echo substr(get_the_excerpt(), 0,120); ?>...
											<a href="<?php the_permalink(); ?>"><?php _e("[Read More]" , SH_NAME); ?></a>
										</p>
                                    </div>
                                    <div class="causes-msg">
                                        <p>we need to collect</p>
                                        <p class="target-amount color-theme"><?php echo $currency.$target ; ?></p>
                                        
                               			<?php if (sh_set($meta , 'donation_type') == 'custom'): ?>
                            
                            			<a class="donate-btn btn" href="<?php echo esc_url( sh_set( $meta, 'link' ) ); ?>"><?php _e('Donate Now', SH_NAME); ?></a>
                            			<?php else: ?>
                                        <?php echo $paypal->button(array('currency_code' =>sh_set($theme_options , 'paypal_currency_code'),'item_name'=>get_bloginfo('name'), 'return'=>home_url()));?>
                                        
                                        <?php endif; ?>
                                        <p><?php _e("Help to Collect this" , SH_NAME); ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
					<?php
						endwhile ; endif ;
					?>
                    </ul>
                </div>
                <?php 
					_the_pagination(); 
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