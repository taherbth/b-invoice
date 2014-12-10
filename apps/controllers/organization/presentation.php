<?php

include_once 'BaseController.php';

class presentation extends BaseController {

    function presentation() {
        parent::__construct();
        $this->load->model('organization/presentation_model');
    }

    function view_presentaion() {
        $this->data['mainTab'] = '';
        $this->data['org_id'] = $this->session->userdata("orgid");
        $this->data['dynamicView'] = 'pages/organization/presentaion/presentation_home';
        $this->_commonPageLayout('frontend_viewer');
    }

    function about_us() {
        $this->data['mainTab'] = 'aboutus';
        $this->data['dynamicView'] = 'pages/organization/presentaion/home';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard() {
        $this->data['mainTab'] = 'mainboard';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/presentation/view_mainboard");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->presentation_model->view_mainboard_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->presentation_model->view_mainboard_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/presentaion/mainboard';
        $this->_commonPageLayout('frontend_viewer');

        // $this->data['org_id']=$this->input->post("org_id");
        //$this->data['dynamicView'] = 'pages/organization/presentaion/mainboard';
        //$this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/presentaion/post_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_details($id) {
        $this->data['mainTab'] = 'archive';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/presentaion/post_details';
        $this->_commonPageLayout('frontend_viewer');
    }

    function compose_message($id=NULL) {
        $this->data['mainTab'] = 'contact';
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['dynamicView'] = 'pages/organization/presentaion/contact_form';
        $this->_commonPageLayout('frontend_viewer');
    }

    function composed_message() {
        $this->data['mainTab'] = 'contact';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/presentaion/contact_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata('orgid'),
                'sender_id' => 0,
                'name' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 1,
                'sender_status' => 2
            );
            $this->presentation_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('organization/presentation/compose_message');
        }
    }

    protected function now_upload() {
        $setConfig['upload_path'] = './uploads/';
        $setConfig['allowed_types'] = 'doc|docx|txt|pdf|zip|xls|jpg|jpeg|gif|png';
        $setConfig['encrypt_name'] = TRUE;
        $setConfig['max_size'] = '';
        //$this->load->library('upload', $setConfig);
        $this->load->library('upload');
        $this->upload->initialize($setConfig);
        if (!$this->upload->do_upload('photo')) {
            $this->data['admin_message'] = $this->upload->display_errors("<p style='color:#FF0000; font-weight:bold;'>", "</p>");
            return FALSE;
        } else {
            $this->upload_data = $this->upload->data();
            return TRUE;
        }
    }

    function view_archive() {
        $this->data['mainTab'] = 'archive';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/presentation/view_archive");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->presentation_model->view_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->presentation_model->view_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/presentaion/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/org_presentation', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_logo_presentation', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}