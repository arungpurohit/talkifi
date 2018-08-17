<?php
class Demoregistration extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('demo_model');
		$this->load->model('ion_auth_model');

	}
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		//print_r($_POST);
		
		$this->form_validation->set_rules('cmpname','Company Name','trim|required');
		$this->form_validation->set_rules('cmpaddress','Company Address','trim|required');
		$this->form_validation->set_rules('cmpcity','Company City','trim|required');
		$this->form_validation->set_rules('cmpstate','Company State','trim|required');
		$this->form_validation->set_rules('cmpzip','Company Zip','trim|required');
		$this->form_validation->set_rules('cmpphone','Company Phone','trim|required');
		
		$this->form_validation->set_rules('contactperson','Contact Person Name','trim|required');
		$this->form_validation->set_rules('contactemail','Contact Person Email','trim|required|valid_email');
		$this->form_validation->set_rules('contactphone','Contact Person Phone','trim|required');
		$this->form_validation->set_rules('pass','Password','trim|required');
		$this->form_validation->set_rules('cpass','Confirm Password','trim|required');
		
		$this->form_validation->set_rules('industry','Industry','trim|required');
		$this->form_validation->set_rules('noofusers','No of Users','trim|required');
		$this->form_validation->set_rules('nooftelephonyusers','Telephonic Users','trim|required');
		
		//$data['dbvalues'] = $this->demo_model->selectdb();
		// check all ready company registerd or not...
		
		if($this->form_validation->run()==FALSE)
		{
			$data['inserted']="";
			$this->load->view( 'registration/index',$data);
		}
		else
		{
		
			$cmp_unique_id = substr(md5(microtime()),0, 20);
			
			$inserted= array();
			$inserted = $this->demo_model->insert_db($cmp_unique_id);
			
			$additional_data = array(
					'first_name' => $this->input->post('contactperson'),
					'last_name'  => '',
					'company'    => $this->input->post('cmpname'),
					'phone'      => $this->input->post('contactphone'),
					'cmp_unique_id' => $cmp_unique_id
				);
		
			$username = $this->input->post('contactperson');
			$password = $this->input->post('pass');
			$email = $this->input->post('contactemail');
		
			$groups_id = $inserted['groups'];
			
			$this->ion_auth->register_new($username, $password, $email, $additional_data,$groups_id,$cmp_unique_id);
			
			$data["inserted"] = "Inserted Successfully";
			$this->load->view( 'registration/index',$data);
		}
		
	}
	function validateLogin()
	{
	}
}

?>