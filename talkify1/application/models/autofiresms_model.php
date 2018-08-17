<?php 
class Autofiresms_model extends CI_Model{
	public function __construct()
	{
			parent::__construct();
	}
	
	public function cronsmsfire()
	{
		
		$iMin= date('i');
		
		echo $selectTimeRange5 = date('Y-m-d H:').($iMin+5).":00";
		echo $selectTimeRange10 = date('Y-m-d H:').($iMin+10).":00";
		echo $selectTimeRange15 = date('Y-m-d H:').($iMin+15).":00";
		echo $selectTimeRange30 = date('Y-m-d H:').($iMin+30).":00";

		$this->db->select('*');
		$this->db->from('tasks');
		$this->db->where('reminder_via',1); //1 meaning fire sms
		//$this->db->and_where('EndTime',$selectTimeRange15);
		$this->db->where('EndTime',$selectTimeRange15);
		
		
		$query = $this->db->get()->result_array();
		
		print_r($query);
	}
}
?>