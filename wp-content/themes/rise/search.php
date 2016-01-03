<?php 
	get_header(); 
	$theme_options = _WSH()->option();
	$template_file = array('column_number'=> '1');
	$col_num = sh_set( $theme_options, 'search_column_number', 1 );
	$image = sh_set( $options, 'search_page_bg' );
	$image = ( $image ) ? $image : get_template_directory_uri().'/images/resource/banner-1.jpg';
	$size = '1142x470';

if($image):?>

<article class="banner" style="background-image:url(<?php echo $image;?>);">
	<div class="container">
		<h1><?php echo sh_set($theme_options , 'search_page_title');?></h1>
		<ul class="breadcrumb">
			<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<li><?php _e("Search" , SH_NAME); ?></li>
			<li><?php echo get_search_query(); ?></li>
		</ul>
	</div>
</article>
<?php endif; ?>

<article class="section">
	<div class="container">
	<?php if(sh_set($theme_options , 'search_page_sidebar')): ?> 
		<div class="row">
			<div class="col-md-9 contents">	
	<?php 
		endif ; 
		if(have_posts()){
			
		echo sh_blogposts( '' , $col_num , $size);
		_the_pagination(); 
		
		}
		else{
		?>
			<h3 ><?php _e("No Results Found for ") ; ?> <span > " <?php  echo get_search_query(); ?> "</span></h3>
		<?php 
		}
		
		 if(sh_set($theme_options , 'search_page_sidebar')): ?>
		  
		</div>
		
	<?php 
		endif ; 
		
		if(sh_set($theme_options , 'search_page_sidebar')): ?>        
			<div class="col-md-3 sidebar">
				   <?php dynamic_sidebar(sh_set($theme_options , 'search_page_sidebar')); ?>     
			</div>
		</div>
	<?php endif; ?>
	</div>
</article>
<?php get_footer();?>
