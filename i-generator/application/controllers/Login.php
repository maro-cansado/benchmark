<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
	       	parent::__construct();

	       	//load helper
			$this->load->helper('url');

			//load libraries
			$this->load->library('algosecure');
			$this->load->library('session');

			//load model
			$this->load->model('user_m');

			//load template
			$this->check_if_not_login();
			$this->output->set_template('login/template');
	}

	function check_if_not_login()
	{
		$user_id = $this->session->userdata('id');
		if(isset($user_id))
		{
			$user_id = $this->algosecure->decrypt($user_id);
			$result = $this->user_m->getUserById($user_id);

			if(sizeof($result) > 0)
			{
				redirect('dashboard');
			}else
			{
				$this->session->unset_userdata('id');
				$this->session->unset_userdata('name');
				$this->session->unset_userdata('email');
				$this->session->unset_userdata('login');
			}

		}
	}

	public function index()
	{
		
		$this->load->view('login/index');
	}

	public function check_login()
	{
		$user_login = array(
			'username' => $_POST['user-username'],
			'password' => $this->algosecure->encrypt($_POST['user-password'])
		);

		$result = $this->user_m->checkUserLogin($user_login);

		if(sizeof($result) > 0)
		{
			
			$user_data = array(
				'id' => $this->algosecure->encrypt($result[0]['id']),
				'name' => array(
						'first' => $result[0]['first_name'], 
						'middle' => $result[0]['middle_name'], 
						'last' => $result[0]['last_name'], 
					),
				'email' => $result[0]['email'],
				'login' => true, 
			);
			$this->session->set_userdata($user_data);
			redirect('dashboard');
		}else
		{
			$result = array(
				'username' => $_POST['user-username'], 
				'password' => $_POST['user-password'], 
				'status' => false, 
			);

			$this->session->set_flashdata('login',$result);

			redirect('login');
		}
	}
	 
}
