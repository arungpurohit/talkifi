<?php 
session_start();
require(APPPATH.'/controllers/superadmin/talkifisuper.php');

class Modules_display extends Talkifisuper{
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->init()) 
			{
				  redirect('superadmin/authenticate/login');
			}
		
		$this->load->model('superadmin/modules_display_model');
		
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'Modules assigned';
		$this->renderPage('superadmin/modules/index',$data);
	}
	public function listAllCompany()
    {
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

        $data->records =$this->modules_display_model->listallcompany();
        $data->total = ceil ($data->records /10 );

        $records = $this->modules_display_model->listcomnpany($req_param);
        $data->rows = $records;

       echo json_encode ($data );

       exit( 0 );

    }
	
	
	public function updateRole($company_id)
	{
		$data['moduleslist'] = $this->modules_display_model->selectModules($company_id);
		
		$data['modules_present'] = $this->modules_display_model->getAllModules();
		
		$this->form_validation->set_rules('company_id','company id','trim|required');
		
		
		if($this->form_validation->run()==false)
		{
			$this->renderPage('superadmin/modules/editrole',$data);
		}
		else
		{
			$returnval=$this->modules_display_model->editRole();
		
			$data['title'] =' Updated successfully';		
			
		
		$this->renderPage('superadmin/modules/index',$data);
		}


	}
	
}
?>