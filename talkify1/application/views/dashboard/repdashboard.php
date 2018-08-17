<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
			<?php
echo form_open("repdashboard",array('id' => 'category_search','name' => 'category_search')); 
?>	
				
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_category',
              'id'          => 'date_from_category',
              'value'       => set_value('date_from_category'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_category',
              'id'          => 'date_to_category',
              'value'       => set_value('date_to_category'),
            );
echo form_input($data);
?>
<?php echo form_submit('search','Get Category');
echo form_close();?>
					</div>
					
			<a href="#"><?php echo $title;?> </a></th>
			<th width="48%">
			<a href="#">Lead Category Vs Leads </a></th>
			
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Category'";
				  $other_rows = "";
				  foreach($cat_arr_temp as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$cat_graph[$value][$value1]."";
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
				  title : 'Category per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Category"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('cat_div'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="cat_div" style="width: 100%; height: 200px;"></div>
			</td>
			
			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Lead Source', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Lead Category Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('source_div'));
				chart.draw(data, options);
			  }
			</script>
			<div id="source_div" style="width: 100%; height: 200px;"></div>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		</div></div>
		
	<!--status-->
	
<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >		
		<tr>
			<th width="48%">
			<?php
				echo form_open("repdashboard",array('id' => 'status_search','name' => 'status_search')); 
			?>				
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_status',
              'id'          => 'date_from_status',
              'value'       => set_value('date_from_status'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_status',
              'id'          => 'date_to_status',
              'value'       => set_value('date_to_status'),
            );
echo form_input($data);
?> <?php echo form_submit('searchstatus','Get Status');
echo form_close();?>
</div>
			<a href="#">Status Vs Leads</a></th>
			<th width="48%"><a href="<?php echo base_url();?>index.php/reports/daily_report">Lead Status Vs Leads</a></th>
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Status'";
				  $other_rows = "";
				  foreach($status_arr_temp as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
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
				  title : 'Status per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Status"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('stat_div'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="stat_div" style="width: 100%; height: 200px;"></div>
			</td>
			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Lead Source', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph1 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Lead Status Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('source_divs'));
				chart.draw(data, options);
			  }
			</script>
			<div id="source_divs" style="width: 100%; height: 200px;"></div>
			</td>
		</tr>
		
		</table>

	</div>
</div>	

<!--/* types */-->
<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
			<?php
echo form_open("repdashboard",array('id' => 'types_search','name' => 'types_search')); 
?>	
				
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_type',
              'id'          => 'date_from_type',
              'value'       => set_value('date_from_type'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_type',
              'id'          => 'date_to_type',
              'value'       => set_value('date_to_type'),
            );
echo form_input($data);
?> <?php echo form_submit('searchstatus','Get Types');
echo form_close();?>
</div>
					
			<a href="#"><?php echo $title1;?> </a></th>
			<th width="48%">
			<a href="#">Lead Types Vs Leads </a></th>
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Types'";
				  $other_rows = "";
				  foreach($types_arr_temp as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$type_graph[$value][$value1]."";
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
				  title : 'Types per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Types"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('type_div'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="type_div" style="width: 100%; height: 200px;"></div>
			</td>
			
			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Types' , 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph2 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Lead Types Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('source_div1'));
				chart.draw(data, options);
			  }
			</script>
			<div id="source_div1" style="width: 100%; height: 200px;"></div>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
	</div>
</div>

<!--channels vs leads-->

<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
			<?php
echo form_open("repdashboard",array('id' => 'channels_search','name' => 'channels_search')); 
?>	
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_channel',
              'id'          => 'date_from_channel',
              'value'       => set_value('date_from_channel'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_channel',
              'id'          => 'date_to_channel',
              'value'       => set_value('date_to_channel'),
            );
echo form_input($data);
?> <?php echo form_submit('searchstatus','Get Channels');
echo form_close();?>
</div>		

					
			<a href="#"><?php echo $title2;?> </a></th>
			<th width="48%">
			<a href="#">Lead Channels Vs Leads </a></th>
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  google.load("visualization", "1", {packages:["corechart"]});
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Channels', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($channel_graph as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Channels Vs No of Leads',
				  hAxis: {title: 'Channels', titleTextStyle: {color: 'red'}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('channels_div'));
				chart.draw(data, options);
			  }
			</script>
			<div class="column">
			<div id="channels_div" style="width:100%; height: 200px;"></div>
			</div>
			</td>
			
			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Lead Source', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph3 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Lead Channels Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('source_div2'));
				chart.draw(data, options);
			  }
			</script>
			<div id="source_div2" style="width: 100%; height: 200px;"></div>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
	</div>
</div>

<!--priority vs leads-->
<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
			<?php
echo form_open("repdashboard",array('id' => 'priority_search','name' => 'priority_search')); 
?>	
				
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_priority',
              'id'          => 'date_from_priority',
              'value'       => set_value('date_from_priority'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_priority',
              'id'          => 'date_to_priority',
              'value'       => set_value('date_to_priority'),
            );
echo form_input($data);
?> <?php echo form_submit('searchstatus','Get Priority');
echo form_close();?>
</div>
					
			<a href="#"><?php echo $title3;?> </a></th>
			<th width="48%">
			<a href="#">Lead Priority Vs Leads </a></th>
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Priority'";
				  $other_rows = "";
				  foreach($priority_arr_temp as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
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
				  title : 'Priority per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Priority"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('priority_div'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="priority_div" style="width: 100%; height: 200px;"></div>
			</td>
			
			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Lead Source', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph4 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Lead priority Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('source_div3'));
				chart.draw(data, options);
			  }
			</script>
			<div id="source_div3" style="width: 100%; height: 200px;"></div>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
	</div>
