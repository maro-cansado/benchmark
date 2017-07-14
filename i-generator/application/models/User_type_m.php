<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_type_m extends CI_Model  {
	
	public $table_name = "";

	public function __construct()
	{
		$this->table_name = 'ig_user_type';
		parent::__construct();
	}	

	public function getAllType()
	{
		$this->db->select('*');
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}

	public function addNewUserType($data)
	{

		$this->db->insert($this->table_name, $data); 

		return $this->db->insert_id();
	}

	public function getTypeById($id)
	{
		$this->db->select('*');
		$where = array('id' => $id );
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}

	public function UpdateUserType($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data); 
	}

	public function deleteUserType($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name); 
	}
	
	
}
?>