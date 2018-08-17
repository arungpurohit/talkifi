<?php
session_start();
class Day extends CI_Controller
{
	public function __construct()
	{	
		parent::__construct();
		if($this->session->userdata('logged_in')=="")
			redirect('login','refersh');
		else
			$this->sessionStatus = $this->session->userdata('logged_in');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('day/index');
		$this->load->view('footer');
	}
}
?>