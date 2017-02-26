<?php
	/**
	* 
	*/
	class Careers_model extends CI_Model
	{
		
		public function getCareers()
		{
			$this->db->select('*');
			$this->db->from('careers');
			return $this->db->get()->result_array();
		}

		public function addCareer($insert_data)
		{
			$this->db->insert('careers',$insert_data);
			return $this->db->affected_rows();
		}

		public function updateCareer($update_data, $id){
			$this->db->where("id", $id);
			$this->db->update("careers", $update_data);
		}

		public function deleteCareer($id)
		{
			$this->db->delete('careers', array("id"=>$id));
		}
	}