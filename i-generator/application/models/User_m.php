<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model  {
	
	public $table_name = "";

	public function __construct()
	{
		$this->table_name = 'ig_users';
		parent::__construct();
	}	

	public function checkUserLogin($data = null)
	{
		if($data == null)
		{
			return ;
		}

		$query = $this->db->get_where($this->table_name, $data,1,0);

		return $query->result_array();
	}

	public function getUserById($id = null)
	{
		if($id == null)
		{
			return ;
		}
		$data = array(
			'id' => $id, 
		);
		$query = $this->db->get_where($this->table_name, $data,1,0);

		return $query->result_array();

	}

	public function getAllAdviser()
	{
		$this->db->select('*');
		$where = "role != 'client' && role != 'admin'";
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}

	public function getAllClient()
	{
		$this->db->select('*');
		$where = "role = 'client'";
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}

	public function addNewUser($data)
	{

		$this->db->insert($this->table_name, $data); 

		return $this->db->insert_id();
	}

	public function updateUser($data,$id)
	{

		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data); 
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name); 
	}
	
}
?>