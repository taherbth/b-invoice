<?php

include_once 'BaseController.php';

class letter extends BaseController {

    function letter() {
        parent::__construct();
        // if ($this->session->userdata('loggedin') != TRUE) {
        if ($this->session->userdata('id') == "") {
            redirect('member/index');
        }
        $this->load->model('org_member/letter_model');
    }

    function add_letter($start=0) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_letter';
        $this->data['dynamicView'] = 'pages/member/letter/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_letter1($start=0) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/letter/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {

            $data = array(
                'title' => $this->input->post('title'),
                'text' => $this->input->post('text'),
                'sender_name' => $this->session->userdata('id'),
                'org_id' => $this->session->userdata('member_org'),
                'member_group' => $this->session->userdata('member_group'),
                'letter_header' => $this->input->post('letter_header'),
                'letter_footer' => $this->input->post('letter_footer'),
                'sending_date' => date("Y-m-d"),
                'admin_status' => 1,
                'superadmin_status' => 1,
            );
            $this->letter_model->letter_insert($data);
            $letter_id = $this->db->insert_id();



            $a = $this->input->post("checkbox");
            for ($i = 0; $i < sizeof($a); $i++):
                $data1 = array(
                    'sender_id' => $this->session->userdata('id'),
                    'member_id' => $a[$i],
                    'letter_id' => $letter_id,
                    'org_id' => $this->session->userdata('member_org'),
                    'admin_status' => 1,
                    'superadmin_status' => 1
                );
                $this->letter_model->letter_request_insert($data1);
            endfor;



