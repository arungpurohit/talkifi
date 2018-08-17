<?php

class Autodownloademail_model extends CI_Model{
	
	public function __construct()
	{
			parent::__construct();
			//$this->user = $this->ion_auth->user()->row();
	}
	
	public function downloademail()
	{
		$this->load->helper('file');
		
		$this->output->enable_profiler(TRUE);
	
		$this->db->select('email_conf_id,email_conf_emailaddr,email_conf_emailid,email_conf_emailpass,email_conf_pop,email_conf_emailport,email_conf_emailserviceflag,email_conf_last_downloaded,email_conf_messageid,email_status_id,email_types_id,email_channels_id,email_conf_categoryid,email_conf_priorityid,emai_conf_repgroupid,cmp_unique_id');
		$this->db->from('email_conf');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		
			$rows = $query->result();
			foreach($rows as $row)
			{
				$emailid = $row->email_conf_emailid;
				$emailpass = $row->email_conf_emailpass;
				$emailpop = $row->email_conf_pop;
				$port = $row->email_conf_emailport;
				$service_flags = $row->email_conf_emailserviceflag; 
				$message_id = $row->email_conf_messageid;
				$status_id = $row->email_status_id;
				$types_id = $row->email_types_id;
				$channels_id = $row->email_channels_id;
				$category_id = $row->email_conf_categoryid;
				$priority_id = $row->email_conf_priorityid;
				$emai_conf_repgroupid = $row->emai_conf_repgroupid;
				$cmp_unique_id = $row->cmp_unique_id;				
	
				//get the group which the lead has been assigned
				$this->db->select('user_id');
				$this->db->where('group_id', $emai_conf_repgroupid);
				$this->db->where('cmp_unique_id', $cmp_unique_id);
				$response = $this->db->get('users_groups')->result_array();// its an array containing all the reps
				
				
			
				$config['login']=$emailid;
				$config['pass']=$emailpass;
				$config['host']=$emailpop;
				$config['port']=$port;
				$config['service_flags'] =$service_flags;
				
				$msgCount = 0;
				$downloadCount = 0;
				$newClientCount = 0; 
				$newLeadCount = 0;
					

					$this->load->library('peeker', $config);
					$bool = $this->peeker->set_attachment_dir(base_url().'uploads');
					//echo $bool?"true":"false";
					//echo "<br />";
	
					
					if ($this->peeker->message_waiting())
					{
						$msgCount = $this->peeker->get_message_count();
							
						for($msg_no=1;$msg_no<=$msgCount;$msg_no++)
						{
							$e = $this->peeker->get_message($msg_no);
							
							$rep_random = rand(0,count($response)-1);		
							$rep_id = $response[$rep_random]['user_id'];
						
							if(trim(strpos($message_id,$e->get_message_id()))=="")//check for messageid to remove the duplicity
							{
									$downloadCount++;
									$mb_host_array = $e->get_from_array();
									
									/*print_r($mb_host_array);
									echo $mb_host_array[0]->mailbox."@".$mb_host_array[0]->host;
									echo"<br />";										
									die;*/
									$Subject =  $this->peeker->decode_mime($e->get_subject());	
																		
									$header_array = $e->get_header_array();
									
									//if header content type is plain, the get the plain text
									if (preg_match('/^PLAIN/',$header_array['Content-Type']))  
									{
										
										$Text = @strip_tags($e->get_plain());
										
									}
									elseif (preg_match('/^ALTERNATIVE/',$header_array['Content-Type']) || preg_match('/^HTML/',$header_array['Content-Type']) )  
									{
										
										$Text =  @strip_tags($e->get_html());
												
									}
									elseif (preg_match('/^MIXED/',$header_array['Content-Type']) )  
									{
										
										$Text =  @strip_tags($e->get_html());		
										
									}
									else
									{
										//$Text =  @strip_tags($e->get_body());
										$Text =  @strip_tags($e->get_html());
									}
									
									$Date = date("d/m/Y");//extract current date
									$Time = date("H:i T");//extract current time
									
									$sysTime=time();// system time for inserting the creation time in the database.
									$statusId=1;
			
									// check the client that is already present the client list
									//$checkClientPresence = $this->checkClientPresent($mb_host_array);
									$email =$mb_host_array[0]->mailbox."@".$mb_host_array[0]->host;
									$this->db->select('client_id,client_username,client_email');
									$this->db->from('clients');
									//$this->db->where('client_username',$clientEmailArray[0]->mailbox);
									$this->db->where('client_email',$email);
									$this->db->where('cmp_unique_id',$cmp_unique_id);
			
									$queryClient = $this->db->get();
									$queryClient->num_rows();
									
									
									if($queryClient->num_rows()>0)								 // meaning that client already present
									{
										$rowsClient = $queryClient->result();
										
										foreach($rowsClient as $rowclnt)
										{
											$client_id = $rowclnt->client_id; 
										}
										//client already present, check the Lead ID by parsing the subject
										/*$parseSubject = $Subject; // subject to parse
									 	preg_match('/\[LeadID#[a-z|0-9|-]*\]/i',$parseSubject,$match);
										//echo $match[0];
										//correct format extract the LeadID
										$arrSubject=explode("#",$match[0]);
										$LeadID_from_subject=rtrim($arrSubject[1],"]");
										//$LeadID_from_subject."seter";
										$FORMAT_TICKET_DISPLAY = 1; // its needs be constant for now
										switch($FORMAT_TICKET_DISPLAY)
										   {
											 case 1:
													  $str = preg_split ("/([a-z])+/i", "$LeadID_from_subject",-1,PREG_SPLIT_NO_EMPTY);
													 $ticketId=$str[0];
													  break;
											
											case 2:	$arr=explode("-", $ticketId_from_subject);
													if(count($arr)>1)
													$ticketId=$arr[1];
													else
													$ticketId=$arr[0];
													break;
											case 3:	
													$sSubject = str_replace("$gPrefix", "", "$ticketId_from_subject"); 
													$arrTicket = explode("-",$sSubject);
													if(count($arrTicket)>1)
													$ticketId=$arrTicket[2];
													else
													$ticketId=$arrTicket[0];
													break;
										}*/
										
										//select the next lead unique id
										$query=$this->db->query('SELECT max(lead_unique_id) as max_lead_id FROM leads where cmp_unique_id ="'.$cmp_unique_id.'"'); 
										$row = $query->row_array();
										$max_id = $row['max_lead_id']; 
										
										if($max_id == NULL || $max_id =="")
											$max_id = 1;
										else
											$max_id = $max_id+1;
										
										$creation_time = time();
										
										$tktdata = array(
											'client_id'=>$client_id,
											'lead_unique_id'=>$max_id,
											'lead_creation_date' => $creation_time,
											'lead_type_id'=>$types_id,
											'lead_priority_id'=>$priority_id,
											'rep_id'=>$rep_id,
											'lead_subject' => $Subject,
											'lead_status_id' => $status_id,
											'lead_category_id' =>$category_id,
											'lead_channel_id' => $channels_id,
											'lead_read_flag'=>1,
											'cmp_unique_id'=>$cmp_unique_id
										);
											
										$this->db->insert('leads',$tktdata);
										$inserted_id = $this->db->insert_id();
										$newLeadCount++;

										$lThread = array(
											'lead_unique_id' =>$max_id,
											'attach_flag' =>0,
											'cmp_unique_id' => $cmp_unique_id,
											'creation_date' => $creation_time,
											'created_by'=> $rep_id,
											'subject' => $Subject,
											'msgBody' => $Text,
											'lead_status_id' => $status_id,
										);
										//'lead_attachment' => '' it should be updated after getting the attachment
										$this->db->insert('lead_clients_threads',$lThread);
										$threadId = $this->db->insert_id(); 
										
														
									}
									else // means that new client
									{
									//'client_created_via' =3 meaning form download email
										$currentDateTime=time();
										// insert the values in to the client
										$data = array(
											'client_username'=>$mb_host_array[0]->mailbox,
											'client_password'=>'password',
											'client_fname'=>$mb_host_array[0]->personal,
											'client_email'=>$email,
											'client_creation_date'=>$currentDateTime,
											'client_created_by'=>$rep_id, 
											'client_created_via'=>3,
											'cmp_unique_id'=>$cmp_unique_id
										);

										$this->db->insert('clients',$data);
										//insert the values in to the ticket
										$clientId = $this->db->insert_id();
										$newClientCount++;
										
										if($clientId!=NULL)
										{
										//select the next lead unique id
										$query=$this->db->query('SELECT max(lead_unique_id) as max_lead_id FROM leads where cmp_unique_id ="'.$cmp_unique_id.'"'); 
										$row = $query->row_array();
										$max_id = $row['max_lead_id']; 
										
										if($max_id == NULL || $max_id =="")
											$max_id = 1;
										else
											$max_id = $max_id+1;
										
										$creation_time = time();
										
										
										
										$tktdata = array(
											'client_id'=>$clientId,
											'lead_unique_id'=>$max_id,
											'lead_creation_date' => $creation_time,
											'lead_type_id'=>$types_id,
											'lead_priority_id'=>$priority_id,
											'rep_id'=>$rep_id,
											'lead_subject' => $Subject,
											'lead_status_id' => $status_id,
											'lead_category_id' =>$category_id,
											'lead_channel_id' => $channels_id,
											'lead_read_flag'=>1,
											'cmp_unique_id'=>$cmp_unique_id
										);
											
										$this->db->insert('leads',$tktdata);
										$inserted_id = $this->db->insert_id();
										$newLeadCount++;
										

										$lThread = array(
											'lead_unique_id' =>$max_id,
											'attach_flag' =>0,
											'cmp_unique_id' => $cmp_unique_id,
											'creation_date' => $creation_time,
											'created_by'=> $rep_id,
											'subject' => $Subject,
											'msgBody' => $Text,
											'lead_status_id' => $status_id,
										);
										//'lead_attachment' => '' it should be updated after getting the attachment
										$this->db->insert('lead_clients_threads',$lThread);
										$threadId = $this->db->insert_id(); 
										}
									}
									
									if($e->has_attachment() ) 
								 {/*/*
									/**
									 * save in attachment dir
									 */
									// $e->save_all_attachments();
									
									//$parts = $e->get_parts_array();
									/*echo "<br />";
									var_dump($parts);
									echo "<br />";*/
									
									/**
									 * foreach attachment, we want the location
									 */

									/*$i = 0;
									foreach ($parts as $part)
									{
										$string = $part->get_string();
										$size = $part->get_bytes();
										$ext=explode(".",$part->get_filename()); //find the extension of a file
										$extsize=sizeof($ext);
										$fname="";
										for($exti=0 ; $exti < $extsize-1 ; $exti++)
										{
											$fname.=$ext[$exti];
										}
										$extname=$ext[$extsize-1];
										
										//echo $this->peeker->get_attachment_dir().$e->get_fingerprint().'/'.$part->get_filename();
										$fname_orig=$fname.".".$extname;
										$fname=$fname.",".time().rand(0,10000).".".$extname;//creating unique file name
											
										//$fp = fopen(base_url().'uploads/'.$fname,"wb"); 
										//fwrite($fp, $string, strlen($string)); 
										//fclose($fp);
										
										if (!write_file(base_url().'uploads/'.$fname, $string))
										{
											 echo 'Unable to write the file';
										}
										else
										{
											 echo 'File written!';
										}
											
										$date = date("F j, Y");
										$time = date("g:i");
										$datetime = time();
										
										$attachmentArray = array(
											'f_name'=>$fname_orig,
											'f_new_name'=>$fname,
											'f_type'=>$extname,
											'f_size'=>$size,
											'attach_date'=>$datetime,
											'ticket_id'=>$tktId,
											'thread_id'=>$threadId,
											'thread_type'=>'CLIENT',
										); 
										$insTktAttach = $this->db->insert('pm1ticket_attachment',$attachmentArray);
										$i++;
									} */
								
								}// attachment loop

								//update the messageID
								$message_id=$e->get_message_id().$message_id;
									$updateTable = array(
											'email_conf_messageid' => $message_id
									);
									
									$this->db->where('email_conf_emailid', $emailid);
									$this->db->where('email_conf_pop', $emailpop);
									$this->db->where('cmp_unique_id',$cmp_unique_id);
									$this->db->update('email_conf', $updateTable);
									 
							} // end of if loop to remove duplicates.
						}//for loop end 
						
					}
					else
					{
						echo 'No messages waiting.';
					}
					
					$this->peeker->close();
					
					echo "No. of Mails in the server : ".$msgCount."<br />";
					echo "No. of Mails downloaded to the system : ".$downloadCount."<br />";
					echo "No. of New Client Created  : ".$newClientCount."<br />"; 
					echo "No. of New Leads Created  : ".$newLeadCount."<br />";
					// tell the story of the connection
					///print_r($this->peeker->trace());
			
			}//end of foreach loop 			
		}//num rows close
	}
	
	public function checkClientPresent($clientEmailArray)
	{
			$email ="'".$clientEmailArray[0]->mailbox.'@'.$clientEmailArray[0]->host."'";
			
			$this->db->select('client_id,client_username,client_email');
			$this->db->from('clients');
			//$this->db->where('client_username',$clientEmailArray[0]->mailbox);
			$this->db->where('client_email',$email);
			$this->db->where('cmp_unique_id',$cmp_unique_id);
			$queryClient = $this->db->get();
			if($queryClient->num_rows()>=0)								 // meaning that client already present
				return "present"; // means not present
			else
				return "notPresent"; //means present
	}

}


?>