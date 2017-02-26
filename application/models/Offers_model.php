<?php
	/**
	* 
	*/
	class Offers_model extends CI_Model
	{
		
		public function getOffers()
		{
			$this->db->select('*');
			$this->db->from('specialoffers');
			return $this->db->get()->result_array();
		}

		public function addOffer($insert_data)
		{
			$this->db->insert('specialoffers',$insert_data);
			return $this->db->affected_rows();
		}

		public function updateOffer($update_data, $id){
			$this->db->where("id", $id);
			$this->db->update("specialoffers", $update_data);
		}

		public function deleteOffer($id)
		{
			$this->db->delete('specialoffers', array("id"=>$id));
		}
	}