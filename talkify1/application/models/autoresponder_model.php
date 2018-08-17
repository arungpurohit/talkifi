<?php

class Autoresponder_model extends CI_Model 
{
	public $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
	}

	public function create()
 {
		
		$creation_time = time();
        $data = array(
				'autoresponder_name'=>$this->input->post('autoresponder_name'),
				'autoresponder_subject'=>$this->input->post('autoresponder_subject'),
				'autoresponder_body'=>$this->input->post('autoresponder_body'),
				'autoresponder_created_date'=>$creation_time,
				'autoresponder_created_by'=>$this->user->user_id,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->insert( 'autoresponder', $data );
        return $this->db->insert_id();
   }
   
   public function selectAutoresponderVal()
	{
		$this->db->select('autoresponder_id,autoresponder_name,autoresponder_subject');
		$this->db->from('autoresponder');
		$this->db->where('autoresponder.cmp_unique_id',$this->user->cmp_unique_id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function get_responses($responder_id)
	{
	   	   	$this->db->select('*');
			$this->db->from('autoresponder');
			$this->db->where('autoresponder_id',$responder_id);
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
			'autoresponder_name' => $this->input->post('autoresponder_name'),
			'autoresponder_subject' => $this->input->post('autoresponder_subject'),
			'autoresponder_body' => $this->input->post('autoresponder_body')
		);
		$this->db->update( 'autoresponder', $data, array( 'autoresponder_id' => $this->input->post( 'autoresponder_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
		
	}
   
}

?>