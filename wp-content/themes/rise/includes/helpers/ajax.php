<?php

class SH_Ajax
{
	// http://localhost/ether/wp-admin/admin-ajax.php?action=_ajax_callback&subaction=sh_contact_form_submit
	function __construct()
	{
		add_action( 'wp_ajax__sh_ajax_callback', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv__sh_ajax_callback', array( $this, 'ajax_handler' ) );
	}
	
	function ajax_handler()
	{
		$method = sh_set( $_REQUEST, 'subaction' );
		if( method_exists( $this, $method ) ) $this->$method();
		
		exit;
	}
	
	function tweets()
	{
		if( !class_exists( 'Codebird' ) ) include_once( 'codebird.php' );
		$cb = new Codebird;
		$method = sh_set( $_POST, 'method' );
		
		$theme_options = get_option(SH_NAME.'_theme_options');
		//printr($theme_options);
		$api = sh_set($theme_options, 'twitter_api');
		$api_secret = sh_set($theme_options, 'twitter_api_secret');
		$token = sh_set($theme_options, 'twitter_token');
		$token_secret = sh_set($theme_options, 'twitter_token_Secret');

		if( !$api && $api_secret ) 
		{ 
			_e('Please provide tiwtter api information to fetch feed', SH_NAME);exit;
		}
		$cb->setConsumerKey($api, $api_secret);

		$cb->setToken($token, $token_secret);
		
		$reply = (array) $cb->statuses_userTimeline(array('count'=>sh_set( $_POST, 'number' ), 'screen_name'=>sh_set($_POST, 'screen_name')));

		if( isset( $reply['httpstatus'] ) ) unset( $reply['httpstatus'] );
		foreach( $reply as $k => $v ){
			
			//if( $k == 'httpstatus' ) continue;
			//$time = human_time_diff( strtotime( sh_set( $v, 'created_at') ), current_time('timestamp') ) . __(' ago', SH_NAME);
			$text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', sh_set( $v, 'text'));

		
				echo 
				'<li>'.$text.'</li>';
			
		}
	}
		
	function sh_contact_form_submit()
	{
		if( !count( $_POST ) ) return;
	
		_load_class( 'validation', 'helpers', true );
			
		$t = &$GLOBALS['_sh_base'];//printr($t);
	
		$settings = get_option(SH_NAME.'_theme_options');
	
		/** set validation rules for contact form */
		$t->validation->set_rules('contact_name','<strong>'.__('Name', SH_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
	
	
	
		$t->validation->set_rules('contact_email','<strong>'.__('Email', SH_NAME).'</strong>', 'required|valid_email');
		
		//$t->validation->set_rules('contact_name','<strong>'.__('Phone', SH_NAME).'</strong>', 'required|min_length[5]');
		
		$t->validation->set_rules('contact_message','<strong>'.__('Message', SH_NAME).'</strong>', 'required|min_length[10]');
	
		if( sh_set($settings, 'captcha_status') == 'on')
	
		{
	
			if( sh_set( $_POST, 'contact_captcha') !== sh_set( $_SESSION, 'captcha'))
	
			{
	
				$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', SH_NAME);
	
			}
	
		}
	
		
	
		$messages = '';
	
		
	
		if($t->validation->run() !== FALSE && empty($t->validation->_error_array))		
		{//exit('ssssss');
	
				$name = $t->validation->post('contact_name');
	
				$email = $t->validation->post('contact_email');
	
				$message = $t->validation->post('contact_message');
	
				$contact_to = ( sh_set($settings, 'contact_email') ) ? sh_set($settings, 'contact_email') : get_option('admin_email');
			
				$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
				wp_mail($contact_to, __('Contact Us Message', SH_NAME), $message, $headers);		
				$message = sh_set($settings, 'success_message') ? $settings['success_message'] : sprintf( __('Thank you <strong>%s</strong> for using our Contact form! Your email was successfully sent and we will be in touch with you soon.',SH_NAME), $name);
			
				$messages = '<div class="alert alert-success">'.__('SUCCESS! ', SH_NAME).$message.'</div>';
	
	
		}else
		{
	
				 if( is_array( $t->validation->_error_array ) )
	
				 {
	
					 foreach( $t->validation->_error_array as $msg )
	
					 {
	
						 $messages .= '<div class="alert alert-danger"><span class="red">'.__('Error! ', SH_NAME).'</span>'.$msg.'</div>';
	
					 }
	
				 }
	
		}
		echo $messages;exit;
		return $messages;
	
	}
	
	
	
}