<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
class Table_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_data($params = "" , $page = "all")
	{
		$this->db->select("client_id as id,client_username as uname,client_fname as fname,client_lname as lname,client_email as email,client_phone as phone")->from( "clients");
		if (!empty($params))
		{
			if ( (($params ["num_rows"] * $params ["page"]) >= 0 && $params ["num_rows"] > 0))
			{
				if  ($params ["search"] === TRUE)
				{
					$ops = array (

							"eq" => "=",
							"ne" => "<>",
							"lt" => "<",
							"le" => "<=",
							"gt" => ">",
							"ge" => ">="
					);

				}

//				if ( !empty ($params['search_field_1']))
//				{
//					$this->db->where ($params['search_field_1'], $params['user_id']);
//				}

				if ( !empty ($params['search_field_2']))
				{
					$this->db->where ($params['search_field_2'], "1");
				}

				$this->db->order_by( "{$params['sort_by']}", $params ["sort_direction"] );

				if ($page != "all")
				{
					$this->db->limit ($params ["num_rows"], $params ["num_rows"] *  ($params ["page"] - 1) );
				}

				//$query = $this->db->get();

			}
		}
		else
		{
				$this->db->limit (5);
				

		}
               $query = $this->db->get();
		return $query;
	}
}
?>
