<?php

class Tasks_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
public function js2PhpTime($jsdate){
$ret="";
  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
    $ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
    //echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
    $ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
    //echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }
  return $ret;
}

public function php2JsTime($phpDate){
    //echo $phpDate;
    //return "/Date(" . $phpDate*1000 . ")/";
    return date("m/d/Y H:i", $phpDate);
}

public function php2MySqlTime($phpDate){
    return date("Y-m-d H:i:s", $phpDate);
}

public function mySql2PhpTime($sqlDate){
    $arr = date_parse($sqlDate);
    return mktime($arr["hour"],$arr["minute"],$arr["second"],$arr["month"],$arr["day"],$arr["year"]);

}
	
	public function listCalendar(){
	
	  $day=$this->input->post('showdate');
	  $type=$this->input->post('viewtype');
	 
	  
	  $phpTime = $this->js2PhpTime($day);
	  //echo $phpTime . "+" . $type;
	  switch($type){
		case "month":
		  $st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
		  $et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));
		  break;
		case "week":
		  //suppose first day of a week is monday 
		  $monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
		  //echo date('N', $phpTime);
		  $st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
		  $et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));
		  break;
		case "day":
		  $st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
		  $et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));
		  break;
	  }

  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = $this->php2JsTime($st);
  $ret["end"] = $this->php2JsTime($et);
  $ret['error'] = null;
  try{
    
	$this->db->select('*');
	$this->db->from('tasks');
	$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
	$this->db->where('event_status',1);
	$this->db->where("StartTime between '".$this->php2MySqlTime($st)."' and '".$this->php2MySqlTime($et)."'");		
	$query=$this->db->get();  
    foreach ($query->result() as $row)
   	{
      //$ret['events'][] = $row;
      //$attends = $row->AttendeeNames;
      //if($row->OtherAttendee){
      //  $attends .= $row->OtherAttendee;
      //}
      //echo $row->StartTime;
      $ret['events'][] = array(
        $row->Id,
        $row->Subject,
        $this->php2JsTime($this->mySql2PhpTime($row->StartTime)),
        $this->php2JsTime($this->mySql2PhpTime($row->EndTime)),
        $row->IsAllDayEvent,
        0, //more than one day event
        //$row->InstanceType,
        0,//Recurring event,
        $row->Color,
        1,//editable
        $row->Location, 
        ''//$attends
      );
    }
	}catch(Exception $e){
     $ret['error'] = $e->getMessage();
  }
  return $ret;
}

	public function listCalendarById($Id)
	{
		
	$ret = array();
 	$ret['events'] = array();
  	$ret["issort"] =true;
	$ret['error'] = null;
  try{
	$this->db->select('*');
	$this->db->from('tasks');
	$this->db->where('cmp_unique_id',$this->user->cmp_unique_id);
	$this->db->where('event_status',1);
	$this->db->where('Id',$Id);
	$query=$this->db->get();  
    foreach ($query->result() as $row)
   	{
	
	 $sarr = explode(" ", $this->php2JsTime($this->mySql2PhpTime($row->StartTime)));
     $earr = explode(" ", $this->php2JsTime($this->mySql2PhpTime($row->EndTime)));
      $ret = array(
        'id' => $row->Id,
        'subject' =>$row->Subject,
        'stdate'=>$sarr[0],
		'sttime'=>$sarr[1],
		'etdate'=>$earr[0],
		'ettime'=>$earr[1],
        'ade'=>$row->IsAllDayEvent,
        'reerule'=>0, //more than one day event
        //$row->InstanceType,
        'recrule'=>0,//Recurring event,
        'color'=>$row->Color,
        'editable'=>1,//editable
        'location'=>$row->Location, 
		'desc' =>$row->Description,
        'attends'=>'',//$attends
		'reps'=>$row->assigned_to,
		'group_id' =>$row->assigned_group,
		'reference_field'=>$row->reference_field,
		'refrence_value'=>$row->reference_value,
		'reminder_via'=>$row->reminder_via,
		'reminder_when'=>$row->reminder_when 
      );
    }
	}catch(Exception $e){
     $ret['error'] = $e->getMessage();
  }
  return $ret;
					
	}

	
 public function insertTasks()
 {
  $ret = array();
  try{
   	  $st = $this->input->post('stpartdate')." ".$this->input->post('stparttime');
   	  $et = $this->input->post('etpartdate')." ".$this->input->post('etparttime');
	  $ade1 = $this->input->post('IsAllDayEvent');
	  $ade = isset($ade1)?1:0;
	  
	  
	  $reminder_via = $this->input->post('reminder_via');
	   $reminder_via =  implode(',', $reminder_via);
	  
	  $data = array(
		  'Subject' => $this->input->post('Subject'),
		  'Location' =>$this->input->post('Location'),
		  'Description' =>$this->input->post('Description'),
		  'StartTime' =>$this->php2MySqlTime($this->js2PhpTime($st)),
		  'EndTime' =>$this->php2MySqlTime($this->js2PhpTime($et)),
		  'IsAllDayEvent' => $ade,
		  'color' =>$this->input->post('colorvalue'),
		  'created_by'=> $this->user->id,
		  'created_date'=>time(),
		  'assigned_to'=>$this->input->post('reps'),
		  'assigned_group'=>$this->input->post('groupid'), 	
		  'reference_field'=>$this->input->post('referencefid'),
		  'reference_value'=>$this->input->post('refeval'),
		  'reminder_via'=>$reminder_via,
		  'reminder_when'=>$this->input->post('remainderwhen'),
		  'cmp_unique_id' =>$this->user->cmp_unique_id
	  );	  
	
	
	$this->db->insert('tasks',$data);
	$returnid = $this->db->insert_id();  

		if(!isset($returnid)){
    	  $ret['IsSuccess'] = false;
	      $ret['Msg'] = mysql_error();
    	}else{
	      $ret['IsSuccess'] = true;
    	  $ret['Msg'] = 'add success';
	      $ret['Data'] = mysql_insert_id();
    	}
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;

 }
 
 
 public function quickInsertTasks()
 {
  $ret = array();
  try{
   	  $st = $this->input->post('CalendarStartTime');
   	  $et = $this->input->post('CalendarEndTime');
	  $ade1 = $this->input->post('IsAllDayEvent');
	  $ade = isset($ade1)?1:0;
	  
	  $data = array(
		  'Subject' => $this->input->post('CalendarTitle'),
		  'StartTime' =>$this->php2MySqlTime($this->js2PhpTime($st)),
		  'EndTime' =>$this->php2MySqlTime($this->js2PhpTime($et)),
		  'IsAllDayEvent' => 0,
		  'created_by'=> $this->user->id,
		  'created_date'=>time(),
		  'cmp_unique_id' =>$this->user->cmp_unique_id
	  );	  
	
	$this->db->insert('tasks',$data);
	$returnid = $this->db->insert_id();  
    //echo($sql);
		if(!isset($returnid)){
    	  $ret['IsSuccess'] = false;
	      $ret['Msg'] = mysql_error();
    	}else{
	      $ret['IsSuccess'] = true;
    	  $ret['Msg'] = 'add success';
	      $ret['Data'] = mysql_insert_id();
    	}
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
 }
 
 
 public function updateTasks()
 {
  $ret = array();
  try{
   	  $st = $this->input->post('ustpartdate')." ".$this->input->post('ustparttime');
	  $et = $this->input->post('uetpartdate')." ".$this->input->post('uetparttime');
	  
	   $reminder_via = $this->input->post('ureminder_via');
	   $reminder_via =  implode(',', $reminder_via);
	  
	  $ade1 = $this->input->post('uIsAllDayEvent');
	  $ade = isset($ade1)?1:0;
	
	$modified_date = time();
	  $data = array(
		  'Subject' => $this->input->post('uSubject'),
		  'Location' =>$this->input->post('uLocation'),
		  'Description' =>$this->input->post('uDescription'),
		  'StartTime' =>$this->php2MySqlTime($this->js2PhpTime($st)),
		  'EndTime' =>$this->php2MySqlTime($this->js2PhpTime($et)),
		  'IsAllDayEvent' => $ade,
		  'modified_date' =>$modified_date,
		  'assigned_to'=>$this->input->post('ureps'),
		  'assigned_group'=>$this->input->post('ugroupid'), 	
		  'reference_field'=>$this->input->post('ureferencefid'),
		  'reference_value'=>$this->input->post('urefeval'),
		  'reminder_via'=>$reminder_via,
		  'reminder_when'=>$this->input->post('uremainderwhen'),
		  'color' =>$this->input->post('ucolorvalue'),
	);
	$returnid = $this->db->update( 'tasks', $data, array( 'Id' => $this->input->post( 'uId', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );	
    //echo($sql);
		if(!isset($returnid)){
    	  $ret['IsSuccess'] = false;
	      $ret['Msg'] = mysql_error();
    	}else{
	      $ret['IsSuccess'] = true;
    	  $ret['Msg'] = 'add success';
	      $ret['Data'] = mysql_insert_id();
    	}
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;

 }

public function dateTimeUpdate()
{
	$ret = array();
	$modified_date = time();
  	try{
   	  $st = $this->input->post('CalendarStartTime');
   	  $et = $this->input->post('CalendarEndTime');
	 $data = array(
		  'StartTime' =>$this->php2MySqlTime($this->js2PhpTime($st)),
		  'EndTime' =>$this->php2MySqlTime($this->js2PhpTime($et)),
		  'modified_date' =>$modified_date
	);
	$returnid = $this->db->update( 'tasks', $data, array( 'Id' => $this->input->post( 'calendarId', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );	
    
		if(!isset($returnid)){
			  $ret['IsSuccess'] = false;
			  $ret['Msg'] = mysql_error();
		}else{
			  $ret['IsSuccess'] = true;
			  $ret['Msg'] = 'add success';
		}
	}
	catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}
 
 public function deleteTasks()
 {
	$modified_date = time();
	$data = array(
		'modified_date' =>$modified_date,
		'event_status'=>0,
	);
	$returnid = $this->db->update( 'tasks', $data, array( 'Id' => $this->input->post( 'calendarId', true ),'cmp_unique_id' => $this->user->cmp_unique_id ) );	
	
	if(!isset($returnid)){
     	$ret['IsSuccess'] = false;
	   	$ret['Msg'] = mysql_error();
    }else{
		$ret['IsSuccess'] = true;
    	$ret['Msg'] = 'Succefully';
	}
	return $ret;
 }
 	
}

?>