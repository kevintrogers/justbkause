<?php ob_start() ; ?>
<article class="newsletter-section">
	<div class="container">
		<form id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-12">
					<h4 class="color-theme"><?php echo $title ; ?></h4>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<input type="text" name="name" placeholder="<?php _e("Name" , SH_NAME); ?>" class="form-control">
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<input type="text" name="email" placeholder="<?php _e("Email" , SH_NAME); ?>" class="form-control col-md-6">
				</div>
				<input type="hidden" id="uri" name="uri" value="<?php echo $f_id ; ?>">
            	<input type="hidden" value="en_US" name="loc">
				<div class="col-md-2 col-sm-2 col-xs-12">
					<input type="submit" class="btn btn-primary" value="<?php echo $button_text ; ?>">
				</div>
			</div>
		</form>
	</div>
</article>
<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output ; 
?>
	  