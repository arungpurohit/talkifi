<?php
class Corporate_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function insert_db()
	{
		$data = array(
			'corp_name' => $this->input->post('corp_name'),
			'cmp_unique_id' => 'adcs123'
		);
		$this->db->insert('corporates',$data);
	}
	public function selectdb()
	{
		$this->db->select('*');
		$this->db->from('corporates');
		
		$query=$this->db->get();
		
		return $query->result();
	}
	
}
?>