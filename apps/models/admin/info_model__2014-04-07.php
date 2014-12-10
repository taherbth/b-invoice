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
            $insert_id = $this->db->insert_id();
            return ($insert_id > 0) ? $insert_id : 0;	
    }

function package_assigned_to_org_member_insert($assigned_package_data){
    $this->db->insert('package_assigned_to_org_member', $assigned_package_data);
    $insert_id = $this->db->insert_id();
    return ($insert_id > 0) ? $insert_id : 0;	
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

    function package_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('package', $data);
    }



/**
 * Delete SMS message : From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $admin_sms_id Whcih contains SMS id
 *@access private
 *@return Success/Failure message
 */

    function delete_admin_sms($admin_sms_id) {
        /*$query_str = $this->db->query("DELETE FROM  admin_communicate_org_sms WHERE sms_id IN($admin_sms_id)");
        $query = $this->db->query($query_str);*/
        
        
        $this->db->where_in('sms_id', $admin_sms_id);
        $this->db->delete('admin_communicate_org_sms');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }
/**
 * Update Faktura 
 *
 *@Param $data_faktura which contains faktura info and $fak_id which contains fak id
 *@access public
 *@return Success/Error Message
 */
 
function bill_faktura_update($data_faktura,$fak_id){
        $this->db->where('fak_id', $fak_id);
        $this->db->update('bill_faktura', $data_faktura);
}

/**
 * Update admin_communicate_org_letter
 *
 *@Param $data_letter which contains letter info and $letter_id which contains letter id
 *@access public
 *@return Success/Error Message
 */
 
function admin_communicate_org_letter_update($data_letter,$letter_id){
        $this->db->where('letter_id', $letter_id);
        $this->db->update('admin_communicate_org_letter', $data_letter);
}

/**
 * Update org_member_letter
 *
 *@Param $data_letter which contains letter info and $letter_id which contains letter id
 *@access Private
 *@return Success/Error Message
 */
 
function org_member_letter_update($data_letter,$letter_id){
        $this->db->where('letter_id', $letter_id);
        $this->db->update('org_member_letter', $data_letter);
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
        $this->db->where('mem_type_id','Superadmin');        
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
}

/**
 * Get Package assigned to organization member  Info
 *
 *@Param $mem_id which contains member_id, $flag contains different flag, $mem_type_id contains member_type
 *@access Private
 *@return Package assigned to organization member  Info
*/
function get_package_assigned_to_org_member_info($mem_id, $flag, $mem_type_id){ 
    $this->db->select('*');
    $this->db->from('package_assigned_to_org_member');
    $this->db->join('member', 'package_assigned_to_org_member.mem_id = member.mem_id','left');  
    if($mem_id){
        $this->db->where('member.mem_id',$mem_id);
    }
    if($flag=="ordered"){
        $this->db->where('package_assigned_to_org_member.ordered',1);
    }
    if($flag=="active"){
        $this->db->where('package_assigned_to_org_member.active',1);
    }
    if($mem_type_id=="Superadmin"){
        $this->db->where('member.mem_type_id', 'Superadmin');
    }
    $this->db->order_by("member.mem_id", "DESC");
    $query= $this->db->get();
    return $query->result();
}


    function update_org_deny($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('user_info', $data);
}

