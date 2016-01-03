<?php 
	/* Template Name: Contact Us */
	get_header();
	$template_file = get_post_meta(get_the_ID(), 'page_meta', true);
	if(sh_set($template_file , 'image')): 
?>
<article class="banner" style="background-image:url(<?php echo sh_set($template_file, 'image'); ?>);">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php
			if (!sh_set($template_file, 'is_home'))
				echo get_the_breadcrumb();
 ?>
	</div>
</article>
<?php
	endif;
	$options = get_option(SH_NAME . '_theme_options');
?>
<article class="section">
	<div class="container">
		<div class="content">
    
    <?php
		while (have_posts()) : the_post();
			the_content();
		endwhile;
 ?>
    
  </div>
		<div class="col-md-6 contents">
			<div class="contents">
				<div class="mapbox">
					<iframe src="<?php echo sh_set($options, 'iframe'); ?> "></iframe>
					<div class="widget_contact">
						<ul>
							<li class="address">
								<?php echo sh_set($options, 'address'); ?>
							</li>
							<li class="phone">
								<?php echo sh_set($options, 'phone'); ?>
							</li>
							<li class="email">
								<a href="mailto:info@helpinghands.com">
									<?php echo sh_set($options, 'email'); ?>
								</a>
							</li>
							<li class="skype">
								<?php echo sh_set($options, 'skype'); ?>
							</li>
						</ul>
					</div>
				</div>
				<!-- /mapbox -->
			</div>
		</div>
		<div class="col-md-6 sidebar">
			<h4>Contact Form</h4>
			<form class="contact-form" method="post" action="<?php echo admin_url('admin-ajax.php?action=_sh_ajax_callback&amp;subaction=sh_contact_form_submit'); ?>" id="rise_contact_form">
			<div class="msgs"></div>
			<ul>
				<li class="animated" data-animation="fadeInUp" data-delay="0">
					<div class="input-group">
					  <span class="input-group-addon"><i class="fa fa-user"></i></span>
					  <input type="text" class="form-control" placeholder="<?php _e("Name", SH_NAME); ?>" name="contact_name">
					</div>            
				</li>
				<li class="animated" data-animation="fadeInUp" data-delay="0">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
						<input type="text" class="form-control" placeholder="<?php _e("Email", SH_NAME); ?>" name="contact_email">
					</div>            
				</li>
				<li class="animated" data-animation="fadeInUp" data-delay="0">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
						<input type="text" class="form-control" placeholder="<?php _e("Subject", SH_NAME); ?>" name="contact_subject">
					</div>            
				</li>
				<li class="animated" data-animation="fadeInUp" data-delay="0">
					<textarea class="form-control" placeholder="<?php _e("Message", SH_NAME); ?>" name="contact_message"></textarea>
				</li>
				<li class="animated" data-animation="fadeInUp" data-delay="0">
					<input type="submit" value="<?php _e("Send Message", SH_NAME); ?>" class="btn btn-primary pull-right">
				</li>
			</ul>
			</form>
		</div>
	</div>
</article>
<script>
	jQuery(document).ready(function($) {
		$('#rise_contact_form').live('submit', function(e) {

			e.preventDefault();
			var thisform = this;
			var fields = $(this).serialize();
			var url = $(this).attr('action');
			//alert(url);
			$.ajax({
				url : url,
				type : 'POST',
				data : fields,
				success : function(res) {
					//salert(res);
					$('.msgs', thisform).html(res);
				}
			});
		});

	}); 
</script>
<?php get_footer(); ?>