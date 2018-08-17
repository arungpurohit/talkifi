<?php
class Status_model extends CI_Model
{
	public $user;	
	public function __construct(){
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
		$this->load->database();
	}
	
	public function create(){
		
		//$cmp_unique_id = 'adcs123';
		 	$lead_status_type = 'Active';
		$data = array(
			'lead_status_name'=>$this->input->post('status_name'),
			'lead_status_color'=>$this->input->post('status_color'),
			'lead_status_rep_display'=>$this->input->post('rep_display'),
			'lead_status_client_display'=>$this->input->post('client_display'),
			'lead_status_type'=>$lead_status_type,
			'cmp_unique_id'=>$this->user->cmp_unique_id	
		);
		
		$this->db->insert('lead_status',$data);
		return $this->db->insert_id();
	}
	public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('lead_status_id,lead_status_name,lead_status_color,lead_status_rep_display,lead_status_client_display');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'lead_status_id', $id )->limit( 1 )->get( 'lead_status' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
	
		$this->db->select('lead_status_id,lead_status_name,lead_status_color,lead_status_rep_display,lead_status_client_display');
    	   //get all records from users table
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->get( 'lead_status' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		
		//$cmp_unique_id = 'adcs123';
		$lead_status_type = 'Active';
		
		$data = array(
				'lead_status_name'=>$this->input->post('ustatus_name'),
				'lead_status_color'=>$this->input->post('ustatus_color'),
				'lead_status_rep_display'=>$this->input->post('urep_display'),
				'lead_status_client_display'=>$this->input->post('uclient_display'),
				'lead_status_type'=>$lead_status_type,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->update( 'lead_status', $data, array( 'lead_status_id' => $this->input->post( 'lead_status_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'lead_status', array( 'lead_status_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id) );
    } //end delete
	
	

}
?>