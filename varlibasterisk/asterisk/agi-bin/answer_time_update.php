#!/usr/bin/php
<?php
	include_once("phpagi-2.20/phpagi.php");
	$agi = new AGI();
	date_default_timezone_set('Asia/Calcutta');
	$uniqueid = $argv[1];
	$filePath = $argv[2];
	$agent_no = $argv[3];

	$agi->verbose("ID = ".$uniqueid);
	$agi->verbose("file_path = ".$filePath);

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
	
        $query = "update call_log set status='ANSWERED' where agent_no= '$agent_no' and  unique_id = '$uniqueid'";
        $agi-> verbose("select query: ".$query);
        $result1 = mysql_query($query) or die(mysql_error());

	$query = "update call_log set answer_time = now(), file_path = '$filePath'  where agent_no= '$agent_no' and unique_id = '$uniqueid'";
	$agi-> verbose("select query: ".$query);
	$result3 = mysql_query($query) or die(mysql_error());
mysql_close($con); 	
?>
