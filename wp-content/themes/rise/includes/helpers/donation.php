<?php 

class SH_Donation
{
	var $_settings;
	var $_paypal;
	var $_paypal_settings;
	
	function __construct()
	{
		require_once(get_template_directory().'/includes/helpers/libpaypal.php');
		$this->_settings = get_option(SH_NAME);
		$theme_options = _WSH()->option();
		
		//Create the authentication
		$pp_type = (sh_set($theme_options, 'paypal_type') == 'sandbox') ? true : false;
		$auth = new PaypalAuthenticaton(sh_set($theme_options, 'paypal_username'), sh_set($theme_options, 'paypal_api_username'), sh_set($theme_options, 'paypal_api_password'), sh_set($theme_options, 'paypal_api_signature'), $pp_type);
		
		//Create the paypal object
		$this->_paypal = new Paypal($auth);
		$this->_paypal_settings = new PaypalSettings();
		$this->_paypal_settings->allowMerchantNote = true;
		$this->_paypal_settings->logNotifications = true;
		
		//the base url
		$this->return_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	
	/**
	 * This method is used to return button output or echo output
	 *
	 * @param	$settings	array	array of settings.
	 * return	null
	 */
	function button( $settings = array() )
	{

		$action = $this->_paypal->getButtonAction(); //get button action
		
		/** merge settings */
		$this->args = $settings;
		$default = array('currency_code'=>'', 'cmd'=>'_donations', 'item_name'=>__('Donation', SH_NAME), 'label'=>__('Donate Now', SH_NAME));
		$this->args = wp_parse_args( $this->args, $default );
		
		/** get donation button params */
		$products = array();
		$params = $this->_paypal->getButtonParams($products, $this->action('paid'), $this->action('cancel'), $this->action('notify')); //get params for the form
		$params['currency_code'] = sh_set( $this->args, 'currency_code', 'USD'  );
		//unset($params['currency_code']);
		unset($params['lc']);
		unset($params['amount']);
		$params['cmd'] = '_donations';
		$params['item_name'] = sh_set( $this->args, 'item_name'  );
		
		/** Create donation button */
		$output = '<form action="'.$action.'" method="post">';
		
		foreach($params as $key => $value){
            $output .= '<input type="hidden" name="'.$key.'" value="'.$value.'"/>';
		}
		
		$output .= '<button type="submit" class="'. sh_set($this->args, 'btn_class', 'donate-btn btn' ).'">'. sh_set($this->args, 'label', __('DONATE NOW', SH_NAME) ).'</button>';
		$output .= '</form>';
		
		if( sh_set( $this->args, 'echo' ) ) echo $output;
		else return $output;
	}
	
	/** create button return url with action */
	function action( $action )
	{
		$return = ( sh_set( $this->args, 'return' ) ) ? sh_set( $this->args, 'return' ) : $this->return_url;

		return add_query_arg( array( 'action'=>$action ), $return );
	}

	/**
	 * This function is used to save transaction into database.
	 * @param	$data	array	array of data transaction response from paypal.
	 * return	null
	 */
	function result( $data = array() )
	{
		global $wpdb;
		
		if( !$_POST ) return;
		 
		$data = !( $data ) ? $this->_paypal->handleNotification() : $data;
		
		if( !$data ) return;
		
		$array = array('transID'=>$data->transactionId, 'status'=>$data->status, 'total'=>$data->total, 'donalID'=>$data->buyer->id, 
						'donalName'=>$data->buyer->firstName.' ' .$data->buyer->lastName, 'donalEmail'=>$data->buyer->email, 'note'=>$data->products[0]->name,
						'data'=>serialize($data), 'date'=>date('Y-m-d H:i:s', $data->date )
						);
						
		if($transID = $wpdb->get_row("SELECT `transID` FROM `".$wpdb->prefix."donation` WHERE `transID` = '".$data->transactionId."'")){
			_e('<p class="errormsg donationmsg">The transaction is already in our record.</p>', SH_NAME);
		}
		elseif($data->status == 'Completed') {
			$result = $wpdb->insert('fw_donation', $array);
			if($result) echo '<p class="successmsg donationmsg">'.__('Thank you for your donation.',SH_NAME).'</p>';
		}
		else{
			$result = $wpdb->insert('fw_donation', $array);
			echo '<p class="errormsg donationmsg">'.__('Sorry! unfortunetly the transaction is failed.',SH_NAME).'</p>';
		}
	}
	
}