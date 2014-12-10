<?php

/*
 * ***********************************************************************************************************
 * 																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Aninda Barua (B.Sc in CSE)															*
 * 		@Email			heart_of_the_ocean25@yahoo.com, aninda.cse@gmail.com								*
 * 		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 * 																											*
 * ***********************************************************************************************************
 */

class Users extends Model {

    function Users() {
        parent::Model();
       ////Set Local Time Zone
        //date_default_timezone_set("Asia/Dhaka");
        // Other stuff
        $this->_prefix = $this->config->item('DX_table_prefix');
        $this->_table = $this->_prefix . $this->config->item('DX_users_table');
        $this->_roles_table = $this->_prefix . $this->config->item('DX_roles_table');
    }

    // General function

    function get_all($offset = 0, $row_count = 0, $cond = '') {
        $users_table = $this->_table;
        $roles_table = $this->_roles_table;

        if ($offset >= 0 AND $row_count > 0) {
            $this->db->select("$users_table.*", FALSE);
            $this->db->select("$roles_table.name AS role_name", FALSE);
            $this->db->join($roles_table, "$roles_table.id = $users_table.role_id");
            ($cond != '') ? $this->db->where($cond) : '';
            $this->db->order_by("$users_table.id", "DESC");

            $query = $this->db->get($this->_table, $row_count, $offset);
        } else {
            if ($cond != '') {
                //$this->db->where($cond);
                $query = $this->db->where($cond)->get($this->_table);
            } else {
                $query = $this->db->get($this->_table);
            }
        }

        return $query;
    }

    function getUserInfo($contentId) {
        $this->db->select(" * ", FALSE);
        $this->db->where('id', $contentId);
        return $this->db->get($this->_table)->result();
    }

    function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get($this->_table);
    }

    function get_user_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get($this->_table);
    }

    function get_user_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get($this->_table);
    }

    function get_login($login) {
        $this->db->where('username', $login);
        $this->db->or_where('email', $login);
        return $this->db->get($this->_table);
    }

    function check_ban($user_id) {
        $this->db->select('1', FALSE);
        $this->db->where('id', $user_id);
        $this->db->where('banned', '1');
        return $this->db->get($this->_table);
    }
    function check_username($username) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        return $this->db->get($this->_table);
}

   function check_admin_username($username,$id) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        if( $id){
            $this->db->where('id !=', $id);
        }
        return $this->db->get("admin_users");
    }

    function check_email($email) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        return $this->db->get($this->_table);
    }

    function check_email1($email) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));        
        $result1 = $this->db->get('member');
        if($result1->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(email)=', strtolower($email));
            $result2 = $this->db->get('admin_users');
            if($result2->num_rows()==0){
                $this->db->select('1', FALSE);
                $this->db->where('LOWER(org_email)=', strtolower($email));
                return $this->db->get('organization_info');
            }else{return $result2;}
        }
        else{return $result1;}              
}

 function check_email_by_org_id($email,$org_id) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        $where_clause = array('org_id !=' =>$org_id);
        if($org_id){
                     $this->db->where($where_clause);
                     //$this->db->where('org_id !=', $org_id);
        }
        $result1 = $this->db->get('member');
        if($result1->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(email)=', strtolower($email));
            $result2 = $this->db->get('admin_users');
            if($result2->num_rows()==0){
                if($org_id){
                    $where_clause = array('id !=' =>$org_id);
                    $this->db->where($where_clause);
                    //$this->db->where('org_id !=', $org_id);
                }
                $this->db->select('1', FALSE);
                $this->db->where('LOWER(org_email)=', strtolower($email));
                return $this->db->get('organization_info');
            }else{return $result2;}
        }
        else{return $result1;}              
}


function check_admin_email1($email,$id) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        $result = $this->db->get('member');
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
             $this->db->where('LOWER(email)=', strtolower($email));
             if($id){
                     $this->db->where('id !=', $id);
            }
         return $this->db->get('admin_users');
        }
        else{return $result;}              
    }

    function check_org_category($category, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(category_name)=', strtolower($category));
        $this->db->where('id !=', $id1);
        return $this->db->get('org_category');
    }

    function check_org_name($org_name) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(org_name)=', strtolower($org_name));
        return $this->db->get('organization_info');
    }

