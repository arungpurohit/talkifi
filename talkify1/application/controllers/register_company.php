<?php
class Register_company extends CI_Controller{

	public function __construct(){
		parent::__construct();
		/*$this->load->model('company_model');
		if($this->session->userdata('logged_in')=="")
			redirect('login','refersh');
		else
			$this->sessionStatus = $this->session->userdata('logged_in');
		//$this->load->library('session');
		$this->load->helper('form','url');*/
	}
	public function register_company(){
		
		$this->load->library('form_validation');	
			
		$this->output->enable_profiler(TRUE);
		  
		$data['statusof']= $this->company_model->get_company();  
		
		//$this->load->view('upload_form',array('error'=>''));
		
		//print_r($statusof);
		
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
		

		if($this->form_validation->run()==false)
		{
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('register/index',$data);
			$this->load->view('footer');
		}
		else
		{
					
			$this->company_model->updatecmp();
			
			$data['statusof']= $this->company_model->get_company();  
			
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('company/index',$data);
			$this->load->view('footer');
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
			//$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}	
	}
	
}
?>