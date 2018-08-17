<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();

require(APPPATH.'/controllers/talkifisuper.php');

class Company extends TalkifiSuper{
	
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
		$this->load->model('company_model');
	}
	public function index(){
		
		$this->load->library('form_validation');	
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		
			
		//$this->output->enable_profiler(TRUE);
		  
		$data['statusof']= $this->company_model->get_company($this->user->cmp_unique_id);  
		
		$this->form_validation->set_rules('company_name','Company Name','trim|required');
		$this->form_validation->set_rules('company_address','Company Address','trim|required');
		$this->form_validation->set_rules('company_state','Company State','trim|required');
		$this->form_validation->set_rules('company_fax','Company fax','trim|required');
		$this->form_validation->set_rules('company_city','Company city','trim|required');
		$this->form_validation->set_rules('company_zip','Company zip','trim|required');
		$this->form_validation->set_rules('company_starting_date','Starting Date','trim|required');
		$this->form_validation->set_rules('company_modification_date','Modification Date','trim|required');
		$this->form_validation->set_rules('company_contact_person','Contact Person','trim|required');
		$this->form_validation->set_rules('company_contact_phone','Contact Phone','trim|required');
		$this->form_validation->set_rules('company_contact_email','Contact Email','trim|required');
		$this->form_validation->set_rules('no_of_emails_provided','No Of Emails Provided','trim|required');
		$this->form_validation->set_rules('no_of_emails_used','No Of Emails Used','trim|required');
		
		
		if($this->form_validation->run()==false)
		{
			$this->renderPage('company/index',$data);

		}
		else
		{
		 	$filename = '';
			$error = array();
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$error = array('upload_data' => $this->upload->data());
				$filename = $error['upload_data']['file_name'];		
			}	
				
				
				$this->company_model->updatecmp($filename);
				
				$data['statusof']= $this->company_model->get_company();  
				$this->renderPage('company/index',$data);

		}
	}	
	
	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array('error' => $this->upload->display_errors());
			$data['statusof']= $this->company_model->get_company();  
			$this->renderPage('company/index',$data);
		}
		else
		{
			$data['error'] = array('upload_data' => $this->upload->data());
			$data['statusof']= $this->company_model->get_company();  
			$this->renderPage('company/index',$data);
		}	
	}
	
}
?>