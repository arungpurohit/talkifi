<?php

session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Callreports extends Talkifisuper
{
	public $csv_arr;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init())
		{
			redirect('superadmin/authenticate/login');
		}
		
		$this->csv_arr = array();
		$this->load->model('superadmin/callreports_model');
		$this->load->library('form_validation');
		$this->load->helper('csv');
	}
	
	public function index()
	{	
		if($this->input->post('company'))
		$cmp_unique_id = $this->input->post('company');
		else
		$cmp_unique_id = '';
		 
		if(isset($cmp_unique_id))
		{
			$data['answeredcalls'] = $this->callreports_model->getAnsweredCallsCount($cmp_unique_id);	
			$data['missedcalls'] = $this->callreports_model->getMissCallsCount($cmp_unique_id);	
			$data['cmp_unique_id'] = $cmp_unique_id;
		}
		else
		{
			$data['cmp_unique_id']='';
			$data['answeredcalls']="";
			$data['missedcalls']="";
			
		}
		
		$data['companylist'] = $this->callreports_model->getAllCompany();
		
		$data['title'] = 'Call Assigned';
		$this->renderPage('superadmin/callreports/index',$data);
		
	}
	
}

?>