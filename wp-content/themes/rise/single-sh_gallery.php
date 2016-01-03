<?php 
	get_header();
	$meta = get_post_meta(get_the_ID() , 'gallery_meta' , true);
	$gallery_post_meta = sh_set( $meta , 'column' );
	$cover_photo = sh_set($meta , 'image');
	$outer_class = (!sh_set($meta , 'sidebar')) ? 'col-md-12' : 'col-md-9' ;
	$data_delay = 0;
	if($cover_photo):
?>
<article class="banner" style="background-image:url(<?php echo $cover_photo; ?>);">

	<div class="container">
	
		<h1><?php the_title(); ?></h1>
	
		<?php echo get_the_breadcrumb(); ?>
	
	</div>

</article>
<?php endif; ?>
<article class="section">

	<div class="container">
	
	  <?php while(have_posts()): the_post(); ?>
	  
		<div class="<?php echo $outer_class ; ?> contents">

			<div class="gallery grid-3">
                <ul>
				
				<?php foreach($gallery_post_meta as $img): 
					$att_id = sh_get_attachment_id_by_url(sh_set($img , 'image'));
				?>
				
				
                    <li class="animated" data-animation="fadeInUp" data-delay="<?php echo $data_delay; ?>">
                        <div class="image-box">
                            <figure class="image"> 
							  <?php echo wp_get_attachment_image( $att_id , array(253,310) , '' , array('class'=> 'gal') ); ?>
                                <figcaption> 
									<a title="Popup image" data-rel="prettyPhoto" href="<?php echo sh_set($img , 'image'); ?>" class="image-zoom">
										<i class="glyphicon glyphicon-zoom-in"></i>
									</a> 
									<a href="<?php the_permalink(); ?>" class="image-anchor"><i class="glyphicon glyphicon-link"></i></a> 
								</figcaption>
                            </figure>
                        </div>
                    </li>
					
				<?php 
					$data_delay = $data_delay + 200 ;
					endforeach; 
				?>
                </ul>
            </div>	

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