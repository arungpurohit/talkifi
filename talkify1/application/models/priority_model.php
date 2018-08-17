<?php

class Priority_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

    public function create() {

        $priority_status ='Active';
		
		$data = array(
				'lead_priority_name'=>$this->input->post('priority_name'),
				'lead_priority_color' =>$this->input->post('priority_color'),
				'priority_status'=>$priority_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        
        $this->db->insert( 'lead_priority', $data );
        return $this->db->insert_id();
    }
    
    public function getById( $id ) {
        $id = intval( $id );
		$this->db->select('lead_priority_id,lead_priority_name,lead_priority_color,priority_status');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'lead_priority_id', $id )->limit( 1 )->get( 'lead_priority' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
	
		$this->db->select('lead_priority_id,lead_priority_name,lead_priority_color,priority_status');
    	   //get all records from priority table
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->get( 'lead_priority' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		$priority_status ='Active';
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'lead_priority_name'=>$this->input->post('upriority_name'),
				'lead_priority_color'=>$this->input->post('upriority_color'),
				'priority_status'=>$priority_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->update( 'lead_priority', $data, array( 'lead_priority_id' => $this->input->post( 'lead_priority_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'lead_priority', array( 'lead_priority_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
    
} //end class