function check_org_no($org_no) {
        $this->db->select('1', FALSE);
        //$this->db->where('org_number=',$org_no);
        return $this->db->get_where('organization_info', array('org_number' => $org_no));   
        //return $this->db->get('user_info'); 
}

    function check_currency($currency, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(currency_name)=', strtolower($currency));
        $this->db->where('id !=', $id1);
        return $this->db->get('currency');
    }

    function check_mail1($email, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        $this->db->where('id !=', $id1);
        return $this->db->get('user_info');
    }
   function check_article_category($article_category, $id1){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(category_name)=', strtolower($article_category));
        $this->db->where('org_id =', $id1);
        return $this->db->get('article_category');
    }

    function check_orgname1($org_name, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(org_name)=', strtolower($org_name));
        $this->db->where('id !=', $id1);
        return $this->db->get('user_info');
    }

    function check_uname($username) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        $result = $this->db->get('member');
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(username)=', strtolower($username));
            return $this->db->get('admin_users');
        }
        else{return $result;}       
    }

 function check_uname_by_org_id($username,$org_id) {
     
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        if($org_id){
                     $this->db->where('org_id !=', $org_id);
        }
        $result = $this->db->get('member');
        
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(username)=', strtolower($username));
            return $this->db->get('admin_users');
        }
        else{return $result;}       
}

    function check_org_group($group_name, $org_id) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(group_name)=', strtolower($group_name));
        $this->db->where('org_id =', $org_id);
        return $this->db->get('org_group');
    }

    function check_org_group1($group_name, $org_id, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(group_name)=', strtolower($group_name));
        $this->db->where('org_id =', $org_id);
        $this->db->where('id !=', $id1);
        return $this->db->get('org_group');
    }
    
    function check_member_username($username) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        return $this->db->get('member');
    }
	
   function check_person_number($person_number){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(person_number)=', strtolower($person_number));
        return $this->db->get('member');
   
   }
    function check_person_number1($person_number){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(ssn_or_person_no)=', strtolower($person_number));
        $result = $this->db->get('member');
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(person_number)=', strtolower($person_number));
            return $this->db->get('admin_users');
        }
        else{return $result;}
}

    function check_person_number_by_org_id($person_number,$org_id){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(person_number)=', strtolower($person_number));
        if($org_id){
                     $this->db->where('org_id !=', $org_id);
        }
        $result = $this->db->get('member');
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(person_number)=', strtolower($person_number));
            return $this->db->get('admin_users');
        }
        else{return $result;}
}

function check_admin_person_number1($person_number,$id){
    $this->db->select('1', FALSE);
    $this->db->where('LOWER(person_number)=', strtolower($person_number));
    if($id){
        $this->db->where('id !=', $id);
    }
    return $this->db->get('admin_users');
}

    function check_member_email($email) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        return $this->db->get('member');
    }
    function check_u1($username,$id1){
	    $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        $this->db->where('id !=', $id1);
        return $this->db->get('user_info');
	}
	 function check_u1_person($person_number,$id1){
	    $this->db->select('1', FALSE);
        $this->db->where('LOWER(person_number)=', strtolower($person_number));
        $this->db->where('id !=', $id1);
        return $this->db->get('user_info');
	}
    function check_package($package_name, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(package_name)=', strtolower($package_name));
        $this->db->where('id !=', $id1);
        return $this->db->get('package');
    }
   function check_type($user_type,$id1,$org_id){
       $this->db->select('1', FALSE);
        $this->db->where('LOWER(user_type)=', strtolower($user_type));
        $this->db->where('id !=', $id1);
        $this->db->where('org_id =', $org_id);
        return $this->db->get('user_type');  
       
   }
   function check_letter_header($title, $org_id){
       $this->db->select('1', FALSE);
        $this->db->where('LOWER(title)=', strtolower($title));       
        $this->db->where('org_id =', $org_id);
        return $this->db->get('letter_header');  
       
   }
 function check_letter_header1($title, $id){
       $this->db->select('1', FALSE);
        $this->db->where('LOWER(title)=', strtolower($title));       
        $this->db->where('id !=', $id);
        return $this->db->get('letter_header');  
       
   }
function check_letter_footer($title, $org_id){
       $this->db->select('1', FALSE);
        $this->db->where('LOWER(title)=', strtolower($title));       
        $this->db->where('org_id =', $org_id);
        return $this->db->get('letter_footer');  
   }
 function check_letter_footer1($title, $id){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(title)=', strtolower($title));       
        $this->db->where('id !=', $id);
        return $this->db->get('letter_footer');  
       
   }
   function check_category($article_category, $id,$org_id){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(category_name)=', strtolower($article_category));       
        $this->db->where('id !=', $id);
		$this->db->where('org_id =', $org_id);
        return $this->db->get('article_category');  
   
   
   }

    function ban_user($user_id, $reason = NULL) {
        $data = array(
            'banned' => 1,
            'ban_reason' => $reason
        );
        return $this->set_user($user_id, $data);
    }

    function unban_user($user_id) {
        $data = array(
            'banned' => 0,
            'ban_reason' => NULL
        );
        return $this->set_user($user_id, $data);
    }

    function set_role($user_id, $role_id) {
        $data = array(
            'role_id' => $role_id
        );
        return $this->set_user($user_id, $data);
    }

    // User table function

    function create_user($data) {
        $data['created'] = date('Y-m-d H:i:s', time());
        return $this->db->insert($this->_table, $data);
    }

    function get_user_field($user_id, $fields) {
        $this->db->select($fields);
        $this->db->where('id', $user_id);
        return $this->db->get($this->_table);
    }

    function set_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update($this->_table, $data);
    }

    function delete_admin_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete("admin_users");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

