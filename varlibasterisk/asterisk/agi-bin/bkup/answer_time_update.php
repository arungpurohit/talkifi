#!/usr/bin/php
<?php
	include_once("phpagi-2.14/phpagi.php");
	$agi = new AGI();
	include("dbhandeler.php");
	date_default_timezone_set('Asia/Calcutta');
	$uniqueid = $argv[1];
	$filePath = $argv[2];
	$agent_no = $argv[3];
	$query = "update call_log set status='ANSWERED',answer_time = now(), file_path = '$filePath'  where agent_mobile='$agent_no' and unique_id = '$uniqueid'";
	$agi-> verbose("select query: ".$query);
	$result3 = mysql_query($query) or die(mysql_error());
mysql_close($con); 	
?>
