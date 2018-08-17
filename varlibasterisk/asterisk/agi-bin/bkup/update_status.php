#!/usr/bin/php
<?php
        include_once("phpagi-2.14/phpagi.php");
        $agi = new AGI();
	include("dbhandeler.php");
        $uniqueid = $agi->request['agi_uniqueid'];
        $uniqueid = $argv[1];
	$status = $argv[2];
	$agent_no= $argv[3];
       	$query = "update call_log set status='$status' where agent_no='$agent_no' and unique_id='$uniqueid'"; 
       	$agi-> verbose("select query: ".$query);
      	$result2 = mysql_query($query) or die(mysql_error());
      	mysql_close($con);
?>
