<?php 
	ob_start() ;
	$data_delay = 0;
?>
<article class="parallex-section" style="background-image:url(<?php echo sh_set(wp_get_attachment_image_src($bg , 'full') , 0 ) ?>);">
	<div class="container">
		<header class="heading text-center animated" data-animation="flipInX" data-delay="0">
			<h2><?php echo $title; ?></h2>
		</header>
		<p class="text-center margn-btm-80 animated" data-animation="flipInX" data-delay="200"><?php echo $text; ?></p>
		<div class="row">
			<?php 
			  $args = array('post_type' => 'sh_donors' , 'posts_per_page' => $number ) ; 
			  if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'donors_category','field' => 'id','terms' => $cat));
			  query_posts($args);
			  if(have_posts()):  while(have_posts()): the_post(); 
			  global $post ; 
			  $meta = get_post_meta(get_the_ID() , 'donor_meta' , true);
			  $designation = sh_set($meta , 'designation') ;
			  $social_media = sh_set($meta , 'sh_donor_social') ;
			?>
			<div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="fadeInLeft" data-delay="<?php echo $data_delay;?>">
				<div class="donor-box">
					<figure class="image"> <?php the_post_thumbnail('209x236'); ?>
						<figcaption> 
						
						<?php foreach($social_media as $social ): ?>
						
							<a href="<?php echo sh_set($social , 'social_link') ; ?>" class="<?php echo str_replace("icon-","fa fa-", sh_set($social , 'social_icon')) ; ?>">
							</a>
							
						<?php endforeach; ?>
						
						</figcaption>
					</figure>
					<h4 class="color-theme"><?php echo get_the_title(); ?></h4>
					<p><?php echo $designation; ?></p>
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