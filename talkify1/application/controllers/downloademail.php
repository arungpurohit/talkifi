<?php
session_start();
class Downloademail extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refersh');
		}
	
		$this->load->model('downloademail_model');
	}
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->downloademail_model->downloademail();
	}
}
?>