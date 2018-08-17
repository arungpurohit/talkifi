<?php
class Uploadcsv extends CI_Controller{

	public $statusArray;
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')=="")
			redirect('login','refersh');
		else
			$this->sessionStatus = $this->session->userdata('logged_in');
		
		$this->load->model('leadshow_model');
		//$this->load->model('compose_model');
	}
	public function index()
	{
		$data['title'] = 'Upload the CSV';
		
		$this->load->view('header');	
		$this->load->view('left');
		$this->load->view('dataupload/dataupload',$data);
		$this->load->view('footer');
	
	}
}

?>
