<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_m extends CI_Model  {
	
	public $table_name = "";

	public function __construct()
	{
		$this->table_name = 'ig_user_invoice';
		parent::__construct();
	}	


	public function addNewUserInvoice($data)
	{

		$this->db->insert($this->table_name, $data); 

		return $this->db->insert_id();
	}

	public function getUserInvoice($id = null)
	{
		if($id == null)
		{
			return ;
		}
		$data = array(
			'adviser_id' => $id, 
		);
		$this->db->order_by("id", "desc");
		$query = $this->db->get_where($this->table_name, $data,1,0);

		return $query->result_array();

	}
}
?>