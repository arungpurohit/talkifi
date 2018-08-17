<?php

class Home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		
		$this->output->enable_profiler(TRUE);
		
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('home');
		$this->load->view('footer');
	}
}

?>