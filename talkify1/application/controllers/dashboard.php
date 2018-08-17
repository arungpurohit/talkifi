<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Dashboard extends TalkifiSuper{
	
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
		$this->load->model('dashboard_model');
		$this->load->model('compose_model');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->helper(array('form', 'url'));
		
		
		
		$data['answeredcalls'] = $this->dashboard_model->getAnsweredCallsCount('','');	
		$data['missedcalls'] = $this->dashboard_model->getMissCallsCount('','');	
	
		if($this->input->post('date_from_status')!='' && $this->input->post('date_to_status')!='')
		{
			$date_from_status = $this->input->post('date_from_status');
			$date_to_status = $this->input->post('date_to_status');
		}
		else
		{
			$currDate1 = date("m/d/Y");
			$tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
			$tomorrow1 = date("m/d/Y", $tomorrow);
			$date_from_status  = $this->input->post('date_from_status');
			$date_to_status = $this->input->post('date_to_status');
		}
		
	
		//status wise report: 
		$status_arr_temp = $this->compose_model->getStatus();
			$rep_arr_temp = $this->compose_model->getRep();
			$status_arr_put = array();
			foreach($status_arr_temp as $key=>$value) {
				if($key!='' && $value!=''){
					foreach($rep_arr_temp as $key1=>$value1){
						if($key1!='' && $value1!=''){
							$status_arr_put[$value][$value1] = $this->dashboard_model->getLeadsVsStatus($key,$key1,$date_from_status,$date_to_status);
						}
					}
				}
			}
			
		/*$source_arr_temp = $this->compose_model->getChannels();
		$source_arr_put = array();
		foreach($source_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put[$value] = $this->dashboard_model->getChannelVsLeads($key,$date_from_status,$date_to_status);
			}
		}*/
		//print_r($source_arr_put);
		
			
		
		$data['status_arr_temp'] = $status_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['status_graph'] = $status_arr_put;
		
		$this->renderPage('dashboard/index',$data);
	}
	
}

?>
