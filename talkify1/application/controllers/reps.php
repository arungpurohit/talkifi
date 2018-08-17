<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Reps extends TalkifiSuper{
	
	public function __construct(){
		parent::__construct();
		if(!$this->init()) 
		{
              redirect('auth/logout');
        }
		$this->user = $this->ion_auth->user()->row();
		
		if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this))) 
		{
            $this->session->set_flashdata('message', 'You dont have permission to this page!! Contact Admin.');
			redirect('accessdenied');
        }
		$this->load->model( 'rep_model' );
		$this->load->model('ion_auth_model');
	}
	
	public function index()
	{
		$data['title'] = 'Reps';
		$data['groupsview'] = $this->ion_auth->groups($this->user->cmp_unique_id,'')->result_array();
		$this->renderPage('reps/index',$data);
	}
	
	public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->ion_auth->user($this->user->cmp_unique_id,$id)->row());
	}

	public function create() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('rep_username','User Name','required|valid_email');
		$this->form_validation->set_rules('rep_email','Email','required|valid_email');
		
		$this->form_validation->set_rules('roleofemp','Role of Emp','required');
		
		$additional_data = array(
				'first_name' => $this->input->post('rep_fname'),
				'last_name'  => $this->input->post('rep_lname'),
				'company'    =>'',
				'phone'      => $this->input->post('rep_phone'),
				'cmp_unique_id' => $this->user->cmp_unique_id
			);
	
		$username = $this->input->post('rep_username');
		$password = $this->input->post('rep_password');
		$email = $this->input->post('rep_email');
		

		

		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
			$this->ion_auth->register($username, $password, $email, $additional_data,$groups_id);
			echo "Rep Created Successfully";
		}
	}
	
	public function read() {
		echo json_encode($this->ion_auth->users($this->user->cmp_unique_id,'')->result_array());
	}
	
	public function update() {
	
	$additional_data = array(
				'first_name' => $this->input->post('urep_fname'),
				'last_name'  => $this->input->post('urep_lname'),
				'email ' => $this->input->post('urep_email'),
				'company'    =>'',
				'phone'      => $this->input->post('urep_phone')
			);
	
		$user->id = $this->input->post('rep_id');

		if( !empty( $_POST ) ) {
			$this->ion_auth->update($user->id,$this->user->cmp_unique_id,$additional_data);
			echo 'Record updated successfully!';
		}
	}
	
	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id not provided.';
			return;
		}
		
		$this->rep_model->delete( $id );
		echo 'Records deleted successfully';
	}

} //end class

?>