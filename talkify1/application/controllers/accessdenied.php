<?php 
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Accessdenied extends TalkifiSuper{
	
	public function __construct(){
		parent::__construct();
			if(!$this->init()) 
			{
				  redirect('auth/logout');
			}
			$this->user = $this->ion_auth->user()->row();
			
			if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this))) 
			{
				//dont add anything here, just pass the loop
    	    }
			
		}
	public function index(){
		$this->renderPage('access_denied');
	}
}

?>