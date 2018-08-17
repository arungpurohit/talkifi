<?php
class Dashboard_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	
	public function getAnsweredCallsCount($dateFromDash,$dateToDash)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('cti_event');
		$this->db->where('cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('status', 'ANSWERED');

		if($dateFromDash!='' && $dateToDash!='')
		{
			$dateFromDash =	strtotime($dateFromDash." 00:00:00");
			$dateToDash = strtotime($dateToDash." 00:00:00");
				
			$this->db->where('leads.lead_creation_date >=', $dateFromDash);
			$this->db->where('leads.lead_creation_date <=', $dateToDash);
		}
			
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
		$cnt = $row['cnt'];
	 		
		return $cnt;	
			
	}
	
	public function getMissCallsCount($dateFromDash,$dateToDash)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('cti_event');
		$this->db->where('cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('status', '');

		if($dateFromDash!='' && $dateToDash!='')
		{
			$dateFromDash =	strtotime($dateFromDash." 00:00:00");
			$dateToDash = strtotime($dateToDash." 00:00:00");
				
			$this->db->where('leads.lead_creation_date >=', $dateFromDash);
			$this->db->where('leads.lead_creation_date <=', $dateToDash);
		}
			
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
		$cnt = $row['cnt'];
	 		
		return $cnt;	
			
	}
	
	public function getLeadsVsStatus($status_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_status_id', $status_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		
		if($dateFromSts!='' && $dateToSts!='')
		{
			$dateFromSts =	strtotime($dateFromSts." 00:00:00");
			$dateToSts = strtotime($dateToSts." 00:00:00");
			
			$this->db->where('leads.lead_creation_date >=', $dateFromSts);
			$this->db->where('leads.lead_creation_date <=', $dateToSts);
		}
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	/*public function getChannelVsLeads($channel_id,$dateFromDash,$dateToDash){
		if($dateFromDash!='' && $dateToDash!='')
		{
			$dateFromDash1 =	strtotime($dateFromDash." 00:00:00");
			$dateToDash1 = strtotime($dateToDash." 00:00:00");
				
			//$this->db->where('leads.lead_creation_date >=', $dateFromDash);
			//$this->db->where('leads.lead_creation_date <=', $dateToDash);
		
		$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_channel_id',$channel_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> where('leads.lead_creation_date >=', $dateFromDash1)
				-> where('leads.lead_creation_date <=', $dateToDash1)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		}
		
		return $cnt;
	}*/
	
}
?>