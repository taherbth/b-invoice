<?php

class Info_model extends Model {

    function Info_model() {
        parent::Model();
        $this->load->helper('url');
    }

    /**
 * insert currency data into DB:adminscentral, Table: currency
 *
 *@access public
 *@return Success/Error Message
 */
    function currency_insert($data) {
        $this->db->insert('currency', $data);
    }

    function currency($start=0, $perPage=0) {
        $this->_table = 'currency';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function currency_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('currency', $data);
    }

    function delete_currency($id) {
        $this->db->delete('currency', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }


/**
 * Get currency data From DB:adminscentral, Table: currency
 *
 *@access public
 *@return currency data
*/
   function get_currency($id) {
        if(empty($id)){
            $currency_name['']="Select Currency:";
            $query = $this->db->get('currency');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $currency_name[$rows->id]=$rows->currency_name;
                }
            }
            return $currency_name;
        }
        else{
            $query = $this->db->get_where('currency', array('id' => $id));
            return $query->result();
        }             
}

    //end insert,delete,update start
    //package insert,delete,update start
    function package_insert($data) {
        $this->db->insert('package', $data);
}


    function org_billing_success_insert($data){
            $this->db->insert('org_billing_success', $data);
    }

    function org_billing_failure_insert($data){
            $this->db->insert('org_billing_failure', $data);
}


    function view_package($start=0, $perPage=0) {
        $this->_table = 'package';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function delete_package($id) {
        $this->db->delete('package', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }

    function package_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('package', $data);
    }

/*
    function get_package($id) {
        $query = $this->db->get_where('package', array('id' => $id));
        return $query->result();
    }
*/
    //package insert,delete,update end
    

/**
 * insert global_settings data into DB:adminscentral, Table: global_settings
 *
 *@access public
 *@return Success/Error Message
 */
 
    function update_global_settings($data) {
        $this->db->where('id', 1);
        $this->db->update('global_settings', $data);
        
}


/**
 * Get global_settings data From DB:adminscentral, Table: global_settings
 *
 *@access public
 *@return global_settings data
*/
    function get_global_settings() {
            $where = array('id' => 1);
			$query = $this->db->get_where('global_settings', $where);
            
		if($query->num_rows()>0){
		   	return $query->result();
		}
        
}

function view_cost($start=0, $perPage=0) {
        $this->_table = 'cost';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function cost_delete($id) {
        $this->db->delete('cost', array('id' => $id));
    }

    function cost_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('cost', $data);
    }

    function get_cost($id) {
        $query = $this->db->get_where('cost', array('id' => $id));
        return $query->result();
    }

    function get_all_cost($p_name) {
        $query = $this->db->query("select * from cost where package_name='" . $p_name . "'");
        return $query->result();
    }
    //cost insert,delete,update end
    
/**
 * Get New Customer Data
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return New Customer Data
*/
    function get_new_customer_orders($org_id) {
        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        $this->db->where('user_type','Admin');        
        if($org_id){
            $this->db->where('organization_info.id',$org_id);
        }
        $this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}

/**
 * Get Customer billing info
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return Customer billing info
*/
    function get_customer_billing_info($org_id) {  
        $this->db->select('*');
        $this->db->from('org_billing_info');
        $this->db->join('organization_info', 'org_billing_info.org_id = organization_info.id','left');  
        if($org_id){
            $this->db->where('org_billing_info.org_id',$org_id);
        }
        //$this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}

    function update_org_deny($data, $id) {

        $this->db->where('id', $id);
        $this->db->update('user_info', $data);
}

/**
 * Get All Packages From DB:adminscentral Table: package
 *
 *@Param $id which contains package_id
 *@access public
 *@return TRUE/FALSE
*/
   function get_package($id){       
     if(empty($id)){
            $package_name= array();
            $query = $this->db->get('package');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $currency_data = $this->get_currency($rows->currency_id);
                    $package_name[$rows->id]="Package: ".$rows->package_name.", For ".$rows->duration."year(s)".", Amount: ".$rows->amount.", sms_cost: ".$rows->sms_cost." , letter_cost: ".$rows->letter_cost." , currency:".$currency_data[0]->currency_name;
                }
            }
            return $package_name;
    }
    
    else{ $query = $this->db->get_where('package', array('id' => $id));}
    return $query->result();
}
    function get_userdata($id) {
        $query = $this->db->query("select * from user_info where id='" . $id . "'");
        return $query->result();
    }

    function update_org_approve($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('organization_info', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }

/**
 * Get Registered Customer Data
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return Registered Customer Data
*/
  function get_registered_customer($org_id) {
        //$query = $this->db->query("select * from user_info where login_status=2 order by id DESC");
        //return $query->result();
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        $this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);
        if($org_id){
            $this->db->where('organization_info.id',$org_id);
        }
        $this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
    }

    function get_existing_package($p_name,$id) {
        $query = $this->db->query("select package_name from package where package_name='" . $p_name . "'");
        if($id){
            $query = $this->db->query("select package_name from package where package_name='" . $p_name . "' AND id!='" .$id. "'");
        }
        return $query->result();
    }

    function get_existing_currency($curr_name) {
        $query = $this->db->query("select currency_name from currency where currency_name='" . $curr_name . "'");
        return $query->result();
    }

