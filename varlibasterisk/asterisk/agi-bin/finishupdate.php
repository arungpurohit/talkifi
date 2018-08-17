#!/usr/bin/php
<?php
	include_once("phpagi-2.20/phpagi.php");
	$agi = new AGI();
	date_default_timezone_set('Asia/Calcutta');
	$uniqueid = $argv[1];
//	$pri_no = $argv[2];
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
	        $query = "select customer_no,agent_no,sim_no,file_path,duration,pri_no,status from call_log where unique_id = '$uniqueid' and file_path like '%RECORDING%'  order by sl_no desc limit 0,1";
        $agi-> verbose("select query: ".$query);
        $result1 = mysql_query($query) or die(mysql_error());


        $count = mysql_num_rows($result1);
        $agi-> verbose("count = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($result1))
           {
                $customer_phno = $row[0];
                $rep_phno = $row[1];
                $sim_no=$row[2];
                $voice_path = $row[3];
                $call_duration = $row[4];
                $pri_no = $row[5];
                $status = $row[6];

                $agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/RECORDINGS/asterisk_RECORDINGS/".$Date."/".$customer_no."_".$part.".wav");
            }

        }
else
        {

	$query = "select customer_no,agent_no,sim_no,file_path,duration,pri_no,status from call_log where unique_id = '$uniqueid' order by sl_no ASC limit 0,1";
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
		$customer_phno = $row[0];
		$rep_phno = $row[1];
		$sim_no=$row[2];
		$voice_path = $row[3];
		$call_duration = $row[4];	
		$pri_no = $row[5];
		$status = $row[6];
		$agi->set_variable('voiceFile',"/var/www/html/RECORDINGS/asterisk_RECORDINGS/".$Date."/".$customer_no."_".$part.".wav");
	}	
	}

/*	$url = "\"http://localhost/cti/tktinsert.php?customer_phno=$customer_phno&rep_phno=$rep_phno&sim_no=$sim_no&pri_no=$pri_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";*/

/*$url= "\"http://talkifi.com/talkifidemo/responsecti/cti_response.php?customer_no=$customer_phno&Rep_id=$rep_phno&b_sim=$sim_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";
*/
/* $url= "\"http://talkifi.com/demotalkifi/responsecti/cti_response.php?customer_no=$customer_phno&Rep_id=$rep_phno&b_sim=$sim_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";
*/
	$url= "\"http://talkifi.com/staging/responsecti/cti_response.php?customer_no=$customer_phno&Rep_id=$rep_phno&b_sim=$sim_no&pri_no=$pri_no&voice_path=$voice_path&call_duration=$call_duration&status=$status&unique_id=$uniqueid\"";

	$agi-> verbose("url: ".$url);
	system("curl $url");
	

mysql_close($con); 	
?>
