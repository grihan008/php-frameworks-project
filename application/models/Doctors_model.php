<?php
	/**
	* 
	*/
	class Doctors_model extends CI_Model
	{
		
		public function getDoctors()
		{
			$this->db->select('doctors.*, categories.id as catid, categories.name as catname');
			$this->db->from('doctors');
			$this->db->join('categories', 'doctors.cat_id = categories.id');
			$this->db->order_by('categories.name');
			return $this->db->get()->result_array();
		}

		public function addDoctor($insert_data)
		{
			$this->db->insert('doctors',$insert_data);
			return $this->db->affected_rows();
		}

		public function updateDoctor($update_data, $id){
			$this->db->where("id", $id);
			$this->db->update("doctors", $update_data);
		}

		public function deleteDoctor($id)
		{
			$this->db->delete('doctors', array("id"=>$id));
		}
	}