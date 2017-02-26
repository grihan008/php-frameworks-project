<?php 
/**
* 
*/
class Doctors extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		$this->load->model('Doctors_model');
		$this->load->model('Categories_model');
		if ($this->session->userdata('logedin'))
		{
			$data['doctors']=$this->Doctors_model->getDoctors();
			$data['categories']=$this->Categories_model->getCategories();
			$data['page']="doctors/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}

	public function addDoctor()
	{
		$this->load->model('Doctors_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("addbtn");
		if (isset($btn)){
			$insert_data=array(
					"name"=>$this->input->post("name"),
					"position"=>$this->input->post("position"),
					"photo_url" => $this->input->post("photo_url"),
					"cat_id"=>$this->input->post("cat_id")
				);

			$success=$this->Doctors_model->addDoctor($insert_data);
		}
		$data['doctors']=$this->Doctors_model->getDoctors();
		$data['categories']=$this->Categories_model->getCategories();
		$data['success']=$success;
		$data['page']="doctors/home";
		$this->load->view("menu/index",$data);
	}

	public function updatedeleteDoctor(){
		$this->load->model('Doctors_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("updbtn");
		$delbtn=$this->input->post("delbtn");
		if (isset($btn)){
			$update_data=array(
					"name" => $this->input->post("name"),
					"position" => $this->input->post("position"),
					"photo_url" => $this->input->post("photo_url")
				);
			$this->Doctors_model->updateDoctor($update_data,$this->input->post("updid"));
		}
		if (isset($delbtn)){
			$this->Doctors_model->deleteDoctor($this->input->post("updid"));
		}
		$success=1;
		$data['doctors']=$this->Doctors_model->getDoctors();
		$data['categories']=$this->Categories_model->getCategories();
		$data['success']=$success;
		$data['page']="doctors/home";
		$this->load->view("menu/index",$data);
	}
	
}