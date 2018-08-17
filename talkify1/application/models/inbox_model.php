<?php

class Inbox_model extends CI_Model{
	
	public $statusArray;
	public $repArray;
	public $clientArray;
	public $priorityArray;
	public $colorArray;
	public $categoryArray;
	public $typesArray;
	public $channelArray;

	public function __construct(){
		
		parent::__construct();

	
		$this->statusArray = $this->getStatus();
		$this->repArray = $this->getRep();
		$this->clientArray = $this->getClient();
		$this->priorityArray = $this->getPriority();
		$this->colorArray= array();
		$this->categoryArray = $this-> getCategory();
	}
	
	public function explode_array($requireToExplode)
	{
		return explode(',',$requireToExplode);
	}
	
	public function getAll($params = "" , $page = "all") {
			
			$leadsArray=array();
			$this->db->select('leads.lead_unique_id, 
						   leads.lead_creation_date, 
						   leads.lead_priority_id, 
						   leads.client_id,
						   leads.rep_id,
						   leads.lead_read_flag,
						   leads.lead_subject,
						   leads.lead_status_id
						');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('leads.flag',1);
				$this->db->where_in('leads.rep_id',$this->explode_array($this->groups[0]->other_leads_view));
			
				if ( (($params ['num_rows'] * $params ['page']) >= 0 && $params ['num_rows'] > 0))
				{
					if  ($params ['search'] === TRUE)
					{
						$ops = array (
	
								"eq" => "=",
								"ne" => "<>",
								"lt" => "<",
								"le" => "<=",
								"gt" => ">",
								"ge" => ">="
						);

				}

//				if ( !empty ($params['search_field_1']))
//				{
//					$this->db->where ($params['search_field_1'], $params['user_id']);
//				}

				if ( !empty ($params['search_field_2']))
				{
					$this->db->where ($params['search_field_2'], "1");
				}

				$this->db->order_by( "{$params['sort_by']}", $params ["sort_direction"] );
				
				$this->db->limit ($params ['num_rows'], $params ['num_rows'] *  ($params ['page'] - 1) );
			}		
		
				$query = $this->db->get();
				
				if ($query->num_rows() > 0)
				{
					
					$row = $query->result_array(); 
					
					$i=0;
					foreach($row as $r)
					{
						$leadsArray[$i]['lead_unique_id'] = $r['lead_unique_id'];
						$leadsArray[$i]['lead_creation_date'] = date("Y-m-d",$r['lead_creation_date']);
						$leadsArray[$i]['lead_priority_id'] = $this->priorityArray[$r['lead_priority_id']];
						$leadsArray[$i]['client_id'] = $this->clientArray[$r['client_id']];
						$leadsArray[$i]['rep_id'] = $this->repArray[$r['rep_id']];
						$leadsArray[$i]['subject'] = $r['lead_subject'];
						$leadsArray[$i]['lead_status_id'] = $this->statusArray[$r['lead_status_id']];
						$i=$i+1;
					}
			}
					return $leadsArray;
			
    } //end getAll
	
	 public function getAllCount() {
			$leadsArray=array();
			$this->db->select('count(*) as cnt');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('leads.flag',1);
				
				$query = $this->db->get();
				$row = $query->result_array(); 
				return $row[0]['cnt'];
			
    } //end getAll
	
	public function getAllDeleted($params = "" , $page = "all") {
			
			$leadsArray=array();
			$this->db->select('leads.lead_unique_id, 
						   leads.lead_creation_date, 
						   leads.lead_priority_id, 
						   leads.client_id,
						   leads.rep_id,
						   leads.lead_read_flag,
						   leads.lead_subject,
						   leads.lead_status_id
						');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('leads.flag',2);
				$this->db->where_in('leads.rep_id',$this->explode_array($this->groups[0]->other_leads_view));
			
				if ( (($params ['num_rows'] * $params ['page']) >= 0 && $params ['num_rows'] > 0))
				{
					if  ($params ['search'] === TRUE)
					{
						$ops = array (
	
								"eq" => "=",
								"ne" => "<>",
								"lt" => "<",
								"le" => "<=",
								"gt" => ">",
								"ge" => ">="
						);

				}

//				if ( !empty ($params['search_field_1']))
//				{
//					$this->db->where ($params['search_field_1'], $params['user_id']);
//				}

				if ( !empty ($params['search_field_2']))
				{
					$this->db->where ($params['search_field_2'], "1");
				}

				$this->db->order_by( "{$params['sort_by']}", $params ["sort_direction"] );
				
				$this->db->limit ($params ['num_rows'], $params ['num_rows'] *  ($params ['page'] - 1) );
			}		
		
				$query = $this->db->get();
				
				if ($query->num_rows() > 0)
				{
					
					$row = $query->result_array(); 
					
					$i=0;
					foreach($row as $r)
					{
						$leadsArray[$i]['lead_unique_id'] = $r['lead_unique_id'];
						$leadsArray[$i]['lead_creation_date'] = date("Y-m-d",$r['lead_creation_date']);
						$leadsArray[$i]['lead_priority_id'] = $this->priorityArray[$r['lead_priority_id']];
						$leadsArray[$i]['client_id'] = $this->clientArray[$r['client_id']];
						$leadsArray[$i]['rep_id'] = $this->repArray[$r['rep_id']];
						$leadsArray[$i]['subject'] = $r['lead_subject'];
						$leadsArray[$i]['lead_status_id'] = $this->statusArray[$r['lead_status_id']];
						$i=$i+1;
					}
			}
					return $leadsArray;
			
    } //end getAll
	
	 public function getAllDeletedCount() {
			$leadsArray=array();
			$this->db->select('count(*) as cnt');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('leads.flag',2);
				
				$query = $this->db->get();
				$row = $query->result_array(); 
				return $row[0]['cnt'];
			
    } //end getAll

	
	
	
	
	public function getRep()
	{
		$repDetails= array();
		$this->db->select('id as rep_id,first_name');
		$this->db->from('users');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();
		
        foreach($query as $r){
			$repDetails[$r['rep_id']] = $r['first_name'];	
		}
		return $repDetails;
	}
	public function getClient()
	{
		$clientDetails= array();
		$this->db->select('client_id,client_username');
		$this->db->from('clients');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();
		
        foreach($query as $r){
			$clientDetails[$r['client_id']] = $r['client_username'];	
		}
		return $clientDetails;
	}
	
	public function getPriority()
	{
		$priorityDetails= array();
		$this->db->select('lead_priority_id,lead_priority_name');
		$this->db->from('lead_priority');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();
		
        foreach($query as $r){
			$priorityDetails[$r['lead_priority_id']] = $r['lead_priority_name'];	
		}
		return $priorityDetails;
	}
	
	public function getStatus()
	{
		$statusDropDown= array();
		$statusColor = array();
		$this->db->select('lead_status_id,lead_status_name,lead_status_color');
		$this->db->from('lead_status');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();

        foreach($query as $r){
			$statusDropDown[$r['lead_status_id']] = $r['lead_status_name'];
		//this->colorArray[$r['lead_status_id']]	= $r['lead_status_color'];
		}
		return $statusDropDown;
	}
	public function getCategory()
	{
		$categoryDetails= array();
		$this->db->select('lead_category_id,lead_category_name');
		$this->db->from('lead_category');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();

        foreach($query as $r){
			$categoryDetails[$r['lead_category_id']] = $r['lead_category_name'];	
		}
		return $categoryDetails;
	}
	
	public function deleteLead(){
		
		$leadid=$this->input->post('lid');
	
		if($leadid!='')
		{
			$creation_time = time();
			$data = array(
				'rep_notes_created_date' => $creation_time,
				'rep_notes_created_by' => $this->user->user_id,
				'rep_internal_note' => $this->input->post('reasontodelete'),
				'rep_external_note'	=> '',
				'cmp_unique_id' => $this->user->cmp_unique_id,
				'lead_unique_id' => $leadid
				);
			$this->db->insert('rep_notes',$data);
			//$inserted_id = $this->db->insert_id();
			
			$data = array(
				'flag'=>2
			);
			$this->db->update( 'leads', $data, array( 'lead_unique_id' => $leadid,'cmp_unique_id' => $this->user->cmp_unique_id ) );	
		}
		
	}
	
	public function reOpenLead(){
		
		$leadid=$this->input->post('lid');
		if($leadid!='')
		{
			$creation_time = time();
			$data = array(
				'rep_notes_created_date' => $creation_time,
				'rep_notes_created_by' => $this->user->user_id,
				'rep_internal_note' => $this->input->post('reasontoreopen'),
				'rep_external_note'	=> '',
				'cmp_unique_id' => $this->user->cmp_unique_id,
				'lead_unique_id' => $leadid
				);
			$this->db->insert('rep_notes',$data);
			//$inserted_id = $this->db->insert_id();
			
			$data = array(
				'flag'=>1
			);
			$this->db->update( 'leads', $data, array( 'lead_unique_id' => $leadid,'cmp_unique_id' => $this->user->cmp_unique_id ) );	
		}
		
	}
	
	
	
}
?>