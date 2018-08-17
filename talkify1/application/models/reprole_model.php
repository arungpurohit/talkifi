<?php

class Reprole_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function selectModules()
	{
		$this->db->select('modules_purchased');
		$this->db->from('company_details');
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		$query=$this->db->get()->row();
		return $query;
	}
	
	public function listRoles($params = "" , $page = "all") {
			
				$this->db->select('id as roleid,name as role_name,page_perm as permission');
				$this->db->from('groups');
				$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
			
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
				}
			return $row;
	}
	
	 public function listRolesCount() {

				$this->db->select('count(*) as cnt');
				$this->db->from('groups');
				$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
				$query = $this->db->get();
				$row = $query->result_array(); 
				return $row[0]['cnt'];
			
    } //end getAll
	
	public function rolenamepresence($role_name)
	{
		$this->db->where('name',$role_name);
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
        $query = $this->db->get('groups');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
	}
	
	public function getStatus(){
		
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
		$this->db->where('types_status','Active');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
		
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
	
	
	public function selectRoles()
	{
		$reproleDD = array();
	
		$this->db->select('*');
		$this->db->from('groups');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
		
		$query=$this->db->get()->result_array();
		
		
		if( count($query)>0 ) {
			foreach($query as $r){
				$reproleDD[$r['id']] = $r['name']; 
			}	
		  	return $reproleDD;
        } else {
            return $reproleDD;
        }
	}
	
	public function implode_array($imp_ary)
	{
		if(!empty($imp_ary))
		return implode(',',$imp_ary);
		else
		return '';
	}
	
	
	public function insertRole()
	{
		$module_name= array();
		$page_perm="";
	
		$rolename=$this->input->post('role_name');
	
		if($this->rolenamepresence($rolename))
			return false;
		else
		{
			$module_name=$this->input->post('module_name');	
			
			$category = $this->implode_array($this->input->post('category'));
			
			$types = $this->implode_array($this->input->post('types'));
			
			$status = $this->implode_array($this->input->post('status'));
			
			$channels = $this->implode_array($this->input->post('channels'));
			
			$priority = $this->implode_array($this->input->post('priority'));
			
			$assign_perm = $this->implode_array($this->input->post('assignperm'));
			
			$others_lead = $this->implode_array($this->input->post('otherleads'));
			
			if(!is_null($module_name))
				$page_perm=implode(':',$module_name);
				
				if ($this->ion_auth->is_admin())
				{	
					$page_perm .="Roleofemp:";
				}		
				
					$data = array('name'=>$rolename,
					'page_perm'=>$page_perm,
					'category_perm'=>$category,
					'types_perm'=>$types,
					'priority_perm'=>$priority,
					'status_perm'=>$status,
					'channels_perm'=>$channels,
					'assign_perm'=>$assign_perm,
					'other_leads_view'=>$others_lead,
					'cmp_unique_id'=>$this->user->cmp_unique_id);
			
			$this->db->insert('groups',$data);
			return true;
		}
	}
	
	public function editRole()
	{
		$module_name= array();
		$page_perm="";
	
		$role_id=$this->input->post('role_id');
		
			$module_name=$this->input->post('module_name');	
			
			$category = $this->implode_array($this->input->post('category'));
			
			$types = $this->implode_array($this->input->post('types'));
			
			$status = $this->implode_array($this->input->post('status'));
			
			$channels = $this->implode_array($this->input->post('channels'));
			
			$priority = $this->implode_array($this->input->post('priority'));
			
			$assign_perm = $this->implode_array($this->input->post('assignperm'));
			
			$others_lead = $this->implode_array($this->input->post('otherleads'));
			
			if(!is_null($module_name))
				$page_perm=implode(':',$module_name);
				
				if ($this->ion_auth->is_admin())
				{	
					$page_perm .=":Roleofemp:";
				}
				
				
					$data = array(
					'page_perm'=>$page_perm,
					'category_perm'=>$category,
					'types_perm'=>$types,
					'priority_perm'=>$priority,
					'status_perm'=>$status,
					'channels_perm'=>$channels,
					'assign_perm'=>$assign_perm,
					'other_leads_view'=>$others_lead
					);
			
		$this->db->update( 'groups', $data, array( 'id' => $this->input->post( 'role_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );	
			return true;
		
	}
	
}
?>