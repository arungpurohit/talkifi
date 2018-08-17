<?php

class Leadshow_model extends CI_Model
{
	public $user;
	
	public function __construct(){
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();

		$this->statusArray = $this->getStatus();
		$this->repArray = $this->getRep();
		$this->clientArray = "";
		$this->priorityArray = $this->getPriority();
		$this->colorArray= array();
		$this->categoryArray = $this->getCategory();
		//$this->channelArray = $this->getChannels();
	}
	public function getLead($leadid){
		
		// select all the values from the lead table
		$leadsArray=array();
		$this->db->select('leads.lead_creation_date, 
						   leads.lead_priority_id, 
						   leads.client_id,
						   leads.rep_id,
						   leads.lead_read_flag,
						   leads.lead_status_id,
						   leads.lead_subject,
						   leads.lead_category_id,
						   leads.lead_channel_id,
						   leads.due_by,
						   leads.voice_path
						');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('leads.lead_unique_id',$leadid);
				//$this->db->where('rep_id',$this->sessionStatus['rep_id']);
				$query = $this->db->get();
				
			if ($query->num_rows() > 0)
				{
					///$row = $query->result(); 
					foreach ($query->result() as $rts)
   					{
						$leadsArray['lead_unique_id'] = $leadid;
						$leadsArray['lead_creation_date'] = $rts->lead_creation_date;
						$leadsArray['lead_priority_id'] = $rts->lead_priority_id;
						$leadsArray['client_id'] = $rts->client_id;
						$leadsArray['rep_id'] = $this->repArray[$rts->rep_id];
						$leadsArray['lead_status_id'] = $rts->lead_status_id;
						$leadsArray['subject'] = $rts->lead_subject;
						$leadsArray['lead_category_id'] = $rts->lead_channel_id;
						$leadsArray['lead_channel_id'] = $rts->lead_channel_id;
						$leadsArray['due_by'] = $rts->due_by;
						$leadsArray['voice_path'] = $rts->voice_path;
						//$leadsArray[$i]['lead_read_flag'] = $r['lead_read_flag'];
					}
						
											
						$this->db->select('lead_rep_threads.creation_date, 
										   lead_rep_threads.modification_date,
										   lead_rep_threads.msgBody, 
										   lead_rep_threads.created_by,
						');
						$this->db->from('lead_rep_threads');
						$this->db->where('lead_rep_threads.cmp_unique_id',$this->user->cmp_unique_id);
						$this->db->where('lead_rep_threads.lead_unique_id',$leadid);
						$this->db->order_by("lead_rep_threads.modification_date", "desc"); 
						
						$threadQuery = $this->db->get();
						
					
					
						$msgThread='';
						$msgThread.='<div class=bdisp>';
						
						
						
						
 						foreach($threadQuery->result_array() as $rthread)
   						{
										$msgThread.='<strong>'.$this->repArray[$rthread['created_by']].'</strong>';
										if($rthread['modification_date']!="")
										{
										
											 $msgThread.=" ".date("Y-m-d h:m:s", $rthread['modification_date']);
										 }
										 else if($rthread['creation_date']!="")
										 {
										 	$msgThread.=" ".date("Y-m-d h:m:s", $rthread['creation_date']);
										 }
										$msgThread.='<br />';
										$msgThread.=$rthread['msgBody'];
										$msgThread.='<br /><br />';
									 
						}	
						
						$this->db->select('lead_clients_threads.creation_date, 
										   lead_clients_threads.modification_date,
										   lead_clients_threads.msgBody, 
										   lead_clients_threads.created_by,
						');
						$this->db->from('lead_clients_threads');
						$this->db->where('lead_clients_threads.cmp_unique_id',$this->user->cmp_unique_id);
						$this->db->where('lead_clients_threads.lead_unique_id',$leadid);
						$this->db->order_by("lead_clients_threads.modification_date", "desc"); 
						$clientThreadQuery = $this->db->get();
						
						$i=1;
 						foreach ($clientThreadQuery ->result_array() as $rs)
   						{
						 $msgThread.='<strong> </strong>';
										if($rs['modification_date']!="")
										 $msgThread.=" ".date("Y-m-d h:m:s", $rs['modification_date']);
										 else
										 $msgThread.=" ".date("Y-m-d h:m:s", $rs['creation_date']);
										$msgThread.='<br /><p >';
									  $msgThread.=$rs['msgBody'];
										$msgThread.='</p><br />';
							$i++;		 
						}	
						
						$msgThread.='</div>';
						
						$leadsArray['msgthreads'] = $msgThread;
					
												
					if(isset($leadsArray['client_id']))
					{
						$clientArray = $this->getClientById($leadsArray['client_id']);
						
						foreach ($clientArray as $r)
   						{
							$leadsArray['client_username'] = $r['client_username'];
							$leadsArray['client_fname'] = $r['client_fname'];
							$leadsArray['client_lname'] = $r['client_lname'];
							$leadsArray['client_email'] = $r['client_email'];
							$leadsArray['client_phone'] = $r['client_phone'];
						}
					}
					
					return $leadsArray;
				} 
				else
				{
					return $leadsArray;
				}
			
	}
	
	public function getOtherLeads($client_id,$lead_id){
		
		$OtherLeadsArray=array();
		$this->db->select('leads.lead_unique_id, 
						   leads.lead_creation_date, 
						   leads.lead_priority_id, 
						   leads.rep_id,
						   leads.lead_subject,
						   leads.lead_status_id,
						   leads.lead_category_id,
						');
				$this->db->from('leads');
				$this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id);
				//$this->db->where('leads.lead_unique_id!=',$lead_id);
				$this->db->where('client_id',$client_id);
				$this->db->join('lead_rep_threads','leads.lead_unique_id=lead_rep_threads.lead_unique_id');
				
				$query = $this->db->get();
				$i=0;
				if ($query->num_rows() > 0)
				{
					$row = $query->result(); 
					
					foreach ($query->result() as $r)
   					{
						$OtherLeadsArray[$i]['lead_unique_id'] = $r->lead_unique_id;
						$OtherLeadsArray[$i]['lead_creation_date'] = $r->lead_creation_date;
						$OtherLeadsArray[$i]['lead_priority_id'] = $r->lead_priority_id;
						$OtherLeadsArray[$i]['rep_id'] = $this->repArray[$r->rep_id];
						//$leadsArray[$i]['lead_read_flag'] = $r['lead_read_flag'];
						$OtherLeadsArray[$i]['subject'] = $r->lead_subject;
						$OtherLeadsArray[$i]['lead_status_id'] = $r->lead_status_id;
						$i++; 	
					}
					return $OtherLeadsArray;
				} 
				else
				{
					return $OtherLeadsArray;
				}
	}
	public function getNotes($lead_id)
	{
		$this->db->select('rep_notes_id,rep_notes_created_date,rep_notes_created_by,rep_internal_note,rep_external_note');
		$this->db->from('rep_notes');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		$this->db->where('lead_unique_id',$lead_id);
		$this->db->where('rep_notes_created_by',$this->user->user_id);
		$this->db->order_by("rep_notes_created_date", "desc"); 
		$query = $this->db->get();
		return $query;
	}

	public function getRep()
	{
		$repDetails= array();
		$this->db->select('id as rep_id,username');
		$this->db->from('users');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();
		
        foreach($query as $r){
			$repDetails[$r['rep_id']] = $r['username'];	
		}
		return $repDetails;
	}
	
	public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
		
        $query = $this->db->where( 'client_id', $id )->limit( 1 )->get( 'clients' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
	
	public function getStatus(){
		
		$statusDropDown = array();
		$this->db->select('lead_status_id,lead_status_name');
		$this->db->from('lead_status');
		$this->db->where('cmp_unique_id','adcs123');
		
		$query = $this->db->get()->result_array();
		
		if( count($query)>0 ) {
			foreach($query as $r){
				$statusDropDown[$r['lead_status_id']] = $r['lead_status_name']; 
			}	
		  	return $statusDropDown;
        } else {
            return $statusDropDown;
        }
		
	}
	public function getTypes(){
		
		$typeDropDown = array();
		$this->db->select('lead_type_id,lead_type_name');
		$this->db->from('lead_types');
		$this->db->where('cmp_unique_id','adcs123');
		$this->db->where('types_status','Active');
		
		$query = $this->db->get()->result_array();
		
		if( count($query) > 0 ) {
            foreach($query as $r){
				$typeDropDown[$r['lead_type_id']] = $r['lead_type_name'];	
			}
			return $typeDropDown;
        } else {
            return $typeDropDown;
        } 
		
	}
	
	
	
	public function getPriority(){
		$this->db->select('lead_priority_id,lead_priority_name');
		$this->db->from('lead_priority');
		$this->db->where('cmp_unique_id','adcs123');
		$this->db->where('priority_status','Active');
		
		$priorityDropDown = array();
		
		$query = $this->db->get()->result_array();
		
		if( count($query) > 0 ) {
            foreach($query as $r)
			{
				$priorityDropDown[$r['lead_priority_id']] = $r['lead_priority_name'];
			}		
			return $priorityDropDown;
        } else {
            return $priorityDropDown;
        }
		
	}
	public function getCategory(){
		$this->db->select('lead_category_id,lead_category_name');
		$this->db->from('lead_category');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		$this->db->where('category_status','Active');
		
		$categoryDropDown = array();
		
		$query = $this->db->get()->result_array();
		
		if( count($query) > 0 ) {
            foreach($query as $r)
			{
				$categoryDropDown[$r['lead_category_id']] = $r['lead_category_name'];
			}		
			return $categoryDropDown;
        } else {
            return $categoryDropDown;
        }
	}
		public function getChannels(){
			
			$this->db->select('lead_channel_id,lead_channel_name');
			$this->db->from('lead_channels');
			$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
			$this->db->where('channel_status','Active');
			
			$channelDropDown = array();
			
			$query = $this->db->get()->result_array();
			
			if( count($query) > 0 ) {
				foreach($query as $r)
				{
					$channelDropDown[$r['lead_channel_id']] = $r['lead_channel_name'];
				}		
				return $channelDropDown;
			} else {
				return $channelDropDown;
		}
	}
	
	
	public function getClientById( $id ) {
 
        $id = intval( $id );
		$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->where( 'client_id', $id )->limit( 1 )->get( 'clients' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }
    }
	
    
    public function getAll() {
	
		$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
    	   //get all records from users table
        $query = $this->db->where('leads.cmp_unique_id',$this->user->cmp_unique_id)->get( 'clients' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
   
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'clients', array( 'client_id' => $id ) );
    } //end delete
}
?>