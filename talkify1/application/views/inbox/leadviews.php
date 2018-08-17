<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
			<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

                <h2>Lead # :<?php echo $leadsArray['lead_unique_id']?>&nbsp;&nbsp; Owner: <?php echo $leadsArray['rep_id']?>&nbsp;&nbsp; Creation Date: <?php echo date("Y-m-d",$leadsArray['lead_creation_date']);?>&nbsp;&nbsp; < Previous | Next  >
				<div id="faddbtn" class="fbutton" align="right">
					<div><span title='Click to Create New Event' class="addcal">
				    		New Event               
						</span></div>
					</div>
				</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>
	<form method="post" action="" name="leadsview" id="leadsview">
	<input type="hidden" value="<?php echo $leadsArray['client_id'];?>" name="client_id" id="client_id"/>
	<input type="hidden" value="<?php echo $leadsArray['client_email'];?>" name="client_respond_email" id="client_respond_email"/>
	<input type="hidden" value="<?php echo $leadsArray['subject'];?>" name="subject" id="subject"/>
	<input type="hidden" value="<?php echo $leadsArray['lead_unique_id']?>" name="lead_id" id="lead_id"/>
<div id="tabs">
    <ul>
		<li><a href="#leadview">Lead View <?php echo $leadsArray['lead_unique_id']?></a></li>	
		<li><a href="#notes">Notes</a></li>
        <li><a href="#read">Other Leads</a></li>
		<li><a href="#clienthistory">Client Histroy</a></li>
		<li><a href="#events">Events</a></li>
    </ul>
<div id="leadview">
<table width="100%" >
  <tr>
  <?php /*?><td width="64%">
		<h6>Lead Info</h6>
		<table width="100%" >
  <tr>
    <td width="11%">Status :</td>
    <td width="26%"><b> <?php echo form_dropdown('status',$status,$leadsArray['lead_status_id']);?></b></td>
    <td width="4%">&nbsp;</td>
	<td>Assigned by: </td>
    <td><b><?php echo $leadsArray['rep_id']?></b></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><b> <?php echo form_dropdown('category',$category,$leadsArray['lead_category_id']);?></b></td>
    <td>&nbsp;</td>
     <td width="17%">Assigned To :</td>
    <td width="42%"><b><?php echo form_dropdown('assigned_to',$assigned_to,$leadsArray['rep_id']);?></b></td>
  </tr>
  <tr>
    <td>Priority</td>
    <td><b> <?php echo form_dropdown('priority',$priority,$leadsArray['lead_priority_id']);?></b></td>
    <td>&nbsp;</td>
    <td>Assigned Date :</td>
    <td><b><?php echo date("Y-m-d",$leadsArray['lead_creation_date']);?></b></td>
  </tr>
  <tr>
    <td>Type</td>
    <td><b> <?php echo form_dropdown('types',$types,$leadsArray['lead_status_id']);?></b></td>
    <td>&nbsp;</td>
    <td>Last Modified Date :</td>
    <td><b><?php echo date("Y-m-d",$leadsArray['lead_creation_date']);?></b></td>
  </tr>
  <tr>
  <td>Channel</td>
    <td><b> <?php echo form_dropdown('channels',$channels,$leadsArray['lead_channel_id']);?></b></td>
    
    <td>&nbsp;</td>
    <td>Voice Log</td>
    <td>
	<?php //echo $row['voicelog'];
	if($leadsArray['voice_path']!=""){
	 $path=str_replace("/var/www/html",'',$leadsArray['voice_path']);
	 $thevoicelog="http://122.166.244.33".$path;
	//$thevoicelog="http://122.166.244.33/RECORDINGS/asterisk_RECORDINGS/20130202/919620388336_1359822684.wav";
		if($thevoicelog!=''){ //echo $thevoicelog;?>
		&nbsp;
		<audio controls="controls" tabindex="0">
		<source type="audio/wav" src="<?php echo $thevoicelog;?>"></source>
		<source type="audio/mpeg" src="myMovie.mp4"></source>
		<source type="audio/ogg" src="myMovie.oga"></source>
		<source type="audio/mp3" src="myMovie.dvx"></source>
	 	</audio>
		<?php 
			}
		}	
		?>
	</td>
  </tr>
  <tr>
  <td>Due by</td>
    <td><?php echo date("Y-m-d",$leadsArray['due_by']);?></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
     <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Subject: </td>
    <td colspan="3"><b><?php echo $leadsArray['subject']?></b></td>
     </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr`>
    <td>Text : </td>
     <td colspan="8"> <textarea name="msgBody" class="tinymce">
			 <b><?php echo $leadsArray['msgthreads']?></b>
	 </textarea>
	 </td>
  </tr>
  
</table>
	</td><?php */?>
  <td width="36%"><h6>Client Info</h6>
			<table width="100%" border="1"> 
		  <tr>
			<td>Client Name: </td>
			<td><b><?php echo $leadsArray['client_username']?></b></td>
		  </tr>
		  <tr>
			<td>Client FName :</td>
			<td><b><?php echo $leadsArray['client_fname'];?></b></td>
		  </tr>
		  <tr>
			<td>Client LName :</td>
			<td><b><?php echo $leadsArray['client_lname'];?></b></td>
		  </tr>
		  <tr>
			<td>Client Email:</td>
			<td><b><?php echo $leadsArray['client_email'];?></b></td>
		  </tr>
		  <tr>
			<td>Client Phone : </td>
			<td><b><?php echo $leadsArray['client_phone'];?></b></td>
		  </tr>
		  
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
		  	<td><input type="checkbox" name="uvemail" checked="checked" value="uvemailsend" />Update Client Via Email</td>
			<td><input type="checkbox" name="uvsms" />Update Client Via SMS</td>
		  </tr>
		 
	</table>	
	</td>
  </tr>
  <tr>
                            <td align="center"><input type="submit" name="cmp_submit" class="btn" value="Update"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="Reset"/></td>
                            <td colspan="2">
							</td>
							<td>&nbsp;</td>
                        </tr>
