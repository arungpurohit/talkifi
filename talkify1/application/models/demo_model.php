<?php

class Demo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}
	
	public function insert_db($cmp_unique_id)
	{
		$starting_date= date('d/m/Y');
		$data = array(
				'company_name' => $this->input->post('cmpname'),
				'address' => $this->input->post('cmpaddress'),
				'city' => $this->input->post('cmpcity'),
				'state' => $this->input->post('cmpstate'),
				'zip' => $this->input->post('cmpzip'),
				'phone' => $this->input->post('cmpphone'),
				'contactperson' => $this->input->post('contactperson'),
				'contactemail' => $this->input->post('contactemail'),
				'contactphone' => $this->input->post('contactphone'),
				'referred' => $this->input->post('referred'),
				'pass' => $this->input->post('pass'),
				'cpass' => $this->input->post('cpass'),
				'industry' => $this->input->post('industry'),
				'noofusers' => $this->input->post('noofusers'),
				'nooftelephonyusers' => $this->input->post('nooftelephonyusers'),
				'cmp_unique_id' => $cmp_unique_id
			);
			$this->db->insert('companies ',$data);
			$inserted['companies'] = $this->db->insert_id();
	
			//insert in to company_details 
			$cmpData = array(
				'company_name' => $this->input->post('cmpname'),
				'company_address' => $this->input->post('cmpaddress'),
				'company_city' => $this->input->post('cmpcity'),
				'company_state' => $this->input->post('cmpstate'),
				'company_zip' => $this->input->post('cmpzip'),
				'company_phone' => $this->input->post('cmpphone'),
				'company_contact_person' => $this->input->post('contactperson'),
				'company_contact_email' => $this->input->post('contactemail'),
				'company_contact_phone' => $this->input->post('contactphone'),
				'company_starting_date' =>$starting_date,
				'cmp_unique_id' => $cmp_unique_id
			);
			$this->db->insert('company_details',$cmpData);
			$inserted['company_details'] = $this->db->insert_id();
		
		//insert in to the cti tables....
		// use the curl here
		
		//default setups...
		
		$default_status='ACTIVE';
		//category
		$dataCat = array(
				'lead_category_name'=>'HelpDesk',
				'category_status'=>$default_status,
				'cmp_unique_id'=>$cmp_unique_id
		);
        $this->db->insert( 'lead_category', $dataCat );
		$inserted['category'] = $this->db->insert_id();
		
		//CHANNEL
		
		$dataCha = array(
				'lead_channel_name'=>'Voice',
				'lead_channel_color' =>'#fff',
				'channel_status'=>$default_status,
				'cmp_unique_id'=>$cmp_unique_id
		);
        
        $this->db->insert( 'lead_channels', $dataCha );
		$inserted['channel'] = $this->db->insert_id();
	
		
		//priority
		$dataPri = array(
				'lead_priority_name'=>'High',
				'lead_priority_color' =>'#fff',
				'priority_status'=>$default_status,
				'cmp_unique_id'=>$cmp_unique_id
		);
		$this->db->insert( 'lead_priority', $dataPri );
		$inserted['priority'] = $this->db->insert_id();
		
		//status
		$dataSta = array(
			'lead_status_name'=>'Initial',
			'lead_status_color'=>'#fff',
			'lead_status_rep_display'=>'Initial',
			'lead_status_client_display'=>'Initial',
			'lead_status_type'=>$default_status,
			'cmp_unique_id'=>$cmp_unique_id	
		);
		$this->db->insert('lead_status',$dataSta);
		$inserted['status'] = $this->db->insert_id();
		
		//type
		$dataTyp = array(
				'lead_type_name'=>'Service',
				'lead_type_color'=>'#fff',
				'types_status'=>$default_status,
				'cmp_unique_id'=>$cmp_unique_id
		);
        
        $this->db->insert( 'lead_types', $dataTyp );
		$inserted['types'] = $this->db->insert_id();
		
		
			$rolename="admin";
			
			$category = $inserted['category'];
			$types = $inserted['types'];
			$status = $inserted['status'];
			$channels = $inserted['channel'];
			$priority = $inserted['priority'];
			$assign_perm = '';
			$others_lead = '';
			
			$page_perm='Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:';
				
			$data = array('name'=>$rolename,
					'description'=>"Administrator",
					'page_perm'=>$page_perm,
					'category_perm'=>$category,
					'types_perm'=>$types,
					'priority_perm'=>$priority,
					'status_perm'=>$status,
					'channels_perm'=>$channels,
					'assign_perm'=>$assign_perm,
					'other_leads_view'=>$others_lead,
					'cmp_unique_id'=>$cmp_unique_id);
			
			$this->db->insert('groups',$data);
			$inserted['groups'] = $this->db->insert_id();
		
		
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'scoolmani@gmail.com',
				'smtp_pass' => 'manimanimani',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
		);
		
	$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$msg ="";
		$msg .="Online registration has been done. Here is the details<br />";
				
			$msg .= "company_name => ".$this->input->post('cmpname')."<br />
				address => ".$this->input->post('cmpaddress')."<br />
				city => ".$this->input->post('cmpcity')."<br />
				state => ".$this->input->post('cmpstate')."<br />
				zip => ".$this->input->post('cmpzip')."<br />
				phone => ".$this->input->post('cmpphone')."<br />
				contactperson => ".$this->input->post('contactperson')."<br />
				contactemail => ".$this->input->post('contactemail')."<br />
				contactphone => ".$this->input->post('contactphone')."<br />
				referred => ".$this->input->post('referred')."<br />
				pass => ".$this->input->post('pass')."<br />
				cpass => ".$this->input->post('cpass')."<br />
				industry => ".$this->input->post('industry')."<br />
				noofusers => ".$this->input->post('noofusers')."<br />
				nooftelephonyusers => ".$this->input->post('nooftelephonyusers')."<br />
				cmp_unique_id => ".$cmp_unique_id."<br />";
		
		$msg .="<br /><br />
				Thanks and regards<br />
				Subramanya.M ";
				
			$this->email->from('scoolmani@gmail.com','scoolmani');  
			$this->email->to('subramanya.smg@gmail.com');
			$this->email->cc('vj12best@gmail.com');
			//$this->email->bcc('@their-example.com');
			
			$subject ='Talkifi Registration for the company -'.$this->input->post('cmpname');
			$this->email->subject($subject);
			$this->email->message($msg);
			
			$this->email->send();
			
			//$this->email->print_debugger();
			
			return $inserted;
			
	}
	
	public function selectdb()
	{
		$this->db->select('*');
		$this->db->from('companies');
		
		$query=$this->db->get();
		
		return $query->result();
	}	
}

?>