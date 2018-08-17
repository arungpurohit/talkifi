<?php
session_start();
require(APPPATH.'/controllers/talkifisuper.php');

class Emails extends TalkifiSuper{
	
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
	}
	
	public function index()
	{
		$this->load->library('form_validation');
		
		
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'talkifidemo@gmail.com',
				'smtp_pass' => 'vj12best',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		
		$this->form_validation->set_rules('email_to','To','trim|required');
		//$this->form_validation->set_rules();
				
		$data['templatess'] = '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<div align="center">
<br />
<table id="Table_01" style="width: 600px;" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tbody>
    <tr>
      <td width="334" height="46"><div style="text-align: left; float: left; font-size: 22px; font-weight: bold; color: #253400; font-family: arial, sans-serif;">Tech flyte</div></td>
      <td colspan="2" width="266" height="46"><div style="text-align: right; float: right; font-size: 22px; color: #b5b5b5; font-family: arial, sans-serif;"># 005 </div></td>
    </tr>
    <tr>
      <td rowspan="2" width="334" height="108" bgcolor="#5D8400"></td>
      <td colspan="2" width="266" height="23" bgcolor="#5D8400"></td>
    </tr>
    <tr>
      <td style="color: #5d8400; font-size: 22px; font-family: arial, sans-serif; border: 3px solid #FFFFFF;" rowspan="2" width="242" height="150" align="center" valign="middle" bgcolor="#D5EAA2"><table style="width: 222px; height: 130px;" border="0">
          <tbody>
            <tr>
              <td style="color: #5d8400; font-size: 22px; font-family: arial, sans-serif;" align="center"><p>Rashtha Jodo </p>
                <p>Talkifi </p>
                <p>is coming.... </p></td>
            </tr>
          </tbody>
        </table></td>
      <td style="border-top: 3px solid #5D8400;" width="24" height="85" bgcolor="#5D8400"></td>
    </tr>
    <tr>
      <td rowspan="2" width="334" height="497" align="left" valign="top"><table style="width: 317px;" border="0" cellspacing="0" cellpadding="5">
          <tbody>
            <tr>
              <td style="font-size: 16px; font-family: arial, sans-serif; color: #5d8400; text-align: left;">Optimal<a name="1"></a></td>
            </tr>
            <tr>
              <td style="font-size: 11px; font-family: arial, sans-serif; color: #000000; text-align: left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non mi a quam posuere eleifend. Curabitur pede arcu, vulputate a, volutpat nec, laoreet id, purus. Fusce at lacus quis risus iaculis consectetuer. Fusce nec neque id justo faucibus lacinia. Integer magna odio, dictum gravida, gravida sit amet, auctor dignissim, urna. Nullam viverra porta lorem. Vivamus molestie, dui eget fringilla tristique, massa dolor mattis diam, a vehicula tortor diam sit amet tortor. <br />
                <br /></td>
            </tr>
            <tr>
              <td style="font-size: 16px; font-family: arial, sans-serif; color: #5d8400; text-align: left;">Scalable<a name="2"></a></td>
            </tr>
            <tr>
              <td style="font-size: 11px; font-family: arial, sans-serif; color: #000000; text-align: left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non mi a quam posuere eleifend. Curabitur pede arcu, vulputate a, volutpat nec, laoreet id, purus. Fusce at lacus quis risus iaculis consectetuer. Fusce nec neque id justo faucibus lacinia. Integer magna odio, dictum gravida, gravida sit amet, auctor dignissim, urna. Nullam viverra porta lorem. Vivamus molestie, dui eget fringilla tristique, massa dolor mattis diam, a vehicula tortor diam sit amet tortor. <br />
                <br /></td>
            </tr>
            <tr>
              <td style="font-size: 16px; font-family: arial, sans-serif; color: #5d8400; text-align: left;">Smart<a name="3"></a></td>
            </tr>
            <tr>
              <td style="font-size: 11px; font-family: arial, sans-serif; color: #000000; text-align: left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam non mi a quam posuere eleifend. Curabitur pede arcu, vulputate a, volutpat nec, laoreet id, purus. Fusce at lacus quis risus iaculis consectetuer. Fusce nec neque id justo faucibus lacinia. Integer magna odio, dictum gravida, gravida sit amet, auctor dignissim, urna. Nullam viverra porta lorem. Vivamus molestie, dui eget fringilla tristique, massa dolor mattis diam, a vehicula tortor diam sit amet tortor. <br />
                <br /></td>
            </tr>
          </tbody>
        </table></td>
      <td width="24" height="65"></td>
    </tr>
    <tr>
      <td colspan="2" width="266" align="left" valign="top">
      <table style="width: 245px; border: 3px solid #ffffff;" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td style="font-size: 10px;"></td>
            </tr>
            <tr>
              <td style="border: 1px solid #D5EAA2; background: #F5FFDB; font-size: 11px; font-family: arial, sans-serif;"><div style="margin: 7px;"><a style="color: #5d8400;" href="#1">Header 1 Brief Description...</a></div></td>
            </tr>
            <tr>
              <td style="font-size: 10px;"></td>
            </tr>
            <tr>
              <td style="border: 1px solid #D5EAA2; background: #F5FFDB; font-size: 11px; font-family: arial, sans-serif;"><div style="margin: 7px;"><a style="color: #5d8400;" href="#2">Header 2 Brief Description...</a></div></td>
            </tr>
            <tr>
              <td style="font-size: 10px;"></td>
            </tr>
            <tr>
              <td style="border: 1px solid #D5EAA2; background: #F5FFDB; font-size: 11px; font-family: arial, sans-serif;"><div style="margin: 7px;"><a style="color: #5d8400;" href="#3">Header 3 Brief Description...</a></div></td>
            </tr>
            <tr>
              <td style="font-size: 20px;"></td>
            </tr>
            <tr>
              <td style="border: 1px solid #E0EFB9; background: #F8FFE4; font-size: 11px; font-family: arial, sans-serif; color: #638909;"><div style="margin: 7px;">Side bar promo or other information</div></td>
            </tr>
            <tr>
              <td style="font-size: 11px; font-family: arial, sans-serif; color: #a3a3a3;"><div style="margin: 0 7px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec pretium tempus arcu. Donec et nunc ac magna tristique fermentum. Morbi gravida ultricies diam. Donec sagittis. Praesent urna turpis, facilisis et, rhoncus vitae, lacinia ut, mi. Nulla facilisi. Nunc eget mauris. Donec ut nulla quis est lacinia sollicitudin. Quisque turpis magna, imperdiet a, dignissim et, tempor vitae, dui. Mauris at mauris nec dolor pharetra lacinia.</div></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</div>
</body>';
		
		if($this->form_validation->run()==false)
		{	
			$this->renderPage('emails/index',$data);
		
		}
		else
		{
			$this->email->from('talkifidemo@gmail.com','Talkifi');  
			$this->email->to($this->input->post('email_to'));
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			
			$this->email->subject($this->input->post('subject'));
			$msg = $this->input->post('msgbody');
			$this->email->message($msg);
			
			$this->email->send();
			
			//$this->email->print_debugger();
			
			$this->renderPage('emails/index',$data);


			
		}
	}
	
}
?>