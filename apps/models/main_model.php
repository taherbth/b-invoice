<?php

class main_model extends Model {

    function main_model() {
        parent::Model();
        $this->load->helper('url');
    }

    //area insert,delete,update start
    function register_organisation($data) {
        $this->db->insert('user_info', $data);
    }

    function get_package_amount($package) {
        $query = $this->db->query("select * from package where id='" . $package . "'");
        return $query->result();
    }

    //cost insert,delete,update end
    function get_userdata($id) {
        $query = $this->db->query("select * from user_info where id='" . $id . "'");
        return $query->result();
    }

    function get_org_message($user_id) {
        $query = $this->db->query("select * from user_info where id='" . $user_id . "'");
        return $query->result();
    }

    function update_user($data, $user_id) {

        $this->db->where('id', $user_id);
        $this->db->update('user_info', $data);
    }

    function get_existing_org_no($org_no) {
        $query = $this->db->query("select org_number from user_info where org_number='" . $org_no . "'");
        return $query->result();
}



}

