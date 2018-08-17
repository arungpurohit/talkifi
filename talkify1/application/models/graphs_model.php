<?php
class Graphs_model extends CI_Model
{
	public $sessionStatus;
	public function __construct(){
		parent::__construct();
		$this->load->model('compose_model');
	}
	
	public function getLeadsVsStatus($status_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_status_id', $status_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
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
	
	public function getLeadsVsStatusAll($status_id, $rep_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_status_id', $status_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	public function getLeadsVsCategory($category_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_category_id', $category_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		$this->db->where('leads.lead_creation_date >=', $dateFromSts);
		$this->db->where('leads.lead_creation_date <=', $dateToSts);
	
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	public function getLeadsVsCategoryAll($category_id, $rep_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_category_id', $category_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	public function getLeadsVsChannel($channel_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_channel_id', $channel_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
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
	
	public function getLeadsVsChannelAll($channel_id, $rep_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_channel_id', $channel_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}

	public function getLeadsVsPriority($priority_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_priority_id', $priority_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
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
	
	public function getLeadsVsPriorityAll($priority_id, $rep_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_priority_id', $priority_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	public function getLeadsVsType($type_id, $rep_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_type_id', $type_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
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
	
	public function getLeadsVsTypeAll($type_id, $rep_id)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_type_id', $type_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
		$rows = $this->db->get();
		foreach ($rows->result_array() as $row)
			$cnt = $row['cnt'];
		return $cnt;
	}
	
	public function getChannelLeads($channel_id, $dateFromSts, $dateToSts)
	{
		$this->db->select("count(*) as cnt", FALSE);
		$this->db->from('leads');
		//$this->db->where('leads.rep_id', $rep_id);
		$this->db->where('leads.lead_channel_id', $channel_id);
		$this->db->where('leads.cmp_unique_id', $this->user->cmp_unique_id);
		$this->db->where('leads.flag', 1);
		
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
	
	
}
?>