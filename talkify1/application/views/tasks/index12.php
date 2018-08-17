<script src="js/tasks.js" type="text/javascript"></script>
<link href="css/styels.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css1/jquery-frontier-cal-1.3.2.css" />
<link rel="stylesheet" type="text/css" href="css1/colorpicker.css" />

<script type="text/javascript" src="js1/jquery-1.4.2-ie-fix.min.js"></script>
<script type="text/javascript" src="js1/jquery-ui-1.8.1.custom.min.js"></script>
<script type="text/javascript" src="js1/colorpicker.js"></script>
<script type="text/javascript" src="js1/jquery.qtip-1.0.js"></script>
<script type="text/javascript" src="js1/jshashtable-2.1.js"></script>
<script type="text/javascript" src="js1/jquery-frontier-cal-1.3.2.min.js"></script>
	
<div class="grid_10">
<div id="tabs-2">
		<div id="example" style="margin: auto; width:100%;">
		
		<div id="toolbar" class="ui-widget-header ui-corner-all" style="padding:3px; vertical-align: middle; white-space:nowrap; overflow: hidden;">
			<button id="BtnPreviousMonth">Previous Month</button>
			<button id="BtnNextMonth">Next Month</button>
			
			&nbsp;&nbsp;&nbsp;
			Date: <input type="text" id="dateSelect" size="20"/>
			&nbsp;&nbsp;&nbsp;
			<button id="BtnDeleteAll">Delete All</button>
			&nbsp;&nbsp;&nbsp;
		</div>
		<div id="mycal"></div>
		</div>

		<!-- debugging-->

		<!-- Add event modal form -->
		<style type="text/css">
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
		</style>
		<div id="add-event-form" title="Add New Event">
			<p class="validateTips">All form fields are required.</p>
			<form>
			<fieldset>
				<label for="name">What?</label>
				<input type="text" name="what" id="what" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>
				<table style="width:100%; padding:5px;">
					<tr>
						<td>
							<label>Start Date</label>
							<input type="text" name="startDate" id="startDate" value="" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>Start Hour</label>
							<select id="startHour" name="startHour" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="12" SELECTED>12</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
							</select>				
						</td>
						<td>
							<label>Start Minute</label>
							<select id="startMin" name="stratMin" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00" SELECTED>00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>				
						</td>
						<td>
							<label>Start AM/PM</label>
							<select id="startMeridiem" name="startMeridiem" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">						<option value="AM" SELECTED>AM</option>
							<option value="PM">PM</option>
							</select>				
						</td>
					</tr>
					<tr>
						<td>
							<label>End Date</label>
							<input type="text" name="endDate" id="endDate" value="" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>End Hour</label>
							<select id="endHour" name="endHour" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="12" SELECTED>12</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
							</select>				
						</td>
						<td>
							<label>End Minute</label>
							<select id="endMin" name="endMin" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00" SELECTED>00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>				
						</td>
						<td>
							<label>End AM/PM</label>
							<select id="endMeridiem" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">				<option value="AM" SELECTED>AM</option>
								<option value="PM">PM</option>
							</select>				
						</td>				
					</tr>			
				</table>
				<table>
					<tr>
						<td>
							<label>Background Color</label>
						</td>
						<td>
							<div id="colorSelectorBackground"><div style="background-color: #333333; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorBackground" value="#333333">
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<label>Text Color</label>
						</td>
						<td>
							<div id="colorSelectorForeground"><div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorForeground" value="#ffffff">
						</td>						
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td></td>
					<td></td>						
					</tr>
					<tr>
						<td>
							<label>Remind Via SMS </label>
						</td>
						<td>
							<input type="checkbox" name="viasms" />
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<label>Remind Via Email </label>
						</td>
						<td>
							<input type="checkbox" name="viaemail" />
						</td>						
					</tr>
									
				</table>
			</fieldset>
			</form>
		</div>
		<div id="display-event-form" title="View Agenda Item">
		</div>		
	</div>
        </div>