<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Clients extends TalkifiSuper{
	
	public function __construct(){
		parent::__construct();
			if(!$this->init()) 
			{
				  redirect('auth/logout');
			}
	
			$this->user = $this->ion_auth->user()->row();
			
			if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this))) 
			{
				redirect('accessdenied');
			}
			$this->load->model('client_model');
	}
	public function index(){
		$this->renderPage('clients/index');
	}
	public function getById($id){
		if(isset($id))
			echo json_encode($this->client_model->getById($id));
	}
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('client_username','User Name','trim|required');
		$this->form_validation->set_rules('client_password','Password','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
			$returnId = $this->client_model->create();
			echo $returnId;
		}
	}
	
	public function read(){
		
		echo json_encode($this->client_model->getAll());
	}
	public function update(){
		if(!empty($_POST))
		{
			$this->client_model->update();
			echo "Record updated successfully";
		}
	}
	public function delete( $id= null){
		if(is_null($id))
		{
			echo "Error: Id not provided";
			return;			
		}
		$this->client_model->delete($id);
		echo "Record delete successfully";
	}

}

?>