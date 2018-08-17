<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Errorlogs extends Talkifisuper
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
		$data['title'] = 'Errors ';
		$this->renderPage('superadmin/errorlogs/index',$data);
	}
}

?>