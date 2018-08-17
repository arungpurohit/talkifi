<?php
class Adevent_model extends CI_Model
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
				'title' => $this->input->post('title'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'location' => $this->input->post('location'),
				'type' => $this->input->post('type'),
				/*'notes' => $this->input->post('notes'),*/
				'webaddress' => $this->input->post('webaddress'),
				'cmp_unique_id' => 'adcs123'
			);
			$this->db->insert('adevents',$data);
	}
	public function selectdb()
	{
		$this->db->select('*');
		$this->db->from('adevents');
		
		$query=$this->db->get();
		
		return $query->result();
	}
}
?>
	