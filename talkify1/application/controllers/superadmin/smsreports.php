<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Smsreports extends Talkifisuper
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init())
		{
			redirect('superadmin/authenticate/login');
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Sms Assigned';
		$this->renderPage('superadmin/smsreports/index',$data);
	}
}

?>