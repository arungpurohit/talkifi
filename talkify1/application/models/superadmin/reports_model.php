<?php

class Reports_model extends CI_Model
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
	
	public function getReports()
	{
		
	
		$reports = array(		   array('Repvsstatus','show-repvsstatus','Rep Vs Status'),
									  array('Repvscategory','show-repvscategory','Rep Vs Category'),
									  array('Repvstypes','show-repvstypes','Rep Vs Types'),
									  array('Repvspriority','show-repvspriority','Rep Vs Priority'),
									  array('Repvschannels','show-repvschannels','Rep Vs Channels'),
				);
				
		return $reports;
	}
	
	
	
	
}	
?>