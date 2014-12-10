<?php

class letter_model extends Model {

    function letter_model() {
        parent::Model();
        $this->load->helper('url');
    }

    function header_insert($data) {
        $this->db->insert('letter_header', $data);
    }

    function message_insert($data) {
        $this->db->insert('contact_info', $data);
    }

    function footer_insert($data) {
        $this->db->insert('letter_footer', $data);
    }

    //area insert,delete,update start
    function letter_insert($data) {
        $this->db->insert('letter', $data);
    }

    function letter_request_insert($data1) {
        $this->db->insert('letter_send_request', $data1);
    }

    function total_letter_insert($data2) {
        $this->db->insert('total_letter', $data2);
    }

    function view_comment($start=0, $perPage=0) {
        $this->_table = 'forum_archive';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function zone_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('zone', $data);
    }

    function delete_zone($id) {
        $this->db->delete('zone', array('id' => $id));
    }

    function get_zone($id) {
        $query = $this->db->get_where('zone', array('id' => $id));
        return $query->result();
    }

    //end insert,delete,update start
    //package insert,delete,update start

    function view_package($start=0, $perPage=0) {
        $this->_table = 'package';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function address_list_insert($data) {
        $this->db->insert('address_list', $data);
    }

    function view_address_list() {
        $org_id = $this->session->userdata('member_org');
        $member_id = $this->session->userdata('id');
        $query = $this->db->query("select * from address_list where org_id='" . $org_id . "' and member_id='" . $member_id . "'");
        return $query->result();
    }

    function address_list_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('address_list', $data);
    }

    function address_delete($id) {
        $this->db->delete('address_list', array('id' => $id));
    }

    function get_all_address($id) {
        $query = $this->db->get_where('address_list', array('id' => $id));
        return $query->result();
    }

    //start header edit and delete
    function header_delete($id) {
        $this->db->delete('letter_header', array('id' => $id));
    }

    function get_header_info($id) {
        $query = $this->db->get_where('letter_header', array('id' => $id));
        return $query->result();
    }

    function header_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('letter_header', $data);
    }

    //end header edit and delete
    //start footer edit and delete
    function footer_delete($id) {
        $this->db->delete('letter_footer', array('id' => $id));
    }

    function get_footer_info($id) {
        $query = $this->db->get_where('letter_footer', array('id' => $id));
        return $query->result();
    }

    function footer_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('letter_footer', $data);
    }

    function get_group_member($group_id) {
        $query = $this->db->get_where('member', array('member_group' => $group_id));
        return $query->result();
    }

    function view_article_archive($start=0, $perPage=0) {
        $a_type = 1;
        $this->_table = 'archive_article';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article_archive12($start=0, $perPage=0) {
        $a_type = 2;
        $this->_table = 'archive_article';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_article_archive_sort($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 1;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }

            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article_archive_sort1($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 2;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }

            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_message($start=0, $perPage=0) {
        $this->_table = 'contact_info';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('receiver_id', $this->session->userdata('id'));
            $this->db->where('flag', 2);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('receiver_id', $this->session->userdata('id'));
            $this->db->where('flag', 2);

            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    //end header edit and delete

    function delete_message($id) {
        $this->db->delete('contact_info', array('id' => $id));
    }

    function get_message_detail($id) {
        $query = $this->db->get_where('contact_info', array('id' => $id));
        return $query->result();
    }

    function read_status_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('contact_info', $data);
    }

}

