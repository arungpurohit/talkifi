<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Leadview extends TalkifiSuper{
	public $statusArray;
	public $repArray;
	public $clientArray;
	public $priorityArray;
	public $colorArray;
	public $categoryArray;
	
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
	
		$this->load->model('leadshow_model');
		$this->load->model('compose_model');
		$this->load->model('tasks_model');
		
	}
	public function showLead($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->output->enable_profiler(TRUE);
		
		$data['title'] = 'Lead View';

		$data['status'] = $this->compose_model->getStatus();
		$data['types'] = $this->compose_model->getTypes();
		$data['priority'] = $this->compose_model->getPriority();
		$data['category'] = $this->compose_model->getCategory();
		$data['channels'] = $this->compose_model->getChannels();
		
		$data['assigned_to'] = $this->leadshow_model->getRep();
		$data['leadsArray'] = $this->leadshow_model->getLead($id);
		
		$data['notes_display'] = $this->leadshow_model->getNotes($id);
		
		$data['reps'] = $this->ion_auth->users($this->user->cmp_unique_id,'')->result_array();
		$data['groupsview'] = $this->ion_auth->groups($this->user->cmp_unique_id,'')->result_array();
		
		$this->form_validation->set_rules('client_id','Client ID','trim|required');
		//$this->form_validation->set_rules('subject','Subject','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->renderPage('inbox/leadviews',$data);
		}
		else{
			$this->compose_model->updateLead();
			redirect('show-inbox');
		}	
	}
	
	public function insertNotes()
	{
		if( !empty( $_POST ) ) {
			$this->compose_model->insertNote();
			echo 'Noted added successfully!';
		}
		
	}
	
	
	public function otherleads()
	{
		$client_id = $this->input->post('client_id');
		$lead_id = $this->input->post('lead_id');
		//$this->output->enable_profiler(TRUE);
		if( isset( $client_id ) )
			echo json_encode( $this->leadshow_model->getOtherLeads( $client_id,$lead_id ) );
		
	}

	public function insertTask()
	{
		$ret = array();
		$ret = $this->tasks_model->insertTasks();
		echo json_encode($ret);
	}

	/*public function editList()
	{
		$this->load->view('inbox/edit');
	}
*/	
	public function getTaskById($eventid)
	{
		$ret = array();
		
		$ret = $this->tasks_model->listCalendarById($eventid);
		echo json_encode($ret);
	}
	public function updateTask()
	{
		$ret =array();
		$ret = $this->tasks_model->updateTasks();
		echo json_encode($ret);
	}

}

?>