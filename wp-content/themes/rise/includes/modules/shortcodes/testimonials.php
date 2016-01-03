<?php wp_enqueue_script( array('jquery.carouFredSel-6.2.1-packed') );
ob_start() ;?>

<article class="section bg-theme">
	<div class="container">
		<div class="testimonials-section">
			<div class="caro-fade animated" data-animation="flipInX" data-delay="0">
				<ul class="caro-slider-ul">
				<?php 
				$args = array('post_type' => 'sh_testimonials' , 'posts_per_page' => $number ) ; 
				if( $cat ) 
				$args['tax_query'] = array(array('taxonomy' => 'testimonials_category','field' => 'id','terms' => $cat));
				query_posts($args);
				if(have_posts()):  while(have_posts()): the_post(); 
				$meta = get_post_meta(get_the_ID() , 'testimonials_meta' , true);
				$text = get_the_content();
				if($text):
				?>
					<li>
						<div class="testimonials">
							<figure class="image"> <?php the_post_thumbnail('253x310'); ?> </figure>
							<h4 class="color-theme"><?php echo get_the_title(); ?></h4>
							<p class="designation">
								<?php echo sh_set($meta , 'designation'); ?>, <?php echo sh_set($meta , 'company'); ?>
							</p>
							<?php echo the_excerpt(); ?>
						</div>
					</li>
				<?php 
				endif;
				endwhile ; endif ;
				wp_reset_query();
				?>
				</ul>
				<div class="caro-pagination"></div>
			</div>
		</div>
	</div>
</article>
<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output ; 
?>





<!--<article class="section bg-theme">
        <div class="container">
            <div class="testimonials-section">
                <div class="caro-fade animated" data-animation="flipInX" data-delay="0">
                    <ul class="caro-slider-ul">
                        <li>
                            <div class="testimonials">
                                <figure class="image"> <img src="images/resource/img-42.jpg" alt="image"> </figure>
                                <h4 class="color-theme">Marry Williams</h4>
                                <p class="designation">CEO, Liberties</p>
                                <p>Cumsociis natoque penatibus et magnis dis parturient montes,Vivamus sagittis lacus vel augue laoreet rutrum faucibus igludolorsalary auctor. Nulla vitae elit libero, a pharetra augue. Lorem ipsum dolor sit montes, vitae elit libero, a pharetra augue. Lorem ipsum dolor sit amet, consecte</p>
                            </div>
                        </li>
                    </ul>
                    <div class="caro-pagination"></div>
                </div>
            </div>
        </div>
    </article>-->
