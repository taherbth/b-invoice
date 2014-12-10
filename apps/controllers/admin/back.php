<?php
include_once 'BaseController.php';

class Back extends BaseController {
	// Used for registering and changing password form validation
	
/*	function Backend()
	{
		parent::__construct ();
		$this->dx_auth->check_uri_permissions();
	}*/
	
	function index()
	{
		//$this->data['activeTab'] 	=  'backend_home';
		//$this->data['windowTitle'] 	= $this->siteTitle.'Admin Welcome Message Viewer';
		$this->data['dynamicView'] 	= 'pages/admin/welcome1';
		$this->_commonPageLayout('frontend_viewer');
	}
	

	

	protected function _commonPageLayout($viewName, $cacheIt = FALSE){

		$view = $this->layout->view($viewName, $this->data, TRUE);

		$replaces = array( 
						   '{SITE_TOP_LOGO}' 		  => $this->load->view('frontend/site_top_logo', $this->data, TRUE), 
						   '{SITE_TOP_MENU}' 	   	  => $this->load->view('frontend/site_top_menu_user',  NULL, TRUE), 
						   '{SITE_MIDDLE_CONTENT}' 	  => $this->load->view($this->data['dynamicView'],  NULL, TRUE), 
						   '{SITE_FOOTER}' 			  => $this->load->view('frontend/site_footer', NULL, TRUE)
						 );
						  
		$this->load->view('view', array('view' => $view, 'replaces' => $replaces));
	}	
}
?>