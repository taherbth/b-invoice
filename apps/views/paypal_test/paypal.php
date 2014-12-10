<?php
include_once 'BaseController.php';

/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Controller Class																	*
 * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)					                             	*
 * 		@Email			sanchoy7@gmail.com			                                                        *
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

class Paypal extends BaseController
{
	 public function __construct()
	 {
		parent::__construct ();
		//$this->dx_auth->userback_init();
		$this->load->library('Paypal_Lib');
		$this->userId  = $this->dx_auth->get_user_id ();
	 }
   
	function index()
	{
		$this->form();
	}

     public function form()
	 {
		$this->data['windowTitle'] 	= $this->siteTitle.'Paypal Test Transaction';	
		$this->data['html_body_id'] = 'home';
		$this->data['activeTab'] 	= 'home';
		$this->data['orderValues']  = $this->Shows->getThisValue("order_info.customer_id = '$this->userId'", 'order_info', '1', 'id DESC'); 
		$this->data['dynamicView'] 	= 'pages/paypal_test/form';
		$this->_commonPageLayout('common_viewer');
     }   

	function auto_form()
	{
		$this->paypal_lib->add_field('business', 'seller_1291183743_biz@gmail.com');
	    $this->paypal_lib->add_field('return', site_url('paypal/success'));
	    $this->paypal_lib->add_field('cancel_return', site_url('paypal/cancel'));
	    $this->paypal_lib->add_field('notify_url', site_url('paypal/ipn')); // <-- IPN url
	    $this->paypal_lib->add_field('custom', '1234567890'); // <-- Verify return

	    $this->paypal_lib->add_field('item_name', 'Paypal Test Transaction');
	    $this->paypal_lib->add_field('item_number', '6941');
	    $this->paypal_lib->add_field('amount', '37');

	    $this->paypal_lib->paypal_auto_form();
	}
	function cancel()
	{
		$this->data['windowTitle'] 	= $this->siteTitle.'Paypal Transaction Cancel';	
		$this->data['html_body_id'] = 'cancel';
		$this->data['activeTab'] 	= 'cancel';
        $this->data['dynamicView'] 	= 'pages/paypal_test/cancel';
		$this->_commonPageLayout('common_viewer');
	}
	
	function success()
	{
		// This is where you would probably want to thank the user for their order
		// or what have you.  The order information at this point is in POST 
		// variables.  However, you don't want to "process" the order until you
		// get validation from the IPN.  That's where you would have the code to
		// email an admin, update the database with payment status, activate a
		// membership, etc.
	
		// You could also simply re-direct them to another page, or your own 
		// order status page which presents the user with the status of their
		// order based on a database (which can be modified with the IPN code 
		// below).
		$this->data['windowTitle'] 	= $this->siteTitle.'Paypal Transaction Success';	
		$this->data['html_body_id'] = 'success';
		$this->data['activeTab'] 	= 'success';
		$data['pp_info'] = $this->input->post();
		print_r($data['pp_info']);
		print_r("sssss dddddddd");
		$this->data['dynamicView'] 	= 'pages/paypal_test/success';
		$this->_commonPageLayout('common_viewer');
	}
	
	function ipn()
	{
		// Payment has been received and IPN is verified.  This is where you
		// update your database to activate or process the order, or setup
		// the database with the user's order details, email an administrator,
		// etc. You can access a slew of information via the ipn_data() array.
 
		// Check the paypal documentation for specifics on what information
		// is available in the IPN POST variables.  Basically, all the POST vars
		// which paypal sends, which we send back for validation, are now stored
		// in the ipn_data() array.
 
		// For this example, we'll just email ourselves ALL the data.
		$to    = 'sales@spiceuk.com';    //  your email

		if ($this->paypal_lib->validate_ipn()) 
		{
			$body  = 'An instant payment notification was successfully received from ';
			$body .= $this->paypal_lib->ipn_data['payer_email'] . ' on '.date('m/d/Y') . ' at ' . date('g:i A') . "\n\n";
			$body .= " Details:\n";

			foreach ($this->paypal_lib->ipn_data as $key=>$value)
				$body .= "\n$key: $value";
	
			// load email lib and email results
			$this->load->library('email');
			$this->email->to($to);
			$this->email->from($this->paypal_lib->ipn_data['payer_email'], $this->paypal_lib->ipn_data['payer_name']);
			$this->email->subject('CI paypal_lib IPN (Received Payment)');
			$this->email->message($body);	
			$this->email->send();
		}
	}
	 
	 protected function _commonPageLayout($viewName, $cacheIt = false)
	 {			
		$view = $this->layout->view($viewName, $this->data, true);
		$replaces = array( 
						   '{SITE_TOP_HEADER}' 		=> $this->load->view('frontend/site-top-header',$this->data, TRUE), 
						   '{SITE_MIDDLE_TOP}' 		=> $this->load->view($this->data['dynamicView'], NULL, TRUE), 
						   '{SITE_MIDDLE_BOTTOM}' 	=> $this->load->view('frontend/site-middle-bottom', NULL, TRUE), 
						   '{SITE_RIGHT_TOP}'		=> $this->load->view('frontend/site-right-top', NULL, TRUE), 
						   '{SITE_RIGHT_BOTTOM}'	=> $this->load->view('frontend/site-right-bottom', NULL, TRUE), 
						   '{SITE_MAIN_FOOTER}' 	=> $this->load->view('frontend/site-main-footer', NULL, TRUE) 
						 );
						  
		$this->load->view('view', array('view' => $view, 'replaces' => $replaces));
	 }
}
?>