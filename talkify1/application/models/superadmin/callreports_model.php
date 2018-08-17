<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Callreports_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function getAnsweredCallsCount($cmp_unique_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('cti_event');
		$this->db->where('cmp_unique_id', $cmp_unique_id);
		$this->db->where('status', 'ANSWERED');

		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
		$cnt = $row['cnt'];
	 		
		return $cnt;	
			
	}
	public function getMissCallsCount($cmp_unique_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('cti_event');
		$this->db->where('cmp_unique_id',$cmp_unique_id);
		$this->db->where('status', '');

		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
		$cnt = $row['cnt'];
		return $cnt;	
			
	}
	
	public function getAllCompany(){
		$this->db->select('company_name,cmp_unique_id');
		$this->db->from('company_details');
		$query=$this->db->get()->result_array();
		return $query;
	}
	
}

?>