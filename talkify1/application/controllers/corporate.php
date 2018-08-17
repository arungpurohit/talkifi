<?php
class Corporate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('corporate_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{	
		$this->form_validation->set_rules('corp_name','corporate name','trim|required');
		
		$data['dbvalues'] = $this->corporate_model->selectdb();
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('corporate/index',$data);
			$this->load->view('footer');
		}
		else
		{
			$data['dbvalues'] = $this->corporate_model->selectdb();
			$this->corporate_model->insert_db();
			
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('corporate/index',$data);
			$this->load->view('footer');

		}
	}
}
?>