<?php
session_start();
class Verifylogin extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rep_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('user_name','User Name','trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('pswd','Password','trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run()==false)
		{	
			$this->load->view('login');
		}
		else
		{
			redirect('repdashboard','refresh');
		}
	}
	
	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }
	
	function check_database($password)
	{
		$rep_username = $this->input->post('user_name');
		
		$result = $this->rep_model->login($rep_username,$password);
		
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'rep_id' => $row->rep_id,
					'rep_username' => $row->rep_username,
					'cmp_unique_id' => $row->cmp_unique_id
				);
				
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_database','Invalid Username or Password');
			return false;
		}
	}

}
?>