<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Reports extends Talkifisuper
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init())
		{
			redirect('superadmin/authenticate/login');
		}
		
		$this->load->model('superadmin/reports_model');
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
		
		$data['companylist'] = $this->reports_model->getAllCompany();
		$data['moduleslist'] = $this->reports_model->getReports();
		
		
		
		
		$data['title'] = 'Reports Assigned';
		$this->renderPage('superadmin/reports/index',$data);
	}

	public function getReports()
	{
		
		$reports = array(		   array('Repvsstatus','show-repvsstatus','Rep Vs Status'),
									  array('Repvscategory','show-repvscategory','Rep Vs Category'),
									  array('Repvstypes','show-repvstypes','Rep Vs Types'),
									  array('Repvspriority','show-repvspriority','Rep Vs Priority'),
									  array('Repvschannels','show-repvschannels','Rep Vs Channels'),
				);
				
		return $reports;
	}
	
	
}

?>

