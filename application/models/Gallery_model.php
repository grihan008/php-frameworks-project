<?php
	/**
	* 
	*/
	class Gallery_model extends CI_Model
	{
		
		public function getGallery()
		{
			$this->db->select('*');
			$this->db->from('gallery');
			return $this->db->get()->result_array();
		}

		public function addGallery($insert_data)
		{
			$this->db->insert('gallery',$insert_data);
			return $this->db->affected_rows();
		}

		public function updateGallery($update_data, $id){
			$this->db->where("id", $id);
			$this->db->update("gallery", $update_data);
		}

		public function deleteGallery($id)
		{
			$this->db->delete('gallery', array("id"=>$id));
		}
	}