            $total_no_of_letter = sizeof($a);
            $sender_name = $this->session->userdata('id');
            $data2 = array(
                'sending_date' => date('Y-m-d'),
                'sender_name' => $this->session->userdata('id'),
                'no_of_letter' => $total_no_of_letter,
                'org_id' => $this->session->userdata('member_org'),
                'letter_id' => $letter_id,
                'status' => 1
            );
            $this->letter_model->total_letter_insert($data2);
            $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
            redirect('org_member/letter/add_letter');
        }
    }

    function added_letter($start=0) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/letter/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $post_member = $this->input->post("checkbox");
            $post_group = $this->input->post("checkbox1");
            if (!empty($post_member) || !empty($post_group)) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text'),
                    'sender_name' => $this->session->userdata('id'),
                    'org_id' => $this->session->userdata('member_org'),
                    'member_group' => $this->session->userdata('member_group'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 1,
                    'superadmin_status' => 1,
                );
                $this->letter_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                if (!empty($post_member)) {
                    for ($i = 0; $i < sizeof($post_member); $i++):
                        if ($post_member[$i] != $this->session->userdata("id")):
                            $data1 = array(
                                'sender_id' => $this->session->userdata('id'),
                                'member_id' => $post_member[$i],
                                'letter_id' => $letter_id,
                                'org_id' => $this->session->userdata('member_org'),
                                'admin_status' => 1,
                                'superadmin_status' => 1
                            );
                            $this->letter_model->letter_request_insert($data1);
                        endif;
                    endfor;
                }
                $j = 0;
                if (!empty($post_group)) {
                    for ($i = 0; $i < sizeof($post_group); $i++):
                        $group_id = $post_group[$i];
                        $this->data['group_member'] = $this->letter_model->get_group_member($group_id);
                        foreach ($this->data['group_member'] as $g_member_info):
                            if ($g_member_info->id != $this->session->userdata("id")):
                                $data1 = array(
                                    'sender_id' => $this->session->userdata('id'),
                                    'member_id' => $g_member_info->id,
                                    'letter_id' => $letter_id,
                                    'org_id' => $this->session->userdata('member_org'),
                                    'admin_status' => 1,
                                    'superadmin_status' => 1
                                );
                                $this->letter_model->letter_request_insert($data1);
                                $j = $j + 1;
                            endif;
                        endforeach;
                    endfor;
                }

                $total_no_of_letter = sizeof($post_member) + $j;
                $sender_name = $this->session->userdata('id');
                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => $this->session->userdata('id'),
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('member_org'),
                    'letter_id' => $letter_id,
                    'status' => 1
                );
                $this->letter_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                redirect('org_member/letter/add_letter');
            }
            else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('org_member/letter/add_letter');
            }
        }
    }

    function add_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_external_letter';
        $this->data['dynamicView'] = 'pages/member/letter/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_external_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('letter_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('letter_text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/letter/external_entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $b = $this->input->post("checkbox");
            if (empty($b)) {
                $this->session->set_flashdata('message', '<div id="message">Please check the sender name.</div>');
                redirect('org_member/letter/add_external_letter');
            } else {
                $data = array(
                    'title' => $this->input->post('letter_title'),
                    'text' => $this->input->post('letter_text'),
                    'sender_name' => $this->session->userdata('id'),
                    'org_id' => $this->session->userdata('member_org'),
                    'member_group' => $this->session->userdata('member_group'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 1,
                    'superadmin_status' => 1,
                    'letter_status' => 2,
                );
                $this->letter_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                $a = $this->input->post("checkbox");
                for ($i = 0; $i < sizeof($a); $i++):
                    $data1 = array(
                        'sender_id' => $this->session->userdata('id'),
                        'member_id' => $a[$i],
                        'letter_id' => $letter_id,
                        'org_id' => $this->session->userdata('member_org'),
                        'admin_status' => 1,
                        'superadmin_status' => 1,
                        'letter_status' => 2,
                    );
                    $this->letter_model->letter_request_insert($data1);
                endfor;
                $total_no_of_letter = sizeof($a);
                $sender_name = $this->session->userdata('id');
                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => $this->session->userdata('id'),
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('member_org'),
                    'status' => 1,
                    'letter_id' => $letter_id,
                );
                //echo "<pre>";print_r($data2);die();
                $this->letter_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                redirect('org_member/letter/add_external_letter');
            }
        }
    }

    function view_archive_article() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'view_archive_article';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/view_archive_article");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->letter_model->view_article_archive()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_article_archive($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['dynamicView'] = 'pages/organization/archive/article_view';
        // $this->_commonPageLayout('frontend_viewer');

        $this->data['dynamicView'] = 'pages/member/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
    function private_archive_article() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'private_archive_article';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/private_archive_article");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->letter_model->view_article_archive12()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_article_archive12($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['dynamicView'] = 'pages/organization/archive/article_view';
        // $this->_commonPageLayout('frontend_viewer');

        $this->data['dynamicView'] = 'pages/member/archive/article_view12';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_article_sort() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'view_archive_article';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);
        $id = $this->input->post("article_type");
        $category = $this->input->post("article_category");
        
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
         if ($category == "") {
            $category = $ar_sort1;
        } else {
             $category = $category;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '2';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/view_archive_article_sort/" . $id . "/".$category."/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->letter_model->view_article_archive_sort(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_article_archive_sort($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['dynamicView'] = 'pages/organization/archive/article_view';
        // $this->_commonPageLayout('frontend_viewer');

        $this->data['dynamicView'] = 'pages/member/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
    function view_archive_article_sort1() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'private_archive_article';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);
        $id = $this->input->post("article_type");
        $category = $this->input->post("article_category");
        
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
         if ($category == "") {
            $category = $ar_sort1;
        } else {
             $category = $category;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '2';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/view_archive_article_sort1/" . $id . "/".$category."/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->letter_model->view_article_archive_sort1(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_article_archive_sort1($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['dynamicView'] = 'pages/organization/archive/article_view';
        // $this->_commonPageLayout('frontend_viewer');

        $this->data['dynamicView'] = 'pages/member/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_letter() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'view_archive_letter';
        $this->data['dynamicView'] = 'pages/member/archive/letter_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_comments() {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'view_archive_comments';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/view_archive_comments");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->letter_model->view_comment()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_comment($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/archive/comment_view';
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
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_header';
        $this->data['dynamicView'] = 'pages/member/letter/header/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_header() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_header';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_letter_header[' . $this->session->userdata('member_org') . ']');
        $this->form_validation->set_rules('text', 'Header Content', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/letter/header/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'title' => $this->input->post("title"),
                'text' => $this->input->post("text"),
                'org_id' => $this->session->userdata('member_org'),
                'member_id' => $this->session->userdata('id'),
            );
            $this->letter_model->header_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Letter header created successfully.</div>');
            redirect('org_member/letter/add_header');
        }
    }

    function header_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_header';
        if ($id !== NULL) {
            $this->data['record'] = $this->letter_model->get_header_info($id);
            $this->data['dynamicView'] = 'pages/member/letter/header/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('title', 'Title', 'trim|required|callback_check_letter_header1[' . $this->input->post('id') . ']');
            $val->set_rules('text', 'Header Content', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'title' => $this->input->post("title"),
                    'text' => $this->input->post("text")
                );
                $this->letter_model->header_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Header Updated Successfully.</div>');
                redirect('org_member/letter/view_header');
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_header() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_header';
        $this->data['dynamicView'] = 'pages/member/letter/header/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_footer() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_footer';
        $this->data['dynamicView'] = 'pages/member/letter/footer/entry';
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
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'create_footer';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_letter_footer[' . $this->session->userdata('member_org') . ']');
        $this->form_validation->set_rules('text', 'Footer Content', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/letter/footer/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'title' => $this->input->post("title"),
                'text' => $this->input->post("text"),
                'org_id' => $this->session->userdata('member_org'),
                'member_id' => $this->session->userdata('id'),
            );
            $this->letter_model->footer_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Letter Footer created successfully.</div>');
            redirect('org_member/letter/add_footer');
        }
    }

    function view_footer() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_footer';
        $this->data['dynamicView'] = 'pages/member/letter/footer/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_address() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'add_address';
        $this->data['dynamicView'] = 'pages/member/address/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_address() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'add_address';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('address_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/address/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_id' => $this->session->userdata('member_org'),
                'member_id' => $this->session->userdata('id'),
                'address_title' => $this->input->post('address_title'),
                'address' => $this->input->post('address')
            );
            $this->letter_model->address_list_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Address list Inserted Successfully.</div>');
            redirect('org_member/letter/add_address');
        }
    }

    function view_address_list() {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_list';
        $this->data['query1'] = $this->letter_model->view_address_list();
        $this->data['dynamicView'] = 'pages/member/address/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_list';
        if ($id !== NULL) {
            $this->data['record'] = $this->letter_model->get_all_address($id);
            $this->data['dynamicView'] = 'pages/member/address/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('address_title', 'Title', 'trim|required');
            $val->set_rules('address', 'Address', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'address_title' => $this->input->post('address_title'),
                    'address' => $this->input->post('address')
                );
                $this->letter_model->address_list_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Address list Updated Successfully.</div>');
                redirect('org_member/letter/view_address_list', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_list';
        $this->letter_model->address_delete($id);
        redirect('org_member/letter/view_address_list', 'location', 301);
    }

    function header_view($id=NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_header';
        if ($id != ""):
            $query = $this->db->query("select * from letter_header where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function footer_view($id=NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_footer';
        if ($id != ""):
            $query = $this->db->query("select * from letter_footer where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function header_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_header';
        $this->letter_model->header_delete($id);
        redirect('org_member/letter/view_header');
    }

    function footer_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_footer';
        $this->letter_model->footer_delete($id);
        redirect('org_member/letter/view_footer');
    }

    function footer_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_member';
        $this->data['activeTab'] = 'view_footer';
        if ($id !== NULL) {
            $this->data['record'] = $this->letter_model->get_footer_info($id);
            $this->data['dynamicView'] = 'pages/member/letter/footer/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('title', 'Title', 'trim|required|callback_check_letter_footer1[' . $this->input->post('id') . ']');
            $val->set_rules('text', 'Header Content', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'title' => $this->input->post("title"),
                    'text' => $this->input->post("text")
                );
                $this->letter_model->footer_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Footer Updated Successfully.</div>');
                redirect('org_member/letter/view_footer');
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function compose_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['dynamicView'] = 'pages/member/message/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function composed_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/message/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata("member_org"),
                'sender_id' => $this->session->userdata("id"),
                'name' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 1,
                'sender_status' => 1
            );
            $this->letter_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('org_member/letter/compose_message');
        }
    }

    function add_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['dynamicView'] = 'pages/member/message/member_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/message/member_entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $post_member = $this->input->post("checkbox");
            $post_group = $this->input->post("checkbox1");
            if (!empty($post_member) || !empty($post_group)) {
                $photo1 = "";
                if ($_FILES['photo']['size'] > 0) {
                    if ($this->now_upload()) {
                        $photo1 = $this->upload_data['file_name'];
                    }
                }

                if (!empty($post_member)) {
                    for ($i = 0; $i < sizeof($post_member); $i++):
                        $data = array(
                            'org_id' => $this->session->userdata("member_org"),
                            'sender_id' => $this->session->userdata("id"),
                            'receiver_id' => $post_member[$i],
                            'name' => $this->input->post("name"),
                            'email' => $this->input->post("email"),
                            'subject' => $this->input->post("subject"),
                            'message' => $this->input->post("message"),
                            'message_date' => date("Y-m-d"),
                            'photo1' => $photo1,
                            'message_status' => 2,
                            'flag' => 2,
                            'sender_status' => 1
                        );

                        $this->letter_model->message_insert($data);

                    endfor;
                }
                if (!empty($post_group)) {
                    for ($i = 0; $i < sizeof($post_group); $i++):
                        $group_id = $post_group[$i];
                        $this->data['group_member'] = $this->letter_model->get_group_member($group_id);
                        foreach ($this->data['group_member'] as $g_member_info):
                            if ($g_member_info->id != $this->session->userdata("id")):
                                $data = array(
                                    'org_id' => $this->session->userdata("member_org"),
                                    'sender_id' => $this->session->userdata("id"),
                                    'receiver_id' => $g_member_info->id,
                                    'name' => $this->input->post("name"),
                                    'email' => $this->input->post("email"),
                                    'subject' => $this->input->post("subject"),
                                    'message' => $this->input->post("message"),
                                    'message_date' => date("Y-m-d"),
                                    'photo1' => $photo1,
                                    'message_status' => 2,
                                    'flag' => 2,
                                    'sender_status' => 1
                                );
                                $this->letter_model->message_insert($data);
                            endif;
                        endforeach;
                    endfor;
                }
                $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
                redirect('org_member/letter/add_message');
            }
            else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('org_member/letter/add_letter');
            }
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

    function view_inbox() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '15';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/letter/view_inbox");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->letter_model->view_message()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->letter_model->view_message($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/message/inbox';
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_message() {
        $a = $this->input->post("checkbox");
        for ($i = 0; $i < sizeof($a); $i++):
            $id = $a[$i];
            $this->letter_model->delete_message($id);
        endfor;
        redirect('org_member/letter/view_inbox');
    }

    function view_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $data = array(
            'message_status' => 1
        );
        $this->letter_model->read_status_update($data, $id);
        $this->data['message'] = $this->letter_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/member/message/message_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function reply_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['message_info'] = $this->letter_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/member/message/reply_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function message_reply($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['message_info'] = $this->letter_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/member/message/reply_view_admin';
        $this->_commonPageLayout('frontend_viewer');
    }

    function message_replied() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post("id");
            $this->data['message_info'] = $this->letter_model->get_message_detail($id);
            $this->data['dynamicView'] = 'pages/member/message/reply_view_admin';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata("member_org"),
                'name' => $this->session->userdata("name"),
                'sender_id' => $this->session->userdata("id"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 1,
                'sender_status' => 1
            );
            $this->letter_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('org_member/letter/view_inbox');
        }
    }

    function replied_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post("id");
            $this->data['message_info'] = $this->letter_model->get_message_detail($id);
            $this->data['dynamicView'] = 'pages/member/message/reply_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata("member_org"),
                'name' => $this->session->userdata("name"),
                'receiver_id' => $this->input->post("sender_id"),
                'sender_id' => $this->session->userdata("id"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 2,
                'sender_status' => 1
            );
            $this->letter_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('org_member/letter/view_inbox');
        }
    }

    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
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