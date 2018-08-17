#!/usr/bin/php
<?php
        include_once("phpagi-2.20/phpagi.php");
        $agi = new AGI();

        $uniqueid = $agi->request['agi_uniqueid'];
        $pri_no = $argv[1];
        $customer_no = $argv[2];
        $ivrmenu = $argv[3];
	$customer_all=$argv[4];
	date_default_timezone_set('Asia/Calcutta');
	$Date = date('Ymd');
	$agi->verbose("ID_all = ".$customer_all);
	$agi->verbose("Menu Id=".$ivrmenu);
        $agi->verbose("ID = ".$uniqueid);
        $part=substr($uniqueid,0,10);
        $agi->verbose("pri_no = ".$pri_no);
        $agi->verbose("customer no =  ".$customer_no);
        $agi->verbose("part =  ".$part);
        $voiceFilepath="/var/www/html/RECORDINGS/RECORDINGS/asterisk_RECORDINGS/".$Date."/".$customer_no."_".$part.".wav";
        $agi->verbose("vpath =  ".$voiceFilepath);

        $agi->set_variable('uniqId',$uniqueid);
        $agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/asterisk_RECORDINGS/".$Date."/".$customer_no."_".$part.".wav");


$host = "localhost";
$username = "root";
$password = "mypass";
$database = "asterisk";

        $con = mysql_connect($host,$username,$password);
        if (!$con)
        {
                die('Could not connect: ' . mysql_error());
        }

        $agi->verbose("ID = ".$uniqueid);
        mysql_select_db($database);

	//if($customer_no == ''){exit();}
  // this query to select the agent no, the  one who already spoked with the customer having number customer no.
        //$select_agent= "select max(sl_no), agent_no from call_log where customer_no='$customer_no' and pri_no like '$pri_no' LIMIT 1";
	$select_agent= "select sl_no,agent_no,file_path from call_log where customer_no like '%$customer_no%' and pri_no like '$pri_no' and file_path like '%RECORDING%' order by sl_no desc limit 1";
        $agi-> verbose("select query: ".$select_agent);
        $agent_result = mysql_query($select_agent) or die(mysql_error());
        $agent_count = mysql_num_rows($agent_result);
        //if agent no is present
        if($agent_count > 0)
        {
                if($agent_row = mysql_fetch_array($agent_result))
           {
                        $sl_no = $agent_row[0];
                        $agent_no = $agent_row[1];
			$file_path = $agent_row[2];
                        $agi->set_variable('file_path',$file_path);
			$query = "insert into call_log (unique_id,sim_no, pri_no,agent_no, customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_no', '$customer_no',now(),now())";
                	$agi-> verbose("select query: ".$query);
	               	$result2 = mysql_query($query) or die(mysql_error());

                }
        // this query to check is that agent is free. 
	$agent_query = "select sl_no,agent_no,sim_no,status from master_table where pri_no like '$pri_no' and status = 'FREE' and menu_id='$ivrmenu'";
        $agi-> verbose("select agent query: ".$agent_query);
        $agent_result1 = mysql_query($agent_query) or die(mysql_error());
        $count = mysql_num_rows($agent_result1);
        $agi-> verbose("count agent = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($agent_result1))
           {
                $sl_no = $row[0];
                $agent_no = $row[1];
                $sim_no=$row[2];
		$age_status=$row[3];
		$agi-> verbose("Agent status: ".$age_status);
	        $agi-> verbose("Agent No: ".$agent_no);
                $agi->set_variable('VAR',$agent_no);
                $agi->set_variable('SL_NO',$sl_no);

                $query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
                $agi-> verbose("select query: ".$query);
                $result1 = mysql_query($query) or die(mysql_error());

                /*$query = "insert into call_log (unique_id,sim_no, pri_no,agent_no, customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_no', '$customer_no',now(),now())";
                $agi-> verbose("select query: ".$query);
                $result2 = mysql_query($query) or die(mysql_error());*/
            }
        }
	else{
	
	}
     /*   else
        {
        //      $query = "select sl_no,agent_no,sim_no from master_table where pri_no = '$pri_no' and status = 'FREE' order by call_time,priority  LIMIT 1";
        $query = "select sl_no,agent_no,sim_no from master_table where pri_no like '$pri_no' and status = 'FREE' order by call_time,priority  LIMIT 1";
        $agi-> verbose("select query: ".$query);
        $result1 = mysql_query($query) or die(mysql_error());
        $count = mysql_num_rows($result1);
        $agi-> verbose("count = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($result1))
           {
                $sl_no = $row[0];
                $agent_no = $row[1];
                $sim_no=$row[2];
                $agi-> verbose("Agent No: ".$agent_no);
                $agi->set_variable('VAR',$agent_no);
                $agi->set_variable('SL_NO',$sl_no);

                $query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
                $agi-> verbose("select query: ".$query);
                $result1 = mysql_query($query) or die(mysql_error());

                $query = "insert into call_log (unique_id,sim_no, pri_no,agent_no, customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_no', '$customer_no',now(),now())";
                $agi-> verbose("select query: ".$query);
	 $result2 = mysql_query($query) or die(mysql_error());
            }
        }
}*/
}
        else
        {
         $agent_query = "select sl_no,agent_no,sim_no from master_table where pri_no like '$pri_no' and status = 'FREE'  order by call_time,priority  LIMIT 1";

        $agi-> verbose("select agent query: ".$agent_query);
        $agent_result1 = mysql_query($agent_query) or die(mysql_error());
        $count = mysql_num_rows($agent_result1);
        $agi-> verbose("count agent = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($agent_result1))
           {
                $sl_no = $row[0];
                $agent_no = $row[1];
                $sim_no=$row[2];
                $agi-> verbose("Agent No: ".$agent_no);
                $agi->set_variable('VAR',$agent_no);
                $agi->set_variable('SL_NO',$sl_no);

                $query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
                $agi-> verbose("select query: ".$query);
                $result1 = mysql_query($query) or die(mysql_error());

                $query = "insert into call_log (unique_id,sim_no, pri_no,agent_no, customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_no', '$customer_no',now(),now())";
                $agi-> verbose("select query: ".$query);
                $result2 = mysql_query($query) or die(mysql_error());
            }
        }

//here is new query inserted
 $customer_phno = $customer_no;
 $rep_phno = $agent_no;
 $sim_no=$sim_no;
 $voice_path = '';
 $call_duration ='';
 $pri_no = $pri_no;
 $status = "CALLING";
 $imu = $ivrmenu;     
   
        $url= "\"http://talkifi.com/staging/responsecti/cti_response.php?customer_no=$customer_phno&Rep_id=$rep_phno&b_sim=$sim_no&pri_no=$pri_no&imu=$imu&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";

        $agi-> verbose("url: ".$url);
        system("curl $url");

	/*       $agi-> verbose("*********** count = ".$count);

//              $agi->exec('Playback','/etc/asterisk/VoiceFile');
//              $agi->exec('Record','$voiceFilepath:wav');
                $agi->exec('Monitor','$voiceFilepath');
//              $AGI->record_file('/tmp/test', 'wav', '#', '5000', '0', 1, '2');

//              $agi->exec('Voicemail','1000');
                $agi->Hangup();
       */
 }

mysql_close($con);
?>
