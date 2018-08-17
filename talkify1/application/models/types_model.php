<?php

class Types_model extends CI_Model 
{
	public $user;
	public function __construct()
	{
		parent::__construct();
	
		$this->user = $this->ion_auth->user()->row();
		
	}

    public function create() {

        
		//$cmp_unique_id = 'adcs123';
		$types_status = 'Active';
		
		$data = array(
				'lead_type_name'=>$this->input->post('type_name'),
				'lead_type_color'=>$this->input->post('type_color'),
				'types_status'=>$types_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        
        $this->db->insert( 'lead_types', $data );
        return $this->db->insert_id();
    }
    
    public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('lead_type_id,lead_type_name,lead_type_color,types_status');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'lead_type_id', $id )->limit( 1 )->get( 'lead_types' );
        
         if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
	
		$this->db->select('lead_type_id,lead_type_name,lead_type_color,types_status');
    	   //get all records from users table
		 $this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->get( 'lead_types' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'lead_type_name'=>$this->input->post('utype_name'),
				'lead_type_color'=>$this->input->post('utype_color')

		);
        $this->db->update( 'lead_types', $data, array( 'lead_type_id' => $this->input->post( 'lead_type_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'lead_types', array( 'lead_type_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
    
} //end class