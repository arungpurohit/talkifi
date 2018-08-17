#!/usr/bin/php
<?php
	include_once("phpagi-2.20/phpagi.php");
	$agi = new AGI();
	date_default_timezone_set('Asia/Calcutta');
	$uniqueid = $agi->request['agi_uniqueid'];
	$pri_no = $argv[1];
	$customer_no = $argv[2];
	$sl_no_old = $argv[3];
	$status = $argv[4];
	$Date = date('Ymd');

	$agi->verbose("ID = ".$uniqueid);
	$part=substr($uniqueid,0,10);
	$agi->verbose("pri_no = ".$pri_no);	
	$agi->verbose("customer no =  ".$customer_no);
	$agi->verbose("part =  ".$part);

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

	$query = "select sl_no,agent_no,sim_no from master_table where pri_no = '$pri_no' and status = 'FREE' and agent_no not in (select agent_no from call_log where unique_id='$uniqueid' )  order by call_time,priority  LIMIT 1";
//	$agi-> verbose("select query: ".$query);
	$result1 = mysql_query($query) or die(mysql_error());

	$count = mysql_num_rows($result1);
        $agi-> verbose("count = ".$count);
        if($count > 0)
        {
	    if($row = mysql_fetch_array($result1))
	    {
		$sl_no = $row[0];
		$agent_no = $row[1];
		$sim_no = $row[2];
     		$agi-> verbose("Agent No: ".$agent_no);
		$agi->set_variable('agent_no',$agent_no);
		$agi->set_variable('SL_NO',$sl_no);

		$query = "update master_table set status = 'BUSY',call_time=".time()." where sl_no = $sl_no";
		$agi-> verbose("select query: ".$query);
		$result1 = mysql_query($query) or die(mysql_error());




	/*	 $query = "update call_log set pri_no='$pri_no' , agent_no = '$agent_no' , customer_no = '$customer_no', request_time = now(), dial_time = now(), status = '$status'    where unique_id = '$uniqueid'";
                $agi-> verbose("select query: ".$query);
                $result4 = mysql_query($query) or die(mysql_error());*/

	$query = "insert into call_log (unique_id, pri_no,agent_no, customer_no, request_time, dial_time,status,sim_no) values('$uniqueid', '$pri_no', '$agent_no', '$customer_no',now(),now(),'$status','$sim_no')";
		$agi-> verbose("select query: ".$query);
		$result2 = mysql_query($query) or die(mysql_error());

//here is new query inserted
 $customer_phno = $customer_no;
 $rep_phno = $agent_no;
 $sim_no=$sim_no;
 $voice_path = '';
 $call_duration ='';
 $pri_no = $pri_no;
 $status = "NEXTAGENT";

        $url= "\"http://talkifi.com/staging/responsecti/cti_response.php?customer_no=$customer_phno&Rep_id=$rep_phno&b_sim=$sim_no&pri_no=$pri_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";

        $agi-> verbose("url: ".$url);
        system("curl $url");



		$query = "update master_table set status = 'FREE' where sl_no = $sl_no_old";
//		$agi-> verbose("select query: ".$query);
		$result1 = mysql_query($query) or die(mysql_error());
	   }
	}
	else
	{
		$agi->exec('Voicemail','1000');
                $agi-> Hangup();
	}
mysql_close($con); 	
?>
