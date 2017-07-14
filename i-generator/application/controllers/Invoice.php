<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

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
			$this->load->model('invoice_m');
			$this->load->model('user_type_m');

			//load template
			$this->check_if_login();
			//$this->output->set_template('dashboard/template');
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

	public function save_invoice_view()
	{
		


		$this->load->library('Pdf', array('company'=> null, 'fspr'=>"FSPR"));
		//$entry = json_decode($_POST['invouce-entry-json']);
		$user_new_id = true;
		$user_if_add = true;
		if($_POST['invoice-user-choose'] == 'new-adviser')
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
			   'type' => $this->algosecure->decrypt($_POST['invoice-user-type-choose']),
			   
			);
			
				if($_POST['add-adviser-fname'] == "")
				{
					$user_if_add = false;
				}
		

			if($user_if_add)
			{

				$user_id = $this->user_m->addNewUser($data);

				$user_new_id = $user_id;

				$data_user_invoie = array(
					'client_fname' => $_POST['invoice-client-first-name'], 
					'client_mname' => $_POST['invoice-client-middle-name'], 
					'client_lname' => $_POST['invoice-client-last-name'], 
					'total_commission' => $_POST['invoice-total-commission'], 
					'adviser_total' => $_POST['invoice-adviser-total'], 
					'bonuses' => $_POST['invoice-bonuses'], 
					'cancellation' => $_POST['invoice-cancellation'], 
					'material_and_software' => $_POST['invoice-material-and-softwar'], 
					'month_period' => $_POST['invoice-period-choose'], 
					'adviser_id' => $user_id, 
				);

				$invoice_id = $this->invoice_m->addNewUserInvoice($data_user_invoie);
				// var_dump($user_new_id);
				$this->view($this->algosecure->encrypt($user_new_id));
			}else
			{
				$result = array('url' => false,'name' => false );
				echo json_encode($result);
			}

		}else
		{
			$user_id = $this->algosecure->decrypt($_POST['invoice-user-choose']);
			
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
			   'type' => $this->algosecure->decrypt($_POST['invoice-user-type-choose']),
			   
			);
			$this->user_m->updateUser($data,$user_id);	

			$data_user_invoie = array(
				'client_fname' => $_POST['invoice-client-first-name'], 
				'client_mname' => $_POST['invoice-client-middle-name'], 
				'client_lname' => $_POST['invoice-client-last-name'], 
				'total_commission' => $_POST['invoice-total-commission'], 
				'adviser_total' => $_POST['invoice-adviser-total'], 
				'bonuses' => $_POST['invoice-bonuses'], 
				'cancellation' => $_POST['invoice-cancellation'], 
				'material_and_software' => $_POST['invoice-material-and-softwar'], 
				'month_period' => $_POST['invoice-period-choose'], 
				'adviser_id' => $user_id, 
			);

			$invoice_id = $this->invoice_m->addNewUserInvoice($data_user_invoie);

			$result = array('url' => false,'name' => false );
			echo json_encode($result);
		}

	}

	public function view($user_id = null){

		if($user_id == null)
		{
			$user_id = $_POST['user_id'];
		}

		$this->load->library('Pdf', array('company'=> null, 'fspr'=>"FSPR"));
		$value = $this->algosecure->decrypt($user_id);
		$user = $this->user_m->getUserById($value);

		$user_invoice = $this->invoice_m->getUserInvoice($value);

		$invoice_data = array(
			'invoice-total-commission' => $user_invoice[0]['total_commission'], 
			'invoice-cancellation' => $user_invoice[0]['cancellation'], 
			'invoice-material-and-softwar' => $user_invoice[0]['material_and_software'], 
		);

		$computed_result = $this->invoice_calcu($value,$invoice_data);

		
	 	$this->pdf->company = 'asdasd';
      	$this->pdf->fspr_number = '1231';
      	$this->pdf->SetTitle('title');

      	$this->data['computed_result'] = $computed_result;
       	$this->data['user'] = $user;
       	//$this->data['user_settings'] = $user_settings;
		//$this->data['active_parent'] = 'invoice';

      	//$this->load->view('invoice/buyer_created_tax_invoice_test',$this->data);
      	$html = $this->load->view('invoice/buyer_created_tax_invoice',$this->data, true);
      	//$this->pdf->setPage(1);
		$this->pdf->AddPage(); // add a page
        $this->pdf->writeHTMLCell(0,0, 12, 0, $html, 0, 0, false, true, '', true);
        $code_pdf = "(code-".$this->generateRandomString(5).")";
        $actual_file_pdf = $user[0]['first_name']." ".$user[0]['middle_name']." ".$user[0]['last_name']." ".$code_pdf." Invoice.pdf";
        $actual_file = ACTUAL_FILE_PREFIX_SAVING.$actual_file_pdf;
        $this->pdf->Output($actual_file, 'F');
        
        $link = base_url()."docs/".$actual_file_pdf;
        
        $result = array(
        	'url' => $link, 
        	'name' => $actual_file_pdf, 
        );

        echo json_encode($result);

	}

	function view_pdf($actual_file)
	{
		$this->load->library('Pdf', array('company'=> null, 'fspr'=>"FSPR"));

		$this->pdf->company = 'asdasd';
      	$this->pdf->fspr_number = '1231';
      	$this->pdf->SetTitle('title');

      	$this->pdf->Output($actual_file, 'I');
	}

	public function invoice_calcu($user_id,$entry)
	{
		$user = $this->user_m->getUserById($user_id);


		$type = $this->user_type_m->getTypeById($user[0]['type']);
		// echo "<pre>";
		// var_dump($user);
		// echo "</pre>";

		//exit();
		// set percent
		$wt_percent = 0.20;
		$am_percent = 0.10;
		$gst_percent = 0.15;
		$movement_percent = 0.10;

		$bcti = (float) $entry['invoice-total-commission'];
		$bcti_gst = $bcti * $gst_percent;

		$cancel = (float) $entry['invoice-cancellation'];
		$material = (float) $entry['invoice-material-and-softwar'];
		$bcan = (($cancel + $material) * $gst_percent) * -1;


		$nett = (($cancel + $material) * -1) + $bcti;

		if($type[0]['gst'])
		{
			$gst = $nett * $gst_percent;
		}else
		{
			$gst = 0;
		}


		
		$wt = ($nett * $wt_percent) * -1;


		if($type[0]['company'])
		{
			$movement = (($nett + $gst) * $movement_percent) -1;
		}else
		{
			$movement = (($nett + $gst + $wt) * $movement_percent) -1;
		}

		
		$total = $nett + $gst + $wt + $movement;
		
		$result = array(
			'bcti' => $bcti, 
			'bcti_gst' => $bcti_gst, 
			'cancel' => $cancel, 
			'material' => $material, 
			'bcan' => $bcan, 
			'nett' => $nett, 
			'gst' => $gst, 
			'wt' => $wt, 
			'movement' => $movement, 
			'total' => $total, 
		);

		return $result;
		
	}

	public function compute_bcti_debit($bcti)
	{
		$debit_result = 0;
		foreach ($bcti as $index => $debit) {
			$debit_result += floatval($debit[2]);
		}

		return $debit_result;
	}

	public function compute_bcti_credit($bcti)
	{
		$credit_result = 0;
		foreach ($bcti as $index => $credit) {
			$credit_result += floatval($credit[3]);
		}

		return $credit_result;
	}


	public function compute_bcan_debit($bcan)
	{
		$debit_result = 0;
		foreach ($bcan as $index => $debit) {
			$debit_result += floatval($debit[2]);
		}

		return $debit_result;
	}

	public function compute_bcan_credit($bcan)
	{
		$credit_result = 0;
		foreach ($bcan as $index => $credit) {
			$credit_result += floatval($credit[3]);
		}

		return $credit_result;
	}

	public function compute_gst($sum,$gst,$per)
	{
		if($gst)
		{
			return $sum * ($per/100);
		}else
		{
			return 0;
		}
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	 
}
