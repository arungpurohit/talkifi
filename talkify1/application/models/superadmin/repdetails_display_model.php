<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Repdetails_display_model extends  CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function listreps($params = "" , $page = "all") {
			
				$this->db->select('ccmp_id,company_name,nooftelephonyusers');
				$this->db->from('companies');
				
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
	
	 public function listallreps() {

				$this->db->select('count(*) as cnt');
				$this->db->from('companies');
				$query = $this->db->get();
				$row = $query->result_array(); 
				return $row[0]['cnt'];
			
    } //end getAll
	
	public function selectReps($ccmp_id)
	{
		$this->db->select('ccmp_id,company_name,nooftelephonyusers');
		$this->db->from('companies');
		$this->db->where('ccmp_id',$ccmp_id);
		$query=$this->db->get()->row();
		return $query;
	}
	
	public function getAllReps(){
		$this->db->select('company_name');
		$this->db->from('companies');
		$query=$this->db->get()->result_array();
		return $query;
	}
	
	public function implode_array($imp_ary)
	{
		if(!empty($imp_ary))
		return implode(',',$imp_ary);
		else
		return '';
	}
	
	public function editRole()
	{
		//$module_name= array();
		//$page_perm="";
		
			$ccmp_id=$this->input->post('ccmp_id');
			$noofreps=$this->input->post('noofreps');
			//$module_name=$this->input->post('module_name');	
			
			/*if(!is_null($module_name))
				$page_perm=implode(':',$module_name);
				$page_perm=$page_perm.':';*/
		        
			
					$data = array(
					'nooftelephonyusers'=>$noofreps,
					);
			
		$this->db->update('companies', $data, array( 'ccmp_id' => $this->input->post( 'ccmp_id', true )));	
			
		
	}
	
}

?>