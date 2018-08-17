<?php
class Channel_model extends CI_Model
{
	public $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
		$this->load->database();
	}

    public function create() {

        $channel_status ='Active';
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'lead_channel_name'=>$this->input->post('channel_name'),
				'lead_channel_color' =>$this->input->post('channel_color'),
				'channel_status'=>$channel_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        
        $this->db->insert( 'lead_channels', $data );
        return $this->db->insert_id();
    }
    
    public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('lead_channel_id,lead_channel_name,lead_channel_color,channel_status');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'lead_channel_id', $id )->limit( 1 )->get( 'lead_channels' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
	
		$this->db->select('lead_channel_id,lead_channel_name,lead_channel_color,channel_status');
    	   //get all records from channel table
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->get( 'lead_channels' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		$channel_status ='Active';
		//$cmp_unique_id = 'adcs123';
		
		$data = array(
				'lead_channel_name'=>$this->input->post('uchannel_name'),
				'lead_channel_color'=>$this->input->post('uchannel_color'),
				'channel_status'=>$channel_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
		
        $this->db->update( 'lead_channels', $data, array( 'lead_channel_id' => $this->input->post( 'lead_channel_id', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } 
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'lead_channels', array( 'lead_channel_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
    } //end delete
    
} //end class