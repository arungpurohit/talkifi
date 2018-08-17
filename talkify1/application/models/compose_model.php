<?php
class Compose_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	
		$this->statusArray = $this->getStatus();

		$this->priorityArray = $this->getPriority();
		$this->colorArray= array();
		$this->categoryArray = $this->getCategory();
		$this->channelArray = $this->getChannels();
		$this->typesArray = $this->getTypes();
	}
	
	public function explode_array($requireToExplode)
	{
		return explode(',',$requireToExplode);
	}
	
	public function getStatus(){
		
		$statusDropDown = array();
		$this->db->select('lead_status_id,lead_status_name');
		$this->db->from('lead_status');
		$this->db->where_in('lead_status_id',$this->explode_array($this->groups[0]->status_perm));
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

	public function getClients(){
		
		$clientsDropDown = array();
		$this->db->select('client_id,client_username');
		$this->db->from('clients');
		$this->db->where( 'cmp_unique_id', $this->sessionClients['cmp_unique_id'] );
		
		$query = $this->db->get()->result_array();
		
		if( count($query)>0 ) {
			foreach($query as $r){
				$clientsDropDown[$r['client_id']] = $r['client_username']; 
			}	
		  	return $clientsDropDown;
        } else {
            return $clientsDropDown;
        }
		
	}	
	public function getChannels(){
		
		$channelsDropDown = array();
	
		$this->db->select('lead_channel_id,lead_channel_name');
		$this->db->from('lead_channels');
		$this->db->where_in('lead_channel_id',$this->explode_array($this->groups[0]->channels_perm));
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
		$this->db->where_in('lead_type_id',$this->explode_array($this->groups[0]->types_perm));
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
		$this->db->where_in('lead_priority_id',$this->explode_array($this->groups[0]->priority_perm));
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
		$this->db->where('lead_primary_id',NULL);
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
	
	public function getSubCategory($lead_primary_id){
		$this->db->select('lead_category_id,lead_category_name');
		$this->db->from('lead_category');
		$this->db->where('lead_primary_id',$lead_primary_id);
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
		$repDropDown = array();
		$this->db->select('id as rep_id,first_name');
		$this->db->from('users');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get()->result_array();
		
		if( count($query) > 0 ) {
            foreach($query as $r)
			{
				$repDropDown[$r['rep_id']] = $r['first_name'];
			}		
			return $repDropDown;
        } else {
            return $repDropDown;
        }
	}
	
	public function getAutoresponder()
	{
		$this->db->select('autoresponder_id,autoresponder_name');
		$this->db->from('autoresponder');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		
		return($this->db->get()->result_array());
	}
	public function getAutorespondersms()
	{
		$this->db->select('autorespondersms_id,autorespondersms_name');
		$this->db->from('autorespondersms');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		
		return($this->db->get()->result_array());
	}
	
	
	public function updateLead()
	{
			$modification_date = time();
			$data = array(
				'lead_unique_id'=>$this->input->post('lead_id'),
				'lead_type_id'=>$this->input->post('types'),
				'lead_priority_id'=>$this->input->post('priority'),
				'rep_id'=>$this->input->post('assigned_to'),
				'lead_status_id' => $this->input->post('status'),
				'lead_category_id' => $this->input->post('category'),
				'lead_channel_id' => $this->input->post('channels'),
				'lead_read_flag'=>1
			);
			
			$this->db->update( 'leads', $data, array( 'lead_unique_id' => $this->input->post( 'lead_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );	
		
			$replaceStr = $this->input->post('msgBody');
			$parsedmsgbody = $replaceStr;
			
			/*preg_replace('/<table style=.*?>.*?<\/[\s]*table>/s', '', $replaceStr);*/
		
			$lThread = array(
				'lead_unique_id' =>$this->input->post('lead_id'),
				'attach_flag' =>0,
				'cmp_unique_id' => $this->user->cmp_unique_id,
				'modification_date' => $modification_date,
				'created_by'=> $this->user->id,
				'msgBody' => $parsedmsgbody,
				'lead_status_id' => $this->input->post('status'),
				//'lead_category_id' => $this->input->post('category'),
				'lead_attachment' => ''
			);
			
			$this->db->insert('lead_rep_threads',$lThread);
		
		if($this->input->post('client_respond_email')!='' && $this->input->post('uvemail')=='uvemailsend')
		{	
			// now send me the mail to the client if uvemail = on
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'talkifidemo@gmail.com',
				'smtp_pass' => 'vj12best',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
		);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			// get the company email ID to send the mail
			$this->email->from('talkifidemo@gmail.com','Talkifi');  
			// get the client mail 
			$this->email->to($this->input->post('client_respond_email'));
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
				
			$this->email->subject($this->input->post('subject'));
			
			// PARSE in case if build in variables used or requested
			$this->email->message($parsedmsgbody);
				
			$this->email->send();
		}	
			return $this->db->insert_id(); 
		
	}
	public function insertLead(){
			
			//select the next lead unique id
			$query=$this->db->query('SELECT max(lead_unique_id) as max_lead_id FROM leads where cmp_unique_id ="'.$this->user->cmp_unique_id.'"'); 
			$row = $query->row_array();
			$max_id = $row['max_lead_id']; 
			
			if($max_id == NULL || $max_id =="")
				$max_id = 1;
			else
				$max_id = $max_id+1;
			
			$creation_time = time();
			$data = array(
				'client_id'=>$this->input->post('client_id'),
				'lead_unique_id'=>$max_id,
				'lead_creation_date' => $creation_time,
				'lead_type_id'=>$this->input->post('types'),
				'lead_priority_id'=>$this->input->post('priority'),
				'rep_id'=>$this->input->post('reps'),
				//'rep_id'=>$this->input->post('rep_id'),
				'lead_subject' => $this->input->post('subject'),
				'lead_status_id' => $this->input->post('status'),
				'lead_category_id' => $this->input->post('category'),
				'lead_channel_id' => $this->input->post('channels'),
				'due_by' => strtotime($this->input->post('due_by')),
				'lead_read_flag'=>1,
				'cmp_unique_id'=>$this->user->cmp_unique_id
			);
				
			$this->db->insert('leads',$data);
			$inserted_id = $this->db->insert_id();
		
		
			$lThread = array(
				'lead_unique_id' =>$max_id,
				'attach_flag' =>0,
				'cmp_unique_id' => $this->user->cmp_unique_id,
				'creation_date' => $creation_time,
				'created_by'=> $this->user->id,
				'msgBody' => $this->input->post('msgBody'),
				'lead_status_id' => $this->input->post('status'),
				'lead_attachment' => ''
			);
			
		$this->db->insert('lead_rep_threads',$lThread);
		// Auto responder should go from here
		if($this->input->post('responder')!='')
		{	
		
	
			//get the client email ID
			$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
			$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
			$this->db->where( 'client_id', $this->input->post('client_id'));
			//get all records from users table
			$clientqry = $this->db->get( 'clients' )->result_array();
			if($clientqry[0]['client_email']!='')
			{
			
				$this->db->select('autoresponder_id,autoresponder_name,autoresponder_subject,autoresponder_body');
				$this->db->from('autoresponder');
				$this->db->where('autoresponder.cmp_unique_id',$this->user->cmp_unique_id);
				$this->db->where('autoresponder.autoresponder_id',$this->input->post('responder'));
				$responderqry = $this->db->get()->result_array();			
				
				$subject =  $responderqry[0]['autoresponder_subject'];
				$msg =  $responderqry[0]['autoresponder_body'];
				
				$username = $clientqry[0]['client_username'];
				$firstname = $clientqry[0]['client_fname'];
				$lastname = $clientqry[0]['client_lname'];
				
				$repname = $this->user->username;
				$companyname = $this->user->company;
				$repmobile = $this->user->phone;
				
				$patterns = array('/UserName/','/FirstName/','/LastName/','/RepName/','/CompanyName/','/RepMobile/');
				$replace = array($username,$firstname,$lastname,$repname,$companyname,$repmobile);
				
				$subject =preg_replace($patterns, $replace, $subject);
				$msg =preg_replace($patterns, $replace, $msg);
				
				$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'talkifidemo@gmail.com',
						'smtp_pass' => 'vj12best',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					
					$this->email->from('talkifidemo@gmail.com','Talkifi');  
				
					$this->email->to($clientqry[0]['client_email']);
					//$this->email->cc('another@another-example.com');
					//$this->email->bcc('them@their-example.com');
					$this->email->subject($subject);
					$this->email->message($msg);
					$this->email->send();
				  $this->email->print_debugger();
				
				}//client email not blank	
			}
			return $this->db->insert_id(); 
	}
	
	public function insertNote(){
			$creation_time = time();
			$data = array(
				'rep_notes_created_date' => $creation_time,
				'rep_notes_created_by' => $this->user->user_id,
				'rep_internal_note' => $this->input->post('internalnotes'),
				'rep_external_note'	=> $this->input->post('externalnotes'),
				'cmp_unique_id' => $this->user->cmp_unique_id,
				'lead_unique_id' => $this->input->post('lead_id_note')
				);
			$this->db->insert('rep_notes',$data);
			$inserted_id = $this->db->insert_id();
	}

	
	
	public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'client_id', $id )->limit( 1 )->get( 'clients' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
	
    
    public function getAll() {
	
		$this->db->select('client_id,client_username,client_fname,client_lname,client_email,client_phone');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
    	   //get all records from users table
        $query = $this->db->get( 'clients' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
		$data = array(
			'client_username'=>$this->input->post('uclient_username'),
			'client_password'=>$this->input->post('uclient_password'),
			'client_fname'=>$this->input->post('uclient_fname'),
			'client_lname'=>$this->input->post('uclient_lname'),
			'client_email'=>$this->input->post('uclient_email'),
			'client_phone'=>$this->input->post('uclient_phone'),
			'cmp_unique_id'=>$cmp_unique_id
		);
        $this->db->update( 'clients', $data, array( 'client_id' => $this->input->post( 'client_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'clients', array( 'client_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
}
?>