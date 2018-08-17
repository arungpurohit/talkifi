<?php

class Autorespondersms_model extends CI_Model
{
	public $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
	}
	
	public function selectAutorespondersmsVal()
	{
		$this->db->select('autorespondersms_id,autorespondersms_name,autorespondersms_subject');
		$this->db->from('autorespondersms');
		$this->db->where('autorespondersms.cmp_unique_id',$this->user->cmp_unique_id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function create()
	{
		$creation_time = time();
		$data = array(
				'autorespondersms_name'=>$this->input->post('autorespondersms_name'),
				'autorespondersms_subject'=>$this->input->post('autorespondersms_subject'),
				'autorespondersms_body'=>$this->input->post('autorespondersms_body'),
				'autorespondersms_created_date'=>$creation_time,
				'autorespondersms_created_by'=>$this->user->user_id,
				'cmp_unique_id'=>$this->user->cmp_unique_id,
		);
		
		$this->db->insert('autorespondersms',$data);
		return $this->db->insert_id();
	}
	
	public function get_responses($responder_id)
	{
	   	   	$this->db->select('*');
			$this->db->from('autorespondersms');
			$this->db->where('autorespondersms_id',$responder_id);
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
			'autorespondersms_name' => $this->input->post('autorespondersms_name'),
			'autorespondersms_subject' => $this->input->post('autorespondersms_subject'),
			'autorespondersms_body' => $this->input->post('autorespondersms_body')
		);
		$this->db->update( 'autorespondersms', $data, array( 'autorespondersms_id' => $this->input->post( 'autorespondersms_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
		
	}
}

?>
