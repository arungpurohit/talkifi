<?php
class Repsinfo extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('repsinfo_model');
	}
	public function index()
	{	
		$this->output->enable_profiler(TRUE);
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('repsinfo/index');
		$this->load->view('footer');
	}
	public function getById($id)
	{
		if(isset($id))
			echo json_encode($this->repsinfo_model->getById($id));
	}
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('repsinfo_username','User Name','required|valid_email|is_unique[repsinfos.repsinfo_username]');
		$this->form_validation->set_rules('repsinfo_email','Email','required|valid_email|is_unique[repsinfos.repsinfo_email]');
		
		if($this->form_validation->run()==FALSE)
		{
			echo "present";
		}
		else
		{
			$this->repsinfo_model->create();
		}
	}
	public function read()
	{
		echo json_encode($this->repsinfo_model->getAll());
	}
	public function update()
	{
		if(!empty($_POST))
		{
			$this->repsinfo_model->update();
			echo 'Record updated successfully!';
		}
	}
	public function delete($id = null)
	{
		if(is_null($id))
		{
			echo 'ERROR: Id not provided.';
			return;
		}
		$yhis->repsinfo_model->delete($id);
		echo 'Records deleted successfully';
	}
}
?>
	

