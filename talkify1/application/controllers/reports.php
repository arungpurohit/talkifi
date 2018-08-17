<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Reports extends TalkifiSuper{

	public function __construct(){
		parent::__construct();
		if(!$this->init()) 
		{
              redirect('auth/logout');
        }

		$this->user = $this->ion_auth->user()->row();
		
		if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this))) 
		{
            $this->session->set_flashdata('message', 'You dont have permission to this page!! Contact Admin.');
			redirect('accessdenied');
        }
	}
	public function index()
	{
		$this->renderPage( 'reports/index');

	}
}
	
?>