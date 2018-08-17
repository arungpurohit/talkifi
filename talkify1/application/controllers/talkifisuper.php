<?php 
class TalkifiSuper extends CI_controller {
	public $user;
	public $groups;
	
	function __construct() {
      	parent::__construct();
		
		$this->user = array();
		$this->groups = array();
		
		if(!$this->ion_auth->logged_in())
		{
			redirect('auth/login','refersh');
		}
	}
//-------------------------------------------------------------------------------------------------------------------
// Function to check privileges and Session
//-------------------------------------------------------------------------------------------------------------------
	function init() {
		 if(!$this->ion_auth->logged_in())
		{
			return false;
		}
		else
		{
			return true;
		}
    }

//-------------------------------------------------------------------------------------------------------------------
// Function to get the header menu
//-------------------------------------------------------------------------------------------------------------------

function getHeader(){

		$menudisplay = array(array('DASHBOARD','ic-dashboard','index.php/show-dashboard/'),
							   array('COMPOSE','ic-form-style','index.php/show-compose/'),
							   array('INBOX','ic-notifications','index.php/show-inbox/'),
							   array('SMS','ic-charts','index.php/show-sms/'),
							   array('EMAIL','ic-grid-tables','index.php/show-emails/'),
							   array('REPORTS','ic-gallery dd','index.php/show-reports/'),
							   array('COMPANY','ic-notifications','index.php/show-company/'),
							   array('TASKS','ic-form-style','index.php/show-tasks/'),);
		
			foreach($menudisplay as $keysd => $leftvalsd)
			{
			if (!preg_match("/".ucfirst(strtolower($leftvalsd[0]))."/",$this->groups[0]->page_perm))
				{
					unset($menudisplay[$keysd]);
				}
			}
			return $menudisplay;
}

//-------------------------------------------------------------------------------------------------------------------
// Function to get the company logo
//-------------------------------------------------------------------------------------------------------------------

function getCompanyLogo(){
	$this->db->select('company_name,company_mini_logo');
	$this->db->from('company_details');
	$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);

	$logoQuery = $this->db->get()->result_array();
	return $logoQuery;
}

//-------------------------------------------------------------------------------------------------------------------
// Function to get the left menu
//-------------------------------------------------------------------------------------------------------------------

function getLeftMenu(){
		
		
		$leftmenu = array('Actors'=>array(array('Reps','show-reps','Rep Details'),
									  array('Clients','show-clients','Clients'),
									  array('RoleofEmp','show-roles','Role Of Employ')),
							'Lead Attributes' => array(array('Category','show-category','Category'),
									  array('Status','show-status','Status'),
									  array('Types','show-types','Type'),
									  array('Priority','show-priority','Priority'),
									  array('Channels','show-channel','Channels')),
							'Campaign' => array(array('Sms','show-sms','SMS'),
									  array('Emails','show-emails','Email')),
							'System Rule' => array(array('Tasks','show-tasks','Tasks'),
											array('Autorespondersms','show-smsresponder','Auto Responder Sms'),
									  array('Emailconfig','show-emaillist','Email Configur')),
							'Reports' => array(array('Repdashboard','show-repdashboard','Rep Dashboard'),
									  array('Repvsstatus','show-repvsstatus','Rep Vs Status'),
									  array('Repvscategory','show-repvscategory','Rep Vs Category'),
									  array('Repvstypes','show-repvstypes','Rep Vs Types'),
									  array('Repvspriority','show-repvspriority','Rep Vs Priority'),
									  array('Repvschannels','show-repvschannels','Rep Vs Channels')),		  		  
						);
				
			 foreach($leftmenu as $keys => $leftvals)
			 {
				foreach($leftvals as $keyss=>$leftv){
					//echo ucfirst(strtolower($leftv[0]));
					
					if (!preg_match("/".ucfirst(strtolower($leftvals[$keyss][0]))."/",$this->groups[0]->page_perm))
					{
						unset($leftvals[$keyss]);
					}
				 }
				
			}
			return $leftmenu;
}


