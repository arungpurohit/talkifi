<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Emailconf extends TalkifiSuper{
	
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
			
		$this->load->model('emailconf_model');
		$this->load->model('compose_model');
	}
	
	public function index(){
	
		 $this->load->library('form_validation');
		
		 $data['title'] = 'emailaddress download Configuration';
		 
		 //$this->output->enable_profiler(TRUE);
		
		 $data['status'] = $this->compose_model->getStatus();		
		 $data['priority'] = $this->compose_model->getPriority();
		 $data['category'] = $this->compose_model->getCategory();
		 $data['types'] = $this->compose_model->getTypes();
		 $data['channels'] = $this->compose_model->getChannels();
		 
		 $this->form_validation->set_rules('username','User Name','trim|required|valid_email');
		 $this->form_validation->set_rules('emailaddress','emailaddress  Address','trim|required|valid_email');
		 $this->form_validation->set_rules('emailpass','emailaddress Pass','trim|required');
		 $this->form_validation->set_rules('pop','pop','trim|required');
		 
		 if($this->form_validation->run()==FALSE)
		 {
		
			$this->renderPage('emails/emailconfigure',$data);

		
		}
		else
		{
			imap_errors();
			
			$pop = $this->input->post('pop');
			$emailaddress = $this->input->post('emailaddress');
			$emailpass = $this->input->post('emailpass');
			
			$mailBox = @imap_open("{".$pop.":110/pop3}INBOX",$emailaddress,$emailpass);
			$port=110;
			$service_flags="/pop3";
			
			if ($mailBox == false) 
			{
				// To connect to an IMAP server running on port 143 on the local machine,
				// do the following:
				$mailBox = @imap_open("{".$pop.":143}INBOX", $emailaddress, $emailpass);
				$port=143;
				$service_flags="";
			}
			if ($mailBox == false) 
			{
				// To connect to a POP3 server on port 110 on the local server, use:
				$mailBox = @imap_open ("{".$pop.":110/pop3/notls}INBOX", $emailaddress, $emailpass);
				$port=110;
				$service_flags="/pop3/notls";
			}
				// To connect to an SSL IMAP or POP3 server, add /ssl after the protocol
				// specification:
			if ($mailBox == false) 
			{
				$mailBox = @imap_open ("{".$pop.":993/imap/ssl}INBOX", $emailaddress, $emailpass);
				$port=993;
				$service_flags="/imap/ssl";
			}
			if ($mailBox == false) 
			{
				$mailBox = @imap_open ("{".$pop.":993/pop3/ssl/novalidate-cert}", $emailaddress, $emailpass);
				$port=993;
				$service_flags="/pop3/ssl/novalidate-cert";
			}
			// To connect to an SSL IMAP or POP3 server with a self-signed certificate,
			// add /ssl/novalidate-cert after the protocol specification:
			if ($mailBox == false) 
			{
				$mailBox = @imap_open ("{".$pop.":995/pop3/ssl/novalidate-cert}", $emailaddress, $emailpass);
				$port=995;
				$service_flags="/pop3/ssl/novalidate-cert";
			}
			// To connect to an NNTP server on port 119 on the local server, use:
			if ($mailBox == false) 
			{
				$mailBox = @imap_open ("{".$pop.":119/nntp}comp.test", $emailaddress, $emailpass);
				$port=119;
				$service_flags="/nntp";
			}
			
			if ($mailBox == false) 
			{
					$data['err_msg'] = "PROBLEM WHILE LOGGING ONTO MAIL SERVER, PLEASE CHECK THE BELOW VALUES ONCE AGAIN";
					$this->renderPage('emails/emailconfigure',$data);
			}
			else
			{
				$insertDone = $this->emailconf_model->insertEmailConfVal($port,$service_flags);
				redirect('emaillist','refersh');
			}		
	
		}
	}
	
	public function update($email_conf_id)
	{
		$this->load->library('form_validation');
		$this->output->enable_profiler(TRUE);
		
		$this->form_validation->set_rules('email_conf_emailaddr','User Name','trim|required');
		$data['title'] = 'emailconf';
		$data['response'] = $this->emailconf_model->get_responses($email_conf_id);
		
		if($this->form_validation->run()==FALSE)
		{
			$this->renderPage('emails/updateemails',$data);
		}
		else
		{
			$this->emailconf_model->updateauto();			 
			 $data['results'] = $this->emailconf_model->selectEmailConfVal();
			 $this->renderPage('emails/emaillist',$data);
		}
	}
		
}

?>