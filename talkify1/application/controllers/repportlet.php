<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Repportlet extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('repportlet_model');
		$this->load->model('compose_model');			
	}
	
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$data['title'] = 'Category Vs Leads';
		$data['title1'] = 'Types Vs Leads';
		$data['title2'] = 'Channels Vs Leads';
		$data['title3'] = 'Priority Vs Leads';
		$data['title4'] = 'Reps Vs Leads';
	//	$data['set_module'] = 'repsvscategory';
		
		$this->output->enable_profiler(true);
		/*category start*/
		if($this->input->post('date_from_category')!='' && $this->input->post('date_to_category')!=''){
			$date_from_cat  = $this->input->post('date_from_category');
			$date_to_cat = $this->input->post('date_to_category');
		}
		else
		{
			$date_from_cat  = date('m/d/Y');
			$date_to_cat = date('m/d/Y');
		}
		 
		$cat_arr_temp = $this->compose_model->getCategory();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$cat_arr_put = array();
		foreach($cat_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
				$cat_arr_put[$value][$value1] = $this->repdashboard_model->getCategoryVsLeads($key,$key1,$date_from_cat,$date_to_cat);
			}
		}
	}
}
		$data['cat_arr_temp'] = $cat_arr_temp;
		$data['cat_graph'] = $cat_arr_put;
		
		// lead source
		$source_arr_temp = $this->compose_model->getCategory();
		$source_arr_put = array();
		foreach($source_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put[$value] = $this->repdashboard_model->getCategorysVsLeads($key);
			}
		}
		
		//print_r($source_arr_put);
		$data['source_graph'] = $source_arr_put;
		/*category end*/
		
		//print_r($data['source_graph']);
		
		/*status start*/
		if($this->input->post('date_from_status')!='' && $this->input->post('date_to_status')!=''){
			$date_from_sts  = $this->input->post('date_from_status');
			$date_to_sts = $this->input->post('date_to_status');
		}
		else
		{
			$date_from_sts  = date('m/d/Y');
			$date_to_sts = date('m/d/Y');
		}
		$status_arr_temp = $this->compose_model->getStatus();
		$rep_arr_temp = $this->compose_model->getRep();
		$status_arr_put = array();
		foreach($status_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
						$status_arr_put[$value][$value1] = $this->repdashboard_model->getStatusVsLeads($key,$key1,$date_from_sts,$date_to_sts);
					}
				}
			}
		}
		$data['status_arr_temp'] = $status_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['status_graph'] = $status_arr_put;
		
		$source_arr_temp1 = $this->compose_model->getStatus();
		$source_arr_put1= array();
		foreach($source_arr_temp1 as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put1[$value] = $this->repdashboard_model->getStatussVsLeads($key);
			}
		}
		
		$data['source_graph1'] = $source_arr_put1;
		/*status end*/
		
		/*types start */
		
		if($this->input->post('date_from_types')!='' && $this->input->post('date_to_types')!=''){
			$date_from_type  = $this->input->post('date_from_types');
			$date_to_type = $this->input->post('date_to_types');
		}
		else
		{
			$date_from_type  = date('m/d/Y');
			$date_to_type = date('m/d/Y');
		}
		 
		$types_arr_temp = $this->compose_model->getTypes();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$type_arr_put = array();
		foreach($types_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
				if($key1!='' && $value1!=''){
				$type_arr_put[$value][$value1] = $this->repdashboard_model->getTypessVsLeads($key,$key1,$date_from_type,$date_to_type);
			}
		}
	}
}
		//print_r($cat_arr_put);
		$data['type_graph'] = $type_arr_put;
		$data['types_arr_temp'] = $types_arr_temp;
		
		$source_arr_temp2 = $this->compose_model->getTypes();
		$source_arr_put2= array();
		foreach($source_arr_temp2 as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put2[$value] = $this->repdashboard_model->getTypesVsLeads($key);
			}
		}
		
		$data['source_graph2'] = $source_arr_put2;
	/*types end */
	
	/*channle start */
		if($this->input->post('date_from_channels')!='' && $this->input->post('date_to_channels')!=''){
			$date_from_channel  = $this->input->post('date_from_channels');
			$date_to_channel = $this->input->post('date_to_channels');
		}
		else
		{
			$date_from_channel  = date('m/d/Y');
			$date_to_channel = date('m/d/Y');
		}
		 
		$channels_arr_temp = $this->compose_model->getChannels();
		/*print_r($car_arr_temp);*/
		$channels_arr_put = array();
		foreach($channels_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				$channels_arr_put[$value] = $this->repdashboard_model->getChannelssVsLeads($key,$date_from_channel,$date_to_channel);
			}
		}
		//print_r($cat_arr_put);
		$data['channel_graph'] = $channels_arr_put;
		
		$source_arr_temp3 = $this->compose_model->getChannels();
		$source_arr_put3= array();
		foreach($source_arr_temp3 as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put3[$value] = $this->repdashboard_model->getChannelsVsLeads($key);
			}
		}
		$data['source_graph3'] = $source_arr_put3;
