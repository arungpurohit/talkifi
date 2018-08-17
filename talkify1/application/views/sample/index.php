<script src="js/sample.js"  type="text/javascript"></script>

   <script type="text/javascript" src="js/jspi.js"></script>
   
   
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
	
      var jsonData = $.ajax({
          url: "index.php/sample/getPieChart",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 400, height: 300});
    }

    </script>

<?php //print_r($ary);?>
     <div id="chart_div" style="width:350px; height: 300px; margin-left:200px;" ></div>
<br /><br /><br />

<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          vAxis: {title: 'Year',  titleTextStyle: {color: 'red'}}
        };*/
	function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getBarChart",
		dataType:"json",
		async: false
		}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);
	
        var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
        chart.draw(data, {width: 400, height: 300});
      }
</script>
<div id="chart_div1" style="width: 400px; height: 300px; float:right; margin-top:-360px; margin-right:50px;"></div>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
     /* function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID', 'X', 'Y', 'Temperature'],
          ['',   80,  167,      120],
          ['',   79,  136,      130],
          ['',   78,  184,      50],
          ['',   72,  278,      230],
          ['',   81,  200,      210],
          ['',   72,  170,      100],
          ['',   68,  477,      80]
        ]);

        var options = {
          colorAxis: {colors: ['yellow', 'red']}
        };*/
		/*function drawChart()
		{
			var jsonData = $.ajax({
			url: "index.php/sample/getBubbleChart",
			dataType:"json",
			async:false
			}).responseText;
			
			var data = new google.visualization.DataTable(jsonData);
		
        var chart = new google.visualization.BubbleChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 400, height: 300});
      }*/
    </script>
    <div id="chart_div2" style="width: 350px; height: 300px; margin-left:200px;"></div>


<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
          ['CAN',    80.66,              1.67,      'North ',  33739900],
          ['DEU',    79.84,              1.36,      'South',         81902307],
          ['DNK',    78.6,               1.84,      'South',         5523095],
          ['EGY',    72.73,              2.78,      ' East',    79716203],
          ['GBR',    80.05,              2,         'South',         61801570],
          ['IRN',    72.49,              1.7,       ' East',    73137148],
          ['IRQ',    68.09,              4.77,      ' East',    31090763],
          ['ISR',    81.55,              2.96,      ' East',    7485600],
          ['RUS',    68.6,               1.54,      'South',         141850000],
          ['USA',    78.09,              2.05,      'North ',  307007000]
        ]);*/

        var options = {
          title: 'Correlation between life expectancy, fertility rate and population of some world countries (2010)',
          hAxis: {title: 'Life Expectancy'},
          vAxis: {title: 'Fertility Rate'},
          bubble: {textStyle: {fontSize: 11}}
        };
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getBubbleChart",
		dataType:"json",
		async: false
		}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);

        var chart = new google.visualization.BubbleChart(document.getElementById('chart_div3'));
        chart.draw(data, {width: 400, height: 300});
      }
    </script>
  <div id="chart_div3" style="width: 400px; height: 300px; float:right; margin-top:-300px; margin-right:50px;"></div>
<br /><br />
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);*/
		
        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: 'red'}}
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getAreaChart",
		dataType:"json",
		async: false
		}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div4'));
        chart.draw(data,{width: 400, height: 300});
      }
    </script>
    <div id="chart_div4" style="width:370px; height: 300px; margin-left:200px;"></div>
	
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);*/

        var options = {
          title: 'Company Performance'
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getLineChart",
		dataType:"json",
		async: false
		}).responseText;
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.LineChart(document.getElementById('chart_div5'));
        chart.draw(data, {width: 400, height: 300});
      }
    </script>
    <div id="chart_div5" style="width: 400px; height: 300px; float:right; margin-top:-300px; margin-right:30px;"></div>
<br /><br />

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);
*/
        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getColumnChart",
		dataType:"json",
		async: false
		}).responseText;
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
        chart.draw(data, {width: 400, height: 300});
      }
    </script>
    <div id="chart_div6" style="width:370px; height: 300px; margin-left:200px;"></div>
	

    <script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);*/

        var options = {
          title : 'Monthly Coffee Production by Country',
          vAxis: {title: "Cups"},
          hAxis: {title: "Month"},
          seriesType: "bars",
          series: {5: {type: "line"}}
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getComboChart",
		dataType:"json",
		async: false
		}).responseText;
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div7'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawChart);
    </script>
    <div id="chart_div7" style="width: 400px; height: 300px; float:right; margin-top:-300px; margin-right:30px;"></div>
<br /><br /><br />


<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Director (Year)',  'Rotten Tomatoes', 'IMDB'],
          ['Alfred Hitchcock (1935)', 8.4,         7.9],
          ['Ralph Thomas (1959)',     6.9,         6.5],
          ['Don Sharp (1978)',        6.5,         6.4],
          ['James Hawes (2008)',      4.4,         6.2]
        ]);*/

        var options = {
          title: 'The decline of \'The 39 Steps\'',
          vAxis: {title: 'Accumulated Rating'},
          isStacked: true
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getSteppedareaChart",
		dataType:"json",
		async: false
		}).responseText;
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div8'));
        chart.draw(data, options);
      }
    </script>
      <div id="chart_div8" style="width:400px; height: 300px; margin-left:200px;"></div>
	
	<script type='text/javascript'>
      google.load('visualization', '1', {packages:['table']});
      google.setOnLoadCallback(drawTable);
      /*function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Salary');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
          ['Mike',  {v: 10000, f: '$10,000'}, true],
          ['Jim',   {v:8000,   f: '$8,000'},  false],
          ['Alice', {v: 12500, f: '$12,500'}, true],
          ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);*/
		
		function drawTable() {
		var jsonData = $.ajax({
		url: "index.php/sample/getTable",
		dataType:"json",
		async: false
		}).responseText;
	var data = new google.visualization.DataTable(jsonData);
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true});
      }
    </script>
     <div id="table_div" style="width: 400px; height: 300px; float:right; margin-top:-200px; margin-right:30px;"></div>
<br /><br />


    <script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Mon', 20, 28, 38, 45],
          ['Tue', 31, 38, 55, 66],
          ['Wed', 50, 55, 77, 80],
          ['Thu', 77, 77, 66, 50],
          ['Fri', 68, 66, 22, 15]
          // Treat first row as data as well.
        ], true);

        var options = {
          legend:'none'
        };*/
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getCandlestickChart",
		dataType:"json",
		async: false
		}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.CandlestickChart(document.getElementById('chart_div9'));
        chart.draw(data, options);
      }
    </script>
    <div id="chart_div9" style="width:400px; height: 300px; margin-left:200px;"></div>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Age', 'Weight'],
          [ 8,      12],
          [ 4,      5.5],
          [ 11,     14],
          [ 4,      5],
          [ 3,      3.5],
          [ 6.5,    7]
        ]);
*/
        var options = {
          title: 'Age vs. Weight comparison',
          hAxis: {title: 'Age', minValue: 0, maxValue: 15},
          vAxis: {title: 'Weight', minValue: 0, maxValue: 15},
          legend: 'none'
        };
		
		function drawChart() {
		var jsonData = $.ajax({
		url: "index.php/sample/getScatterChart",
		dataType:"json",
		async: false
		}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);
        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div10'));
        chart.draw(data, options);
      }
    </script>
  
    <div id="chart_div10" style="width: 400px; height: 300px; float:right; margin-top:-300px; margin-right:50px;"></div>
<br /><br />
