<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Tasks extends TalkifiSuper{
	
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
		$this->load->model('tasks_model');
	}
	
	public function index()
	{
		$data['reps'] = $this->ion_auth->users($this->user->cmp_unique_id,'')->result_array();
		$data['groupsview'] = $this->ion_auth->groups($this->user->cmp_unique_id,'')->result_array();
		
		$week = date("W");
		$year = date("Y");
		$format = 'Ymd';
		$date = FALSE;
    
	    if ($date) {
    	    $week = date("W", strtotime($date));
        	$year = date("o", strtotime($date));
    	}

	    $week = sprintf("%02s", $week);

  		$desiredMonday = date($format, strtotime("$year-W$week-1"));
		$sStartDate = date('M d Y', strtotime($desiredMonday));
		$sEndDate   = date('M d', strtotime('+6 days', strtotime($desiredMonday)));
		
		$data['dateFormat'] = $sStartDate.'-'.$sEndDate;
		
		$this->renderPage('tasks/index',$data);
	}
	
	public function editList()
	{
		$this->load->view('tasks/edit');
	}
	
	public function listallevents()
	{
		$result =$this->tasks_model->listCalendar();
		echo json_encode($result);
	}
	public function insertTask()
	{
		$ret = array();
		$ret = $this->tasks_model->insertTasks();
		echo json_encode($ret);
	}
	public function getAllTasks()
	{
		echo json_encode($this->tasks_model->getTasks());	
	}
	
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
	
	public function quickchange()
	{
		$ret = array();
		$ret = $this->tasks_model->dateTimeUpdate();
		echo json_encode($ret);
	}
	public function quickadd()
	{
		$ret = array();
		$ret= $this->tasks_model->quickInsertTasks();
		echo json_encode($ret);
		
	}
	public function removeevent()
	{
		$ret = array();
		$ret = $this->tasks_model->deleteTasks();
		echo json_encode($ret);
	}
	
	
}

?>