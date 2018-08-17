<?php
class repportlet_model extends CI_Model{
	
	public $user;	
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
			
		$this->load->model('compose_model');
	}
	
	public function getStatusVsLeads($staus_id,$rep_id,$dateFromSts,$dateToSts)
	{
			 	$this->db->select("count(*) as cnt",FALSE);
				$this->db-> from('leads');
				$this->db-> where('leads.rep_id',$rep_id);
				$this->db-> where('leads.lead_status_id',$staus_id);
				$this->db-> where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				
				if($dateFromSts!='' && $dateToSts!='')
				{
					$dateFromSts = strtotime($dateFromSts." 00:00:00"); 
					$dateToSts = strtotime($dateToSts." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromSts);
					$this->db->where('leads.lead_creation_date <=', $dateToSts);
				}
				
			$rows = $this->db->get();
					foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;								
	}
	public function getStatussVsLeads($status_id){
		$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_status_id',$status_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	}
	public function fixed_by_month($date1,$date2){
		$rows = $this->db->select("count(DISTINCT(lead_id)) as cnt",FALSE)
				-> from('leads')
				-> where('lead_status_id',2)
				-> where('lead_creation_date >=',trim($date1))
				-> where('lead_creation_date <=',trim($date2))
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	
	}
	public function lead_by_month($date1,$date2){
		$rows = $this->db->select("count(DISTINCT(lead_id)) as cnt",FALSE)
				-> from('leads')
				-> where('lead_creation_date >=',trim($date1))
				-> where('lead_creation_date <=',trim($date2))
				-> where( 'cmp_unique_id', $this->user->cmp_unique_id )
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	
	}
	
	
	public function getCategorysVsLeads($categoey_id){
		$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_category_id',$categoey_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	}
	
	public function getCategoryVsLeads($cat_id,$rep_id,$dateFromCat,$dateToCat){
		
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db-> where('leads.rep_id',$rep_id);
				$this->db->where('lead_category_id',$cat_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
		
				if($dateFromCat!='' && $dateToCat!='')
				{
					$dateFromCat = strtotime($dateFromCat." 00:00:00"); 
					$dateToCat = strtotime($dateToCat." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromCat);
					$this->db->where('leads.lead_creation_date <=', $dateToCat);
				}
			$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
	}
	public function getTypessVsLeads($type_id,$rep_id,$dateFromType,$dateToType){
		
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db-> where('leads.rep_id',$rep_id);
				$this->db->where('lead_type_id',$type_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
		
				if($dateFromType!='' && $dateToType!='')
				{
					$dateFromType = strtotime($dateFromType." 00:00:00"); 
					$dateToType = strtotime($dateToType." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromType);
					$this->db->where('leads.lead_creation_date <=', $dateToType);
				}
			$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
	}
	
   public function getTypesVsLeads($type_id){
		
				$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_type_id',$type_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	}
	
	public function getChannelssVsLeads($channel_id,$dateFromChannels,$dateToChannels){
		
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db->where('lead_channel_id',$channel_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
		
				if($dateFromChannels!='' && $dateToChannels!='')
				{
					$dateFromChannels = strtotime($dateFromChannels." 00:00:00"); 
					$dateToChannels = strtotime($dateToChannels." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromChannels);
					$this->db->where('leads.lead_creation_date <=', $dateToChannels);
				}
			$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
	}
	 public function getChannelsVsLeads($channel_id){
		
				$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_channel_id',$channel_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	}
	
	public function getPrioritysVsLeads($priority_id,$rep_id,$dateFromPriority,$dateToPriority)
	{
		
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db-> where('leads.rep_id',$rep_id);
				$this->db->where('lead_priority_id',$priority_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
		
				if($dateFromPriority!='' && $dateToPriority!='')
				{
					$dateFromPriority = strtotime($dateFromPriority." 00:00:00"); 
					$dateToPriority = strtotime($dateToPriority." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromPriority);
					$this->db->where('leads.lead_creation_date <=', $dateToPriority);
				}
			$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
	}
	 public function getPriorityVsLeads($priority_id){
		
				$rows = $this->db->select("count(*) as cnt",FALSE)
				-> from('leads')
				-> where('lead_priority_id',$priority_id)
				-> where('leads.cmp_unique_id',$this->user->cmp_unique_id)
				-> get();
				
			foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
			
		return $cnt;
	}
	
	public function getRepssVsLeads($rep_id,$dateFromReps,$dateToReps)
	{
		
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db->where('rep_id',$rep_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
		
				if($dateFromReps!='' && $dateToReps!='')
				{
					$dateFromReps = strtotime($dateFromReps." 00:00:00"); 
					$dateToReps = strtotime($dateToReps." 00:00:00");

					$this->db->where('leads.lead_creation_date >=', $dateFromReps);
					$this->db->where('leads.lead_creation_date <=', $dateToReps);
				}
			$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
	}
	 
	public function getRepsVsLeads($rep_id)
	{
				$this->db->select("count(*) as cnt",FALSE);
				$this->db->from('leads');
				$this->db->where('rep_id',$rep_id);
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$rows = $this->db-> get();
				
			foreach ($rows->result_array() as $row)
				$cnt = $row['cnt'];
			return $cnt;
		
	}
	
	 
	
}
?>	