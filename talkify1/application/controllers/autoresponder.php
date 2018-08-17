<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Autoresponder extends TalkifiSuper{
	
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
		$this->load->model('autoresponder_model');
	}
	
	public function index()
	{
		$data['results'] = $this->autoresponder_model->selectAutoresponderVal();
		$this->renderPage('autoresponder/index',$data);
	}
	
	public function create()
	{
		$this->load->library('form_validation');
		
		$data['results'] = $this->autoresponder_model->selectAutoresponderVal();
		
		$this->form_validation->set_rules('autoresponder_name','Auto Reponder Name','trim|required');
		$data['title']='autores';
		if($this->form_validation->run()==FALSE)
		{
			 $this->renderPage('autoresponder/addresponder',$data);
		}
		else{
			 $this->autoresponder_model->create();
			// $this->renderPage('autoresponder/index',$data);
			 redirect('autoresponder/index');
		}
	}
	
	public function update($autoresponder_id)
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('autoresponder_name','Auto Reponder Name','trim|required');
		$data['title']='autores';
		$data['response']= $this->autoresponder_model->get_responses($autoresponder_id); 
		
		if($this->form_validation->run()==FALSE)
		{
			
			$this->renderPage('autoresponder/updateresponder',$data);
		}
		else{
			 $this->autoresponder_model->updateauto();			 
			 $data['results'] = $this->autoresponder_model->selectAutoresponderVal();
			 $this->renderPage('autoresponder/index',$data);
		}
		
	}
	
}
?>