</div>

<!-- reps vs leads-->
<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >		
		<tr>
			<th width="48%">
		<?php
echo form_open("repdashboard",array('id' => 'reps_search','name' => 'reps_search')); 
?>	
				
<div class="demo">
							<label for="from"><b>From</b></label>
							<?php 
$data = array(
              'name'        => 'date_from_reps',
              'id'          => 'date_from_reps',
              'value'       => set_value('date_from_reps'),
            );
echo form_input($data);
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
							<?php $data = array(
              'name'        => 'date_to_reps',
              'id'          => 'date_to_reps',
              'value'       => set_value('date_to_reps'),
            );
echo form_input($data);
?> <?php echo form_submit('searchstatus','Get Reps');
echo form_close();?>
</div>
			<a href="#"><?php echo $title4;?> </a></th>
			<th width="48%">
			<a href="#"> Reps Vs Leads </a></th>
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  google.load("visualization", "1", {packages:["corechart"]});
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Reps', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($reps_graph as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Reps Vs No of Leads',
				  hAxis: {title: 'Reps', titleTextStyle: {color: 'red'}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('reps'));
				chart.draw(data, options);
			  }
			</script>
			<div class="column">
			<div id="reps" style="width:100%; height:200px;"></div>
			</div>
			</td>
			<td>
			<script type="text/javascript">
			  google.load("visualization", "1", {packages:["corechart"]});
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Reps', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($reps_graph1 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Reps Vs No of Leads',
				  hAxis: {title: 'Reps', titleTextStyle: {color: 'red'}}
				};
		
				var chart = new google.visualization.BarChart(document.getElementById('repsss'));
				chart.draw(data, options);
			  }
			</script>
			<div class="column">
			<div id="repsss" style="width:100%; height:200px;"></div>
			</div>
			</td>
			</tr></table></div></div>
<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >		
		<tr>
			

			<td>
			 <script type="text/javascript">
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Lead Source', 'Leads'],
				  /*['2004',  1000],*/
				  <?php foreach($source_graph5 as $key=>$value){ 
				  echo "['".$key."',".$value."],";
				  } ?>
				]);
		
				var options = {
				  title: 'Reps Vs No of Leads'
				};
		
				var chart = new google.visualization.PieChart(document.getElementById('reps1'));
				chart.draw(data, options);
			  }
			</script>
			<div id="reps1" style="width: 100%; height: 200px;"></div>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
	</div>
</div>

<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
					
			<a href="#"> Lead Category Per Rep Vs Leads </a></th>
			<th width="48%">
			<a href="#">Lead Status Per Rep Vs Leads </a></th>
			
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Category'";
				  $other_rows = "";
				  foreach($cat_arr_temp1 as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$cat_graph1[$value][$value1]."";
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
				  title : 'Category per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Category"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('cat_div1'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="cat_div1" style="width: 100%; height: 200px;"></div>
			</td>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Status'";
				  $other_rows = "";
				  foreach($status_arr_temp1 as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$status_graph1[$value][$value1]."";
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
				  title : 'Status per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Status"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('stat_div1'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="stat_div1" style="width: 100%; height: 200px;"></div>
			</td>
			
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		</div>
</div>

<div class="grid_10">
	<div class="box round first">
  	<script src="js/sample.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript" src="js/jspi.js"></script>-->
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<table border="0" width="100%" >
		<tr>
			<th width="48%">
					
			<a href="#"> Lead Category Per Rep Vs Leads </a></th>
			<th width="48%">
			<a href="#">Lead Status Per Rep Vs Leads </a></th>
			
		</tr>
		<tr>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Types'";
				  $other_rows = "";
				  foreach($types_arr_temp1 as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$type_graph1[$value][$value1]."";
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
				  title : 'Types per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Types"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('type_div1'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="type_div1" style="width: 100%; height: 200px;"></div>
			</td>
			<td>
			<script type="text/javascript">
			  function drawVisualization() {
				// Some raw data (not necessarily accurate)
				var data = google.visualization.arrayToDataTable([
				  /*['Status', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				  ['2004/05',  165,      938,         522,             998,           450,      614.6],
				  ['2005/06',  135,      1120,        599,             1268,          288,      682],
				  ['2006/07',  157,      1167,        587,             807,           397,      623],
				  ['2007/08',  139,      1110,        615,             968,           215,      609.4],
				  ['2008/09',  136,      691,         629,             1026,          366,      569.6]*/
				  <?php
				  $h1 =0;
				  $row1 = "['Priority'";
				  $other_rows = "";
				  foreach($priority_arr_temp1 as $key=>$value){
					if($key!='' && $value!=''){
						$other_rows .="['".$value."'";
						foreach($rep_arr_temp as $key1=>$value1){
							if($key1!='' && $value1!=''){
								//$status_arr_put[$value][$value1] = $this->portals_model->statusgroup_tickets($key,$key1);
								if($h1==0)
									 $row1 .= ",'".$value1."'";
									 
									 $other_rows .= ",".$priority_graph1[$value][$value1]."";
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
				  title : 'Priority per Rep Vs Leads ',
				  vAxis: {title: "Leads"},
				  hAxis: {title: "Priority"},
				  seriesType: "bars",
				  series: {5: {type: "line"}}
				};
		
				var chart = new google.visualization.ColumnChart(document.getElementById('priority_div1'));
				chart.draw(data, options);
			  }
			  google.setOnLoadCallback(drawVisualization);
			</script>
			<div id="priority_div1" style="width: 100%; height: 200px;"></div>
			</td>
			
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		</div></div>