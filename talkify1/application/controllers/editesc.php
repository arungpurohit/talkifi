<?php
class Editesc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('editesc/index2');
		$this->load->view('footer');
	}
}
?>