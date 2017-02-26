<?php 
/**
* 
*/
class Services extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		$this->load->model('Services_model');
		$this->load->model('Categories_model');
		if ($this->session->userdata('logedin'))
		{
			$data['services']=$this->Services_model->getServices();
			$data['categories']=$this->Categories_model->getCategories();
			$data['page']="services/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}

	public function addService()
	{
		$this->load->model('Services_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("addbtn");
		if (isset($btn)){
			$insert_data=array(
					"name"=>$this->input->post("name"),
					"price"=>$this->input->post("price"),
					"cat_id"=>$this->input->post("cat_id")
				);

			$success=$this->Services_model->addService($insert_data);
		}
		$data['services']=$this->Services_model->getServices();
		$data['categories']=$this->Categories_model->getCategories();
		$data['success']=$success;
		$data['page']="services/home";
		$this->load->view("menu/index",$data);
	}

	public function updatedeleteService(){
		$this->load->model('Services_model');
		$this->load->model('Categories_model');
		$success=0;
		$btn=$this->input->post("updbtn");
		$delbtn=$this->input->post("delbtn");
		if (isset($btn)){
			$update_data=array(
					"name" => $this->input->post("name"),
					"price" => $this->input->post("price")
				);
			$this->Services_model->updateService($update_data,$this->input->post("updid"));
		}
		if (isset($delbtn)){
			$this->Services_model->deleteService($this->input->post("updid"));
		}
		$success=1;
		$data['services']=$this->Services_model->getServices();
		$data['categories']=$this->Categories_model->getCategories();
		$data['success']=$success;
		$data['page']="services/home";
		$this->load->view("menu/index",$data);
	}
	
}