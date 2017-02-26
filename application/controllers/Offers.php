<?php 
/**
* 
*/
class Offers extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		$this->load->model('Offers_model');
		if ($this->session->userdata('logedin'))
		{
			$data['offers']=$this->Offers_model->getOffers();
			$data['page']="Offers/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}

	public function addOffer()
	{
		$this->load->model('Offers_model');
		$success=0;
		$btn=$this->input->post("addbtn");
		if (isset($btn)){
			$insert_data=array(
					"name"=>$this->input->post("name"),
					"description"=>$this->input->post("description")
				);

			$success=$this->Offers_model->addOffer($insert_data);
		}
		$data['offers']=$this->Offers_model->getOffers();
		$data['success']=$success;
		$data['page']="Offers/home";
		$this->load->view("menu/index",$data);
	}

	public function updatedeleteOffer(){
		$this->load->model('Offers_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("updbtn");
		$delbtn=$this->input->post("delbtn");
		if (isset($btn)){
			$update_data=array(
					"name" => $this->input->post("name"),
					"description" => $this->input->post("description")
				);
			$this->Offers_model->updateOffer($update_data,$this->input->post("updid"));
		}
		if (isset($delbtn)){
			$this->Offers_model->deleteOffer($this->input->post("updid"));
		}
		$success=1;
		$data['offers']=$this->Offers_model->getOffers();
		$data['success']=$success;
		$data['page']="Offers/home";
		$this->load->view("menu/index",$data);
	}
	
}