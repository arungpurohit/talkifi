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
			redirect('superadmin/authenticate/login','refersh');
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

		$menudisplay = array(array('MODULES','ic-dashboard','index.php/show-modules/'),
							   array('REPDETAILS','ic-form-style','index.php/show-repdetails/'),
							   array('CALLREPORTS','ic-notifications','index.php/show-callrerports/'),
							   array('EMAILREPORTS','ic-charts','index.php/show-emailsreport/'),
							   array('SMSREPORTS','ic-grid-tables','index.php/show-smsreports/'),
							   array('REPORTS','ic-gallery dd','index.php/show-superreports/'),
							   array('ERRORLOG','ic-notifications','index.php/show-errorlog/'),
							   array('NOTIFICATION','ic-form-style','index.php/show-notification/'),);
		
			/*foreach($menudisplay as $keysd => $leftvalsd)
			{
			if (!preg_match("/".ucfirst(strtolower($leftvalsd[0]))."/",$this->groups[0]->page_perm))
				{
					unset($menudisplay[$keysd]);
				}
			}*/
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
		
		
		$leftmenu = array('SuperAdminRoles'=>array(array('Modules_display','show-modules','Modules'),
									  array('Repdetails_display','show-repdetails','Repdetails'),
									  array('Callreports','show-callrerports','Call Reports'),
									  array('Emailreports','show-emailsreport','Email Reports'),
									  array('Smsreports','show-smsreports','Sms Reports'),
									  array('Reports','show-superreports','Reports'),
									  array('Errorlogs','show-errorlog','Error Logs'),
									  array('Notifications','show-notification','Notifications')),
							/*'Lead Attributes' => array(array('Category','show-category','Category'),
									  array('Status','show-status','Status'),
									  array('Types','show-types','Type'),
									  array('Priority','show-priority','Priority'),
									  array('Channels','show-channel','Channels')),
							'Campaign' => array(array('Sms','show-sms','SMS'),
									  array('Emails','show-emails','Email')),
							'System Rule' => array(array('Tasks','show-tasks','Tasks'),
									  array('Emailconfig','show-emaillist','Email Configur')),
							'Reports' => array(array('Repdashboard','show-repdashboard','Rep Dashboard'),
									  array('Repvsstatus','show-repvsstatus','Rep Vs Status'),
									  array('Repvscategory','show-repvscategory','Rep Vs Category'),
									  array('Repvstypes','show-repvstypes','Rep Vs Types'),
									  array('Repvspriority','show-repvspriority','Rep Vs Priority'),
									  array('Repvschannels','show-repvschannels','Rep Vs Channels')),*/		  		  
						);
				
			/* foreach($leftmenu as $keys => $leftvals)
			 {
				foreach($leftvals as $keyss=>$leftv){
					//echo ucfirst(strtolower($leftv[0]));
					
					if (!preg_match("/".ucfirst(strtolower($leftvals[$keyss][0]))."/",$this->groups[0]->page_perm))
					{
						unset($leftvals[$keyss]);
					}
				 }
				
			}*/
			return $leftmenu;
}


//-------------------------------------------------------------------------------------------------------------------
// Function to render the page 
//-------------------------------------------------------------------------------------------------------------------
	function renderPage($view, $data=null, $render=false)
	{
		
		$this->output->enable_profiler(true);
		$data['menus'] = $this->getHeader();
		$data['leftmenus'] = $this->getLeftMenu();
		
		$this->viewdata = (empty($data)) ? $this->data: $data;
 		
		$this->load->view('superadmin/header',$data);	
		$this->load->view('superadmin/left');
		$this->load->view($view, $this->viewdata, $render);
		$this->load->view('superadmin/footer');
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
