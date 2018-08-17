<script src="js/compose.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>


<div class="grid_10">
            <div class="box round first">
                <h2> Compose 
					<div id="faddbtn" class="fbutton" align="right">
					<div><span title='Click to Create New Event' class="addcal">
				    		New Event                
						</span></div>
					</div>
			 </h2>
				
                <div class="block ">
                    <form method="post" >
				<?php echo validation_errors();?>
                    <table class="form">
                         <tr>
                            <td>
                                <label>
                                    Client </label>
                            </td>
                            <td>
							<input type="hidden" name="client_id" id="client_id" />
                                <input type="text" name="client_name" id="client_name" class="medium" />&nbsp;&nbsp;<img src="<?php base_url();?>images/add.png" width="20px" height="20px" onclick="javascript:addclientopen()"/>
                            </td>
							
							<td>
                                <label>
                                    Status</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('status',$status);?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>
                                    Types </label>
                            </td>
                            <td>
                                <?php echo form_dropdown('types',$types);?>
                            </td>
							<td >
                                <label>Priority</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('priority',$priority);?>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Category</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('category',$category);?>
                            </td>
							<td>
							<label>
                                    Chanels </label>
                            </td>
                            <td>
                               <?php echo form_dropdown('channels',$channels );?> 
                            </td>
				     </tr>
					 <tr>
					 <td><label> Reps </label>
                                
                            </td>
                            <td>
							<select name="reps" id="reps">
							<?php foreach($reps as $values){
							?>
							<option value="<?php echo $values['id'];?>"><?php echo $values['username'];?></option>
							<?php }?>
							</select>
							</td>
							
							<td>
							<label>
                                   Due by</label>
                            </td>
                            <td>
                               <input type="text" id="due_by" name="due_by"/>
                            </td>
							
					 </tr>
					 
					 <tr>
					 <td></td>
                            <td></td>
							
							<td>
							<label>Responder Email </label>
                            </td>
                            <td>
                            <select name="responder" id="responder">
							 <option value="">Please Select</option>
							<?php foreach($responder as $values){
							?>
							<option value="<?php echo $values['autoresponder_id'];?>"><?php echo $values['autoresponder_name'];?></option>
							<?php }?>
							</select>
                            </td>
					 </tr>
					 <tr>
					 <td></td>
                            <td></td>
							
							<td>
							<label>Responder Sms</label>
                            </td>
                            <td>
                            <select name="responders" id="responders">
							 <option value="">Please Select</option>
							<?php foreach($responders as $values){
							?>
							<option value="<?php echo $values['autorespondersms_id'];?>"><?php echo $values['autorespondersms_name'];?></option>
							<?php }?>
							</select>
                            </td>
					 </tr>
					 
						<tr>
                            <td>
                                <label>Subject </label>
                            </td>
                            <td>
                                <input type="text" name="subject" id="subject" class="medium" />
                            </td>
							
                            <td></td>
                        </tr>
						<tr>
                            <td>
                            </td>
                            <td colspan="2">
                                <textarea name="msgBody" class="tinymce"></textarea>
                            </td>
							
                            <td></td>
                        </tr>
						<tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
							<td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						<tr>
                            <td>&nbsp;</td>
                            <td colspan="2"><input type="submit" name="cmp_submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="Reset"/>
							</td>
							
                            <td>&nbsp;</td>
                        </tr>
						
						
                    </table>
                    </form>
                </div>
			<div id="addClient" title="Add Client">
			<form action="" method="post" >
           		<p>
    	           <label for="cName">User Name:</label>
        	       <input type="text" id="client_username" name="client_username" />
	           </p>
            <p>
               <label for="cColor">Password:</label>
               <input type="password" id="client_password" name="client_password" />
           </p>
			<p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="cleint_fname" name="client_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="client_lname" name="client_lname" />
           </p>
		   <p>
               <label for="cEmail">Email:</label>
               <input type="text" id="client_email" name="client_email" />
           </p>
		   <p>
               <label for="cEmail">Phone:</label>
               <input type="text" id="client_phone" name="client_phone" />
           </p>
        </form>
			
			</div>	
			<div id="selectClient" title="selectClient"><div>
        <table id="records">
            <thead>
                <tr>
                    <th>User name</th>
                    <th>First name</th>
					<th>Last name</th>
					<th>Email</th>
					<th>Phone</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
		<script type="text/template" id="readTemplate">
    	<tr id="${client_id}">
			<td><a class="cl_username" href="${client_username}">${client_username}</a></td>
			<td>${client_fname}</td>
			<td>${client_lname}</td>
			<td>${client_email}</td>
			<td>${client_phone}</td>
		</tr>
</script>
    </div>
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
    
	/*if (!DateAdd || typeof (DateDiff) != "function") {
            var DateAdd = function(interval, number, idate) {
                number = parseInt(number);
                var date;
                if (typeof (idate) == "string") {
                    date = idate.split(/\D/);
                    eval("var date = new Date(" + date.join(",") + ")");
                }
                if (typeof (idate) == "object") {
                    date = new Date(idate.toString());
                }
                switch (interval) {
                    case "y": date.setFullYear(date.getFullYear() + number); break;
                    case "m": date.setMonth(date.getMonth() + number); break;
                    case "d": date.setDate(date.getDate() + number); break;
                    case "w": date.setDate(date.getDate() + 7 * number); break;
                    case "h": date.setHours(date.getHours() + number); break;
                    case "n": date.setMinutes(date.getMinutes() + number); break;
                    case "s": date.setSeconds(date.getSeconds() + number); break;
                    case "l": date.setMilliseconds(date.getMilliseconds() + number); break;
                }
                return date;
            }
        }*/
        /*function getHM(date)
        {
             var hour =date.getHours();
             var minute= date.getMinutes();
             var ret= (hour>9?hour:"0"+hour)+":"+(minute>9?minute:"0"+minute) ;
             return ret;
        }*/
	
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
            var check = $("#IsAllDayEvent").click(function(e) {
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
            });

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