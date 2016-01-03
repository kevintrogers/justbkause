<?php 
	get_header();
	$meta = get_post_meta(get_the_ID() , 'post_meta' , true); 
	$cover_photo = sh_set($meta , 'image');
	$outer_class = (sh_set($meta , 'sidebar')) ? 'col-md-9' : 'col-md-12' ;
	if($cover_photo):
?>
<article class="banner" style="background-image:url(<?php echo $cover_photo ?>);">

	<div class="container">
	
	
		<h1><?php  the_title(); ?></h1>
	
		<?php echo get_the_breadcrumb(); ?>
	
	</div>

</article>
<?php endif; ?>
<article class="section">

        <div class="container">
		  <?php while(have_posts()): the_post(); ?>
            <div class="<?php echo $outer_class ; ?> contents">

                <div class="details">
					
                    <figure class="image animated" data-animation="fadeIn" data-delay="0">

                        <?php if( has_post_thumbnail() ) the_post_thumbnail('825x380');
						else echo '<img alt="" src="http://placehold.it/1142x470" />'; ?>

                    </figure>
					
                    
					<h4><?php echo get_the_title(); ?></h4>

                    <ul class="options">

                        <li><i class="fa fa-user"></i>&nbsp;<?php echo get_the_author(); ?></li>

                        <li><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></li>
						<?php if(get_the_tags()): ?><li><i class="fa fa-tag"></i>&nbsp;<?php echo the_tags(' '); ?></li><?php endif; ?>
                        <li><i class="fa fa-folder-open"></i>&nbsp;<?php echo the_category( ' , '); ?></li>
                    </ul>

                    <div class="entry-cotent"><?php the_content(); ?></div>

                    

                    <div class="share-bar animated" data-animation="fadeInUp" data-delay="0">

                        <div class="addthis_toolbox addthis_default_style">
						
							<p><?php _e("Share this post" , SH_NAME); ?></p>
							
                         	<?php echo sh_share_buttons(); ?>

                        </div>
						

                    </div>

                </div>
                
				<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.__('Pages: ', SH_NAME), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                
                <?php comments_template(); ?>
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