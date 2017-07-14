<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

	// adviser functions
	function add_adviser()
	{

		$data = array(
		   'first_name' => $_POST['add-adviser-fname'] ,
		   'middle_name' => $_POST['add-adviser-mname'] ,
		   'last_name' => $_POST['add-adviser-lname'],
		   'date_of_birth' => $_POST['add-adviser-date'],
		   'email' => $_POST['add-adviser-email'],
		   'street' => $_POST['add-adviser-street'],
		   'city' => $_POST['add-adviser-city'],
		   'country' => $_POST['add-adviser-country'],
		   'number' => $_POST['add-adviser-number'],
		   
		);

		$user_id = $this->user_m->addNewUser($data);

		// $data = array(
		// 	'number' => $_POST['add-adviser-number'],
		// 	'bonus' => $_POST['add-adviser-bonus'],
		// 	'company' => $_POST['add-adviser-company'],
		// 	'material_fee' => $_POST['add-adviser-material-fee'],
		// 	'adviser_percentage' => $_POST['add-adviser-percentage'],
		// 	'rate_of_commission' => $_POST['add-adviser-commission'],
		// 	'material_fee_amount' => $_POST['add-adviser-material-fee-amount'],
		// 	'gst' => $_POST['add-adviser-gst'],
		// 	'gst_age_percent' => $_POST['add-adviser-gst-age'],
		// 	'user_id' => $user_id,
		// );

		// $user_settings_id = $this->settings_m->addUserSettings($data);

		$result = array(
				'first' => $_POST['add-adviser-fname'],  
				'status' => true, 
			);

		$this->session->set_flashdata('add_adviser',$result);

		redirect('dashboard/add_adviser');
	}


	function edit_adviser()
	{
		$user_id = $this->algosecure->decrypt($_POST['edit-adviser-id']);

		$data = array(
		   'first_name' => $_POST['edit-adviser-fname'] ,
		   'middle_name' => $_POST['edit-adviser-mname'] ,
		   'last_name' => $_POST['edit-adviser-lname'],
		   'date_of_birth' => $_POST['edit-adviser-date'],
		   'email' => $_POST['edit-adviser-email'],
		   'street' => $_POST['edit-adviser-street'],
		   'city' => $_POST['edit-adviser-city'],
		   'country' => $_POST['edit-adviser-country'],
		   'number' => $_POST['edit-adviser-number'],
		   
		);
		$this->user_m->updateUser($data,$user_id);
		

		// $data = array(
		// 	'number' => $_POST['edit-adviser-number'],
		// 	'bonus' => $_POST['edit-adviser-bonus'],
		// 	'company' => $_POST['edit-adviser-company'],
		// 	'material_fee' => $_POST['edit-adviser-material-fee'],
		// 	'adviser_percentage' => $_POST['edit-adviser-percentage'],
		// 	'rate_of_commission' => $_POST['edit-adviser-commission'],
		// 	'material_fee_amount' => $_POST['edit-adviser-material-fee-amount'],
		// 	'gst' => $_POST['edit-adviser-gst'],
		// 	'gst_age_percent' => $_POST['edit-adviser-gst-age'],
		// 	'user_id' => $user_id,
		// );

		// $this->settings_m->updateUserSettings($data,$user_id);
		

		$result = array(
			'first' => $_POST['edit-adviser-fname'],  
			'status' => true, 
		);

		$this->session->set_flashdata('edit_adviser',$result);

		redirect('dashboard/edit_adviser/'.$_POST['edit-adviser-id']);
	}

	function delete_adviser()
	{
		$user_id = $this->algosecure->decrypt($_POST['delete-adviser-id']);
		
		$this->user_m->deleteUser($user_id);

		$result = array(
			'status' => true, 
		);

		$this->session->set_flashdata('delete_adviser',$result);

		redirect('dashboard/adviser/');

	}
	// end adviser functions

	//client functions
	function add_client()
	{

		$data = array(
		   'first_name' => $_POST['add-client-fname'] ,
		   'middle_name' => $_POST['add-client-mname'] ,
		   'last_name' => $_POST['add-client-lname'],
		   'date_of_birth' => $_POST['add-client-date'],
		   'email' => $_POST['add-client-email'],
		   'role' => 'client',
		);

		$this->user_m->addNewUser($data);

		$result = array(
				'first' => $_POST['add-client-fname'],  
				'status' => true, 
			);

		$this->session->set_flashdata('add_client',$result);

		redirect('dashboard/add_client');
	}

	function edit_client()
	{

		$data = array(
		   'first_name' => $_POST['edit-client-fname'] ,
		   'middle_name' => $_POST['edit-client-mname'] ,
		   'last_name' => $_POST['edit-client-lname'],
		   'date_of_birth' => $_POST['edit-client-date'],
		   'email' => $_POST['edit-client-email']
		);

		$user_id = $this->algosecure->decrypt($_POST['edit-client-id']);

		$this->user_m->updateUser($data,$user_id);

		$result = array(
			'first' => $_POST['edit-client-fname'],  
			'status' => true, 
		);

		$this->session->set_flashdata('edit_client',$result);

		redirect('dashboard/edit_client/'.$_POST['edit-client-id']);
	}

	function delete_client()
	{
		$user_id = $this->algosecure->decrypt($_POST['delete-client-id']);
		
		$this->user_m->deleteUser($user_id);

		$result = array(
			'status' => true, 
		);

		$this->session->set_flashdata('delete_client',$result);

		redirect('dashboard/client/');

	}

	function get_adviser_detail()
	{
		$user_id = $this->algosecure->decrypt($_POST['user_id']);

		$user_detail = $this->user_m->getUserById($user_id);

		echo json_encode($user_detail);
	}

	//end client functions
	 
}
