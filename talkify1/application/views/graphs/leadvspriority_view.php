<script src="js/sample.js"  type="text/javascript"></script>


<div class="cusheader">
	<h1 class="page-title">Graphs: <i>Leads Vs Priority Per Representative</i></h1>
</div>
<div class="grid_10">
	
    	
        <div class="cusblockdatatable">
        	<div id="ajaxLoadAni">
				<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
				<span>Loading...</span>
			</div>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
      			google.load('visualization', '1', {packages: ['corechart']});
    		</script>
			<table border="0" width="100%">
				<tr>
					<th>
						<?php
							echo form_open("graphs/leadvsprioritygraph", array('id'=> 'priority_search', 'name'=>'priority_search'));
						?>
					<div class="cusblock">
						<div class="cusblock-heading">
							<label for="from"><b>From</b></label>
							<?php
								$data = array(
											'name' => 'date_from_priority',
											'id' => 'date_from_priority',
											'value' => set_value('date_from_priority'),
											);
								echo form_input($data);
							?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<label for="to"><b>To</b></label>
							<?php 
								$data = array(
											'name' => 'date_to_priority',
											'id' => 'date_to_priority',
											'value' => set_value('date_to_priority'),
											);
								echo form_input($data);
							?>
							<?php 
								echo form_submit('searchpriority', 'Get Priority'); 
								echo form_close();
							?>
						</div> <!-- end of demo div -->
					</div>
						<!--<a href="#">Leads Vs Priority</a>-->
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
									$row1 = "['Priority'";
									$other_rows = "";
									foreach($priority_arr_temp as $key=>$value){
										if($key!='' && $value!=''){
											$other_rows .="['".$value."'";
											foreach($rep_arr_temp as $key1=>$value1){
												if($key1!='' && $value1!=''){
													if($h1==0)
														$row1 .= ",'".$value1."'";
													
														$other_rows .= ",".$priority_graph[$value][$value1]."";
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
							  	title: 'Leads Vs Priority Per Representative ',
							  	vAxis: {title: "Leads"},
							  	hAxis: {title: "Priority"},
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
<div class="clear">
</div>