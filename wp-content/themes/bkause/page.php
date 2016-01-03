<?php 

	get_header();
 
?>
<article class="banner" style="background-image:url(<?php echo sh_set($template_file , 'image'); ?>);">
	<div class="container">
		<h1><?php the_title(); ?></h1>

	</div>
</article>

<article class="section">
	<div class="container">

				<?php 

				if(have_posts()):  while(have_posts()): the_post();  
		?>

	</div>
</article>
<?php get_footer(); ?>