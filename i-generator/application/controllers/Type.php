<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

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
			$this->load->model('settings_m');
			$this->load->model('user_type_m');

			//load template
			$this->check_if_login();
			//$this->output->set_template('login/template');
	}

	function check_if_login()
	{
		$user_id = $this->session->userdata('id');
		if(isset($user_id))
		{
			$user_id = $this->algosecure->decrypt($user_id);
			$result = $this->user_m->getUserById($user_id);

			if(sizeof($result) < 1)
			{
				redirect('login');
			}

		}else
		{
			redirect('login');
		}
	}

	public function add_adviser_type()
	{
		$data = array(
		   'name' => $_POST['add-type-name'] ,
		   'description' => $_POST['add-type-description'] ,
		   'total_commission' => $_POST['add-type-total-commission'],
		   'adviser_total' => $_POST['add-type-adviser-total'],
		   'bonuses' => $_POST['add-type-bonuses'],
		   'cancellation' => $_POST['add-type-cancellation'],
		   'material_and_software' => $_POST['add-type-material-and-software'],
		   'gst' => $_POST['add-type-gst'] == 'no'? false:true,
		   'company' => $_POST['add-type-company'] == 'no'? false:true,
		);

		$this->user_type_m->addNewUserType($data);

		$result = array(
				'type' => $_POST['add-type-name'],  
				'status' => true, 
			);

		$this->session->set_flashdata('add_adviser_type',$result);

		redirect('dashboard/add_adviser_type');
	} 


	public function edit_adviser_type()
	{

		$id = $this->algosecure->decrypt($_POST['edit-type-id']);
		$data = array(
		   'name' => $_POST['edit-type-name'] ,
		   'description' => $_POST['edit-type-description'] ,
		   'total_commission' => $_POST['edit-type-total-commission'],
		   'adviser_total' => $_POST['edit-type-adviser-total'],
		   'bonuses' => $_POST['edit-type-bonuses'],
		   'cancellation' => $_POST['edit-type-cancellation'],
		   'material_and_software' => $_POST['edit-type-material-and-software'],
		   'gst' => $_POST['edit-type-gst'] == 'no'? false:true,
		   'company' => $_POST['edit-type-company'] == 'no'? false:true,
		);

		$this->user_type_m->UpdateUserType($id,$data);

		$result = array(
				'type' => $_POST['edit-type-name'],  
				'status' => true, 
			);

		$this->session->set_flashdata('edit_adviser_type',$result);

		redirect('dashboard/edit_adviser_type/'.$_POST['edit-type-id']);
	} 

	public function delete_type()
	{
		$id = $this->algosecure->decrypt($_POST['delete-type-id']);

		$this->user_type_m->deleteUserType($id);

		redirect('dashboard/adviser_type');
	}


	public function get_type()
	{
		$id = $this->algosecure->decrypt($_POST['id']);
		//var_dump($id);
		$type = $this->user_type_m->getTypeById($id);

		echo json_encode($type[0]);

	}

	 
}
