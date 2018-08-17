<?php

class Reps_old extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'rep_model' );
	}
	
	public function index()
	{
		$this->load->view( 'reps/index1');
	}
	
	public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->rep_model->getById( $id ) );
	}
	
	public function create() {
		if( !empty( $_POST ) ) {
			echo $this->rep_model->create();
		}
	}
	
	public function read() {
		echo json_encode( $this->rep_model->getAll() );
	}
	
	public function update() {
		if( !empty( $_POST ) ) {
			$this->rep_model->update();
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