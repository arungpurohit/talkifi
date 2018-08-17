#!/usr/bin/php
<?php
	include_once("phpagi-2.20/phpagi.php");
	$agi = new AGI();
	date_default_timezone_set('Asia/Calcutta');
	$uniqueid = '';
	$uniqueid = $argv[1];
	$sl_no = $argv[2];

	$agi->verbose("ID = ".$uniqueid);


$host = "localhost";
$username = "root";
$password = "mypass";
$database = "asterisk";

	$con = mysql_connect($host,$username,$password);
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db($database);
	
	$query = "update master_table set status = 'FREE' where sl_no = '$sl_no'";
	$agi-> verbose("select query: ".$query);
	$result3 = mysql_query($query) or die(mysql_error());

	$query_dur = "update call_log set disconnect_time = now(),duration = TIME_TO_SEC(timediff(now(),answer_time)) where unique_id = '$uniqueid'";
	$agi-> verbose("select query: ".$query_dur);
	$result4 = mysql_query($query_dur) or die(mysql_error());
	
	$query_up = "update  call_log set duration=1 where status='ANSWERED' and duration=0 and file_path!='' and unique_id = '$uniqueid'";
	$agi-> verbose("select query: ".$query_up);
        $result4 = mysql_query($query_up) or die(mysql_error());

	//$query = "update call_log set  unique_id = '$uniqueid' where sl_no = $sl_no";
        //$agi-> verbose("select query: ".$query);
        //$result5 = mysql_query($query) or die(mysql_error());

mysql_close($con); 	
?>
