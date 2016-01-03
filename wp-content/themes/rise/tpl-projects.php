<?php 
	/* Template Name: Projects */
	get_header();
	$theme_options = _WSH()->option();
	$currency=$theme_options['paypal_currency_code'];
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
                <div class="projects projects-list">
                    <ul class="media-list">
					<?php 
					  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					  $args = array('post_type' => 'sh_projects' , 'paged'=>$paged ) ; 
					  if( $cat ) 
					  	$args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => $cat));
					  query_posts($args);
					  if(have_posts()):  while(have_posts()): the_post(); 
					  global $post ; 
					  $meta = get_post_meta(get_the_ID() , 'projects_meta' , true);
					  $date = explode ('-' , sh_set($meta , 'date'));
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
                        <li class="media animated" data-animation="bounceIn" data-delay="0">
                            <figure class="hover-strip pull-left">
                                <a class="pull-left" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('370x280'); ?>
                                </a>
								<?php if(is_array($date)): ?>
                                <div class="date-tag">
									<span><?php echo $date['2'] ; ?></span>
									<?php echo sh_set($month , $date['1']) ?>
								</div>
								<?php endif; ?>
                            </figure>
                            <div class="media-body">
                                <h4 class="media-heading">
									<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
								</h4>
                                <ul class="options">
                                    <li>
									 	<i class="fa fa-crosshairs"></i>
										<?php _e($currency , SH_NAME); ?><?php echo sh_set($meta , 'raised') ; ?><?php _e(" /". $currency , SH_NAME); ?><?php echo sh_set($meta , 'terget') ; ?>
									</li>
                                    <li><i class="fa fa-map-marker"></i><?php echo sh_set( $meta , 'location') ?></li>
                                </ul>
                                <p><?php echo substr(get_the_excerpt(), 0,380); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e("Read More" , SH_NAME); ?>
								</a>
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