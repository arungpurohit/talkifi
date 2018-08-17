#!/usr/bin/php
<?php
	include_once("phpagi-2.14/phpagi.php");
	$agi = new AGI();
	include("dbhandeler.php");
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
	$agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/sancity/inbound/".$Date."/".$customer_no."_".$part.".wav");
	$query = "select map_id,new_repnumber from map_repnumbers where pri_no = '$pri_no'  and newrep_name='admin'";
	$agi-> verbose("select query: ".$query);
	$result1 = mysql_query($query) or die(mysql_error());

	$count = mysql_num_rows($result1);
        $agi-> verbose("count = ".$count);
        if($count > 0)
        {
	    if($row = mysql_fetch_array($result1))
	    {
		$sl_no = $row[0];
		$agent_mobile = $row[1];
		$sim_no = $row[2];
     		$agi-> verbose("Agent No: ".$agent_mobile);
		$agi->set_variable('admin_no',$agent_mobile);
		$agi->set_variable('SL_NO',$sl_no);


		$query = "insert into call_log (unique_id, pri_no,agent_mobile, customer_no,request_time, dial_time,status,sim_no,terminate) values('$uniqueid', '$pri_no', '$agent_mobile', '$customer_no',now(),now(),'$status','$sim_no','1')";
		$agi-> verbose("select query: ".$query);
		$result2 = mysql_query($query) or die(mysql_error());

		$query = "update master_table set status = 'FREE' where sl_no = $sl_no_old";
//		$agi-> verbose("select query: ".$query);
		$result1 = mysql_query($query) or die(mysql_error());
	   }
	}
	else
	{
		//$agi->exec('Voicemail','1000');
                $agi-> Hangup();
	}
mysql_close($con); 	
?>
