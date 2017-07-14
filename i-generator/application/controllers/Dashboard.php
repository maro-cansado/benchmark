<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			$this->load->css('assets/css/custom.css');
			$this->output->set_template('dashboard/template');
	}

	//check user if login
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

	function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('login');

		redirect('login');
	}

	function init_datatables()
	{
		$this->load->js('assets/datatables/jquery.dataTables.min.js');
		$this->load->js('assets/datatables/dataTables.bootstrap.min.js');
		

		$this->load->css('assets/datatables/dataTables.bootstrap.css');
		
	}

	function init_form_widget()
	{
		$this->load->js('assets/datepicker/bootstrap-datepicker.js');
		$this->load->js('assets/select2/select2.full.min.js');
		
		
		$this->load->css('assets/datepicker/datepicker3.css');
		$this->load->css('assets/select2/select2.min.css');
	}

	public function index()
	{
		$this->data['active_parent'] = 'dashboard';
		$this->load->view('dashboard/index',$this->data);
	}

	// adviser router
	public function adviser()
	{

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-adviser';

		$users = $this->user_m->getAllAdviser();

		$this->data['users'] = $users;

		$this->init_datatables();
		$this->load->js('assets/js/agency-dashboard.js');
		$this->load->view('dashboard/adviser/index',$this->data);
	}
	 
	public function add_adviser()
	{

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-adviser';

		$this->init_form_widget();
		$this->load->js('assets/js/adviser/add-adviser.js');
		$this->load->view('dashboard/adviser/add_adviser',$this->data);
	}

	public function edit_adviser($id)
	{
		$user_id = $this->algosecure->decrypt($id);

		$user = $this->user_m->getUserById($user_id);
		$user_settings = $this->settings_m->getUserSettings($user_id);

		$this->data['user'] = $user;
		$this->data['user_settings'] = $user_settings;
		$this->data['user_id'] = $id;

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-adviser';

		$this->init_form_widget();
		$this->load->js('assets/js/adviser/edit-adviser.js');
		$this->load->view('dashboard/adviser/edit_adviser',$this->data);
	}
	// end adviser router

	// client router
	public function client()
	{

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-client';

		$users = $this->user_m->getAllClient();

		$this->data['users'] = $users;

		$this->init_datatables();
		$this->load->js('assets/js/client-dashboard.js');
		$this->load->view('dashboard/client/index',$this->data);
	}

	public function edit_client($id)
	{
		$user_id = $this->algosecure->decrypt($id);

		$user = $this->user_m->getUserById($user_id);

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-client';

		$this->data['user'] = $user;
		$this->data['user_id'] = $id;

		$this->init_form_widget();
		$this->load->js('assets/js/client-dashboard.js');
		$this->load->view('dashboard/client/edit_client',$this->data);
	}

	public function add_client()
	{

		$this->data['active_parent'] = 'user-manager';
		$this->data['active_child'] = 'view-client';

		$this->init_form_widget();
		$this->load->js('assets/js/client-dashboard.js');
		$this->load->view('dashboard/client/add_client',$this->data);
	}


	//end client router

	//invoice

	public function invoice()
	{
		$users = $this->user_m->getAllAdviser();

		$type = $this->user_type_m->getAllType();

		// echo $this->algosecure->encrypt('sumit');
		// exit();
		$this->data['users'] = $users;
		$this->data['type'] = $type;
		$this->data['active_parent'] = 'invoice';

		$this->init_form_widget();
		$this->load->js('assets/js/invoice/invoice-dashboard.js');
		$this->load->view('invoice/index',$this->data);
	} 

	//invoice


	//adviser type

	public function adviser_type()
	{
		$this->data['active_parent'] = 'adviser-type';

		$type = $this->user_type_m->getAllType();

		$this->data['type'] = $type;

		$this->init_datatables();
		$this->load->js('assets/js/type-dashboard.js');
		$this->load->view('dashboard/type/index',$this->data);
	}
	
	public function add_adviser_type()
	{
		$this->data['active_parent'] = 'adviser-type';
		$this->init_form_widget();

		$this->load->view('dashboard/type/add_type',$this->data);
	}

	public function edit_adviser_type($id = null)
	{		
		if($id == null)
		{

		}

		$id = $this->algosecure->decrypt($id);
		$type_data = $this->user_type_m->getTypeById($id);

		$this->data['type'] = $type_data;

		$this->data['active_parent'] = 'adviser-type';
		$this->init_form_widget();
		$this->load->view('dashboard/type/edit_type',$this->data);
	}

	//adviser type

}