/**
 * Check org_category_exists In DB:adminscentral Table: org_category
 *
 *@Param $category_name, $id
 *@access public
 *@return TRUE/FALSE
*/
   function check_org_category_exists($category_name,$id) {
        $query = $this->db->query("select category_name from org_category where category_name='" . $category_name . "'");
        return $query->result();
    }

    function org_category_insert($data) {
        $this->db->insert('org_category', $data);
    }

    function pis_org_available($org_type) {
        $query = $this->db->get_where('org_type', array('org_type' => $org_type));
        return $query->num_rows();
    }

    function get_org_category($id) {
        $query = $this->db->get_where('org_category', array('id' => $id));
        return $query->result();
    }

    function org_category_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('org_category', $data);
    }

    function delete_org_category($id) {
        $this->db->delete('org_category', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }

    function view_org_category() {
        $query = $this->db->query("select * from org_category order by id desc");
        return $query->result();
    }

    function org_previlige_insert($data) {
        $this->db->insert('org_previlige', $data);
    }

    function org_previlige_update($data1) {
        $this->db->where('id', $this->input->post('org_id'));
        $this->db->update('user_info', $data1);
    }

    function approve_org_category($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('org_category', $data);
    }

    function deny_org_category($id) {
        $this->db->delete('org_category', array('id' => $id));
    }

    function org_previlige_setting_update($data) {
        $this->db->where('org_id ', $this->input->post('org_id'));
        $this->db->update('org_previlige', $data);
    }

    function update_letter_status($data, $letter_id) {
        $this->db->where('id ', $letter_id);
        $this->db->update('letter', $data);
    }

    function update_letter_status1($data1, $letter1) {
        $this->db->where('letter_id ', $letter1);
        $this->db->update('letter_send_request', $data1);
    }

    function letter_archive_insert($data) {
        $this->db->insert('letter_archive', $data);
    }

    function delete_letter($letter_id) {
        $this->db->delete('letter', array('id' => $letter_id));
    }

    function get_search_result($a) {
        $query = $this->db->query("select * from letter where sending_date='" . $a . "'and admin_status=2");
        return $query->result();
    }

    function get_billing_info() {
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $org_id = $this->input->post("org_name");
        $query = $this->db->query("select * from total_letter where sending_date>='" . $start_date . "'and sending_date<='" . $end_date . "'and org_id='" . $org_id . "'and status=2");
        // echo "<pre>";print_r($query->result());die();
        return $query->result();
    }

    function get_sms_billing_info() {
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $org_id = $this->input->post("org_name");
        $query = $this->db->query("select * from total_sms where sending_date>='" . $start_date . "'and sending_date<='" . $end_date . "'and org_id='" . $org_id . "'");
        // echo "<pre>";print_r($query->result());die();
        return $query->result();
    }
	function view_archive_letter($start=0, $perPage=0) {
        $this->_table = 'letter_archive';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $query = $this->db->get($this->_table);
        }
        return $query;
}

/**
 * Check Currency Assigned To DB:adminscentral, Table: package
 *
 *@Param $id which contains currency_id
 *@access public
 *@return TRUE/FALSE
*/

function check_currency_assigned($id){
    $query = $this->db->get_where('package', array('currency_id' => $id));    
    return ($query->num_rows() > 0) ? TRUE : FALSE;	     
}

/**
 * Check Category Assigned To DB:adminscentral, Table: user_info
 *
 *@Param $id which contains category_id
 *@access public
 *@return TRUE/FALSE
*/

function check_category_assigned($id){
    $query = $this->db->get_where('user_info', array('org_category' => $id));    
    return ($query->num_rows() > 0) ? TRUE : FALSE;	     
}

/**
 * Check Package Assigned To DB:adminscentral, Table: organization_info
 *
 *@Param $id which contains package_id
 *@access public
 *@return TRUE/FALSE
*/
function check_package_assigned($id){
    $query = $this->db->get_where('organization_info', array('package_name' => $id));    
    return ($query->num_rows() > 0) ? TRUE : FALSE;	     
}

function get_existing_org_no($org_no) {
        $query = $this->db->query("select org_number from user_info where org_number='" . $org_no . "'");
        return $query->result();
}

/**
 * Insert Organization Registration Data To DB:adminscentral, Table:  organization_info,member,org_billing_info
 *
 *@Param $id which contains package_id
 *@access public
 *@return TRUE/FALSE
*/
function register_organisation($data_organization,$data_admin_user,$data_billing){
    $last_insert_ids = array();
    $this->db->insert('organization_info', $data_organization);      
    $org_id = $this->db->insert_id();
    if($org_id){
         $data_admin_user['org_id'] = $org_id;
         $this->db->insert('member', $data_admin_user);      
         $mem_id = $this->db->insert_id();
    }
    if($mem_id){
         $data_billing['org_id'] = $org_id;
         $this->db->insert('org_billing_info', $data_billing);      
         $bill_id = $this->db->insert_id();
    }
    if($bill_id){
        $last_insert_ids = array('org_id' => $org_id, 'org_billing_info_id' => $bill_id);
        return $last_insert_ids;
   }
    else return $last_insert_ids;
}

/**
 * Get package info from Table: package
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return package info
*/
function get_package_info($org_id){
    $this->db->select('*');
    $this->db->from('organization_info');
    $this->db->join('package', 'organization_info.package_name = package.id','left');  
    $this->db->where('organization_info.id',$org_id);
    $query= $this->db->get();
    return $query->result();
}

/**
 * Remove organization info and memebr info by denying org
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return package info
*/
function org_deny($org_id) {
        $this->db->delete('organization_info', array('id' => $org_id));
        if($this->db->affected_rows() > 0){
            $this->db->delete('member', array('org_id' => $org_id));
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
        else{return FALSE;}
}


function bill_faktura_insert($data) {
        $this->db->insert('bill_faktura', $data);
        $fak_id = $this->db->insert_id();
        return $fak_id;
}


/**
 * Check admin user previlize for logged user
 *
 *@Param $user_type_id which contains logged user's user_type_id
 *@access public
 *@return admin user previlize
*/
function check_admin_user_previlize($user_type_id){
        $query = $this->db->get_where('admin_user_previlize', array('user_type_id' => $user_type_id));
        return $query->result();    
}
}

