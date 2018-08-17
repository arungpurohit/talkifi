<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Client_upload extends TalkifiSuper{
	
	public function __construct(){
		parent::__construct();
			if(!$this->init()) 
			{
				  redirect('auth/logout');
			}
	
			$this->user = $this->ion_auth->user()->row();
			
			if(!$this->checkPagePermission($this->user->id,$this->user->cmp_unique_id,get_class($this))) 
			{
				redirect('accessdenied');
			}
			$this->load->model('client_model');
	}
	
	public function index(){
		$this->renderPage('clients/clientupload');
	}
	
	public function clientupload(){
			
			$config['upload_path'] =  'uploadclients/';
			$config['allowed_types'] = '*';  // CSV|csv|xlsx|xls
			$config['max_size']	= '0';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			
			$this->load->library('upload', $config);
			
			$file_name = $_FILES['client_upload']['name'];
			if ( ! $this->upload->do_upload('client_upload'))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				//$this->load->view('upload_form', $error);
			}
			else{
			
				$data = array('upload_data' => $this->upload->data());
				/*echo "<pre>";
				print_r($data);
				echo "</pre>";*/
				
				$handle = fopen(base_url()."uploadclients/$file_name", "r"); 
				//$handle = fopen("http://localhost/ciapp/uploadclients/$file_name", "r");
				$fp     = $handle;
				$BufferString= @fgets($fp ,4096);
				$upload_cnt=0;
				//$BufferString  =split("\n",$BufferString);
				//echo count($BufferString);
				//$data = fgetcsv($handle,1024*30, ",");
				while (($data = fgetcsv($handle,1024*30, ",")) !== FALSE) {
					/*if($data[4]!='')
						$db_date_format = $this->convert_date($data[4]);
					else
						$db_date_format =  date('Y-m-d H:i:s');*/
				   //change the creation date if client provide the creation date
					$client_creation_date = time();
					
					//client_group_id, you can specify the group in the excel sheet.	
					$clientDataAry = array(
						'client_username'=>$data[0],
						'client_password'=>md5('feeerere'),
						'client_fname'=>$data[1],
						'client_lname'=>$data[2],
						'client_email'=>$data[3],
						'client_phone'=>$data[4],
						'client_creation_date'=>$client_creation_date,
						'client_created_via'=>3,
						'cmp_unique_id'=>$this->user->cmp_unique_id
					);
					/*echo "<pre>";
					print_r($clientDataAry);
					echo "</pre>";*/
					$this->client_model->insert_client_csv($clientDataAry);
					$upload_cnt++;
				}
				$data['uploadcount'] = $upload_cnt;
				
				$this->renderPage('clients/clientupload',$data);

				
			}
	
	}
	
}
 
?>
