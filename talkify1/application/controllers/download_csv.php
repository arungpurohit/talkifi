<?php

class Download_csv extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->csv_arr = array();
		
		$this->load->model('reports_model');
		$this->load->model('compose_model');
		$this->load->helper('csv');
	}
	
	public function index($fileName){
		
		switch($fileName)
		{
			case 1: // category download
					$downLoadFile = "repsvscategory.csv";
					break;
			case 2: // category download
					$downLoadFile = "repsvsstatus.csv";
					break;
			case 3: // category download
					$downLoadFile = "repsvspriority.csv";
					break;
			case 4: // category download
					$downLoadFile = "repsvschannels.csv";
					break;
			case 5: // category download
					$downLoadFile = "repsvstypes.csv";
					break;					
			default: // category download
					$downLoadFile = "";
					break;			
		}
		
		$data['fileName'] = $downLoadFile;
		$this->load->view('reports/downloadcsv',$data);
	}
	
}


?>
