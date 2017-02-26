<?php
	/**
	* 
	*/
	class Services_model extends CI_Model
	{
		
		public function getServices()
		{
			$this->db->select('services.*, categories.id as catid, categories.name as catname');
			$this->db->from('services');
			$this->db->join('categories', 'services.cat_id = categories.id');
			$this->db->order_by('categories.name');
			return $this->db->get()->result_array();
		}

		public function addService($insert_data)
		{
			$this->db->insert('services',$insert_data);
			return $this->db->affected_rows();
		}

		public function updateService($update_data, $id){
			$this->db->where("id", $id);
			$this->db->update("services", $update_data);
		}

		public function deleteService($id)
		{
			$this->db->delete('services', array("id"=>$id));
		}
	}