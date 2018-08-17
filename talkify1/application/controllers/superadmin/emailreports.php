<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Emailreports extends Talkifisuper
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init())
		{
			redirect('superadmin/authenticate/login');
		}
		
		$this->load->model('superadmin/emailreports_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{	
		if($this->input->post('company'))
		$cmp_unique_id = $this->input->post('company');
		else
		$cmp_unique_id = '';
		 
		if(isset($cmp_unique_id))
		{
			$data['cmp_unique_id'] = $cmp_unique_id;
		}
		else
		{
			$data['cmp_unique_id']='';
		}
		
		$data['companylist'] = $this->emailreports_model->getAllCompany();
		
		$data['title'] = 'Email Assigned';
		$this->renderPage('superadmin/emailreports/index',$data);
	}
}

		
		
?>
