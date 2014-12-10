<?php
/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Aninda Barua (B.Sc in CSE)															*
 * 		@Email			heart_of_the_ocean25@yahoo.com, aninda.cse@gmail.com								*
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

class User_Temp extends Model 
{
	function User_Temp()
	{
		parent::Model();

		////Set Local Time Zone
		//date_default_timezone_set("Asia/Dhaka");

		// Other stuff
		$this->_prefix = $this->config->item('DX_table_prefix');
		$this->_table  = $this->_prefix.$this->config->item('DX_user_temp_table');
		$this->_roles_table = $this->_prefix.$this->config->item('DX_roles_table');
	}
	
	function get_all($offset = 0, $row_count = 0)
	{
		$user_temp_table = $this->_table;
		$roles_table 	 = $this->_roles_table;

		if($offset >= 0 AND $row_count > 0)
		{
			$this->db->select("$user_temp_table.*", FALSE);
			$this->db->select("$roles_table.name AS role_name", FALSE);
			$this->db->join($roles_table, "$roles_table.id = $user_temp_table.role_id");
			$this->db->order_by("$user_temp_table.id", "ASC");

			$query = $this->db->get($this->_table, $row_count, $offset); 
		}
		else
		{
			$query = $this->db->get($this->_table);
		}
		
		return $query;
	}		
	
	function get_user_by_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get($this->_table);
	}
	
	function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		return $this->db->get($this->_table);
	}

	function get_login($login)
	{
		$this->db->where('username', $login);
		$this->db->or_where('email', $login);
		return $this->db->get($this->_table);
	}

	function check_username($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('username', $username);
		return $this->db->get($this->_table);
	}

	function check_email($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('email', $email);
		return $this->db->get($this->_table);
	}

	function activate_user($username, $key)
	{
		$this->db->where(array('username' => $username, 'activation_key' => $key));
		return $this->db->get($this->_table);
	}

	function delete_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->_table);
	}

	function prune_temp()
	{
		$this->db->where('UNIX_TIMESTAMP(created) <', time() - $this->config->item('DX_email_activation_expire'));
		return $this->db->delete($this->_table);
	}

	function create_temp($data)
	{
		$data['created'] = date('Y-m-d H:i:s', time());
		return $this->db->insert($this->_table, $data);
	}
}
?>