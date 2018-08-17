<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Graphs extends TalkifiSuper{
	
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
		$this->load->model('graphs_model');
		$this->load->model('compose_model');			
	}
	
	public function index()
	{
		//echo "uuadsfe";	
	}
	
	public function leadvscategorygraph()
	{
		$this->load->library('form_validation');
		
		
		if($this->input->post('date_from_category')!='' && $this->input->post('date_to_category')!=''){
			$date_from_sts  = strtotime($this->input->post('date_from_category')."00:00:00");
			$date_to_sts = strtotime($this->input->post('date_to_category')."00:00:00");
		}
		else
		{
			$date_from_sts  = strtotime(date('m/d/Y')."00:00:00");
			$date_to_sts = strtotime(date('m/d/Y', strtotime(' +1 day')));
		}
		
			$category_arr_temp = $this->compose_model->getCategory();
			$rep_arr_temp = $this->compose_model->getRep();
			$category_arr_put = array();
			foreach($category_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$category_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsCategory($key,$key1,$date_from_sts,$date_to_sts);
						}
					}
				}
			}
		
	
		$data['category_arr_temp'] = $category_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['category_graph'] = $category_arr_put;
		
		$this->renderPage('graphs/leadvscategory_view', $data);
	}

	public function leadvschannelgraph()
	{
	
		$this->load->library('form_validation');
		
		//$this->output->enable_profiler(true);
		
		if($this->input->post('date_from_channel')!='' && $this->input->post('date_to_channel')!=''){
			$date_from_sts = $this->input->post('date_from_channel');
			$date_to_sts = $this->input->post('date_to_channel');
		
		
			$channel_arr_temp = $this->compose_model->getChannels();
			$rep_arr_temp = $this->compose_model->getRep();
			$channel_arr_put = array();
			foreach($channel_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$channel_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsChannel($key,$key1,$date_from_sts,$date_to_sts);
						}
					}
				}
			}
		}		
		else {
			$channel_arr_temp = $this->compose_model->getChannels();
			$rep_arr_temp = $this->compose_model->getRep();
			$channel_arr_put = array();
			foreach($channel_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$channel_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsChannelAll($key,$key1);
						}
					}
				}
			}
		}
		
		$data['channel_arr_temp'] = $channel_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['channel_graph'] = $channel_arr_put;
		
		$this->renderPage('graphs/leadvschannel_view', $data);
	}

	public function leadvsprioritygraph()
	{
	
		$this->load->library('form_validation');
		
		
		if($this->input->post('date_from_priority')!='' && $this->input->post('date_to_priority')!=''){
			$date_from_sts = $this->input->post('date_from_priority');
			$date_to_sts = $this->input->post('date_to_priority');
		
			$priority_arr_temp = $this->compose_model->getPriority();
			$rep_arr_temp = $this->compose_model->getRep();
			$priority_arr_put = array();
			foreach($priority_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$priority_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsPriority($key,$key1,$date_from_sts,$date_to_sts);
						}
					}
				}
			}
		}	
		else {
			$priority_arr_temp = $this->compose_model->getPriority();
			$rep_arr_temp = $this->compose_model->getRep();
			$priority_arr_put = array();
			foreach($priority_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$priority_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsPriorityAll($key,$key1);
						}
					}
				}
			}
		}
		$data['priority_arr_temp'] = $priority_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['priority_graph'] = $priority_arr_put;
			$this->renderPage('graphs/leadvspriority_view', $data);
	
		
	}	

	public function leadvsstatusgraph()
	{
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		
		
		if($this->input->post('date_from_status')!='' && $this->input->post('date_to_status')!=''){
			$date_from_sts = $this->input->post('date_from_status');
			$date_to_sts = $this->input->post('date_to_status');
		/*}
		else
		{
			$date_from_sts = date('m/d/Y');
			$date_to_sts = date('m/d/Y');
		}*/
		
		$status_arr_temp = $this->compose_model->getStatus();
		//$rep_arr_temp = $this->compose_model->getRepUser();
		$rep_arr_temp = $this->compose_model->getRep();
		$status_arr_put = array();
		foreach($status_arr_temp as $key=>$value) {
			if($key!='' && $value!=''){
				foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
						$status_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsStatus($key,$key1,$date_from_sts,$date_to_sts);
					}
				}
			}
		}
		}
		else {
		$status_arr_temp = $this->compose_model->getStatus();
		//$rep_arr_temp = $this->compose_model->getRepUser();
		$rep_arr_temp = $this->compose_model->getRep();
		$status_arr_put = array();
		foreach($status_arr_temp as $key=>$value) {
			if($key!='' && $value!=''){
				foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
						$status_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsStatusAll($key,$key1);
					}
				}
			}
		}
		}
				
		$data['status_arr_temp'] = $status_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['status_graph'] = $status_arr_put;
		$this->renderPage('graphs/leadvsstatus_view', $data);
	}	

	public function leadvstypegraph()
	{
		$this->load->library('form_validation');
		
		if($this->input->post('date_from_type')!='' && $this->input->post('date_to_type')!=''){
			$date_from_sts = $this->input->post('date_from_type');
			$date_to_sts = $this->input->post('date_to_type');
		
			$type_arr_temp = $this->compose_model->getTypes();
			$rep_arr_temp = $this->compose_model->getRep();
			$type_arr_put = array();
			foreach($type_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$type_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsType($key,$key1,$date_from_sts,$date_to_sts);
						}
					}
				}
			}
		}
		else {
			$type_arr_temp = $this->compose_model->getTypes();
			$rep_arr_temp = $this->compose_model->getRep();
			$type_arr_put = array();
			foreach($type_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$type_arr_put[$value][$value1] = $this->graphs_model->getLeadsVsTypeAll($key,$key1);
						}
					}
				}
			}
		}
	
		$data['type_arr_temp'] = $type_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['type_graph'] = $type_arr_put;
		
			$this->renderPage('graphs/leadvstype_view', $data);
	}			
}	