//-------------------------------------------------------------------------------------------------------------------
// Function to render the page 
//-------------------------------------------------------------------------------------------------------------------
	function renderPage($view, $data=null, $render=false)
	{
		$data['companylogo'] = $this->getCompanyLogo();
		//$this->output->enable_profiler(true);
		$data['menus'] = $this->getHeader();

		//$data['leftmenu'] = $this->getLeftMenu();
		
		$data['leftmenu'] = array('Attributes'=>array(array('Category','show-category','Category'),
													  array('Status','show-status','Status'),
													  array('Types','show-types','Type'),
													  array('Priority','show-priority','Priority'),
													  array('Channels','show-channel','Channels')),
									'Clients' =>array(array('Clients','show-clients','Manage Clients'),
													  array('Client_upload','client_upload','Client Upload')),
									'Users' => 	array(array('Users','show-reps','Manage Users'),
													  array('RoleofEmp','show-roles','Role Of Employ')),
									'Graphs' => array(array('Graphs','graph-category','Lead Vs Category'),
													  array('Graphs','graph-channel','Lead Vs Channel'),
													  array('Graphs','graph-priority','Lead Vs Priority'),
													  array('Graphs','graph-status','Lead Vs Status'),
													  array('Graphs','graph-types','Lead Vs Types')),
									'Reports' => array(array('Repdashboard','show-repdashboard','Rep Dashboard'),
												  array('Repvsstatus','show-repvsstatus','Rep Vs Status'),
												  array('Repvscategory','show-repvscategory','Rep Vs Category'),
												  array('Repvstypes','show-repvstypes','Rep Vs Types'),
												  array('Repvspriority','show-repvspriority','Rep Vs Priority'),
												  array('Repvschannels','show-repvschannels','Rep Vs Channels')),													  									'Settings' => array(array('Emaillist','show-emaillist','Email List'),
														   array('Autoresponder','show-responder','Auto Responder'),
														   array('Autorespondersms','show-smsresponder','Auto Responder Sms'),
														array('DownLoadEmail','download-email','Download Emails')),
									'Legal' => array(array('PrivacyPolicy','show-privacy','Privacy Policy'),
														   array('TermsConditions','show-terms','Terms and Conditions'),
														   array('FAQ','show-faq','FAQ'),
														   array('Help','show-help','Help'))
								 );
		
		$this->viewdata = (empty($data)) ? $this->data: $data;
 		
		$this->load->view('header',$data);
		if($view!='tasks/index')
		$this->load->view('left');
		
		$this->load->view($view, $this->viewdata, $render);
		$this->load->view('footer');
    }



//---------------------------------------------------------------------------------------------------------------------
// YET TO DO!
//---------------------------------------------------------------------------------------------------------------------
	function logactivity() {
		//check the activity for function calls
		//current controller
		//$controllerName = $this->router->class;
		//current method
		//$methodName = $this->router->method;
			
		
	}
//---------------------------------------------------------------------------------------------------------------------
/* --- if session exists then returns true else returns false  --- */
//---------------------------------------------------------------------------------------------------------------------
	function checkSession(){
		$user = $this->session->userdata('SESS_USER_ID');
		
		if(isset($user))
			return true;
		else 
			return false;
	}
//---------------------------------------------------------------------------------------------------------------------
// Check the Page Permission 
//---------------------------------------------------------------------------------------------------------------------
	function checkPagePermission($rep_id,$cmp_unique_id,$className){

		$user_groups = $this->ion_auth->get_users_groups($cmp_unique_id,$rep_id); // get the group id of the rep where he belongs
		$group_id = $user_groups[0]->id;
		
		$this->groups = $this->ion_auth->groups($cmp_unique_id,$group_id)->result();
		//print_r($this->groups);
		//echo $this->groups[0]->page_perm;

		if (preg_match("/".$className.":/",$this->groups[0]->page_perm))
			return true;
		else
			return false;
	}
//---------------------------------------------------------------------------------------------------------------------
// YET TO DO!
//---------------------------------------------------------------------------------------------------------------------
	function checkPrivileges($privID = "NULL") {
		//get user_id from session variable
		$user_id = $this->session->userdata('SESS_USER_ID');
		
		$status = 1;
		if ($status)
			return true;
		else 
			return false;
	}
//---------------------------------------------------------------------------------------------------------------------
// YET TO DO -- Need to update logout time!!
//---------------------------------------------------------------------------------------------------------------------
	function logout() {
		$user = $this->session->userdata('user_id');
		
		if($user != null){
			$this->session->sess_destroy();
			 return 'SESSION_DESTROYED';
		} else
			 return 'SESSION_DOES_NOT_EXIST';
			
	}
	
 }
?>
