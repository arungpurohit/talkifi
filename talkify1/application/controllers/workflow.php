<?php
session_start();
class Workflow extends CI_Controller
{
	public function __consrtuct()
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
		$this->load->view('workflow/index');
		$this->load->view('footer');
	}
}
?>