/*channle end */		

/*priority start */
		if($this->input->post('date_from_priority')!='' && $this->input->post('date_to_priority')!=''){
			$date_from_priorit  = $this->input->post('date_from_priority');
			$date_to_priorit = $this->input->post('date_to_priority');
		}
		else
		{
			$date_from_priorit  = date('m/d/Y');
			$date_to_priorit = date('m/d/Y');
		}
		 
		$priority_arr_temp = $this->compose_model->getPriority();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$priority_arr_put = array();
		foreach($priority_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
				if($key1!='' && $value1!=''){
				$priority_arr_put[$value][$value1] = $this->repdashboard_model->getPrioritysVsLeads($key,$key1,$date_from_priorit,$date_to_priorit);
			}
		}
	}
}
		//print_r($cat_arr_put);
		$data['priority_graph'] = $priority_arr_put;
		$data['priority_arr_temp'] = $priority_arr_temp;
		
		$source_arr_temp4 = $this->compose_model->getPriority();
		$source_arr_put4= array();
		foreach($source_arr_temp4 as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put4[$value] = $this->repdashboard_model->getPriorityVsLeads($key);
			}
		}
		$data['source_graph4'] = $source_arr_put4;
/*priority end */

/*reps vs leads*/
if($this->input->post('date_from_reps')!='' && $this->input->post('date_to_reps')!=''){
			$date_from_rep  = $this->input->post('date_from_reps');
			$date_to_rep = $this->input->post('date_to_reps');
		}
		else
		{
			$date_from_rep  = date('m/d/Y');
			$date_to_rep = date('m/d/Y');
		}

$reps_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$reps_arr_put = array();
		foreach($reps_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				$reps_arr_put[$value] = $this->repdashboard_model->getRepssVsLeads($key,$date_from_rep,$date_to_rep);
			}
		}
		//print_r($cat_arr_put);
		$data['reps_graph'] = $reps_arr_put;
		
	$reps_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$reps_arr_put = array();
		foreach($reps_arr_temp as $key=>$value){
			if($key!='' && $value!=''){
				$reps_arr_put[$value] = $this->repdashboard_model->getRepsVsLeads($key);
			}
		}
		//print_r($cat_arr_put);
		$data['reps_graph1'] = $reps_arr_put;
		
		$source_arr_temp5 = $this->compose_model->getRep();
		$source_arr_put5= array();
		foreach($source_arr_temp5 as $key=>$value){
			if($key!='' && $value!=''){
				$source_arr_put5[$value] = $this->repdashboard_model->getRepsVsLeads($key);
			}
		}
		$data['source_graph5'] = $source_arr_put5;
		
/*start all leads types with reps*/

