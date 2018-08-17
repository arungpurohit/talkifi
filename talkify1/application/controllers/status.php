<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Status extends TalkifiSuper{
	
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
		$this->load->model('status_model');	
	}
	public function index(){
		$this->renderPage('status/index');
	}
	public function getById($id){
		if(isset($id))
			echo json_encode($this->status_model->getById($id));
	}
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
				
		$this->form_validation->set_rules('status_name','Status Name','trime|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
				$this->status_model->create();
		}
	}
	
	public function read(){
		
		echo json_encode($this->status_model->getAll());
	}
	public function update(){
		if(!empty($_POST))
		{
			$this->status_model->update();
			echo "Record updated successfully";
		}
	}
	public function delete( $id= null){
		if(is_null($id))
		{
			echo "Error: Id not provided";
			return;			
		}
		$this->status_model->delete($id);
		echo "Record delete successfully";
	}

}

?>