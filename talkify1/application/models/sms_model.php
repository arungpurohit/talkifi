<?php
class Sms_model extends CI_Model
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
				'mobile_numbers' => $this->input->post('mobile_numbers'),
				'sms_content' => $this->input->post('sms_content'),
				'smstemplate_name' => $this->input->post('smstemplate_name'),
				'newsms_content' => $this->input->post('newsms_content'),
				'cmp_unique_id' => 'adcs123'
			);
			$this->db->insert('sms',$data);
		
			
	}
}
?>