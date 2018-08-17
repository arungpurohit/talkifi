<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Compose extends TalkifiSuper{
	
	public $statusArray;
	public $repArray;
	public $priorityArray;
	public $colorArray;
	public $categoryArray;
	public $channelArray;
	public $typesArray;
	
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
		$this->load->model('compose_model');
		$this->load->model('tasks_model');
	}
	
	public function index(){

		$this->load->library('form_validation');
		
		//$this->output->enable_profiler();	
		$data['status'] = $this->compose_model->getStatus();
		$data['types'] = $this->compose_model->getTypes();
		$data['priority'] = $this->compose_model->getPriority();
		$data['category'] = $this->compose_model->getCategory();
		$data['channels'] = $this->compose_model->getChannels();
		$data['responder'] = $this->compose_model->getAutoresponder();
		$data['responders'] = $this->compose_model->getAutorespondersms();
		
		$data['reps'] = $this->ion_auth->users($this->user->cmp_unique_id,'')->result_array();
		$data['groupsview'] = $this->ion_auth->groups($this->user->cmp_unique_id,'')->result_array();
		
		$this->form_validation->set_rules('client_id','Client ID','trim|required');
		$this->form_validation->set_rules('client_name','Client Name','trim|required');
		$this->form_validation->set_rules('subject','Subject','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->renderPage('compose/index',$data);
		}
		else{
				$this->compose_model->insertLead();
				redirect('show-inbox');
		}
	}
	
	public function selectClient($val)
	{
		
	}

	/*public function insertTask()
	{
		$ret = array();
		$ret = $this->tasks_model->insertTasks();
		echo json_encode($ret);
	}
*/
}

?>