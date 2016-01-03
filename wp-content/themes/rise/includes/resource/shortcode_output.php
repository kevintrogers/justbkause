<?php if ( ! defined('ABSPATH')) exit('restricted access'); /** stop direct script access */


if ( ! isset( $_GET['inline'] ) )
	define( 'IFRAME_REQUEST' , true );


if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    wp_die(__('You do not have permission to edit posts.', SH_NAME));

?>

<html>
	<head>
		<title><?php _e('Shortcodes created', SH_NAME); ?></title>
		
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/shortcodess.css" />

		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shortcodes.js"></script>
	</head>
    <body>
        <h2><?php _e('List of available Shortcodes', SH_NAME); ?></h2>
        
        <div id="accordion">
			<?php

			$options = array();
            include(get_template_directory().'/includes/resource/shortcodes.php');
            $sc_options = $options;
			$nph = new NHP_Options;
			$nph->args['opt_name'] = 'shortcode';
            foreach($sc_options as $key=>$value){ ?>
            
                    <h3><?php echo ucwords(str_replace(array('_', '-'), ' ', $key)); ?></h3>
                
                    <div>
                        <?php if(is_array($value)){ ?>
                            <h4><?php _e('Available parameters', SH_NAME); ?>: </h4>
                            <?php
                            $temp = array();
							
                            foreach($value as $k=>$f): //printr($f);?>
								<?php $settings = array(); ?>
                                <div class="fields_set" >
									<label><strong><?php echo sh_set( $f, 'title'); ?></strong></label>
									<div class="field">
										<?php echo $nph->_field_input($f, sh_set($settings, sh_set( $f, 'id' )) ); 	?>
									</div>
								</div>
                            <?php endforeach;
                            echo '<hr/>';
                        }else{
                            echo __('No parameters avaialble ', SH_NAME);
                        }?>
                        <input type="button" class="btn_insert btn btn-large" data-name="<?php echo $key; ?>" value="<?php _e('Insert Shortcode', SH_NAME); ?>"/>
                    </div>

            <?php 
            } ?>
        </div>
    </body>
</html>