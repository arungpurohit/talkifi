<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modules_display_model extends CI_Model
{	
	
	public function __construct(){
		parent::__construct();
	}
	public function getAllModules(){
		$this->db->select('module_name');
		$this->db->from('tfimodules');
		$query=$this->db->get()->result_array();
		return $query;
	}
	
	public function getAllCompanies(){
			$this->db->select('cmp_unique_id,company_name');
			$this->db->from('company_details');
			$query = $this->db->get()->result_array();
			return $query;
	}
	public function selectModules($company_id)
	{
		$this->db->select('company_id,company_name,modules_purchased');
		$this->db->from('company_details');
		$this->db->where('company_id',$company_id);
		$query=$this->db->get()->row();
		return $query;
	}
	public function listcomnpany($params = "" , $page = "all") {
			
				$this->db->select('company_id,company_name,modules_purchased,active_status');
				$this->db->from('company_details');
				
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
	
	 public function listallcompany() {

				$this->db->select('count(*) as cnt');
				$this->db->from('company_details');
				$query = $this->db->get();
				$row = $query->result_array(); 
				return $row[0]['cnt'];
			
    } //end getAll
	
	public function implode_array($imp_ary)
	{
		if(!empty($imp_ary))
		return implode(',',$imp_ary);
		else
		return '';
	}
	
	public function editRole()
	{
		$module_name= array();
		$page_perm="";
		
			$company_id=$this->input->post('company_id');
			$module_name=$this->input->post('module_name');	
			
			if(!is_null($module_name))
				$page_perm=implode(':',$module_name);
				$page_perm=$page_perm.':';
		        
			
					$data = array(
					'modules_purchased'=>$page_perm,
					);
			
		$this->db->update('company_details', $data, array( 'company_id' => $this->input->post( 'company_id', true )));	
			
		
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
	
	
}
?>