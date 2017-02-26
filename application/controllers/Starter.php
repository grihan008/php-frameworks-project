<?php 
/**
* 
*/
class Starter extends CI_controller
{
	
	public function index()
	{
		$data['error']="";
		// $this->load->library('session');
		// $this->load->model('Login_model');
		if ($this->session->userdata('logedin'))
		{
			$data['page']="menu/home";
			$this->load->view("menu/index",$data);
		}
		else
		{
			$this->load->view("login/index",$data);
		}
	}

	public function login()
	{
		// $this->load->library('session');
		$this->load->model('Login_model');
		$data['error']="";
		if ($this->input->post("login")){
			if ($this->Login_model->getAdmins($this->input->post("login"),md5($this->input->post("password"))))
			{
				$this->session->set_userdata('logedin', TRUE);
				$data['page']="menu/home";
				$this->load->view("menu/index",$data);
			}
			else
			{
				$this->session->sess_destroy();
				$data['error']="wrong login/password";
				$this->load->view("login/index",$data);
			}
		}
		else{
			$this->session->sess_destroy();
			$this->load->view("login/index",$data);
		}
	}
}