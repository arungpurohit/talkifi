#!/usr/bin/php
<?php
	include_once("phpagi-2.14/phpagi.php");
	$agi = new AGI();
	include("dbhandeler.php");
	$uniqueid = $argv[1];
	$agi->verbose("ID = ".$uniqueid);
	$query = "select customer_no,agent_mobile,sim_no,file_path,duration,pri_no,status from call_log where unique_id = '$uniqueid' and file_path like '%RECORDINGS%'  order by sl_no desc limit 0,1";
        $agi-> verbose("select query: ".$query);
        $result1 = mysql_query($query) or die(mysql_error());
	
	
        $count = mysql_num_rows($result1);
        $agi-> verbose("count = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($result1))
           {
		$customer_phno = $row['customer_no'];
                $rep_phno = $row['agent_mobile'];
                $sim_no=$row['sim_no'];
                $voice_path = $row['file_path'];
                $call_duration = $row['duration'];
                $pri_no = $row['pri_no'];
                $status = $row['status'];
		
		$agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/sancity/inbound/".$Date."/".$customer_no."_".$part.".wav");
            }

	}
else
	{
	$query = "select customer_no,agent_mobile,sim_no,file_path,duration,pri_no,status from call_log where unique_id = '$uniqueid' order by sl_no ASC limit 0,1";
	$agi-> verbose("select query: ".$query);
	$result = mysql_query($query) or die(mysql_error());

	$customer_phno = '';
        $rep_phno = '';
	$sim_no = '';
        $voice_path = '';
        $call_duration = '';
	$url = '';

	if($row = mysql_fetch_array($result))
	{
		$customer_phno = $row['customer_no'];
                $rep_phno = $row['agent_mobile'];
                $sim_no=$row['sim_no'];
                $voice_path = $row['file_path'];
                $call_duration = $row['duration'];
                $pri_no = $row['pri_no'];
                $status = $row['status'];

		$agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/sancity/inbound/".$Date."/".$customer_no."_".$part.".wav");

	}
}
		$url = "\"http://localhost/auto_dialout/sancity/inbound/tkt_insert.php?customer_phno=$customer_phno&rep_phno=$rep_phno&sim_no=$sim_no&pri_no=$pri_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";
                $agi-> verbose("url: ".$url);
                system("curl $url");

mysql_close($con); 	
?>
