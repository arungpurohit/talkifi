<link rel="stylesheet" type="text/css" media="screen" href="js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="js/jqgrid/css/ui.jqgrid.css"></link>	
	<script src="js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	<div class="grid_10">
            <div class="box round first">
                <h2>Inbox</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>
<div id="tabs">
    <!--<ul>
		<button class="btn">Delete </button>
		<button class="btn" id="assignTo">Assign</button>
    </ul>-->
<div align="right">
    <a href="index.php/show-deleted" class="btn">Deleted Leads</a> <br />

</div>
	<div class="h">Search By:</div> 
	<div>
		 <input type="checkbox" id="autosearch" onclick="enableAutosubmit(this.checked)"> Enable Autosearch <br/>Lead Unique Id<br />
		 <input type="text" name="searchlead"  id="searchlead" onkeydown="doSearch(arguments[0]||event)" />
    </div>
    <div>Client Name<br> 
		<input type="text" name="clientsn" id="clientsn" onkeydown="doSearch(arguments[0]||event)" /> 
		<button onclick="gridReload()" id="submitButton" style="margin-left:30px;">Search</button> 
	</div> 
	<table id="grid_name"></table> 
	<div id="pager2"></div> 
	<script type="text/javascript" src="js/inbox.js"></script>
	

    <div id="read">
        <table id="grid_name" cellpadding="0" cellspacing="0"></table>
	<div id="pager2" class="scroll" style="text-align: center;"></div>

    </div>
</div> <!-- end tabs -->
                </div>
            </div>
		<!--<div id="selectReps" title="Assign Leads to Reps">
	    	<div>
				<table id="repRecord" width="100%" align="center">
						<tr>
							<td>Reps</td>
							<td>
							<select name="repAssign">
							<option value="">Please Select</option>
							</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;
							</td>
						</tr>
						<tr>
						<td>Reason to Assign
						</td>
						<td><textarea name="reasonassign"></textarea>
						</td>
						</tr>
						 <td colspan="2" align="center"><input type="submit" name="cmp_submit" class="btn" value="Select"/>&nbsp;
							<input type="button" name="cancelSelect" id="cancelSelect" class="btn" value="Cancel"/>
							</td>
				</table>
		
		   </div>
</div>-->

<div id="deleteLead" title="Reason for Delete">
<div>
        <form  method="post" >
			<strong>Reason </strong>
			<input type="hidden" name="lid" id="lid" />
			<textarea name="reasontodelete" id="reasontodelete"></textarea><br />
			<input type="submit" name="dltbtn" id="dltbtn" class="btn" value="Delete"/>&nbsp;
			<input type="button" name="canclbtn" id="canclbtn" class="btn" value="Cancel" />
        </form>
</div>
</div>
</div>
	<script type="text/javascript" src="js/inbox.js"></script>
	