</table>
</form>
</div>
<div id="createNotes" title="Add Note">
        <form action="" method="post" >
         <table width="300" border="1">
  <tr>
    <td align="center"><strong>Internal Notes</strong></td>
    <td>&nbsp;</td>
    <td align="center"><strong>External Notes</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="center"><textarea name="internalnotes" id="internalnotes">
	</textarea></td>
    <td>&nbsp;</td>
    <td align="center"><textarea name="externalnotes" id="externalnotes"></textarea></td>
		<input type="hidden" value="<?php echo $leadsArray['lead_unique_id']?>" name="lead_id_note" id="lead_id_note"/>
  </tr>

</table>
        </form>
</div>

<div id="notes">
<div><a href="javascript: addNotesBtnClick();"> Add New Notes</a></div> 
<?php echo "<br>";?>
	<table width="100%" id="addnotesid">
	<tr>
	<td></td>
    <td><b>Interanal Notes</b></td>
	<td></td>
	<td><b>External Notes</b></td>
	</tr>
	
	<?php $i=1;
 		foreach ($notes_display->result_array() as $r)
		{
	?>
		  <tr>
			<td><?php 
					echo $this->repArray[$r['rep_notes_created_by']];
					echo "<br>";
					?></td>
			<td>
			<?php echo "<br>";
			echo date("Y-m-d h:m:s", $r['rep_notes_created_date']);
			echo "<br>";
			echo $r['rep_internal_note'];?></td>
			<td><?php 
					echo $this->repArray[$r['rep_notes_created_by']];
					echo "<br>";
					?></td>
			<td>
			<?php echo "<br>";
			echo date("Y-m-d h:m:s", $r['rep_notes_created_date']);
			echo "<br>";
			echo $r['rep_external_note'];?>
			</td>
		  </tr>
		  <?php 
		  $i++;		 
			}
		  ?>
	</table>
	</div>
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <td><input type="checkbox" name="checkAllCat" /></td>
                    <th>Lead ID</th>
                    <th>creation Date</th>
                    <th>subject</th>
					<th>Assigned To</th>
					<th>status</th>
					<th>priority</th>
<!--					<th>Voice Log</th>-->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
	<div id="clienthistory">
		<label>Client history</label>
			Client history will goes here
	</div>
	<div id="events">
		<label>Events:</label>
			Events will be shown
	</div>
