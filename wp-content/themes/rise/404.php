<?php 
	get_header(); 
	$theme_options = _WSH()->option();
?>
<article class="section">
	<div class="container">
	<h1 class="title_error"><?php echo sh_set($theme_options , 'page_title'); ?></h1>
	<h5 class="text_error"><?php echo sh_set($theme_options , 'page_text'); ?></h5>
	<h3 class="tagline_error"><?php echo sh_set($theme_options , 'page_tag_line'); ?></h3>
	
	</div>
</article>

<?php get_footer();?>
