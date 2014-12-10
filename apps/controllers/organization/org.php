<?php
include_once 'BaseController.php';
class org extends BaseController {

    function org() {
        parent::__construct();
        $this->load->model('organization/presentation_model');
    }
	
    function view_presentaion() {
	    $org_id=$this->input->post("org_id");
		$query=$this->db->query("select * from org_external_previlige where org_id ='".$org_id."'");
		if($query->num_rows()==0){
		  $this->data['message']= "Sorry you are not permitted to view this  organization Info";
		  $this->data['dynamicView'] = 'pages/organization/presentaion/message';
          $this->_commonPageLayout('frontend_viewer');
		}
		else{
		   $data = array(
                'orgid' => $org_id,
                );
         $this->session->set_userdata($data);
		 redirect("organization/presentation/view_presentaion");	
     }
	 }
	  
  
   
    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/org_presentation_message', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_logo_presentation_message1', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}