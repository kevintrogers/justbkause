<?php 
	ob_start() ;
	$data_delay = 400;
?>
<article class="section">
	<div class="container">
		<header class="heading text-center animated" data-animation="flipInX" data-delay="0">
			<h2><?php echo $title; ?></h2>
		</header>
		
		<p class="text-center margn-btm-80 animated" data-animation="flipInX" data-delay="200"><?php echo $text; ?></p>
		
		<div class="grid-4">
			<ul>
			<?php 
			  $args = array('post_type' => 'sh_team' , 'posts_per_page' => $number ) ; 
			  if( $cat ) 
			  $args['tax_query'] = array(array('taxonomy' => 'team_category','field' => 'id','terms' => $cat));
			  query_posts($args);
			  if(have_posts()):  while(have_posts()): the_post(); 
			  global $post ; 
			  $meta = get_post_meta(get_the_ID() , 'team_meta' , true);
			  $designation = sh_set($meta , 'designation') ;
			  $social_media = sh_set($meta , 'sh_team_social') ;
			?>
				<li class="animated" data-animation="fadeInDown" data-delay="<?php echo $data_delay; ?>">
					<div class="team-box">
						<div class="image-box">
							<figure class="image"> <?php the_post_thumbnail('300x370'); ?>
								<figcaption> 
									<?php if(sh_set($meta , 'email')): ?>
									<a href="mailto:<?php echo sh_set($meta , 'email'); ?>" class="image-email"> 
										<i class="fa fa-envelope-o fa-5x"></i>
										<p><?php _e("Send E-Mail" , SH_NAME); ?></p>
									</a>
									<?php endif; ?>
									<div class="btm"> 
									<?php foreach($social_media as $social ): ?>
										<a class="<?php echo str_replace("icon-", "fa fa-", sh_set($social , 'social_icon')); ?>" href="<?php echo sh_set($social , 'social_link') ; ?>">
										</a>
									<?php endforeach; ?>
									</div>
								</figcaption>
							</figure>
						</div>
						<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
						<p><?php echo $designation; ?></p>
					</div>
				</li>
			<?php 
			$data_delay = $data_delay + 200;
			endwhile ; endif ;
			wp_reset_query();
			?>	
			</ul>
		</div>
	</div>
</article>
<?php return ob_get_clean();