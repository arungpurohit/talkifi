#!/usr/bin/php
<?php
	include_once("phpagi-2.14/phpagi.php");
	$agi = new AGI();
	include("dbhandeler.php");
	$uniqueid = '';
	$uniqueid = $argv[1];
	$sl_no = $argv[2];
	$agi->verbose("ID = ".$uniqueid);
	$query = "update master_table set status = 'FREE' where sl_no = '$sl_no'";
//	$agi-> verbose("select query: ".$query);
	$result2 = mysql_query($query) or die(mysql_error());

	$query = "update call_log set disconnect_time = now(),duration = TIME_TO_SEC(timediff(now(),answer_time)) where unique_id = '$uniqueid'";
	$agi-> verbose("select query: ".$query);
	$result4 = mysql_query($query) or die(mysql_error());
	
	$query = "update call_log set status='CANCEL' where status=''";
        //$agi-> verbose("select query: ".$query);
        $result5 = mysql_query($query) or die(mysql_error());

mysql_close($con); 	
?>
