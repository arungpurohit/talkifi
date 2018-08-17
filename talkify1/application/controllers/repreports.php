<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Repreports extends TalkifiSuper{
	
	public $statusArray;
	public $repArray;
	public $priorityArray;
	public $colorArray;
	public $csv_arr;
	
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
	
		$this->csv_arr = array();
		
		$this->load->model('reports_model');
		$this->load->model('compose_model');
		$this->load->helper('csv');
	}
	
	public function index()
	{
	}
	
	public function repsvsstatus()
	{
		//$this->output->enable_profiler(TRUE);
				
		$data['title'] = 'Rep Vs Status';
		
		$data['set_module'] = 'repsvsstatus';
		$header_cols = $this->compose_model->getStatus();		
		
		$data['header_cols'] = $header_cols;
			// make rows here
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');
		if ($this->form_validation->run() === FALSE)
		$data['rows'] = array();
		else
		{
			$rep_details = $this->compose_model->getRep();
			$status_options = $this->compose_model->getStatus();
			
				if($this->input->post('date_from')!='' && $this->input->post('date_to')!=''){
				$i =1;
				//$arr_temp =array();
					
				$date1 =$this->input->post('date_from');
	//			$date2_arr = explode('/',$this->input->post('date_to'));
				$date2 = $this->input->post('date_to');
				
				foreach ($rep_details as $rep_id => $rep_display){
						if($rep_id !=''){
							$data['rows'][$i]['RepName'] = $rep_display;
						//	array_push($arr_temp,$rep_display);
							
							foreach ($status_options as $status_id => $status_display){
							if($status_id !='')
								$data['rows'][$i][$status_display] = $this->reports_model->repvsstatus($rep_id,$status_id,$date1,$date2);
						//		array_push($arr_temp,$data['rows'][$i][$status_display]);
							}
						}
				//	array_push($csv_data,$arr_temp);
					$i = $i+1;
				}
					 $que = 'Reps'; 
					 array_unshift($header_cols,$que);
					 array_push($this->csv_arr,$header_cols);
					 $this->csv_arr = array_merge($this->csv_arr,$data['rows']);
					
					array_to_csv($this->csv_arr,$data['set_module'].'.csv');
			}
	/*	echo '<pre>';
		print_r($this->csv_arr);
		echo '</pre>';*/
		}
			
			
			$this->renderPage('reports/repvsstatus',$data );
			
		
	}
	
	public function repsvscategory()
	{
		//$this->output->enable_profiler(TRUE);
		$data['title'] = 'Rep Vs Category';
		$data['set_module'] = 'repsvscategory';
		$header_cols = $this->compose_model->getCategory();		
		$data['header_cols'] = $header_cols;
			// make rows here
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');
		if ($this->form_validation->run() === FALSE)
		$data['rows'] = array();
		else
		{
			$rep_details = $this->compose_model->getRep();
			$category_options = $this->compose_model->getCategory();
			
				if($this->input->post('date_from')!='' && $this->input->post('date_to')!=''){
				$i =0;
				//$arr_temp =array();
					
				$date1 =$this->input->post('date_from');
	//			$date2_arr = explode('/',$this->input->post('date_to'));
				$date2 = $this->input->post('date_to');
				
				foreach ($rep_details as $rep_id => $rep_display){
						if($rep_id !=''){
							$data['rows'][$i]['RepName'] = $rep_display;
						//	array_push($arr_temp,$rep_display);
							
							foreach ($category_options as $category_id => $category_display){
							if($category_id !='')
								$data['rows'][$i][$category_display] = $this->reports_model->repvscategory($rep_id,$category_id,$date1,$date2);
						//		array_push($arr_temp,$data['rows'][$i][$status_display]);
							}
						}
				//	array_push($csv_data,$arr_temp);
					$i = $i+1;
				}
					 $que = 'Reps'; 
					 array_unshift($header_cols,$que);
					 array_push($this->csv_arr,$header_cols);
					$this->csv_arr = array_merge($this->csv_arr,$data['rows']);
					array_to_csv($this->csv_arr,$data['set_module'].'.csv');
			}
		}
			
			
			$this->renderPage('reports/repvscategory',$data );
			
	}
	
	public function repsvstypes()
	{
		$this->output->enable_profiler(TRUE);
		$data['title'] = 'Rep Vs Type';
		$data['set_module'] = 'repsvstypes';
		$header_cols = $this->compose_model->getTypes();		
		$data['header_cols'] = $header_cols;
			// make rows here
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');
		if ($this->form_validation->run() === FALSE)
		$data['rows'] = array();
		else
		{
			$rep_details = $this->compose_model->getRep();
			$types_options = $this->compose_model->getTypes();
			
				if($this->input->post('date_from')!='' && $this->input->post('date_to')!=''){
				$i =0;
				//$arr_temp =array();
					
				$date1 =$this->input->post('date_from');
	//			$date2_arr = explode('/',$this->input->post('date_to'));
				$date2 = $this->input->post('date_to');
				
				foreach ($rep_details as $rep_id => $rep_display){
						if($rep_id !=''){
							$data['rows'][$i]['RepName'] = $rep_display;
						//	array_push($arr_temp,$rep_display);
							
							foreach ($types_options as $types_id => $types_display){
							if($types_id !='')
								$data['rows'][$i][$types_display] = $this->reports_model->repvstypes($rep_id,$types_id,$date1,$date2);
						//		array_push($arr_temp,$data['rows'][$i][$status_display]);
							}
						}
				//	array_push($csv_data,$arr_temp);
					$i = $i+1;
				}
					
					$que = 'Reps'; 
					array_unshift($header_cols,$que);
					array_push($this->csv_arr,$header_cols);
					$this->csv_arr = array_merge($this->csv_arr,$data['rows']);
					array_to_csv($this->csv_arr,$data['set_module'].'.csv');
			}
		}
			
			
			$this->renderPage('reports/repvstypes',$data );
			
	}
	
	public function repsvspriority()
	{
		//$this->output->enable_profiler(TRUE);
		$data['title'] = 'Rep Vs Priority';
		$data['set_module'] = 'repsvspriority';
		$header_cols = $this->compose_model->getPriority();		
  		$data['header_cols'] = $header_cols;
			// make rows here
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');
		if ($this->form_validation->run() === FALSE)
		$data['rows'] = array();
		else
		{
			$rep_details = $this->compose_model->getRep();
			$priority_options = $this->compose_model->getPriority();
			
				if($this->input->post('date_from')!='' && $this->input->post('date_to')!=''){
				$i =0;
				//$arr_temp =array();
					
				$date1 =$this->input->post('date_from');
	//			$date2_arr = explode('/',$this->input->post('date_to'));
				$date2 = $this->input->post('date_to');
				
				foreach ($rep_details as $rep_id => $rep_display){
						if($rep_id !=''){
							$data['rows'][$i]['RepName'] = $rep_display;
						//	array_push($arr_temp,$rep_display);
							
							foreach ($priority_options as $priority_id => $priority_display){
							if($priority_id !='')
								$data['rows'][$i][$priority_display] = $this->reports_model->repvspriority($rep_id,$priority_id,$date1,$date2);
						//		array_push($arr_temp,$data['rows'][$i][$status_display]);
							}
						}
				//	array_push($csv_data,$arr_temp);
					$i = $i+1;
				}
					 $que = 'Reps'; 
					 array_unshift($header_cols,$que);
					 array_push($this->csv_arr,$header_cols);
					$this->csv_arr = array_merge($this->csv_arr,$data['rows']);
					
					array_to_csv($this->csv_arr,$data['set_module'].'.csv');
			}
		}
			
			
			$this->renderPage('reports/repvspriority',$data );
			
	}
	
	public function repsvschannels()
	{
		$this->output->enable_profiler(TRUE);
		$data['title'] = 'Rep Vs Channels';
		$data['set_module'] = 'repsvschannels';
		$header_cols = $this->compose_model->getChannels();		
		$data['header_cols'] = $header_cols;
			// make rows here
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');
		if ($this->form_validation->run() === FALSE)
		$data['rows'] = array();
		else
		{
			$rep_details = $this->compose_model->getRep();
			$channels_options = $this->compose_model->getChannels();
			
				if($this->input->post('date_from')!='' && $this->input->post('date_to')!=''){
				$i =0;
				//$arr_temp =array();
					
				$date1 =$this->input->post('date_from');
	//			$date2_arr = explode('/',$this->input->post('date_to'));
				$date2 = $this->input->post('date_to');
				
				foreach ($rep_details as $rep_id => $rep_display){
						if($rep_id !=''){
							$data['rows'][$i]['RepName'] = $rep_display;
						//	array_push($arr_temp,$rep_display);
							
							foreach ($channels_options as $channels_id => $channels_display){
							if($channels_id !='')
								$data['rows'][$i][$channels_display] = $this->reports_model->repvschannels($rep_id,$channels_id,$date1,$date2);
						//		array_push($arr_temp,$data['rows'][$i][$status_display]);
							}
						}
				//	array_push($csv_data,$arr_temp);
					$i = $i+1;
				}
					$que = 'Reps'; 
					array_unshift($header_cols,$que);
					array_push($this->csv_arr,$header_cols);
					$this->csv_arr = array_merge($this->csv_arr,$data['rows']);
					array_to_csv($this->csv_arr,$data['set_module'].'.csv');
			}
		}
			
			
			$this->renderPage('reports/repvschannels',$data );
			
	}
	
	
}
?>