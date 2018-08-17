<script type="text/javascript" src="js/jspi"></script>
			<script type="text/javascript">
      			google.load('visualization', '1', {packages: ['corechart']});
    		</script>
<div class="grid_5">
	<div class="box round first">
		<h2>Call Report</h2>
		<div id="tft" align="center">
			<table width="100%" cellspacing="1" cellpadding="5" border="0">
				<tbody>
					<tr>
						<td style="padding-left: 75px" width="50%"><b> Total #Of Calls:</b></td>
						<td width="50%"><?php echo (int)($answeredcalls+$missedcalls);?></td>
					</tr><br>
					<tr>
						<td style="padding-left: 75px" width="50%"><b> #Of Recieved Calls:</b></td>
						<td width="50%"><?php echo $answeredcalls;?></td>
					</tr><br>
					<tr>
						<td style="padding-left: 75px" width="50%"><b> #Of Missed Calls:</b></td>
						<td width="50%"><?php echo $missedcalls;?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="grid_5">
	<div class="box round first">
		<h2>Status Wise Report</h2>
		<div id="tft" align="center">
			<table width="100%" cellspacing="1" cellpadding="5" border="0">
				<tbody>
					<tr>
						<td style="padding-left: 75px" width="50%"> Initial Leads:</td>
						<td width="50%">10</td>
					</tr><br>
					<tr>
						<td style="padding-left: 75px" width="50%"> Closed Leads:</td>
						<td width="50%">5</td>
					</tr><br>
					<tr>
						<td style="padding-left: 75px" width="50%"> Prospects:</td>
						<td width="50%">12</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="grid_10">
	<div class="box round first">
		<h2>Status Wise Report</h2>
    	
        <div class="cusblockdatatable">
        	<div id="ajaxLoadAni">
				<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
				<span>Loading...</span>
			</div>
			<script type="text/javascript" src="js/jspi.js"></script>
			<script type="text/javascript">
      			google.load('visualization', '1', {packages: ['corechart']});
    		</script>
			<table border="0" width="100%">
				<tr>
					<th>
						<?php
							echo form_open("show-dashboard", array('id'=> 'status_search', 'name'=>'status_search'));
						?>
					<div class="cusblock">
						<div class="cusblock-heading">
							<label for="from"><b>From</b></label>
							<?php
								$data = array(
											'name' => 'date_from_status',
											'id' => 'date_from_status',
											'value' => set_value('date_from_status'),
											);
								echo form_input($data);
							?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<label for="to"><b>To</b></label>
							<?php 
								$data = array(
											'name' => 'date_to_status',
											'id' => 'date_to_status',
											'value' => set_value('date_to_status'),
											);
								echo form_input($data);
							?>
							<?php 
								echo form_submit('searchstatus', 'Get Status'); 
								echo form_close();
							?>
						</div> <!-- end of demo div -->
					</div>
						<!--<a href="#">Status Vs Leads</a>-->
					</th>
				</tr>
				<tr>
					<td>
						<script type="text/javascript">
							function drawVisualization() {
								// Create and populate the data table.
							  var data = google.visualization.arrayToDataTable([
							  	/*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
								  ['2004/05',  165,      938,         522,             998,           450,      614.6],
								  ['2005/06',  135,      1120,        599,             1268,          288,      682],
								  ['2006/07',  157,      1167,        587,             807,           397,      623],
								  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
								  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
								<?php
							  		$h1 = 0;
									$row1 = "['Status'";
									$other_rows = "";
									foreach($status_arr_temp as $key=>$value){
										if($key!='' && $value!=''){
											$other_rows .="['".$value."'";
											foreach($rep_arr_temp as $key1=>$value1){
												if($key1!='' && $value1!=''){
													if($h1==0)
														$row1 .= ",'".$value1."'";
													
														$other_rows .= ",".$status_graph[$value][$value1]."";
												}
											}
											$h1=1;
											$other_rows .= "],";
										}
									}
									$row1 .= "],";
									
									echo $row1.$other_rows;	
							  	?> 
							  ]);
							  
							  var options = {
							  	title: 'Leads Vs Status per Representative ',
							  	vAxis: {title: "Leads"},
							  	hAxis: {title: "Status"},
							  	seriesType: "bars",
							  	series: {5: {type: "line"}}
							  };
							  
							  var chart = new google.visualization.ComboChart(document.getElementById('stat_div'));
							  chart.draw(data, options);
							}
							google.setOnLoadCallback(drawVisualization);
						</script>
						<div id="stat_div" class="cusblock" style="width: 100%; height: 400px;"></div>
					</td>
				</tr>
			</table>
			
       	</div><!-- end block div -->
	</div>
</div>
<div class="clear">
</div>


	<script src="js/sample.js"  type="text/javascript"></script>






				
          