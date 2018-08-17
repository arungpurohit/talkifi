<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
	}
	public function get_company()
	{
	   	   	$this->db->select('*');
			$this->db->from('company_details');
			$this->db->where('cmp_unique_id = '."'".$this->user->cmp_unique_id."'");
			
			$query = $this->db->get();
			if($query->num_rows()==1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
	}
	
	public function updatecmp($cmp_logo='')
	{
		$data = array(
			'company_name' => $this->input->post('company_name'),
			'company_address' => $this->input->post('company_address'),
			'company_state' => $this->input->post('company_state'),
			'company_city' => $this->input->post('company_city'),
			'company_zip' => $this->input->post('company_zip'),
			'company_fax' => $this->input->post('company_fax'),
			'company_starting_date' => $this->input->post('company_starting_date'),
			'company_modification_date' => $this->input->post('company_modification_date'),
			'company_contact_person' => $this->input->post('company_contact_person'),
			'company_contact_phone' => $this->input->post('company_contact_phone'),
			'company_contact_email' => $this->input->post('company_contact_email'),
			'no_of_emails_provided' => $this->input->post('no_of_emails_provided'), 	
			'no_of_emails_used' => $this->input->post('no_of_emails_used'),
			'company_mini_logo' => $cmp_logo	
		);
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		$this->db->update('company_details',$data);
	}
	
}

?>