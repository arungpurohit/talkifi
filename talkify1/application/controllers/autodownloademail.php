<?php
class Autodownloademail extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('autodownloademail_model');
	}
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->autodownloademail_model->downloademail();
	}
}
?>