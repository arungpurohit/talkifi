<?php
class Client_model extends CI_Model
{
	public $user;	
	
	public function __construct(){
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
	}
	
	public function create(){
		
		$client_creation_date = time();
		
		$data = array(
			'client_username'=>$this->input->post('client_username'),
			'client_password'=>$this->input->post('client_password'),
			'client_fname'=>$this->input->post('client_fname'),
			'client_lname'=>$this->input->post('client_lname'),
			'client_email'=>$this->input->post('client_email'),
			'client_phone'=>$this->input->post('client_phone'),
			'client_creation_date'=>$client_creation_date,
			'cmp_unique_id'=>$this->user->cmp_unique_id
		);
		
		$this->db->insert('clients',$data);
		return $this->db->insert_id();
	}
	
	public function insert_client_csv($clientDataAry){
		$this->db->insert('clients', $clientDataAry);
		return $this->db->insert_id();  
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
        
		$client_modification_date = time();
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
			'client_username'=>$this->input->post('uclient_username'),
			'client_password'=>$this->input->post('uclient_password'),
			'client_fname'=>$this->input->post('uclient_fname'),
			'client_lname'=>$this->input->post('uclient_lname'),
			'client_email'=>$this->input->post('uclient_email'),
			'client_phone'=>$this->input->post('uclient_phone'),
			'client_modification_date'=>$client_modification_date,
			'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->update( 'clients', $data, array( 'client_id' => $this->input->post( 'client_id', true ), 'cmp_unique_id' => $this->user->cmp_unique_id ) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'clients', array( 'client_id' => $id, 'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
}
?>