<?php 
	/* Template Name: Team */
	get_header(); 
	$data_delay = 0 ;
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
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
		<div class="teams grid-4">
			<ul>
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'sh_team' , 'paged'=>$paged  ) ; 
					if( $cat ) 
					$args['tax_query'] = array(array('taxonomy' => 'team_category','field' => 'id','terms' => $cat));
					query_posts($args);
					if(have_posts()):  while(have_posts()): the_post(); 
					global $post ; 
					$meta = get_post_meta(get_the_ID() , 'team_meta' , true);
					$designation = sh_set($meta , 'designation') ;
					$social_media = sh_set($meta , 'sh_team_social') ; 
			    ?>
				<li class="animated" data-animation="fadeInUp" data-delay="<?php echo $data_delay; ?>">
					<div class="team-box">
						<div class="image-box">
							<figure class="image">
								<?php the_post_thumbnail(''); ?>
								<figcaption>
									<?php if(sh_set($meta , 'email')): ?>
									<a href="mailto:<?php echo sh_set($meta , 'email'); ?>" class="image-email">
										<i class="fa fa-envelope-o fa-5x"></i>
										<p><?php _e("Send E-Mail" , SH_NAME); ?></p>
									</a>
									<?php endif ; ?>
									<div class="btm">								
									<?php foreach($social_media as $social ): ?>
										<a class="<?php echo str_replace("icon-", "fa fa-", sh_set($social , 'social_icon')) ; ?>" href="<?php echo sh_set($social , 'social_link') ; ?>"></a>
									<?php endforeach; ?>
									</div>
								</figcaption>
							</figure>
						</div>
						<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
						<p><?php echo $designation; ?></p>
						<?php echo substr(get_the_excerpt(), 0,200); ?>
					</div>
				</li>
				<?php 
					$data_delay = $data_delay + 100;
					endwhile ; endif ;
				?>
			</ul>
		</div>
		<?php 
			_the_pagination(); 
			wp_reset_query();
		?>
	</div>
</article>

<?php get_footer(); ?>