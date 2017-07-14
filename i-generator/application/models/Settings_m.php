<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends CI_Model  {
	
	public $table_name = "";

	public function __construct()
	{
		$this->table_name = 'ig_user_settings';
		parent::__construct();
	}

	public function addUserSettings($data)
	{
		$this->db->insert($this->table_name, $data); 

		return $this->db->insert_id();
	}

	public function getUserSettings($id)
	{
		$this->db->select('*');
		
		$this->db->where(array('user_id' => $id ));
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}	

	public function updateUserSettings($data,$id)
	{

		$this->db->where('user_id', $id);
		$this->db->update($this->table_name, $data); 
	}

	
	
}
?>