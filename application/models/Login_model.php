<?php
	/**
	* 
	*/
	class Login_model extends CI_Model
	{
		
		public function getAdmins($login, $password)
		{
			$this->db->select('*');
			$this->db->from('admins');
			$this->db->where(array('login' => $login, 'password' => $password));
			return $this->db->get()->result();
		}
	}