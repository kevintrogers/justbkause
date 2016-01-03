<?php
	get_header();
	$meta = get_post_meta(get_the_ID() , 'testimonials_meta' , true);
	$designation = sh_set($meta , 'designation') ;
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
            <div class="about-box">

                <div class="about-snap animated" data-animation="fadeInUp" data-delay="0">
					<figure class="image image-box">

                        <?php the_post_thumbnail('300x370'); ?>
						

                    </figure>
                    
                </div>
                
				<div class="about-detail animated" data-animation="fadeInLeft" data-delay="200">

                    <h4><?php the_title(); ?></h4>

                    <ul class="options options-vertical">

                        <li><i class="fa fa-user"></i> <?php echo $designation ; ?></li>
						
						<li><i class="fa fa-users"></i> <?php echo sh_set($meta , 'company') ; ?></li>

                    </ul>

                    <?php the_content(); ?>
					

                </div>
            </div>
<?php endwhile; ?>
			
    </div>
</article>
<?php get_footer(); ?> 