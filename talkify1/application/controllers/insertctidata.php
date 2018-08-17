<?php
class Insertctidata extends CI_Controller{
	
	/*public $statusArray;
	public $repArray;
	public $priorityArray;
	public $colorArray;*/
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('cti_model');
	}
	
	public function index(){
		
		/*$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->output->enable_profiler();	
		$data['status'] = $this->compose_model->getStatus();
		$data['types'] = $this->compose_model->getTypes();
		$data['priority'] = $this->compose_model->getPriority();
		$data['category'] = $this->compose_model->getCategory();
		$data['channels'] = $this->compose_model->getChannels();
		
		$this->form_validation->set_rules('client_id','Client ID','trim|required');
		$this->form_validation->set_rules('client_name','Client Name','trim|required');
		$this->form_validation->set_rules('subject','Subject','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('header');
			$this->load->view('left');
			$this->load->view('compose/index',$data);
			$this->load->view('footer');
		}
		else{
				$this->compose_model->insertLead();
				redirect('/inbox/');
		}*/
	}
	
	/*public function insertcti($customer_no,$voice_path,$rep_id,$b_sim,$call_duration,$status,$unique_id){
		$this->output->enable_profiler();	
		$cmp_unique_id='';
	 	$rep_num = $rep_id;
		$insertStatus = $this->cti_model->insertCtiLead($customer_no,$voice_path,$rep_num,$b_sim,$call_duration,$status,$unique_id,$cmp_unique_id);
		echo $insertStatus;
	}*/
	public function insertcti(){
		$this->load->helper('url');
		//$this->output->enable_profiler();	
		///parse_str($_SERVER['QUERY_STRING'], $_GET);
		echo $this->uri->segment(5);
		die;
			/*$this->load->library('curl');
			$result = $this->curl->simple_get('customer_no/voice_path/rep_num/b_sim/call_duration/status/unique_id/cmp_unique_id', $fields);
		var_dump($result);
		
		die;
		$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['customer_no'], $params);
		print_r($params);
		die;*/
		echo $customer_num =$this->input->get('customer_no');
		$voice_path=$this->input->get('voice_path');
		$call_duration=$this->input->get('call_duration');
		$status=$this->input->get('status');
		$flag=1;
		$rep_num =$this->input->get('Rep_id');
		$unique_id=$this->input->get('unique_id');
		$b_sim=$this->input->get('b_sim');
		$cmp_unique_id='';
		die;
		//$insertStatus = $this->cti_model->insertCtiLead($customer_num,$voice_path,$rep_num,$b_sim,$call_duration,$status,$unique_id,$cmp_unique_id);
		echo $insertStatus;
	}
}

?>