function delete_admin_user_type($user_type_id) {
        $this->db->where('id', $user_type_id);
        $this->db->delete("admin_user_types");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
    // Forgot password function

    function newpass($user_id, $pass, $key) {
        $data = array(
            'newpass' => $pass,
            'newpass_key' => $key,
            'newpass_time' => date('Y-m-d h:i:s', time() + $this->config->item('DX_forgot_password_expire'))
        );
        return $this->set_user($user_id, $data);
    }

    function activate_newpass($user_id, $key) {
        $this->db->set('password', 'newpass', FALSE);
        $this->db->set('newpass', NULL);
        $this->db->set('newpass_key', NULL);
        $this->db->set('newpass_time', NULL);
        $this->db->where('id', $user_id);
        $this->db->where('newpass_key', $key);

        return $this->db->update($this->_table);
    }

    function clear_newpass($user_id) {
        $data = array(
            'newpass' => NULL,
            'newpass_key' => NULL,
            'newpass_time' => NULL
        );
        return $this->set_user($user_id, $data);
    }

    // Change password function

    function change_password($user_id, $new_pass) {
        $this->db->set('password', $new_pass);
        $this->db->where('id', $user_id);
        return $this->db->update($this->_table);
    }
	function user_insert($data){
	  $this->db->insert('users', $data);
}
	function admin_user_insert($data){
	  $this->db->insert('admin_users', $data);
      return ($this->db->insert_id() > 0) ? TRUE : FALSE;	
	}
	 function password_update($data,$old_password) {
        $this->db->where('password', $old_password);
        $this->db->update('users', $data);
}


/**
 * get all admin users from DB:adminscentral Table: admin_users
 *
 *param $id which contains admin_user id
 *@access public
 *@return admin users list
*/
function get_all_admin_users($id){    
    if($id){
        $query = $this->db->get_where('admin_users', array('id' => $id));
    }
    else{
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('admin_users');
    }
    return $query->result();
}


/**
 * View all admin users types DB:adminscentral Table: admin_user_types
 *
 *@access public
 *@return all admin users types
*/
function view_all_admin_user_types(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('admin_user_types');
        return $query->result();             
}

/**
 * get all admin users types DB:adminscentral Table: admin_user_types
 *
 *@param id which contains admin user type id, it may be optional
 *@access public
 *@return all admin users types 
*/
function get_all_admin_user_types($id){
    
    if(!$id){
            $type_name['']="Select User Type:";
            $query = $this->db->get('admin_user_types');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $type_name[$rows->id]=$rows->type_name;
                }
            }
            return $type_name;
        }
        else{
            $query = $this->db->get_where('admin_user_types', array('id' => $id));
            return $query->result();
        }     
}


/**
 * admin user types insert
 *
 *@param $data which contains admin user types data
 *@access public
 *@return Success/Error Message
*/
function admin_user_types_insert($data){
    $this->db->insert('admin_user_types', $data);     
    return ($this->db->insert_id() > 0) ? TRUE : FALSE;	     
}


/**
 * admin user types update
 *
 *@param $data which contains admin user types data, $id which contains admin user types id 
 *@access public
 *@return Success/Error Message
*/
function admin_user_types_update($data,$id){
    $this->db->where('id', $id);
    $this->db->update('admin_user_types', $data);
    return TRUE;
}


/**
 * admin user update
 *
 *@param $data which contains admin user data, $id which contains admin user id 
 *@access public
 *@return Success/Error Message
*/
function admin_user_update($data,$id){
    $this->db->where('id', $id);
    $this->db->update('admin_users', $data);
    return TRUE;
}


/**
 * Check Admin user_type Assigned To DB:adminscentral, Table: admin_users
 *
 *@Param $id which contains user_type_id
 *@access public
 *@return TRUE/FALSE
*/
function check_admin_user_type_assigned($id){
    $query = $this->db->get_where('admin_users', array('user_type_id' => $id));    
    return ($query->num_rows() > 0) ? TRUE : FALSE;	     
}


/**
 * Default  settings for admin_user_type_previlige To DB:adminscentral, Table: admin_user_previlize
 *
 *@Param $data which contains admin_user_type_previlige data
 *@access public
 *@return TRUE/FALSE
*/
function admin_user_type_previlige_insert($data) {
        $this->db->insert('admin_user_previlize', $data);
}


/**
 * Update admin_user_type_previlige To DB:adminscentral, Table: admin_user_previlize
 *
 *@Param $data which contains admin_user_type_previlige data
 *@access public
 *@return TRUE/FALSE
*/
function admin_user_type_previlige_update($data) {
        $this->db->where('user_type_id ', $this->input->post('user_type_id'));
        $this->db->update('admin_user_previlize', $data);
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

?>