$cat_arr_temp1 = $this->compose_model->getCategory();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$cat_arr_put1 = array();
		foreach($cat_arr_temp1 as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
				$cat_arr_put1[$value][$value1] = $this->repdashboard_model->getCategorysVsLeads($key,$key1);
			}
		}
	}
}
$data['cat_arr_temp1'] = $cat_arr_temp1;
		$data['cat_graph1'] = $cat_arr_put1;

$status_arr_temp1 = $this->compose_model->getStatus();
		$rep_arr_temp = $this->compose_model->getRep();
		$status_arr_put1 = array();
		foreach($status_arr_temp1 as $key=>$value){
			if($key!='' && $value!=''){
				foreach($rep_arr_temp as $key1=>$value1){
					if($key1!='' && $value1!=''){
						$status_arr_put1[$value][$value1] = $this->repdashboard_model->getStatussVsLeads($key,$key1);
					}
				}
			}
		}
		$data['status_arr_temp1'] = $status_arr_temp1;
		//$data['rep_arr_temp'] = $rep_arr_temp;
		$data['status_graph1'] = $status_arr_put1;
		
$types_arr_temp1 = $this->compose_model->getTypes();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$type_arr_put1 = array();
		foreach($types_arr_temp1 as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
				if($key1!='' && $value1!=''){
				$type_arr_put1[$value][$value1] = $this->repdashboard_model->getTypesVsLeads($key,$key1);
			}
		}
	}
}
		//print_r($cat_arr_put);
		$data['type_graph1'] = $type_arr_put1;
		$data['types_arr_temp1'] = $types_arr_temp1;
		
	$priority_arr_temp1 = $this->compose_model->getPriority();
		$rep_arr_temp = $this->compose_model->getRep();
		/*print_r($car_arr_temp);*/
		$priority_arr_put1 = array();
		foreach($priority_arr_temp1 as $key=>$value){
			if($key!='' && $value!=''){
			foreach($rep_arr_temp as $key1=>$value1){
				if($key1!='' && $value1!=''){
				$priority_arr_put1[$value][$value1] = $this->repdashboard_model->getPriorityVsLeads($key,$key1);
			}
		}
	}
}
		//print_r($cat_arr_put);
		$data['priority_graph1'] = $priority_arr_put1;
		$data['priority_arr_temp1'] = $priority_arr_temp1;
	
		
/*start all leads types with reps*/		
		// leads vs booked
		$months_arr = array();
		$performance_arr_put = array();
		$curr_month_num = date('m');
		$no_of_months = 2;
		for($c=$curr_month_num - $no_of_months;$c<=$curr_month_num;$c++){
			//echo $c."<br>";
			$monthName = date("F", mktime(0, 0, 0, $c, 10));
			//$months_arr[$c] = $monthName;
			array_push($months_arr,$monthName);
		}
		$p=0;
		for($k=count($months_arr);$k>0;$k--){
			//$performance_arr_put[$months_arr[$k]][0] = $months_arr[$k];
			/*if($k==1){
				$date_first = date("Y-m-1");
				$date_last = date("Y-m-t");
			}else{*/
			$minus_val = $k-1;
				$date_first = date('Y-m-1',strtotime("-$minus_val month"));
				$date_last = date('Y-m-t',strtotime("-$minus_val month"));
			//}
			//echo "<br>".$date_first."==".$date_last."<br>";
			$performance_arr_put[$months_arr[$p]][0] = $this->repdashboard_model->fixed_by_month($date_first,$date_last);
			$performance_arr_put[$months_arr[$p]][1] = $this->repdashboard_model->lead_by_month($date_first,$date_last);
			$p=$p+1;
		}
/*		echo "<pre>";
		print_r($performance_arr_put);
		echo "</pre>";
*/		$data["performance_graph"] = $performance_arr_put;
		
		
		/*$data['status_arr_temp'] = $status_arr_temp;
		$data['rep_arr_temp'] = $rep_arr_temp;
		$data['status_graph'] = $status_arr_put;
		*/
		

		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('dashboard/repdashboard',$data);
		$this->load->view('footer');
	}
	
	
	
}	

?>