</div>
<!-- message dialog box -->
<div id="msgDialog"><p></p></div>
<script type="text/template" id="readTemplate">
    <tr id="lead${lead_unique_id}">
        <td><input type="checkbox" name="checkAllCat${lead_unique_id}" /></td>
        <td>${lead_creation_date}</td>
        <td>${subject}</td>
        <td>${rep_id}</td>
		<td>${lead_status_id}</td>
		<td>${lead_priority_id}</td>
		 <td><a class="updateBtn" href="${updateLink}">Update</a> </td>
    </tr>
</script>
<script type="text/javascript" src="js/leadview.js"></script>
	</form>					
										
        </div>
    </div>
            
</div>
 
<link href="cal_css/css/dailog.css" rel="stylesheet" type="text/css" />
    <link href="cal_css/css/calendar.css" rel="stylesheet" type="text/css" /> 
    <link href="cal_css/css/dp.css" rel="stylesheet" type="text/css" />   
    <link href="cal_css/css/alert.css" rel="stylesheet" type="text/css" /> 
    <link href="cal_css/css/main.css" rel="stylesheet" type="text/css" /> 
	<link href="cal_css/css/dropdown.css" rel="stylesheet" />    
    <link href="cal_css/css/colorselect.css" rel="stylesheet" />   
  
  
   <script src="cal_js/src/Plugins/Common.js" type="text/javascript"></script>    
   <!--  <script src="cal_js/src/Plugins/datepicker_lang_US.js" type="text/javascript"></script>  
  	<script src="cal_js/src/Plugins/jquery.datepicker.js" type="text/javascript"></script>
    <script src="cal_js/src/Plugins/jquery.alert.js" type="text/javascript"></script>    
    <script src="cal_js/src/Plugins/jquery.ifrmdailog.js" defer="defer" type="text/javascript"></script>-->
    <script src="cal_js/src/Plugins/wdCalendar_lang_US.js" type="text/javascript"></script>    
    <script src="cal_js/src/Plugins/jquery.calendar.js" type="text/javascript"></script> 
	<script src="cal_js/src/Plugins/jquery.dropdown.js" type="text/javascript"></script>  
    <script src="cal_js/src/Plugins/jquery.colorselect.js" type="text/javascript"></script>  
