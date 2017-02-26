<?php 
/**
* 
*/
class Careers extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		$this->load->model('Careers_model');
		if ($this->session->userdata('logedin'))
		{
			$data['careers']=$this->Careers_model->getCareers();
			$data['page']="careers/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}

	public function addCareer()
	{
		$this->load->model('Careers_model');
		$success=0;
		$btn=$this->input->post("addbtn");
		if (isset($btn)){
			$insert_data=array(
					"name"=>$this->input->post("name"),
					"description"=>$this->input->post("description")
				);

			$success=$this->Careers_model->addCareer($insert_data);
		}
		$data['careers']=$this->Careers_model->getCareers();
		$data['success']=$success;
		$data['page']="careers/home";
		$this->load->view("menu/index",$data);
	}

	public function updatedeleteCareer(){
		$this->load->model('Careers_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("updbtn");
		$delbtn=$this->input->post("delbtn");
		if (isset($btn)){
			$update_data=array(
					"name" => $this->input->post("name"),
					"description" => $this->input->post("description")
				);
			$this->Careers_model->updateCareer($update_data,$this->input->post("updid"));
		}
		if (isset($delbtn)){
			$this->Careers_model->deleteCareer($this->input->post("updid"));
		}
		$success=1;
		$data['careers']=$this->Careers_model->getCareers();
		$data['success']=$success;
		$data['page']="careers/home";
		$this->load->view("menu/index",$data);
	}
	
}