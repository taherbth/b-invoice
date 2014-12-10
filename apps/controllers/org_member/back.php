<?php

include_once 'BaseController.php';

class Back extends BaseController {

    function index() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';

        //if ($this->session->userdata('loggedin') != TRUE) {
        if ($this->session->userdata('id') == "") {
            redirect('member/index');
        }
        $this->data['dynamicView'] = 'pages/member/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo_member', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu_member', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>