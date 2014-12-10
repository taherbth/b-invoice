<?php
include_once 'BaseController.php';

class User extends BaseController
{
   function User()
	{
		parent::__construct ();
		$this->dx_auth->check_uri_permissions();
	}
	
	public function index()
	{
		$this->add();
	}

	public function add()
	{
		$this->edit();
	}
	
	public function edit($contentId = NULL)

	{
        if($contentId == NULL)
		{
		 $this->data['activeTab'] 		  =  'configuration';
		 $this->data['windowTitle'] 	  = $this->siteTitle.'User Info';
		 $this->data['dynamicView'] 	  = 'pages/admin/user/entry';	
		}
		elseif($contentId !== NULL)
		{
		    $this->data['activeTab'] 	  =  'commercial_dept';
			$this->data['windowTitle'] 	  = $this->siteTitle.'Modify User Info';
		    $this->data['dynamicView'] 	  = 'pages/admin/user/entry';	

		}
		// Load view
		$this->_commonPageLayout('frontend_viewer');

	}

	protected function _commonPageLayout($viewName, $cacheIt = FALSE)
	{
		$view = $this->layout->view($viewName, $this->data, TRUE);
		$replaces = array( 
						   '{SITE_TOP_LOGO}' 		  => $this->load->view('frontend/site_top_logo', $this->data, TRUE), 
						   '{SITE_TOP_MENU}' 	   	  => $this->load->view('frontend/site_top_menu',  NULL, TRUE), 
						   '{SITE_MIDDLE_CONTENT}' 	  => $this->load->view($this->data['dynamicView'],  NULL, TRUE), 
						   '{SITE_FOOTER}' 			  => $this->load->view('frontend/site_footer', NULL, TRUE)

						 );					  

		$this->load->view('view', array('view' => $view, 'replaces' => $replaces));
	}	

}

?>