/**
 * Get All Active Packages From DB:adminscentral Table: package
 *
 *@Param $id which contains package_id
 *@access Private
 *@return All Active Packages
*/
function get_active_package($id){
    $this->db->select('*');
    $this->db->from('package');
    if($id){
            $this->db->where('id',$id);
    }
    $this->db->where('active', 1);
    $query= $this->db->get();
    return $query->result();
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

function update_package_assigned_to_org_member($update_data, $package_assigned_id) {
        $this->db->where('package_assigned_id', $package_assigned_id);
        $this->db->update('package_assigned_to_org_member', $update_data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
}

    function update_member($data, $mem_id) {
        $this->db->where('mem_id', $mem_id);
        $this->db->update('member', $data);
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
        $this->db->where('mem_type_id','Superadmin');      
        $this->db->where('organization_info.approval_status',1);
        if($org_id){
            $this->db->where('organization_info.id',$org_id);
        }
        $this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}

/**
 * Get admin_communicate_org_message From DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $flag which indicates all messages/inbox messages/unread messages
 *@access private
 *@return admin_communicate_org_message
*/
  function get_admin_communicate_org_message($flag) {        
        $this->db->select('*');
        $this->db->from('admin_communicate_org_email');
        
        if($flag=="inbox"){
            $this->db->where('send_from !=',"Adminscentral");
            $this->db->where('message_read',0);
            $query= $this->db->get();
            return $query->num_rows();            
    }
    if($flag=="sent"){
            $this->db->where('send_from =',"Adminscentral");
            //$this->db->where('message_read',0);
            $query= $this->db->get();
            return $query->num_rows();            
        }
        //$this->db->order_by("communication_id", "DESC");
        //$query= $this->db->get();
        //return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}


/**
 * Get admin_communicate_org_message by communication_id  From DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $id which contains  communication_id
 *@access private
 *@return admin_communicate_org_message by  communication_id
*/
  function get_email_message_detail_by_id($id) {        
        $this->db->select('*');
        $this->db->from('admin_communicate_org_email');
        $this->db->where('communication_id',$id);
        $query= $this->db->get();
        return $query->result();
}


/**
 * Get admin_communicate_org_sms by communication_id  From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $id which contains  sms_id
 *@access private
 *@return admin_communicate_org_sms by  sms_id
*/
  function get_sms_message_detail_by_id($id) {        
        $this->db->select('*');
        $this->db->from('admin_communicate_org_sms');
        $this->db->where('sms_id',$id);
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get get_admin_communicate_all_message From DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $flag which indicates all messages/inbox messages/unread messages
 *@access private
 *@return admin_communicate_org_message
*/
    function get_admin_communicate_all_message($start=0, $perPage=0) {
            $this->_table = 'admin_communicate_org_email';        
            $this->db->where('send_from !=',"Adminscentral"); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.communication_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}



/**
 * Get get_admin_communicate_all_message From DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $flag which indicates all messages/sent 
 *@access private
 *@return admin_communicate_org_message
*/
    function get_admin_communicate_sent_message($start=0, $perPage=0) {
            $this->_table = 'admin_communicate_org_email';        
            $this->db->where('send_from =',"Adminscentral"); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.communication_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
    }

/**
 * Get email_message_read status update To DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $data which contains read status value(1) AND $id contains E-mail message id
 *@access private
 *@return Success/Error Message
*/
    function admin_comm_org_email_status_update($data, $id) {
        $this->db->where('communication_id', $id);
        $this->db->update('admin_communicate_org_email', $data);
    }


/**
 * contact site admin read message status update To DB: adminscentral Table: contact_with_site_admin
 *
 *@Param $data which contains read status value(1) AND $id contains conatct id
 *@access private
 *@return Success/Error Message
*/
    function site_admin_contact_status_update($data, $id) {
        $this->db->where('contact_id', $id);
        $this->db->update('contact_with_site_admin', $data);
    }

/**
 * Get sms_message_read status update To DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $data which contains read status value(1) AND $id contains SMS message id
 *@access private
 *@return Success/Error Message
*/
    function admin_comm_org_sms_status_update($data, $id) {
        $this->db->where('sms_id', $id);
        $this->db->update('admin_communicate_org_sms', $data);
    }

/**
 * Get E-mail message details From DB:adminscentral Table: admin_communicate_org_email
 *
 *@Param $id which contains E-mail message id
 *@access private
 *@return E-mail message details
*/

    function get_email_message_detail($id) {
        $query = $this->db->get_where('admin_communicate_org_email', array('communication_id' => $id));
        return $query->result();
    }



/**
 * Get contact site admin message details From DB:adminscentral Table: contact_with_site_admin
 *
 *@Param $id which contains contact id
 *@access private
 *@return contact message details
*/

    function get_contact_site_admin_message_detail($id) {
        $query = $this->db->get_where('contact_with_site_admin', array('contact_id' => $id));
        return $query->result();
    }

/**
 * Get reply_email_message_detail From DB:adminscentral Table: admin_communicate_org_email
 *
 *@Param $communication_id which contains E-mail message id AND $reply_id which contains reply for which message
 *@access private
 *@return E-mail message details
*/
    function get_reply_email_message_detail($communication_id, $reply_id) {
        $this->db->select('*');
        $this->db->from('admin_communicate_org_email');
        //$where = "communication_id=$reply_id";OR (reply_of=$reply_id AND communication_id!=$communication_id)
        //$where = "reply_of=$reply_id AND communication_id!=$communication_id";
        if($communication_id){        
            $this->db->where('communication_id',$reply_id); 
        }
        $this->db->or_where('reply_of',$reply_id);
        $this->db->where('communication_id !=',$communication_id);
        $this->db->order_by('communication_id', 'DESC');
        $query= $this->db->get();
        return $query->result();
    }



/**
 * Get admin_communicate_org_sms From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $flag which indicates all sms/inbox sms/unread sms
 *@access private
 *@return admin_communicate_org_sms
*/
  function get_admin_communicate_org_sms($flag) {        
        $this->db->select('*');
        $this->db->from('admin_communicate_org_sms');
        
        if($flag=="inbox"){
            $this->db->where('send_from !=',"Adminscentral");
            $this->db->where('sms_read',0);
            $query= $this->db->get();
            return $query->num_rows();            
        }elseif($flag=="sent"){
            $this->db->where('send_from =',"Adminscentral");
            //$this->db->where('sms_read',0);
            $query= $this->db->get();
            return $query->num_rows();            
        }
        //$this->db->order_by("communication_id", "DESC");
        //$query= $this->db->get();
        //return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}


/**
 * Get admin_communicate_org_letter From DB: adminscentral Table: admin_communicate_org_letter
 *
 *@access private
 *@return admin_communicate_org_letter
*/
  function get_admin_communicate_org_no_of_letter() {        
        $this->db->select('*');
        $this->db->from('admin_communicate_org_letter');
        $query= $this->db->get();
        return $query->num_rows();                   
}

/**
 * Get get_admin_communicate_all_letter From DB: adminscentral Table: admin_communicate_org_letter
 *
 *@access private
 *@return admin_communicate_org_letter
*/
    function get_admin_communicate_all_letter($start=0, $perPage=0) {
            $this->_table = 'admin_communicate_org_letter';                   
            $this->db->order_by($this->_table . '.letter_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}



/**
 * Get Organization's Letter Order From DB: adminscentral Table:  org_member_letter
 *
 *@access private
 *@return Organization's Letter Order
*/
  function get_org_member_no_of_letter() {        
        $this->db->select('*');
        $this->db->from('org_member_letter');
        $query= $this->db->get();
        return $query->num_rows();                   
}

/**
 * Get Organization's Letter Order From DB: adminscentral Table: org_member_letter
 *
 *@access private
 *@return Organization's Letter Order
*/
    function get_org_member_all_letter($start=0, $perPage=0) {
            $this->_table = 'org_member_letter';                   
            $this->db->order_by($this->_table . '.letter_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}

/**
 * Get get_admin_communicate_all_sms From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@access private
 *@return admin_communicate_org_sms
*/
    function get_admin_communicate_all_sms($start=0, $perPage=0) {
            $this->_table = 'admin_communicate_org_sms';        
            $this->db->where('send_from !=',"Adminscentral"); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.sms_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
    }


/**
 * Get get_admin_communicate_sent_sms From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $flag which indicates all sms/sent messages
 *@access private
 *@return admin_communicate_org_sms
*/
    function get_admin_communicate_sent_sms($start=0, $perPage=0) {
            $this->_table = 'admin_communicate_org_sms';        
            $this->db->where('send_from =',"Adminscentral"); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.sms_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
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
        $data['status']=1;
        $this->db->insert('org_category', $data);
        $cat_id = $this->db->insert_id();
        return $cat_id;
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

/*
    function get_billing_info() {
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $org_id = $this->input->post("org_name");
        $query = $this->db->query("select * from total_letter where sending_date>='" . $start_date . "'and sending_date<='" . $end_date . "'and org_id='" . $org_id . "'and status=2");
        // echo "<pre>";print_r($query->result());die();
        return $query->result();
    }*/
    
function get_billing_info() {
        $this->db->select('*');
        $this->db->from('organization_info');
        $this->db->join('org_billing_info', 'organization_info.id =  org_billing_info.org_id','');  
        //$this->db->where('organization_info.payment_status',1);
        $this->db->where('organization_info.org_blocked',0);
        $this->db->where('organization_info.expired',0);
        $this->db->order_by("payment_method", "desc");
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get All Active Invoice  from DB:adminscentral Table: bill_faktura AND org_billing_info AND organization_info
 *
 *@Param $org_id_invoice
 *@access public
 *@return All Active Invoice 
*/
function get_all_active_invoice($org_id_invoice){
    //echo time();exit;
       // echo $org_id_invoice;
        $to_date = time();
        $where = "fak.org_id IN($org_id_invoice) AND $to_date<=fak_expire_date";        
        //$where = "fak.org_id IN($org_id_invoice) AND $to_date<=fak_expire_date";        
        $this->db->select('*');
        $this->db->from('bill_faktura fak');
        $this->db->join('org_billing_info ob_info', 'ob_info.org_id =  fak.org_id','');  
        $this->db->join('organization_info org_info', 'org_info.id =  fak.org_id','');  
        $this->db->where($where);
        $query= $this->db->get();
        return $query->result();
}


/**
 * Get All Active Invoice which will send as a Letter from DB:adminscentral Table: bill_faktura
 *
 *@access public
 *@return All Active Invoice Letter
*/
function get_all_active_invoice_letter(){
        $to_date = time();
        $where = "fak_expire_date >= $to_date";        
        $where_letter = "fak_sent_by = 'letter' OR reminder_sent_by = 'letter'";
        $this->db->select('*');
        $this->db->from('bill_faktura');
        $this->db->where($where);                
        $this->db->where($where_letter);
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get Faktura Info  from DB:adminscentral Table: bill_faktura 
 *
 *@Param $fak_id
 *@access public
 *@return Faktura Info
*/
function get_faktura_info($fak_id){
    $this->db->select('*');
    $this->db->from('bill_faktura');
    $this->db->where('fak_id',$fak_id);
    $query= $this->db->get();
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
    $mem_id = "";
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
        $last_insert_ids = array('mem_id' => $mem_id, 'org_id' => $org_id, 'org_billing_info_id' => $bill_id);
        return $last_insert_ids;
   }
    else return $last_insert_ids;
}


    function update_org_billing_info($data ,$payment_method, $org_bill_id) {
        if($payment_method=="creditcard"){
            $this->db->where('org_bill_id', $org_bill_id);
            $this->db->update('org_billing_info', $data);
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
        }
}

    function update_org_billing_success($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('org_billing_success', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
}


/**
 * Update Organization Info Data To DB:adminscentral, Table:  organization_info,member,org_billing_info
 *
 *@Param $id which contains package_id
 *@access public
 *@return TRUE/FALSE
*/
function update_organisation($data_organization,$data_admin_user,$data_billing,$org_id){
    $update_id = array();    
    $this->db->where('id', $org_id);
    $this->db->update('organization_info', $data_organization);    
    $this->db->where('org_id', $org_id);
    $this->db->update('member', $data_admin_user);          
    $this->db->update('org_billing_info', $data_billing);      
    return TRUE;   
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
            //return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
        if($this->db->affected_rows() > 0){
            $this->db->delete('package_assigned_to_org_member', array('org_id' => $org_id));
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
        else{return FALSE;}
}

/**
 * Insert faktura info in DB: adminscentral Table: bill_faktura
 *
 *@Param $data which contains faktura information
 *@access private
 *@return inserted $fak_id
 */
function bill_faktura_insert($data) {
        $this->db->insert('bill_faktura', $data);
        $fak_id = $this->db->insert_id();
        return $fak_id;
}

/**
 * Insert email_message info in DB: adminscentral Table: admin_communicate_org_email
 *
 *@Param $data which contains email_message information
 *@access private
 *@return inserted $communication_id
 */

function email_insert($data) {
        $this->db->insert('admin_communicate_org_email', $data);
        $communication_id = $this->db->insert_id();
        return $communication_id;
}


/**
 * Get last communication id from DB: adminscentral Table: admin_communicate_org_email
 *
 *@access private
 *@return last $communication_id
 */

function get_last_communication_id() {
        $this->db->select('max(communication_id) as communication_id');
        $this->db->from('admin_communicate_org_email');
        $query= $this->db->get();
        return $query->result();
}


/**
 * Insert sms_message info in DB: adminscentral Table: admin_communicate_org_sms
 *
 *@Param $data which contains sms_message information
 *@access private
 *@return inserted $sms_id
 */

function sms_insert($data) {
        $this->db->insert('admin_communicate_org_sms', $data);
        $sms_id = $this->db->insert_id();
        return $sms_id;
}



/**
 * Insert letter_message info in DB: adminscentral Table: admin_communicate_org_letter
 *
 *@Param $data which contains letter_message information
 *@access private
 *@return inserted $letter_id
 */

function letter_insert($data) {
        $this->db->insert('admin_communicate_org_letter', $data);
        $letter_id = $this->db->insert_id();
        return $letter_id;
}
/**
 * Get logged admin_users info from DB: adminscentral Table: admin_users
 *
 *@Param $id which contains admin_users id
 *@access private
 *@return logged admin_users info
 */
function get_logged_admin_user_info($id){
        $query = $this->db->get_where('admin_users', array('id' => $id));
        return $query->result();  
}

/**
 * Get total_sms_sent by logged user from DB: adminscentral Table:  admin_communicate_org_sms
 *
 *@Param $id which contains admin_users id
 *@access private
 *@return total_sms_sent by logged user
 */
function get_total_sms_sent_by_admin_id($id){
        $this->db->select('max(total_sms_sent) as total_sms');
        $this->db->from('admin_communicate_org_sms');
        $this->db->where('sender_id',$id);
        $query= $this->db->get();
        return $query->result();
}




/**
 * Get Number of Site admin contact message From DB: adminscentral Table: contact_with_site_admin
 *
 *@access private
 *@return Site admin contact message
*/
  function get_no_of_site_admin_contact_message() {        
        $this->db->select('*');
        $this->db->from('contact_with_site_admin');
        $this->db->where('message_read',0);
        $query= $this->db->get();
        return $query->num_rows();             
}


/**
 * Get Site admin contact message From DB: adminscentral Table: contact_with_site_admin
 *
 *@access private
 *@return Site admin contact message
*/
function get_site_admin_contact_all_messages(){
        $this->db->select('*');
        $this->db->from('contact_with_site_admin');
        $this->db->order_by('contact_id', 'DESC');
        $query= $this->db->get();
        return $query->result();
        
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


    
/**
 * Get admin user info
 *
 *@Param $fak_id which contains organization faktura id
 *@access public
 *@return admin user info
*/
    function get_admin_user_info_by_fakid($fak_id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('bill_faktura', 'member.org_id = bill_faktura.org_id','');         
        if($fak_id){            
            $this->db->where('bill_faktura.fak_id',$fak_id);
        }       
        $query= $this->db->get();
        return $query->result();            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");        
}


/**
 * Get Organization Info By org_id
 *
 *@Param $org_id which contains org_id
 *@access private
 *@return logged user's organization info
 */
function get_organization_info_by_id($org_id){
        $query = $this->db->get_where('organization_info', array('id' => $org_id));
        return $query->result();  
}
}

