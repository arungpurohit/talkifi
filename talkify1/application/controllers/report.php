<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view( 'report/index');
		$this->load->view('footer');

	}
	}
?>