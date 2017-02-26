<?php 
/**
* 
*/
class Gallery extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		$this->load->model('Gallery_model');
		if ($this->session->userdata('logedin'))
		{
			$data['gallery']=$this->Gallery_model->getGallery();
			$data['page']="gallery/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}

	public function addGallery()
	{
		$this->load->model('Gallery_model');
		$success=0;
		$btn=$this->input->post("addbtn");
		if (isset($btn)){
			$insert_data=array(
					"name"=>$this->input->post("name"),
					"image_url"=>$this->input->post("image_url")
				);

			$success=$this->Gallery_model->addGallery($insert_data);
		}
		$data['gallery']=$this->Gallery_model->getGallery();
		$data['success']=$success;
		$data['page']="gallery/home";
		$this->load->view("menu/index",$data);
	}

	public function updatedeleteGallery(){
		$this->load->model('Gallery_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("updbtn");
		$delbtn=$this->input->post("delbtn");
		if (isset($btn)){
			$update_data=array(
					"name" => $this->input->post("name"),
					"image_url" => $this->input->post("image_url")
				);
			$this->Gallery_model->updateGallery($update_data,$this->input->post("updid"));
		}
		if (isset($delbtn)){
			$this->Gallery_model->deleteGallery($this->input->post("updid"));
		}
		$success=1;
		$data['gallery']=$this->Gallery_model->getGallery();
		$data['success']=$success;
		$data['page']="gallery/home";
		$this->load->view("menu/index",$data);
	}
	
}