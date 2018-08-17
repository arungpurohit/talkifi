 	<link href="cal_css/css/dailog.css" rel="stylesheet" type="text/css" />
    <link href="cal_css/css/calendar.css" rel="stylesheet" type="text/css" /> 
    <link href="cal_css/css/dp.css" rel="stylesheet" type="text/css" />   
    <link href="cal_css/css/alert.css" rel="stylesheet" type="text/css" /> 
    <link href="cal_css/css/main.css" rel="stylesheet" type="text/css" /> 
	<link href="cal_css/css/dropdown.css" rel="stylesheet" />    
    <link href="cal_css/css/colorselect.css" rel="stylesheet" />   
  
  
    <script src="cal_js/src/Plugins/Common.js" type="text/javascript"></script>    
    <script src="cal_js/src/Plugins/datepicker_lang_US.js" type="text/javascript"></script>     
    <script src="cal_js/src/Plugins/jquery.datepicker.js" type="text/javascript"></script>
    <script src="cal_js/src/Plugins/jquery.alert.js" type="text/javascript"></script>    
    <script src="cal_js/src/Plugins/jquery.ifrmdailog.js" defer="defer" type="text/javascript"></script>
    <script src="cal_js/src/Plugins/wdCalendar_lang_US.js" type="text/javascript"></script>    
    <script src="cal_js/src/Plugins/jquery.calendar.js" type="text/javascript"></script>
	<script src="cal_js/src/Plugins/jquery.dropdown.js" type="text/javascript"></script>     
    <script src="cal_js/src/Plugins/jquery.colorselect.js" type="text/javascript"></script>    
	   
    <script type="text/javascript">
        $(document).ready(function() { 
		
           	var view="week";          
            var DATA_FEED_URL = "index.php/tasks/";
            var op = {
                view: view,
                theme:3,
                showday: new Date(),
                EditCmdhandler:Edit,
                DeleteCmdhandler:Delete,
                ViewCmdhandler:View,    
                onWeekOrMonthToDay:wtd,
                onBeforeRequestData: cal_beforerequest,
                onAfterRequestData: cal_afterrequest,
                onRequestDataError: cal_onerror, 
                autoload:true,
                url: DATA_FEED_URL + "listallevents",  
                quickAddUrl: DATA_FEED_URL + "quickadd", 
                quickUpdateUrl: DATA_FEED_URL + "quickchange",
                quickDeleteUrl: DATA_FEED_URL + "removeevent"        
            };
            var $dv = $("#calhead");
            var _MH = document.documentElement.clientHeight;
            var dvH = $dv.height() + 2;
            op.height = _MH - dvH;
            op.eventItems =[];

            var p = $("#gridcontainer").bcalendar(op).BcalGetOp();
            if (p && p.datestrshow) {
                $("#txtdatetimeshow").text(p.datestrshow);
            }
            $("#caltoolbar").noSelect();
            
            $("#hdtxtshow").datepicker({ picker: "#txtdatetimeshow", showtarget: $("#txtdatetimeshow"),
            onReturn:function(r){                          
                            var p = $("#gridcontainer").gotoDate(r).BcalGetOp();
                            if (p && p.datestrshow) {
                                $("#txtdatetimeshow").text(p.datestrshow);
                            }
                     } 
            });
            function cal_beforerequest(type)
            {
                var t="Loading data...";
                switch(type)
                {
                    case 1:
                        t="Loading data...";
                        break;
                    case 2:                      
                    case 3:  
                    case 4:    
                        t="The request is being processed ...";                                   
                        break;
                }
                $("#errorpannel").hide();
                $("#loadingpannel").html(t).show();    
            }
            function cal_afterrequest(type)
            {
                switch(type)
                {
                    case 1:
                        $("#loadingpannel").hide();
                        break;
                    case 2:
                    case 3:
                    case 4:
                        $("#loadingpannel").html("Success!");
                        window.setTimeout(function(){ $("#loadingpannel").hide();},2000);
                    break;
                }              
               
            }
            function cal_onerror(type,data)
            {
                $("#errorpannel").show();
            }
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
            function View(data)
            {
                var str = "";
                $.each(data, function(i, item){
                    str += "[" + i + "]: " + item + "\n";
                });
                alert(str);               
            }    
            function Delete(data,callback)
            {           
                
                $.alerts.okButton="Ok";  
                $.alerts.cancelButton="Cancel";  
                hiConfirm("Are You Sure to Delete this Event", 'Confirm',function(r){ r && callback(0);});           
            }
            function wtd(p)
            {
               if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $("#showdaybtn").addClass("fcurrent");
            }
            //to show day view
            $("#showdaybtn").click(function(e) {
                //document.location.href="#day";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("day").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });
            //to show week view
            $("#showweekbtn").click(function(e) {
                //document.location.href="#week";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("week").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }

            });
            //to show month view
            $("#showmonthbtn").click(function(e) {
                //document.location.href="#month";
                $("#caltoolbar div.fcurrent").each(function() {
                    $(this).removeClass("fcurrent");
                })
                $(this).addClass("fcurrent");
                var p = $("#gridcontainer").swtichView("month").BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });
            
            $("#showreflashbtn").click(function(e){
                $("#gridcontainer").reload();
            });
            
            //Add a new event
            $("#faddbtn").click(function(e) {
					$( '#addTasks form input' ).val( '' );
					$('#addTasks').dialog('open');
                //var url ="index.php/tasks/editList";
                //OpenModelWindow(url,{ width: 500, height: 400, caption: "Create New Calendar"});
            });
            //go to today
            $("#showtodaybtn").click(function(e) {
                var p = $("#gridcontainer").gotoDate().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }


            });
            //previous date range
            $("#sfprevbtn").click(function(e) {
                var p = $("#gridcontainer").previousRange().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }

            });
            //next date range
            $("#sfnextbtn").click(function(e) {
                var p = $("#gridcontainer").nextRange().BcalGetOp();
                if (p && p.datestrshow) {
                    $("#txtdatetimeshow").text(p.datestrshow);
                }
            });
            
        });
    </script> 
	<style type="text/css">     
    .calpick     {        
        width:16px;   
        height:16px;     
        border:none;        
        cursor:pointer;        
        background:url("img/cal.gif") no-repeat center 2px;        
        margin-left:-22px;
		z-index:inherit;  
    }      
    </style>
	
	<div>
      <div id="calhead" style="padding-left:1px;padding-right:1px;">          
            <div class="cHead"><div class="ftitle">My Calendar</div>
            <div id="loadingpannel" class="ptogtitle loadicon" style="display: none;">Loading data...</div>
             <div id="errorpannel" class="ptogtitle loaderror" style="display: none;">Sorry, could not load your data, please try again later</div>
            </div>          
            
            <div id="caltoolbar" class="ctoolbar">
              <div id="faddbtn" class="fbutton">
                <div><span title='Click to Create New Event' class="addcal">

                New Event                
                </span></div>
            </div>
            <div class="btnseparator"></div>
             <div id="showtodaybtn" class="fbutton">
                <div><span title='Click to back to today ' class="showtoday">
                Today</span></div>
            </div>
              <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Day' class="showdayview">Day</span></div>
            </div>
              <div  id="showweekbtn" class="fbutton fcurrent">
                <div><span title='Week' class="showweekview">Week</span></div>
            </div>
              <div  id="showmonthbtn" class="fbutton">
                <div><span title='Month' class="showmonthview">Month</span></div>

            </div>
            <div class="btnseparator"></div>
              <div  id="showreflashbtn" class="fbutton">
                <div><span title='Refresh view' class="showdayflash">Refresh</span></div>
                </div>
             <div class="btnseparator"></div>
            <div id="sfprevbtn" title="Prev"  class="fbutton">
              <span class="fprev"></span>

            </div>
            <div id="sfnextbtn" title="Next" class="fbutton">
                <span class="fnext"></span>
            </div>
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="txtdatetimeshow"><?php echo $dateFormat;?></span>

                    </div>
            </div>
            
            <div class="clear"></div>
            </div>
      </div>
      <div style="padding:1px;">

        <div class="t1 chromeColor">
            &nbsp;</div>
        <div class="t2 chromeColor">
            &nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;">
            </div>
        </div>
        <div class="t2 chromeColor">

            &nbsp;</div>
        <div class="t1 chromeColor">
            &nbsp;
        </div>   
        </div>
  </div>
  <div id="addTasks" title="ADD/EDIT  Task">
	<div >            
        <form class="fform" id="fmAdd" method="post"> 
	      <label>                    
            <span>                        *Subject:              
            </span>                    
            <div id="calendarcolor">
            </div>
            <input MaxLength="200" class="required safe" id="Subject" name="Subject" style="width:85%;" type="text"  />                     
            <input id="colorvalue" name="colorvalue" type="hidden" value="" />                
          </label>                 
          <label>                    
            <span>*Time:
            </span>                    
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
  
  
<script src="js/tasks.js" type="text/javascript"></script>