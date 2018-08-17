<?php
class Reports_model extends CI_Model 
{
	public $user;	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = $this->ion_auth->user()->row();
	}
	
	public function repvsstatus($rep_id,$status_id,$dateFrom,$dateTo)
	{ 
	
		$dateFrom = strtotime($dateFrom." 00:00:00"); 
		$dateTo = strtotime($dateTo." 00:00:00");
		
			$rows = $this->db->select("count(lead_status_id) as cnt",FALSE)
				-> from('leads')
				-> where('rep_id',$rep_id)
				-> where('lead_status_id',$status_id)
				//-> where("`receive_date` BETWEEN $date1 AND $date2"))
				->where('lead_creation_date >=', $dateFrom)
				->where('lead_creation_date <=', $dateTo)
				->where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				->where('leads.flag', 1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;					
	}
	
	public function repvscategory($rep_id,$category_id,$dateFrom,$dateTo)
	{
		$dateFrom = strtotime($dateFrom." 00:00:00");
		$dateTo = strtotime($dateTo." 00:00:00");
		
			$rows = $this->db->select("count(lead_category_id) as cnt",FALSE)
				->from('leads')
				->where('rep_id',$rep_id)
				->where('lead_category_id',$category_id)
				->where('lead_creation_date >=', $dateFrom)
				->where('lead_creation_date <=', $dateTo)
				->where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				->where('leads.flag', 1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			return $cnt;
	}
	
	public function repvstypes($rep_id,$types_id,$dateFrom,$dateTo)
	{
		$dateFrom = strtotime($dateFrom." 00:00:00");
		$dateTo = strtotime($dateTo." 00:00:00");
		
			$rows = $this->db->select("count(lead_type_id) as cnt",FALSE)
				->from('leads')
				->where('rep_id',$rep_id)
				->where('lead_type_id',$types_id)
				->where('lead_creation_date >=', $dateFrom)
				->where('lead_creation_date <=', $dateTo)
				->where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				->where('leads.flag', 1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			return $cnt;
	}
	
	public function repvspriority($rep_id,$priority_id,$dateFrom,$dateTo)
	{
		$dateFrom = strtotime($dateFrom." 00:00:00");
		$dateTo = strtotime($dateTo." 00:00:00");
		
			$rows = $this->db->select("count(lead_priority_id) as cnt",FALSE)
				->from('leads')
				->where('rep_id',$rep_id)
				->where('lead_priority_id',$priority_id)
				->where('lead_creation_date >=', $dateFrom)
				->where('lead_creation_date <=', $dateTo)
				->where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				->where('leads.flag', 1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			return $cnt;
	}
	
	public function repvschannels($rep_id,$channels_id,$dateFrom,$dateTo)
	{
		$dateFrom = strtotime($dateFrom." 00:00:00");
		$dateTo = strtotime($dateTo." 00:00:00");
		
			$rows = $this->db->select("count(lead_channel_id) as cnt",FALSE)
				->from('leads')
				->where('rep_id',$rep_id)
				->where('lead_channel_id',$channels_id)
				->where('lead_creation_date >=', $dateFrom)
				->where('lead_creation_date <=', $dateTo)
				->where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				->where('leads.flag', 1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			return $cnt;
	}
	
}	
?>