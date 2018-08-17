<?php
class Cti_model extends CI_Model
{
	public $user;
	public function __construct(){
		parent::__construct();
	/*	$this->user = $this->ion_auth->user()->row();
*/		//$this->load->database();
		/*$this->statusArray = $this->getStatus();
		//$this->repArray = $this->getRep();
		$this->priorityArray = $this->getPriority();
		$this->colorArray= array();
		$this->categoryArray = $this->getCategory();*/
	}
	
	
	
	/*public function getStatus(){
		
		$statusDropDown = array();
		$this->db->select('lead_status_id,lead_status_name');
		$this->db->from('lead_status');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
		
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
	
	public function getChannels(){
		
		$channelsDropDown = array();
		$this->db->select('lead_channel_id,lead_channel_name');
		$this->db->from('lead_channels');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
		
		$query = $this->db->get()->result_array();
		
		if( count($query)>0 ) {
			foreach($query as $r){
				$channelsDropDown[$r['lead_channel_id']] = $r['lead_channel_name']; 
			}	
		  	return $channelsDropDown;
        } else {
            return $channelsDropDown;
        }
		
	}
	
	public function getTypes(){
		
		$typeDropDown = array();
		$this->db->select('lead_type_id,lead_type_name');
		$this->db->from('lead_types');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
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
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
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
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
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
	
	public function getRep()
	{
		$repDetails= array();
		$this->db->select('rep_id,rep_fname');
		$this->db->from('rep_details');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->get()->result_array();
		
        foreach($query as $r){
			$repDetails[$r['rep_id']] = $r['rep_fname'];	
		}
		return $repDetails;
	}
	*/
	
	
	
	public function insertCtiLead($customer_no,$voice_path,$rep_num,$b_sim,$call_duration,$status,$unique_id,$cmp_unique_id){
		
		//$sessionStatus= $this->session->userdata('logged_in');
		
		//select the cmp_unique_id by matching the rep_phone	
		$query=$this->db->query('SELECT rep_id,cmp_unique_id FROM rep_details where rep_phone ="'.$rep_num.'"'); 
		$row = $query->row_array();
		$cmp_unique_id = $row['cmp_unique_id'];
		$rep_id = $row['rep_id']; 		
		
		
		if($cmp_unique_id!='')
	   {	
	   
	    	// check that client already present or not, if not insert tht client
			$this->db->select('client_id,client_username,client_phone');
			$this->db->where( 'cmp_unique_id', $cmp_unique_id );
			$query = $this->db->where( 'client_phone', $customer_no)->get( 'clients' );
			
			//meaning that client already present
			if( $query->num_rows() > 0 ) {
				$clientrow = $query->row_array();
				$client_id = $clientrow['client_id'];   
			} else {
			// new client insert the client data
			$client_creation_date = time();
		
			$data = array(
				'client_username'=>$customer_no,
				'client_password'=>'password',
				'client_phone'=>$customer_no,
				'client_creation_date'=>$client_creation_date,
				'cmp_unique_id'=>$cmp_unique_id
			);
			
				$this->db->insert('clients',$data);
				$client_id =$this->db->insert_id();	
			}
			
			//select the next lead unique id and insert into lead
			$query=$this->db->query('SELECT max(lead_unique_id) as max_lead_id FROM leads where cmp_unique_id ="'.$cmp_unique_id.'"'); 
			$row = $query->row_array();
			$max_id = $row['max_lead_id']; 
			
			if($max_id == NULL || $max_id =="")
				$max_id = 1;
			else
				$max_id = $max_id+1;
			
			$creation_time = time();
			$data = array(
				'client_id'=>$client_id,
				'lead_unique_id'=>$max_id,
				'lead_creation_date' => $creation_time,
				'lead_type_id'=>1,
				'lead_priority_id'=>1,
				'rep_id'=>$rep_id,
				'lead_subject' => 'Enquiry from telphone',
				'lead_status_id' => 1,
				'lead_channel_id' => 1,
				'lead_read_flag'=>1,
				'voice_path' =>$voice_path,
				'cmp_unique_id'=>$cmp_unique_id
			);
				
			$this->db->insert('leads',$data);
			$inserted_id = $this->db->insert_id();
		
		
			$lThread = array(
				'lead_unique_id' =>$max_id,
				'attach_flag' =>0,
				'cmp_unique_id' => $cmp_unique_id,
				'creation_date' => $creation_time,
				'created_by'=> $rep_id,
				'msgBody' => 'Enquiry from telphone',
				'lead_status_id' => 1,
			);
			
			$this->db->insert('lead_rep_threads',$lThread);
			$insertSuccess = $this->db->insert_id(); 
			// SMS auto responder should go from here
		}
		else{
			//redirect('/login/');
			$cmp_not_matching='company not matching, fake hit';
			$insertSuccess = 2;
		}
		
		//insert into ctievent
		$data = array(
				'customer_num'=>$customer_no,
				'rep_num' => $rep_num,
				'b_sim'=>$b_sim,
				'call_duration'=>$call_duration,
				'status_of_insert'=>$insertSuccess,
				'unique_id' => $unique_id,
				'cmp_unique_id'=>$cmp_unique_id
			);
				
			$this->db->insert('cti_event',$data);
			$inserted_id = $this->db->insert_id();
			return $max_id;
	}
}
?>