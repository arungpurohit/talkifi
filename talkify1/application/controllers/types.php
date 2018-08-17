<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Types extends TalkifiSuper{
	
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
		
		$this->load->model( 'types_model' );
	}
	
	public function index()
	{
		$this->renderPage('types/index');
	}
	
	public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->types_model->getById( $id ) );
	}
	
	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('type_name','Type Name','required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
			echo $this->types_model->create();
		}
	}
	
	public function read() {
	
		echo json_encode( $this->types_model->getAll() );
	}
	
	public function update() {
		if( !empty( $_POST ) ) {
			$this->types_model->update();
			echo 'Record updated successfully!';
		}
	}
	
	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id not provided.';
			return;
		}
		
		$this->types_model->delete( $id );
		echo 'Records deleted successfully';
	}

} //end class

?>