<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Table extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('table_model');
		//$this->load->model('invheader_model');
    }
    public function index(){
	//$this->output->enable_profiler(TRUE);
		$this->load->view('header');
		$this->load->view('left');
        $this->load->view('viewgrid/index');
		 $this->load->view('footer');
        
    }


    public function browse ()

    {
        //$this->output->enable_profiler(TRUE);

        $req_param = array (
                "sort_by" => $this->input->post( "sidx", TRUE ),
                "sort_direction" => $this->input->post( "sord", TRUE ),
                "page" => $this->input->post( "page", TRUE ),
                "num_rows" => $this->input->post( "rows", TRUE ),
                "search" => $this->input->post( "_search", TRUE ),
               // "search_field" => $this->input->post( "searchField", TRUE ),
               // "search_operator" => $this->input->post( "searchOper", TRUE ),
                //"search_str" => $this->input->post( "searchString", TRUE ),
                //"search_field_1" => "client_id",
                //"user_id" => ""

        );


        $data->page = $this->input->post( "page", TRUE );
        //$data->page = 10;
       $data->records = count ($this->table_model->get_data('',"all")->result_array());
		//$data->records = count ($this->invheader_model->get_data('',"all")->result_array());

        $data->total = ceil ($data->records /10 );

       $records = $this-> table_model-> get_data ($req_param)->result_array();
		//$records = $this-> invheader_model-> get_data ($req_param)->result_array();

        $data->rows = $records;

        echo json_encode ($data );

        exit( 0 );

    }
}
?>
