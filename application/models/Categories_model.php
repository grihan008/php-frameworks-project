<?php
	/**
	* 
	*/
	class Categories_model extends CI_Model
	{
		
		public function getCategories()
		{
			$this->db->select('*');
			$this->db->from('categories');
			return $this->db->get()->result_array();
		}
	}