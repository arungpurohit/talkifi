<?php
class Repsinfo_model extends CI_Model
{
	public $user;
	public function __construct()
	{
		parent:: __construct();
		$this->user = $this->ion_auth->user()->row();
		$this->load->database();
	}
	public function create()
	{
		$repsinfo_username = $this->input->post('repsinfo_username');
		$repsinfo_password = $this->input->post('repsinfo_password');
		$repsinfo_fname = $this->input->post('repsinfo_fname');
		$repsinfo_lname = $this->input->post('repsinfo_lname');
		$repsinfo_email = $this->input->post('repsinfo_email');
		$repsinfo_phone = $this->input->post('repsinfo_phone');
		$cmp_unique_id = 'adcs123';
		
		$data = array(
			'repsinfo_username'=>$repsinfo_username,
			'repsinfo_password'=>$repsinfo_password,
			'repsinfo_fname'=>$repsinfo_fname,
			'repsinfo_lname'=>$repsinfo_lname,
			'repsinfo_email'=>$repsinfo_email,
			'repsinfo_phone'=>$repsinfo_phone,
			'cmp_unique_id'=>$cmp_unique_id
		);
		$this->db->insert('repsinfos',$data);
		return $this->db->insert_id();
	}
	public function getById($id)
	{
		$id = intval($id);
		$this->db->select('repsinfo_id,repsinfo_username,repsinfo_password,repsinfo_fname,repsinfo_lname,repsinfo_email,repsinfo_phone');
		
		$query = $this->db->where('repsinfo_id',$id)->limit(1)->get('repsinfos');
		if($query->num_rows() > 0 )
		{
			return $query->row();
		}
		else
		{
			return array();
		}
	}
	public function getAll()
	{
		$this->db->select('repsinfo_id,repsinfo_username,repsinfo_email,repsinfo_phone');
		$query = $this->db->get('repsinfos');
		if( $query->num_rows() > 0 ) 
		{
            return $query->result();
        } 
		else
		 {
            return array();
        }
	}
	public function update()
	{
		$repsinfo_username = $this->input->post('urepsinfo_username');
		$repsinfo_password = $this->input->post('urepsinfo_password');
		$repsinfo_fname = $this->input->post('urepsinfo_fname');
		$repsinfo_lname = $this->input->post('urepsinfo_lname');
		$repsinfo_email = $this->input->post('urepsinfo_email');
		$repsinfo_phone = $this->input->post('urepsinfo_phone');
		$cmp_unique_id = 'adcs123';
		
		$data = array(
			'repsinfo_username'=>$repsinfo_username,
			'repsinfo_password'=>$repsinfo_password,
			'repsinfo_fname'=>$repsinfo_fname,
			'repsinfo_lname'=>$repsinfo_lname,
			'repsinfo_email'=>$repsinfo_email,
			'repsinfo_phone'=>$repsinfo_phone,
			'cmp_unique_id'=>$cmp_unique_id
		);
		$this->db->update('repsinfos',$data,array('repsinfo_id' => $this->input->post('repsinfo_id',true) ) );
	}
	public function delete ( $id )
	{
		$id = intval($id);
		$this->db->delete('repsinfos',array('repsinfo_id' => $id) );
	}
}
?>