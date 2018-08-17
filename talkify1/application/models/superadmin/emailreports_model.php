<?php

class Emailreports_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function getAllCompany()
	{
		$this->db->select('company_name,cmp_unique_id');
		$this->db->from('company_details');
		$query=$this->db->get()->result_array();
		return $query;
	}
}

?>
	