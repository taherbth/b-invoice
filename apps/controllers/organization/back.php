<?php

include_once 'BaseController.php';

class Back extends BaseController {

    function index() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
       // if ($this->session->userdata('logged_in') != TRUE) {
        if ($this->session->userdata('user_id') == "") {
            redirect('orgadmin/index');
        }
        $this->data['dynamicView'] = 'pages/organization/edit_org';
        $this->_commonPageLayout('frontend_viewer');
    }

    function profile() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('orgadmin/index');
        }
        $this->data['dynamicView'] = 'pages/organization/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo_org', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu_org', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>