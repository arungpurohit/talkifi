<?php
class Emailconf_model extends CI_Model{


	public function __construct()
	{
		parent::__construct();
	}
	public function insertEmailConfVal($port,$service_flags){
	
	if(isset($this->user->cmp_unique_id))
		 {
			$data = array(
				'email_conf_emailaddr' => $this->input->post('username'),
				'email_conf_emailid' => $this->input->post('emailaddress'),
				'email_conf_emailpass' => $this->input->post('emailpass'),
				'email_conf_pop' => $this->input->post('pop'),
				'email_conf_emailport' =>$port,
				'email_conf_emailserviceflag' =>$service_flags,
				'email_status_id' => $this->input->post('status'),
				'email_types_id' => $this->input->post('types'),
				'email_channels_id' => $this->input->post('channels'),
				'email_conf_categoryid' => $this->input->post('category'),
				'email_conf_priorityid' => $this->input->post('priority'),
				'cmp_unique_id'=>$this->user->cmp_unique_id
			);
			$query = $this->db->insert('email_conf',$data);		
		}
		else{
		redirect('login','refersh');
		}		
	}
	public function selectEmailConfVal()
	{
		$this->db->select('email_conf.email_conf_id,email_conf.email_conf_emailaddr,email_conf.email_conf_emailid,lead_category.lead_category_name,lead_priority.lead_priority_name,email_conf.email_conf_last_downloaded');
		$this->db->from('email_conf');
		$this->db->where('email_conf.cmp_unique_id',$this->user->cmp_unique_id);
		$this->db->join('lead_category','lead_category.lead_category_id=email_conf.email_conf_categoryid');
		$this->db->join('lead_priority','lead_priority.lead_priority_id=email_conf.email_conf_priorityid');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	
	
	public function get_responses($responder_id)
	{
	   	   	$this->db->select('*');
			$this->db->from('email_conf');
			$this->db->where('email_conf_id',$responder_id);
			$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
			
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
	
	public function updateauto()
	{
		$data = array(
			'email_conf_emailaddr' => $this->input->post('email_conf_emailaddr'),
			'email_conf_emailid' => $this->input->post('email_conf_emailid')
			
		);
		$this->db->update( 'email_conf', $data, array( 'email_conf_id' => $this->input->post( 'email_conf_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
		
	}
	
	
	
}
?>