<?php

class Category_model extends CI_Model 
{
	public $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
	}

    public function create() {

        //$category_status ='Active';
		$data = array(
				'lead_category_name'=>$this->input->post('category_name'),
				'category_phone'=>$this->input->post('category_phone'),
				'category_email'=>$this->input->post('category_email'),
				//'category_status'=>$category_status,
				//'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->insert( 'lead_category', $data );
        return $this->db->insert_id();
    }
    
	public function createsubcat()
	{
		$category_status ='Active';
		$data = array(
				'lead_category_name'=>$this->input->post('subcategory_name'),
				'lead_primary_id'=>$this->input->post('categorysel'),
 				'category_status'=>$category_status,
				'cmp_unique_id'=>$this->user->cmp_unique_id
		);
        $this->db->insert( 'lead_category', $data );
        return $this->db->insert_id();		
	}
	
    public function getById( $id ) {
 
        $id = intval( $id );
		$this->db->select('lead_category_id,lead_category_name,category_status');
		$this->db->where( 'cmp_unique_id', $this->user->cmp_unique_id );
        $query = $this->db->where( 'lead_category_id', $id )->limit( 1 )->get( 'lead_category' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return "novalues";
        }
    }
    
	public function getAllCategory() {
	
		$this->db->select('lead_category_id,lead_category_name');
    	//get all records from users table
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
		$this->db->where('lead_primary_id',NULL);
	    $query = $this->db->get( 'lead_category' );
        if( $query->num_rows() > 0 ) {
			return $query->result();
        } else {
            return array();
        }
    } //end getAll
 
    public function getAll() {
	
/*	SELECT tbl_category.cat_id AS CAT_ID, tbl_category.cat_name AS CAT_NAME, tbl_category_1.cat_id AS PARENT_ID, tbl_category_1.cat_name AS PARENT_NAME
FROM tbl_category LEFT JOIN tbl_category AS tbl_category_1 ON tbl_category.cat_pid = tbl_category_1.cat_id;*/
		$this->db->select('lead_category_id,lead_category_name,lead_primary_id,category_status');
    	//get all records from users table
		$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
	  
	    $query = $this->db->get( 'lead_category' );
        if( $query->num_rows() > 0 ) {
			$catarry= array();
			$i=0;
			$primary_cat='';
            foreach($query->result() as $cat )
			{
				$catarry[$i]['cat_id']= $cat->lead_category_id;
				if($cat->lead_primary_id==NULL)
				{
					$primary_cat = $cat->lead_category_name;
					$catarry[$i]['category_name']= $cat->lead_category_name;
					$catarry[$i]['subcategory_name'] ='---';
				}
				else{
					$catarry[$i]['category_name'] = "".$primary_cat." | ".$cat->lead_category_name;	
					$catarry[$i]['subcategory_name']=$cat->lead_category_name ;
				}
				$catarry[$i]['cat_status']= $cat->category_status;
				$i++;
				
			}
			return $catarry;
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        
		$category_status ='Active';
		
		
		$data = array(
				'lead_category_name'=>$this->input->post('ucategory_name'),
				'category_status'=>$category_status
				
		);
        $this->db->update( 'lead_category', $data, array( 'lead_category_id' => $this->input->post( 'category_id', true ), 'cmp_unique_id'=>$this->user->cmp_unique_id ) );
		
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
		//$data = array(
			//'category_status'=>'InActive'
		//);
		
		//$this->db->update( 'lead_category', $data, array( 'lead_category_id' => $this->input->post( 'lead_category_id', true ) ) );
		 $this->db->delete( 'lead_category', array( 'lead_category_id' => $id,'cmp_unique_id' => $this->user->cmp_unique_id ) );
       // $this->db->delete( 'lead_category', array( 'lead_category_id' => $id ) );
    } //end delete
	
    
} //end class