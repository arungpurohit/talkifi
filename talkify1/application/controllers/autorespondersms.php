<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Autorespondersms extends TalkifiSuper
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init())
		{
			redirect('auth/logout');
		}
		$this->user = $this->ion_auth->user()->row();
		if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this)))
		{
			$this->session->set_flashdata('message','you dont have permission to this page!! Contact Admin.');
			redirect('accessdenied');
		}
		$this->load->model('autorespondersms_model');
	}
	
	public function index()
	{
		$data['results'] =  $this->autorespondersms_model->selectAutorespondersmsVal();
		$this->renderPage('autorespondersms/index',$data);
	}
	
	public function create()
	{
		$this->load->library('form_validation');
		$data['results'] =  $this->autorespondersms_model->selectAutorespondersmsVal();
		$this->form_validation->set_rules('autorespondersms_name','Auto Reponder Sms Name','trim|required');
		$data['title'] = 'autoressms';
		if($this->form_validation->run()==FALSE)
		{
			$this->renderPage('autorespondersms/addresponder',$data);
		}
		else
		{
			$this->autorespondersms_model->create();
			//$this->renderPage('autorespondersms/index',$data);
			redirect('autorespondersms/index');
		}
	}
	
	public function update($autorespondersms_id)
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('autorespondersms_name','Auto Reponder Sms Name','trim|required');
		$data['title']='autoressms';
		$data['response']= $this->autorespondersms_model->get_responses($autorespondersms_id); 
		
		if($this->form_validation->run()==FALSE)
		{
			
			$this->renderPage('autorespondersms/updateresponder',$data);
		}
		else{
			 $this->autorespondersms_model->updateauto();			 
			 $data['results'] = $this->autorespondersms_model->selectAutorespondersmsVal();
			 $this->renderPage('autorespondersms/index',$data);
		}
		
	}
}

?>
		