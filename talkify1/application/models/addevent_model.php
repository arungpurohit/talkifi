<?php
class Addevent_model extends CI_Model
{
	public $user;
	public function __construct()
	{
		 parent::__construct();
		 $this->user = $this->ion_auth->user()->row();
		 $this->load->database();
	}
	public function insert_db()
	{
		$data = array(
				'what' => $this->input->post('what'),
				'start_date' => $this->input->post('start_date'),
				'start_hour' => $this->input->post('start_hour'),
				'start_minute' => $this->input->post('start_minute'),
				'startam/pm' => $this->input->post('startam/pm'),
				'end_date' => $this->input->post('end_date'),
				'end_hour' => $this->input->post('end_hour'),
				'end_minute' => $this->input->post('end_minute'),
				'end_am/pm' => $this->input->post('endam/pm'),
				'backg_color' => $this->input->post('backg_color'),
				'text_color' => $this->input->post('text_color'),
				'cmp_unique_id' => 'adcs123'
			);
			$this->db->insert('addevent',$data);
	}
	public function selectdb()
	{
		$this->db->select('*');
		$this->db->from('addevent');
		
		$query=$this->db->get();
		
		return $query->result();
	}
}
?>