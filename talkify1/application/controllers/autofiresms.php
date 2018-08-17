<?php 
class Autofiresms extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('autofiresms_model');
	}
	
	public function index(){
		$this->output->enable_profiler();
		$this->autofiresms_model->cronsmsfire();	
	}
	
	
}


?>