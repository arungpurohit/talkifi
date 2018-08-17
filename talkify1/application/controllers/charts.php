<?php
session_start();
class Charts extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('charts/index');
		$this->load->view('footer');
	}
	
}

?>
