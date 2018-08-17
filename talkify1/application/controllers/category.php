<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Category extends TalkifiSuper{
	
	public $user;
	
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
		$this->load->model( 'category_model' );
	}
	
	public function index()
	{
		$data['title']='category';
		$data['categorylist']=$this->category_model->getAllCategory();

		$this->renderPage('category/index',$data);
	}
	
	public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->category_model->getById( $id ) );
	}
	
	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('category_name','Category Name','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
			echo $this->category_model->create();
		}
	}
	
	public function createsubcategory() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('categorysel','Category Name','trim|required');
		$this->form_validation->set_rules('subcategory_name','Sub Category Name','trim|required');

		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else{
			echo $this->category_model->createsubcat();
		}
	}
	public function read() {
	
		echo json_encode( $this->category_model->getAll() );
	}
	
	public function update() {
		if( !empty( $_POST ) ) {
			$this->category_model->update();
			echo 'Record updated successfully!';
		}
	}
	
	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id not provided.';
			return;
		}
		
		$this->category_model->delete( $id );
		echo 'Records deleted successfully';
	}

} //end class

?>