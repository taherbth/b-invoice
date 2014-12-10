<?php

include_once 'BaseController.php';

class letter extends BaseController {

    function letter() {
        parent::__construct();
       // if ($this->session->userdata('logged_in') != TRUE) {
        if ($this->session->userdata('user_id') == "") {
            redirect('orgadmin/index');
        }
        $this->load->model('organization/letter_model');
    }

    function view_member_bill() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'billing';
        $this->data['dynamicView'] = 'pages/organization/billing/billing_form';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_member_bill() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'billing';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('member_name', 'Member Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/billing/billing_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->data['query2'] = $this->letter_model->get_sms_billing_info();
            $this->data['query1'] = $this->letter_model->get_billing_info();
            $this->data['dynamicView'] = 'pages/organization/billing/billing_detail';
            $this->_commonPageLayout('frontend_viewer');
        }
    }

    function view_archive_article() {
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_letter() {

        $this->data['dynamicView'] = 'pages/organization/archive/letter_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_comments() {
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '15';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/letter/view_archive_comments");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->letter_model->view_comment()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_comment($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/comment_view';
        $this->_commonPageLayout('frontend_viewer');
    }
    function check_letter_header($title, $org_id) {

        $result = $this->dx_auth->is_letter_header_available($title, $org_id);
        if (!$result) {
            $this->form_validation->set_message('check_letter_header', 'Header Title  exists.Please choose another one.');
        }
        return $result;
    }
	
   function check_letter_header1($title, $id) {

        $result = $this->dx_auth->is_letter_header_available1($title, $id);
        if (!$result) {
            $this->form_validation->set_message('check_letter_header1', 'Header Title  exists.Please choose another one.');
        }		
        return $result;
    }

    function add_header() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_header';
        $this->data['dynamicView'] = 'pages/organization/letter/header/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_header() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_header';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_letter_header['.$this->session->userdata('user_id').']');
        $this->form_validation->set_rules('text', 'Header Content', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/header/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'title' => $this->input->post("title"),
                'text' => $this->input->post("text"),
                'org_id' => $this->session->userdata('user_id'),
                'member_id' => 0
            );
            $this->letter_model->header_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Letter header created successfully.</div>');
            redirect('organization/letter/add_header');
        }
    }

    function view_header() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_header';
        $this->data['dynamicView'] = 'pages/organization/letter/header/view';
        $this->_commonPageLayout('frontend_viewer');
    }
   function header_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_header';
        if ($id !== NULL) {
            $this->data['record'] = $this->letter_model->get_header_info($id);
            $this->data['dynamicView'] = 'pages/organization/letter/header/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('title', 'Title', 'trim|required|callback_check_letter_header1['.$this->input->post('id').']');
            $val->set_rules('text', 'Header Content', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'title' => $this->input->post("title"),
                    'text' => $this->input->post("text")
                );
                $this->letter_model->header_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Header Updated Successfully.</div>');
                redirect('organization/letter/view_header');
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function header_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_header';
        $this->letter_model->header_delete($id);
        redirect('organization/letter/view_header');
    }
    function add_footer() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_footer';
        $this->data['dynamicView'] = 'pages/organization/letter/footer/entry';
        $this->_commonPageLayout('frontend_viewer');
    }
   function check_letter_footer($title, $org_id) {

        $result = $this->dx_auth->is_letter_footer_available($title, $org_id);
        if (!$result) {
            $this->form_validation->set_message('check_letter_footer', 'Footer Title  exists.Please choose another one.');
        }
        return $result;
    }
	
   function check_letter_footer1($title, $id) {

        $result = $this->dx_auth->is_letter_footer_available1($title, $id);
        if (!$result) {
            $this->form_validation->set_message('check_letter_footer1', 'Footer Title exists.Please choose another one.');
        }		
        return $result;
    }

    function added_footer() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_footer';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_letter_footer['.$this->session->userdata('user_id').']');
        $this->form_validation->set_rules('text', 'Footer Content', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/footer/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'title' => $this->input->post("title"),
                'text' => $this->input->post("text"),
                'org_id' => $this->session->userdata('user_id'),
                'member_id' => 0
            );
            $this->letter_model->footer_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Letter Footer created successfully.</div>');
            redirect('organization/letter/add_footer');
        }
    }

    function view_footer() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_footer';
        $this->data['dynamicView'] = 'pages/organization/letter/footer/view';
        $this->_commonPageLayout('frontend_viewer');
    }
   function footer_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_footer';
        if ($id !== NULL) {
            $this->data['record'] = $this->letter_model->get_footer_info($id);
            $this->data['dynamicView'] = 'pages/organization/letter/footer/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('title', 'Title', 'trim|required|callback_check_letter_footer1['.$this->input->post('id').']');
            $val->set_rules('text', 'Header Content', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'title' => $this->input->post("title"),
                    'text' => $this->input->post("text")
                );
                $this->letter_model->footer_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Footer Updated Successfully.</div>');
                redirect('organization/letter/view_footer');
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }
  function footer_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_footer';
        $this->letter_model->footer_delete($id);
        redirect('organization/letter/view_footer');
    }

   

    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
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