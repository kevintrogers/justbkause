<?php
	get_header();
	$meta = get_post_meta(get_the_ID() , 'team_meta' , true);
	$designation = sh_set($meta , 'designation') ;
	$social_media = sh_set($meta , 'sh_team_social') ;
	$skills = sh_set($meta , 'sh_team_skill');
	$slider_photos = sh_set($meta , 'column');
	if(sh_set($meta , 'image')):
?>
<article class="banner" style="background-image:url(<?php echo sh_set($meta , 'image'); ?>);">

	<div class="container">

		<h1><?php  the_title(); ?></h1>

		<?php echo get_the_breadcrumb(); ?>

	</div>

</article>
<?php endif; ?>
<article class="section">

        <div class="container">

<?php while(have_posts()): the_post(); ?>
            <div class="about-box clearfix">

                <div class="about-snap animated" data-animation="fadeInUp" data-delay="0">
					<figure class="image image-box">

                        <?php the_post_thumbnail('300x370'); ?>
						
						<?php if(sh_set($meta , 'email')): ?>

                        <figcaption>

                            <a class="image-email" href="mailto:<?php echo sh_set($meta , 'email'); ?>">

                                <i class="fa fa-envelope-o fa-5x"></i>

                                <p><?php _e("Send E-Mail" , SH_NAME); ?></p>

                            </a>

                        </figcaption>
						
						<?php endif; ?>

                    </figure>
                    
                    <ul class="social-links">
					<?php foreach($social_media as $social ): 
						
				    ?>
						
						<li><a href="<?php echo sh_set($social , 'social_link') ; ?>" class="<?php echo str_replace("icon-","fa fa-", sh_set($social , 'social_icon')) ; ?>" data-placement="bottom" data-toggle="tooltip" title="<?php echo sh_set($social , 'social_title') ; ?>"></a>
						</li>
					<?php endforeach; ?>
                    </ul>
                </div>
                
				<div class="about-detail animated" data-animation="fadeInLeft" data-delay="200">

                    <h4><?php the_title(); ?></h4>

                    <ul class="options options-vertical">

                        <li><i class="fa fa-user"></i>&nbsp;<?php echo $designation ; ?></li>

                        <li><i class="fa fa-envelope-o"></i>&nbsp;<?php echo sh_set($meta , 'email'); ?></li>

                        <li><i class="fa fa-phone"></i>&nbsp;<?php echo sh_set($meta , 'phone') ?></li>

                        <li><i class="fa fa-external-link-square"></i>&nbsp;<?php echo sh_set($meta , 'link') ?></li>

                    </ul>

                    <h6><?php echo sh_set($meta , 'tag_line') ?></h6>

                    <?php the_content(); ?>
					

                </div>
            </div>
<?php endwhile; ?>
             <div class="block">

                <div class="row">

                    <div class="col-md-7">

                        <h4><?php _e("My Skills" , SH_NAME); ?></h4>

                        <div class="skills">

                            <ul>
							<?php foreach($skills as $skill ): //printr($skill);?>
                                <li>
								
									<?php if (sh_set($skill , 'social_icon')): ?>

                                    <span class="icon- <?php echo sh_set($skill , 'social_icon'); ?>"></span>
									
									<?php endif; ?>

                                    <div class="skill-desc">

                                        <h5><?php echo sh_set($skill , 'skill_name'); ?></h5>

                                        <div class="progress">

                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo sh_set($skill , 'skill_percent'); ?>" aria-valuemin="0" aria-valuemax="100"></div>

                                            <span class="min-val"><?php _e("0%" , SH_NAME); ?></span>

                                            <span class="current-val"><?php echo sh_set($skill , 'skill_percent'); ?>%</span>

                                            <span class="max-val"><?php _e("100%" , SH_NAME); ?></span>

                                        </div>

                                    </div>

                                </li>
                             <?php endforeach; ?>   
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">

                        <h4><?php _e("My Photo Slides" , SH_NAME); ?></h4>

                        <div class="caro-slider caro-1-col animated" data-animation="fadeInUp" data-delay="0">
                            <ul class="caro-slider-ul">
							<?php foreach($slider_photos as $photo): ?>
                                <li><img src="<?php echo sh_set($photo , 'image'); ?>" alt="image"></li>
							<?php endforeach; ?>
                            </ul>
                            <div class="caro-controls">
                                <a class="caro-prev" href="#"></a>
                                <a class="caro-next" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php if (sh_set($meta , 'checkbox')): ?>
            <div class="block">

                <div class="info-block clearfix animated" data-animation="fadeInUp" data-delay="0">

                    <div class="pull-left">

                        <p><?php echo sh_set($meta , 'small_text'); ?></p>

                        <h4><?php echo sh_set($meta , 'large_text'); ?></h4>

                    </div>

                    <a class="btn btn-primary pull-right" href="<?php echo sh_set($meta , 'button_box_link'); ?>">
					
						<?php _e("Try It Now" , SH_NAME); ?>
						
					</a>

                </div>

            </div>
			<?php endif; ?>
    </div>
</article>
<?php get_footer(); ?> 