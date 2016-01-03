<?php
	ob_start() ;
	$percentage = ( $raised / $target ) * 100 ;
	$paypal = $GLOBALS['_sh_base']->donation;
	$theme_options = _WSH()->option();
	$currency=$theme_options['paypal_currency_code'];
?>

<article class="section">
        <div class="container">
            <header class="heading text-center animated" data-animation="flipInX" data-delay="0">
                <h2><?php echo $title1; ?></h2>
            </header>
            <p class="text-center margn-btm-80 animated" data-animation="flipInX" data-delay="200"><?php echo $text1; ?></p>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="sketched-progress">
                        <div class="progress-stats"> 
							<span class="max-val"><?php _e($currency , SH_NAME); ?><?php echo $target; ?></span> 
							<span class="current-val" data-current-val="<?php echo $percentage; ?>">
								<?php _e($currency , SH_NAME); ?><?php echo $raised; ?>
							</span> 
							<span class="min-val"><?php _e("Start ".$currency."0.00" , SH_NAME); ?></span> 
						</div>
                        <div class="progress-fill-area">
                            <div class="sketch-fill"></div>
                            <div class="pre-fill"></div>
                            <div class="progress-fill"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="text-center animated paypal_large" data-animation="fadeInUp" data-delay="600">
                        <h3><?php echo $title2; ?></h3>
                        <p><?php echo $text2; ?></p>
						
						<?php if ( $type == 'custom' ): ?>
                        	
                            <a class="donate-btn btn" href="<?php echo esc_url( $custom_link ); ?>"><?php _e('Donate Now', SH_NAME); ?></a>
                         <?php else: ?>
                        	<?php echo $paypal->button(array('currency_code' =>sh_set($theme_options , 'paypal_currency_code'),'item_name'=>get_bloginfo('name'), 'return'=>home_url()));?> 
						 <?php endif; ?>  
                         
					</div>
                </div>
            </div>
        </div>
    </article>
	
<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output ; 
?>