<script type="text/javascript">
  $(document).ready(function() { 
		
		$("#faddbtn").click(function(e) {
			
			$( '#addTasks form input' ).val( '' );
			$('#addTasks').dialog('open');
                //var url ="index.php/tasks/editList";
                //OpenModelWindow(url,{ width: 500, height: 400, caption: "Create New Calendar"});
            });
           
            
            $('#addTasks').dialog('open');
            
         $('#addTasks').dialog({
	    autoOpen:false,
	  buttons:{
		  'Add Tasks': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
			$.ajax({
                url: 'index.php/tasks/insertTask',
                type: 'POST',
                data: $( '#fmAdd' ).serialize(),
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Clients already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$("#gridcontainer").reload();
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
           $( this ).dialog( 'close' ); 
		},
		  'Cancel' : function(){
				$( this ).dialog('close');
		  }
	  },
	  width:'60%'
	  });  
    
	function Edit(data)
            {
               //var eurl="index.php/tasks/editList";   
                if(data)
                {
					if(data[0]!=0)
					{
						var eventid = data[0];
						$('#uId').val(eventid);
						$.ajax({
           				 url: 'index.php/tasks/getTaskById/' + eventid,
	            		 dataType: 'json',
			             success: function( response ) {
        			       $( '#uSubject' ).val( response.subject);
						   $('#ustpartdate').val(response.stdate);
						   $('#ustparttime').val(response.sttime); 
						   $('#uetpartdate').val(response.etdate); 
						   $('#uetparttime').val(response.ettime);
						   $('#uLocation').val(response.location);
						   $('#uDescription').html(response.desc); 
						   $('#ureps').val(response.reps);
						   $('#ugroupid').val(response.group_id);
						   $('#ureferencefid').val(response.reference_field);
						   $('#urefeval').val(response.refrence_value);
						   $('#uremainderwhen').val(response.reminder_when);
						   if(response.reminder_via==1)
						   {
						   $('#ucheckbox1').attr('checked','checked');
						   }
						   if(response.reminder_via==2)
						   {
						   	$('#ucheckbox2').attr('checked','checked');
						   }
                		   $('#uIsAllDayEvent').val(); 
		                  $( '#editTasks' ).dialog( 'open' );
        		    }
			       });
                }
				else
				{
				 	$( '#addTasks form input' ).val( '' );
					$('#addTasks').dialog('open');
				}
				}
				
            }    
			
			
			$('#editTasks').dialog({
	    autoOpen:false,
	  buttons:{
		  'Update Tasks': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
			$.ajax({
                url: 'index.php/tasks/updateTask',
                type: 'POST',
                data: $( '#fmEdit' ).serialize(),
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Clients already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$("#gridcontainer").reload();
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
           $( this ).dialog( 'close' ); 
		},
		  'Cancel' : function(){
				$( this ).dialog('close');
		  }
	  },
	  width:'60%'
	  });
	
	
	 		var arrT = [];
            var tt = "{0}:{1}";
            for (var i = 0; i < 24; i++) {
                arrT.push({ text: StrFormat(tt, [i >= 10 ? i : "0" + i, "00"]) }, { text: StrFormat(tt, [i >= 10 ? i : "0" + i, "30"]) });
            }
            $("#timezone").val(new Date().getTimezoneOffset()/60 * -1);
            $("#stparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            $("#etparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            /*var check = $("#IsAllDayEvent").click(function(e) {
                if (this.checked) {
                    $("#stparttime").val("00:00").hide();
                    $("#etparttime").val("00:00").hide();
                }
                else {
                    var d = new Date();
                    var p = 60 - d.getMinutes();
                    if (p > 30) p = p - 30;
                    d = DateAdd("n", p, d);
                    $("#stparttime").val(getHM(d)).show();
                    $("#etparttime").val(getHM(DateAdd("h", 1, d))).show();
                }
            });*/

	$("#stpartdate,#etpartdate,#ustpartdate,#uetpartdate").datepicker({ picker: "<button class='calpick'></button>"});        
		    
});
</script>
<div id="addTasks" title="ADD/EDIT  Task">
	<div >            
        <form class="fform" id="fmAdd" method="post"> 
	      <label>                    
            <span>*Subject:</span>                    
            <div id="calendarcolor">
            </div>
            <input MaxLength="200" class="required safe" id="Subject" name="Subject" style="width:85%;" type="text"  />                     
            <input id="colorvalue" name="colorvalue" type="hidden" value="" />                
          </label>                 
          <label>                    
            <span>*Time: </span>                    
            <div>  
              <input MaxLength="10" class="required date" id="stpartdate" name="stpartdate" style="padding-left:2px;width:90px;" type="text"  />              <input MaxLength="5" class="required time" id="stparttime" name="stparttime" style="width:40px;" type="text" />To                       
              <input MaxLength="10" class="required date" id="etpartdate" name="etpartdate" style="padding-left:2px;width:90px;" type="text" />              <input MaxLength="50" class="required time" id="etparttime" name="etparttime" style="width:40px;" type="text" />                                            
              <label class="checkp"> 
                <input id="IsAllDayEvent" name="IsAllDayEvent" type="checkbox" value="" />          All Day Event                      
              </label>                    
            </div>                
          </label>                 
          <label>                    
			Location:
          </label>                   
            <input MaxLength="200" id="Location" name="Location" style="width:95%;" type="text" />                 
          <label>                    
            Remark:
			  </label>                
			<textarea cols="20" id="Description" name="Description" rows="2" style="width:95%; height:70px">
			</textarea>  
			<label>
			Add To Rep Calender:  
			<select name="reps" id="reps">
			<option value="">Please Select</option>
			<?php foreach($reps as $values){?>
					<option value="<?php echo $values['id'];?>"><?php echo $values['username'];?></option>
			<?php }?>
			</select>  </label>                           
			<label>
			<span>Assign to Group</span>
			<select name="groupid" id="groupid">
			 <option value="">Please Select</option>
			<?php foreach($groupsview as $key=>$vals){ ?>
			
			 <option value="<?php echo $vals['id'];?>"><?php echo $vals['name'];?></option>
			  <?php }?>
			</select>
			</label>
			<label>
			Reference Field:
			<select name="referencefid" id="referencefid">
				<option value="">Please Select</option>
				<option value="1">Lead Id</option>
				<option value="2">Client Name</option>
				<option value="3">Rep Name</option>
				<option value="4">Others</option>
			</select>
			Reference Value:
			<input type="text" name="refeval" id="refeval"  />
			</label>		
			<label>
			Remainder Via:
			<input type="checkbox" name="reminder_via[]" id="checkbox1" value="1" /> : SMS
			<input type="checkbox" name="reminder_via[]" id="checkbox2" value="2" /> : Email
			<input type="checkbox" name="reminder_via[]" id="checkbox3" value="3" disabled="disabled"/>  : Call
			</label>		
			<label>
			Remaind Before:
			<select name="remainderwhen" id="remainderwhen">
			<option value="">Please Select</option>
			<option value="5">5min</option>
			<option value="10">10min</option>
			<option value="15">15min</option>
			<option value="30">half an hour</option>
			<option value="60">one hour</option>
			</select>
			</label>			
          <input id="timezone" name="timezone" type="hidden" value="" />           
        </form>         
      </div>
</div>       
 
<div id="editTasks" title="Update  Task">
	<div >            
        <form class="fform" id="fmEdit" method="post"> 
		 <input name="uId" id="uId" type="hidden"/>     
          <label>                    
            <span>                        *Subject:              
            </span>                    
            <div id="calendarcolor">
            </div>
            <input MaxLength="200" class="required safe" id="uSubject" name="uSubject" style="width:85%;" type="text"  />                     
            <input id="ucolorvalue" name="ucolorvalue" type="hidden" value="" />                
          </label>                 
          <label>                    
            <span>*Time:
            </span>                    
            <div>  
              <input MaxLength="10" class="required date" id="ustpartdate" name="ustpartdate" style="padding-left:2px;width:90px;" type="text"  />              <input MaxLength="5" class="required time" id="ustparttime" name="ustparttime" style="width:40px;" type="text" />To                       
              <input MaxLength="10" class="required date" id="uetpartdate" name="uetpartdate" style="padding-left:2px;width:90px;" type="text" />              <input MaxLength="50" class="required time" id="uetparttime" name="uetparttime" style="width:40px;" type="text" />                                            
              <label class="checkp"> 
                <input id="uIsAllDayEvent" name="uIsAllDayEvent" type="checkbox" value="" />          All Day Event                      
              </label>                    
            </div>                
          </label>                 
          <label>                    
			Location:
          </label>                   
            <input MaxLength="200" id="uLocation" name="uLocation" style="width:95%;" type="text" />                 
          <label>                    
            Remark:
			  </label>                
			<textarea cols="20" id="uDescription" name="uDescription" rows="2" style="width:95%; height:70px">
			</textarea> 
			<label>
			Add To Rep Calender:  
			<select name="ureps" id="ureps">
			<option value="">Please Select</option>
			<?php foreach($reps as $values){?>
					<option value="<?php echo $values['id'];?>"><?php echo $values['username'];?></option>
			<?php }?>
			</select>  </label>                           
			<label>
			<span>Assign to Group</span>
			<select name="ugroupid" id="ugroupid">
			 <option value="">Please Select</option>
			<?php foreach($groupsview as $key=>$vals){ ?>
			 <option value="<?php echo $vals['id'];?>"><?php echo $vals['name'];?></option>
			  <?php }?>
			</select>
			</label>
			<label>
			Reference Field:
			<select name="ureferencefid" id="ureferencefid">
				<option value="">Please Select</option>
				<option value="1">Lead Id</option>
				<option value="2">Client Name</option>
				<option value="3">Rep Name</option>
				<option value="4">Others</option>
			</select>
			Reference Value:
			<input type="text" name="urefeval" id="urefeval"  />
			</label>		
			<label>
			Remainder Via:
			<input type="checkbox" name="ureminder_via[]" id="ucheckbox1" value="1" /> : SMS
			<input type="checkbox" name="ureminder_via[]" id="ucheckbox2" value="2" /> : Email
			<input type="checkbox" name="ureminder_via[]" id="ucheckbox3" value="3" disabled="disabled"/>  : Call
			</label>
			
			<label>
			Remaind Before:
			<select name="uremainderwhen" id="uremainderwhen">
			<option value="">Please Select</option>
			<option value="5">5min</option>
			<option value="10">10min</option>
			<option value="15">15min</option>
			<option value="30">half an hour</option>
			<option value="60">one hour</option>
			</select>
			</label>	
          <input id="utimezone" name="utimezone" type="hidden" value="" />           
        </form>         
      </div>
  </div>  