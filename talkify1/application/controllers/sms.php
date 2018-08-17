<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Sms extends TalkifiSuper{
	
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
		$this->load->model('sms_model');
	}
	public function index()
	{
		$this->load->helper('text');
		/*$string = "Here is a simple string of text that will help us demonstrate this function.";
		echo $string = character_limiter($string, 20);*/
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('mobile_numbers','Mobile Numbers','trim|required|min_length[10]');
		$this->form_validation->set_rules('sms_content','Content','trim|reauired');
		$this->form_validation->set_rules('smstemplate_name','Template Name','trim|reauired');
		$this->form_validation->set_rules('newsms_content','Sms Content','trim|reauired');
		
		if($this->form_validation->run()==FALSE)
		{		
			$data['title'] = 'SMS';
			$this->renderPage('sms/index',$data);
			
		}
		else
		{		
			$data['insert-success'] = 'insert success';
			
			$this->sms_model->insert_db();
			$this->renderPage('sms/index',$data);
			//redirect('show-sms');
			//redirect('/sms/');
			//$this->sms_model1->insert_db();
			//redirect('/sms/');
		}
		
		
	}
	
	public function selectClient($val)
	{
		
	}
}
?>
