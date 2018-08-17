<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Inbox extends TalkifiSuper{
	public $user;
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
		$this->load->model('inbox_model');
	}
	
	public function index()
	{
		$data['title'] ='Inbox';		
		$this->renderPage('inbox/index',$data);
	}
	
	public function browseInbox ()
    {	
       //$this->output->enable_profiler(TRUE);
	  
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

        $data->records =$this->inbox_model->getAllCount();

        $data->total = ceil ($data->records /10 );

        $records = $this-> inbox_model->getAll($req_param);

        $data->rows = $records;

   	    echo json_encode ($data );

    	exit( 0 );
	}
	
	public function deletedLeads()
	{
		$data['title'] ='Deleted Leads';		
		$this->renderPage('inbox/deletedleads',$data);
	}
	
	
	public function browseDeltedLeads ()
    {
       //$this->output->enable_profiler(TRUE);
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

        $data->records =$this->inbox_model->getAllDeletedCount();

        $data->total = ceil ($data->records /10 );

        $records = $this-> inbox_model->getAllDeleted($req_param);

        $data->rows = $records;

   	    echo json_encode ($data );

    	exit( 0 );
    }
	
	
	public function delete_lead()
	{
		if( !empty( $_POST ) ) {
			$this->inbox_model->deleteLead();
			echo 'Deleted successfully!';
		}
	}
	
	public function reopen_lead()
	{
		if( !empty( $_POST ) ) {
			$this->inbox_model->reOpenLead();
			echo 'Re Opened successfully!';
		}
	}
}

?>