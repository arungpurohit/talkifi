<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Reprole extends TalkifiSuper{
	
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
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('reprole_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('role_name','role name','trim|required');
		
		$data['dbvalues'] = $this->reprole_model->selectdb();
		
		if($this->form_validation->run()==false)
		{
		
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('reprole/index',$data);
			$this->load->view('footer');
		}
		else
		{
		
			$data['dbvalues'] = $this->reprole_model->selectdb();
			$this->reprole_model->insert_db();
			
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('reprole/index',$data);
			$this->load->view('footer');
			
		}
		
	}
}


?>