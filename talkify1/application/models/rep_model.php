<?php
class Rep_model extends CI_Model 
{
	public $user;	
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
	}
	
	public function login($username,$password)
	{
		$this->db->select('rep_id,rep_username,rep_password,cmp_unique_id');
		$this->db->from('rep_details');
		$this->db->where('rep_username = '."'".$username."'");
		$this->db->where('rep_password = '."'".$password."'");
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	

    public function create() {

        $rep_username = $this->input->post('rep_username');
		$rep_password = $this->input->post('rep_password'); 
		$rep_creation_date = time();
		$rep_modification_date = time();
		$rep_created_by = 'admin';
		$rep_created_via = 'HD';
		$rep_status = 'Active';
		$rep_fname = $this->input->post('rep_fname');
		$rep_lname = $this->input->post('rep_lname');
		$rep_email = $this->input->post('rep_email');
		$rep_phone = $this->input->post('rep_phone');
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'rep_username'=>$rep_username,
				'rep_password'=>$rep_password,
				'rep_creation_date'=>$rep_creation_date,
				'rep_modification_date'=>$rep_modification_date,
				'rep_created_by'=>$rep_created_by,
				'rep_created_via'=>$rep_created_via,
				'rep_status'=>$rep_status,
				'rep_fname'=>$rep_fname,
				'rep_lname'=>$rep_lname,
				'rep_email'=>$rep_email,
				'rep_phone'=>$rep_phone,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        
        $this->db->insert( 'rep_details', $data );
        return $this->db->insert_id();
    }
    
    public function getById( $id ) {
 		
		$this->user = $this->ion_auth->user()->row();
	
        $id = intval( $id );
		$this->db->select('rep_id,rep_username,rep_password,rep_fname,rep_lname,rep_email,rep_phone');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'rep_id', $id )->limit( 1 )->get( 'rep_details' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
	
		$this->db->select('rep_id,rep_username,rep_email,rep_phone');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
    	   //get all records from users table
        $query = $this->db->get( 'rep_details' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		$this->user = $this->ion_auth->user()->row();
		
		$rep_password = $this->input->post('urep_password'); 
		$rep_fname = $this->input->post('urep_fname');
		$rep_lname = $this->input->post('urep_lname');
		$rep_email = $this->input->post('urep_email');
		$rep_phone = $this->input->post('urep_phone');
		$rep_modification_date = time();
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'rep_password'=>$rep_password,
				'rep_fname'=>$rep_fname,
				'rep_lname'=>$rep_lname,
				'rep_email'=>$rep_email,
				'rep_phone'=>$rep_phone,
				'rep_modification_date'=>$rep_modification_date,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->update( 'rep_details', $data, array( 'rep_id' => $this->input->post( 'rep_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
    }
    
    public function delete( $id ) {
	
		$this->user = $this->ion_auth->user()->row();
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'rep_details', array( 'rep_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
    
} //end class