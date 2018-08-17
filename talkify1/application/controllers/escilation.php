<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Escilation extends TalkifiSuper{
	
	public function __construct(){
		parent::__construct();
		if(!$this->init()) 
		{
              redirect('auth/logout');
        }

		$this->user = $this->ion_auth->user()->row();
		
		
	}
	public function index()
	{
		$this->renderPage('escilation/index1');
		
	}
}
?>