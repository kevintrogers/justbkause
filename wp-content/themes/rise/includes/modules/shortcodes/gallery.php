<?php ob_start() ;
$data_delay = 0;
$gallery_post_meta = sh_set(get_post_meta($cat , 'gallery_meta' , true) , 'column');
$count = 1 ;?>
	
	<div class="section">
        <div class="container">
            <header class="heading text-center animated" data-animation="flipInX" data-delay="0">
                <h2><?php echo $title; ?></h2>
            </header>
            <p class="text-center margn-btm-80 animated" data-animation="flipInX" data-delay="200"><?php echo $text; ?></p>
            <div class="gallery grid-4">
                <ul>
				
				<?php 
					foreach($gallery_post_meta as $img): 
						$att_id = sh_get_attachment_id_by_url(sh_set($img , 'image'));
				?>
				
                    <li class="animated" data-animation="fadeInUp" data-delay="<?php echo $data_delay; ?>">
                        <div class="image-box">
                            <figure class="image"> 
							  <?php echo wp_get_attachment_image( $att_id , '253x310' , '' , array('class'=> 'gal') ); ?>
                                <figcaption> 
									<a title="Popup image" data-rel="prettyPhoto" href="<?php echo sh_set($img , 'image'); ?>" class="image-zoom">
										<i class="glyphicon glyphicon-zoom-in"></i>
									</a> 
									<a href="<?php echo get_the_permalink($cat); ?>" class="image-anchor">
										<i class="glyphicon glyphicon-link"></i>
									</a> 
								</figcaption>
                            </figure>
                        </div>
                    </li>
					
				<?php 
					if($count == $number)
						break;
					$count++;
					$data_delay = $data_delay + 200 ;
					endforeach; 
				?>
                </ul>
            </div>
        </div>
    </div>
<?php $output = ob_get_contents(); 
ob_end_clean(); 
return $output ; ?>


