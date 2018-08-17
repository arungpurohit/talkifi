<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Notifications extends Talkifisuper
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
		$data['title'] = 'Notifications ';
		$this->renderPage('superadmin/notifications/index',$data);
	}
}

?>