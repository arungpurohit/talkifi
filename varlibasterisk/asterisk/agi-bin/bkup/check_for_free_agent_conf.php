#!/usr/bin/php
<?php
        include_once("phpagi-2.14/phpagi.php");
        $agi = new AGI();
	include("dbhandeler.php");
        $uniqueid = $agi->request['agi_uniqueid'];
       	$pri_no = $argv[1];
       	$customer_no = $argv[2];
        $Date = date('Ymd');

        $agi->verbose("ID = ".$uniqueid);
        $part=substr($uniqueid,0,10);
        $voiceFilepath="/var/www/html/RECORDINGS//inbound/".$Date."/".$customer_no."_".$part.".wav";
        $agi->set_variable('uniqId',$uniqueid);
	$agi->set_variable('voiceFile',"/var/www/html/RECORDINGS//inbound/".$Date."/".$customer_no."_".$part.".wav");
	
	
	
  // this query to select the agent no, the  one who already spoked with the customer having number customer no.
	//$agi-> verbose("+++++++++++++++++SIP entered+++++++++++++++++++++++++");
	$select_agent="select sl_no,agent_mobile,file_path from call_log where customer_no='$customer_no' and terminate!=1 and pri_no like '%$pri_no%' and file_path like '%RECORDING%'  order by sl_no desc limit 1";
        $agi-> verbose("select query: ".$select_agent);
        $agent_result = mysql_query($select_agent) or die(mysql_error());
        $agent_count = mysql_num_rows($agent_result);
        //if agent no is present
        if($agent_count > 0)
        {
           if($agent_row = mysql_fetch_array($agent_result))
           {
                        $sl_no = $agent_row[0];
                        $agent_mobile = $agent_row[1];
			$file_path = $agent_row[2];
			$channel= "DAHDI/G0";
                        $agi->set_variable('file_path',$file_path);
                        $agi->set_variable('SL_NO',$sl_no);
			$agi->set_variable('CHANNELs',$channel);
            }

      // this query to check is that agent is free. 
		$agent_query = "select sl_no,agent_mobile,sim_no from master_table where pri_no like '%$pri_no%' and status = 'FREE' and agent_mobile='$agent_mobile'   LIMIT 1";
        $agi-> verbose("select agent query: ".$agent_query);
        $agent_result1 = mysql_query($agent_query) or die(mysql_error());
        $count = mysql_num_rows($agent_result1);
        $agi-> verbose("count agent = ".$count);
			if($count > 0)
			{
			   if($row = mysql_fetch_array($agent_result1))
			   {
					$sl_no = $row[0];
					$agent_mobile = $row[1];
					$sim_no=$row[2];
					
					$channel= "DAHDI/G0";
					$agi->set_variable('VAR',$agent_mobile);
					$agi->set_variable('SL_NO',$sl_no);
					$agi->set_variable('CHANNELs',$channel);
	
					$query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
			   //     $agi-> verbose("select query: ".$query);
					$result1 = mysql_query($query) or die(mysql_error());
	
					$query = "insert into call_log (unique_id,sim_no, pri_no,agent_mobile,  customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_mobile',  '$customer_no',now(),now())";
					$agi-> verbose("select query: ".$query);
					$result2 = mysql_query($query) or die(mysql_error());
				}
			}
			else
			{
				$agentmap_query = "select new_repnumber from map_repnumbers where old_repnumber = '$agent_mobile' order by map_id desc  LIMIT 1";
				$agi-> verbose("select agent map query: ".$agentmap_query);
				$agentmap_result = mysql_query($agentmap_query) or die(mysql_error());
				$count_map = mysql_num_rows($agentmap_result);
				if($count_map > 0)
				{
					
					if($row_map = mysql_fetch_array($agentmap_result))
				   	{
						$repno_mapped = $row_map[0];
					}
					// this query to check is that agent is free. 
					$newagent_query = "select sl_no,agent_mobile,sim_no from master_table where pri_no like '%$pri_no%' and status = 'FREE' and agent_mobile='$repno_mapped'   LIMIT 1";
						$agi-> verbose("select new agent mapped query: ".$newagent_query);
						$newagent_result1 = mysql_query($newagent_query) or die(mysql_error());
						$newcount = mysql_num_rows($newagent_result1);
					   $agi-> verbose("count new agent = ".$newcount);
						 if($newcount > 0)
						{
						   if($newrow = mysql_fetch_array($newagent_result1))
						   {
								$sl_no = $newrow[0];
								$agent_mobile = $newrow[1];
								$sim_no=$newrow[2];
								
								$channel= "DAHDI/G0";
								$agi->set_variable('VAR',$agent_mobile);
								$agi->set_variable('SL_NO',$sl_no);
								$agi->set_variable('CHANNELs',$channel);
									
								$query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
						   //     $agi-> verbose("select query: ".$query);
								$result1 = mysql_query($query) or die(mysql_error());
				
								$query = "insert into call_log (unique_id,sim_no, pri_no,agent_mobile,  customer_no, request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$agent_mobile',  '$customer_no',now(),now())";
								$agi-> verbose("select query: ".$query);
								$result2 = mysql_query($query) or die(mysql_error());
							}
						}else{
							$query = "insert into call_log (unique_id,sim_no,pri_no,agent_mobile,customer_no,status,request_time, dial_time) values('$uniqueid','$sim_no', '$pri_no', '$repno_mapped',  '$customer_no','BUSY',now(),now())";
                                                        $agi-> verbose("select query: ".$query);
                                                        $result2 = mysql_query($query) or die(mysql_error());
							$agi->hangup();	
						      }
				}
			}
      	}
        else
        {
       $agent_query = "select sl_no,agent_mobile,sim_no from master_table where pri_no like '%$pri_no%'   and status = 'FREE'  order by call_time,priority  LIMIT 1";
        $agi-> verbose("select agent query: ".$agent_query);
        $agent_result1 = mysql_query($agent_query) or die(mysql_error());
        $count = mysql_num_rows($agent_result1);
      //  $agi-> verbose("count agent = ".$count);
        if($count > 0)
        {
           if($row = mysql_fetch_array($agent_result1))
           {
                $sl_no = $row[0];
                $agent_mobile = $row[1];
                $sim_no=$row[2];
				
		$channel= "DAHDI/G0";
    //            $agi-> verbose("Agent No: ".$agent_mobile);
                $agi->set_variable('VAR',$agent_mobile);
                $agi->set_variable('SL_NO',$sl_no);
		$agi->set_variable('CHANNELs',$channel);

                $query = "update master_table set status = 'BUSY', call_time=".time()."  where sl_no = $sl_no";
  //              $agi-> verbose("select query: ".$query);
                $result1 = mysql_query($query) or die(mysql_error());

                $query = "insert into call_log (unique_id,sim_no, pri_no,customer_no, request_time, dial_time,agent_mobile) values('$uniqueid','$sim_no', '$pri_no',  '$customer_no',now(),now(),'$agent_mobile')";
				
//                $agi-> verbose("select query: ".$query);
                $result2 = mysql_query($query) or die(mysql_error());
            }
        }
	}
	
	


mysql_close($con);
?>
