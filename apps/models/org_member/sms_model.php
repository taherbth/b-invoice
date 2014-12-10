<?php

class sms_model extends Model {

    function sms_model() {
        parent::Model();
        $this->load->helper('url');
    }

    //area insert,delete,update start
    function letter_insert($data) {
        $this->db->insert('letter', $data);
    }

    function sms_insert($data) {
        $this->db->insert('sms', $data);
    }

    function sms_insert1($data1) {
        $this->db->insert('sms', $data1);
    }

    function get_group_member($group_id) {
        $query = $this->db->get_where('member', array('member_group' => $group_id));
        return $query->result();
    }

    function get_orginfo($uid) {
        $query = $this->db->get_where('signature', array('org_id' => $uid));
        return $query->result();
    }

    function get_member($id) {
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->result();
    }

    //start insert delete,update contact list
    function address_list_insert($data) {
        $this->db->insert('contact_list', $data);
    }

    function view_address_list() {
        $id = $this->session->userdata('id');
        $query = $this->db->query("select * from contact_list where member_id='" . $id . "'");
        return $query->result();
    }

    function get_all_address($id) {
        $query = $this->db->get_where('contact_list', array('id' => $id));
        return $query->result();
    }

    function address_list_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('contact_list', $data);
    }

    function address_delete($id) {
        $this->db->delete('contact_list', array('id' => $id));
    }

    //end insert delete,update contact list

    function get_member_external($id) {
        $query = $this->db->get_where('contact_list', array('id' => $id));
        return $query->result();
    }

    function sms_content_insert($data1) {
        $this->db->insert('sms_request', $data1);
    }

    function total_sms_insert($data2) {
        $this->db->insert('total_sms', $data2);
    }

}

