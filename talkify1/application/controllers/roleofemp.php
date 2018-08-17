<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Roleofemp extends TalkifiSuper{
	
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
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('reprole_model');
	}
	
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$data['title'] ='Role Of Empoly';		
		$this->renderPage('roleofemp/index',$data);

	}
	
	public function listAllRoles ()
    {
    //   $this->output->enable_profiler(TRUE);
	   $req_param = array (
               "sort_by" => $this->input->post( "sidx", TRUE ),
               "sort_direction" => $this->input->post( "sord", TRUE ),
               "page" => $this->input->post( "page", TRUE ),
               "num_rows" => $this->input->post( "rows", TRUE ),
               "search" => $this->input->post( "_search", TRUE ),
               "search_field" => $this->input->post( "searchField", TRUE ),
               "search_operator" => $this->input->post( "searchOper", TRUE ),
               "search_str" => $this->input->post( "searchString", TRUE ),
               "search_field_1" => "lead_unique_id",
               "user_id" => ""
		);
        $data->page = $this->input->post( "page", TRUE );
        //$data->page = 10;

         $data->records =$this->reprole_model->listRolesCount();

        $data->total = ceil ($data->records /10 );

        $records = $this->reprole_model->listRoles($req_param);
        $data->rows = $records;

       echo json_encode ($data );

       exit( 0 );

    }
	
	public function insertRole()
	{
		$data['moduleslist'] = $this->reprole_model->selectModules();
		//$data['roleofemps'] = $this->reprole_model->selectRoles();
	
		$data['status'] = $this->reprole_model->getStatus();
		$data['types'] = $this->reprole_model->getTypes();
		$data['priority'] = $this->reprole_model->getPriority();
		$data['category'] = $this->reprole_model->getCategory();
		$data['channels'] = $this->reprole_model->getChannels();
		
		$data['reps'] = $this->ion_auth->users($this->user->cmp_unique_id,'')->result_array();
		
		
		$this->form_validation->set_rules('role_name','Role Name','trim|required');
		
		if($this->form_validation->run()==false)
		{
			$this->renderPage('roleofemp/newrole',$data);

		}
		else
		{
			$returnval=$this->reprole_model->insertRole();
			if(!$returnval){
				$data['title'] ='Role Of Empoly : already defined';		
			}
			else
			{
				$data['title'] ='Role Of Empoly : New Role added';
			}
		
			$this->renderPage('roleofemp/index',$data);
		
		}


	}
	
	public function updateRole($roleid)
	{
		$data['moduleslist'] = $this->reprole_model->selectModules();
		$data['groups'] = $this->ion_auth->groups($this->user->cmp_unique_id,$roleid)->result();
		$data['status'] = $this->reprole_model->getStatus();
		$data['types'] = $this->reprole_model->getTypes();
		
		$data['priority'] = $this->reprole_model->getPriority();
		$data['category'] = $this->reprole_model->getCategory();
		$data['channels'] = $this->reprole_model->getChannels();
		
		$data['reps'] = $this->ion_auth->users($this->user->cmp_unique_id,'')->result_array();
		
		$this->form_validation->set_rules('role_id','Role id','trim|required');
		
		if($this->form_validation->run()==false)
		{
			$this->renderPage('roleofemp/editrole',$data);
		}
		else
		{
			$returnval=$this->reprole_model->editRole();
			if(!$returnval){
				$data['title'] ='Role Of Empoly : Updated successfully';		
			}
			else
			{
				$data['title'] ='Role Of Empoly : Updated successfully';
			}
		
		$this->renderPage('roleofemp/index',$data);
		}


	}
	
}
?>