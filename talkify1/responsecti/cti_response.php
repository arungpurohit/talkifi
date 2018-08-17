<?php

	define('DBSERVER','localhost');
	define('DBUSER','root');
	define('DBPASS','');
	define('DBNAME','alm');

/*	define('DBSERVER','localhost');
	define('DBUSER','authflyte');
	define('DBPASS','flyte1776');
	define('DBNAME','authalmfin1');
	*/
	
		$dbhandler= mysql_connect(DBSERVER,DBUSER,DBPASS) or die('unable to connect to db');
		
		$connectionhandler = mysql_select_db(DBNAME,$dbhandler);
		
		$customer_num =$_GET['customer_no'];
		$voice_path=$_GET['voice_path'];
		$call_duration=$_GET['call_duration'];
		$status=$_GET['status'];
		$flag=1;
		$rep_num =$_GET['Rep_id'];
		$unique_id=$_GET['unique_id'];
		$b_sim=$_GET['b_sim'];
		$cmp_unique_id='';

		//select the cmp_unique_id by matching the rep_phone	
	 	//$query=mysql_query('SELECT rep_id,cmp_unique_id FROM rep_details where rep_phone ="'.$rep_num.'"');
	 	$query=mysql_query('SELECT id,cmp_unique_id FROM users where phone ="'.$rep_num.'"'); 
		$row = mysql_fetch_array($query);
		$cmp_unique_id = $row['cmp_unique_id'];
		$rep_id = $row['id']; 		
		
		if($cmp_unique_id!='')
	   {	
	   
	    	// check that client already present or not, if not insert tht client
		  $clientQry = "SELECT client_id,client_username,client_phone FROM clients WHERE cmp_unique_id ='".$cmp_unique_id."' and client_phone='".$customer_num."'";
		
			$selectClient = mysql_query($clientQry);
			//meaning that client already present
			$num_rows =mysql_num_rows($selectClient);
			
			if($num_rows > 0 ) {
				$clientrow = mysql_fetch_array($selectClient);
				$client_id = $clientrow['client_id'];   
			} else {
			// new client insert the client data
			$client_creation_date = time();
		
			 $insertClient = "insert into clients (client_username,client_password,client_phone,client_creation_date,cmp_unique_id) values('".$customer_num."','password','".$customer_num."','".$client_creation_date."','".$cmp_unique_id."')";		
				$insClientid= mysql_query($insertClient);
				$client_id = mysql_insert_id();
			}
			
			//select the next lead unique id and insert into lead
			$selectMaxid = 'SELECT max(lead_unique_id) as max_lead_id FROM leads where cmp_unique_id ="'.$cmp_unique_id.'"'; 
			
			$queryMaxid=mysql_query($selectMaxid); 
			$maxidrow = mysql_fetch_array($queryMaxid);
			$max_id = $maxidrow['max_lead_id']; 
			
			if($max_id == NULL || $max_id =="")
				$max_id = 1;
			else
				$max_id = $max_id+1;
				
			//select the priority
			$selectMinPriority = "SELECT min(lead_priority_id) as min_priority_id FROM lead_priority where cmp_unique_id ='".$cmp_unique_id."' and  	priority_status='ACTIVE'"; 
			
			$queryMinPriority=mysql_query($selectMinPriority); 
			$minpriority = mysql_fetch_array($queryMinPriority);
			$min_priority_id = $minpriority['min_priority_id']; 
			
			//select the type
		 $selectMinType = "SELECT min(lead_type_id) as min_type_id FROM lead_types where cmp_unique_id ='".$cmp_unique_id."' and  	types_status='ACTIVE'"; 
			
			$queryMinType=mysql_query($selectMinType); 
			$mintype = mysql_fetch_array($queryMinType);
			$min_type_id = $mintype['min_type_id']; 
			
			//select the status
		  $selectMinStatus = "SELECT min(lead_status_id) as min_status_id FROM lead_status where cmp_unique_id ='".$cmp_unique_id."'"; 
		
			$queryMinStatus=mysql_query($selectMinStatus); 
			$minstatus = mysql_fetch_array($queryMinStatus);
		 $min_status_id = $minstatus['min_status_id']; 
			
			//select the channel
		 $selectMinChannel = "SELECT min(lead_channel_id) as min_channel_id FROM lead_channels where cmp_unique_id ='".$cmp_unique_id."' and  	channel_status='ACTIVE'"; 
		
			$queryMinChannel=mysql_query($selectMinChannel); 
			$minchannel = mysql_fetch_array($queryMinChannel);
			$min_channel_id = $minchannel['min_channel_id']; 
			
			
			
			$creation_time = time();
			//$insertLead = "insert into leads (client_id,lead_unique_id,lead_creation_date,lead_type_id,lead_priority_id,rep_id,lead_subject,lead_status_id,lead_channel_id,lead_read_flag,voice_path,cmp_unique_id) values('".$client_id."','".$max_id."','".$creation_time."',".$min_type_id.",".$min_priority_id.",'".$rep_id."','Enquiry from telphone',".$min_status_id.",".$min_channel_id.",1,'".$voice_path."','".$cmp_unique_id."')";
			$insertLead = "insert into leads (client_id,lead_unique_id,lead_creation_date,lead_type_id,lead_priority_id,rep_id,assigned_by,assigned_to,lead_subject,lead_status_id,lead_channel_id,lead_read_flag,voice_path,cmp_unique_id) values('".$client_id."','".$max_id."','".$creation_time."',".$min_type_id.",".$min_priority_id.",'".$rep_id."','".$rep_id."','".$rep_id."','Enquiry from telphone',".$min_status_id.",".$min_channel_id.",1,'".$voice_path."','".$cmp_unique_id."')";						
		
			$insleadid= mysql_query($insertLead);
		
		 	$insertLeadThread = "insert into lead_rep_threads (lead_unique_id,attach_flag,cmp_unique_id,creation_date,created_by,msgBody,lead_status_id) values($max_id,0,'".$cmp_unique_id."','".$creation_time."',$rep_id,'Enquiry from telphone',$min_status_id)";
		
			$insleadid= mysql_query($insertLeadThread);
			$insertSuccess =$max_id; 
			// SMS auto responder should go from here
		}
		else{
			//redirect('/login/');
			$cmp_not_matching='company not matching, fake hit';
			$insertSuccess = 2;
		}
		
		//insert into ctievent
		 $insertCtievemt = "insert into cti_event (customer_num,rep_num,b_sim,call_duration,status,status_of_insert,unique_id,cmp_unique_id) values('".$customer_num."','".$rep_num."','".$b_sim."','".$call_duration."','".$status."','".$insertSuccess."','".$unique_id."','".$cmp_unique_id."')";
			
			$insctievent= mysql_query($insertCtievemt);
			$insertSuccess = mysql_insert_id(); 
			echo $max_id;


?>