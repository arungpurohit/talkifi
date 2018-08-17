<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />-->
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <!--<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>-->
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <!--<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />-->
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <!--<script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.donutRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.bubbleRenderer.min.js"></script>-->
    <!-- END: load jqplot -->
  
    <script  src="js/dashboarddetails.js"type="text/javascript">

        $(document).ready(function () {

          
            
            setupLeftMenu();
			setSidebarHeight();
        });
    </script>
<link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
	<script src="../../jquery-1.8.0.js"></script>
	<script src="../../ui/jquery.ui.core.js"></script>
	<script src="../../ui/jquery.ui.widget.js"></script>
	<script src="../../ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../demos.css">
	<script>
	$(function() {
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	$(function() {
		$( "#from1" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#to1" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to1" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#from1" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	$(function() {
		$( "#from2" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#to2" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to2" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#from2" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	$(function() {
		$( "#from3" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#to3" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to3" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				$( "#from3" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	</script>
	
<div class="container_12">
        <div class="grid_5">
        	<div class="box round">
        		 <h2> NO. of Calls</h2>
	    			 <a href="index.php/tasks"><img src="images/cal.jpg" width="30px" height="30px" align="right"/></a>
					 <a href="#"><img src="images/CSV.png" width="25px" height="25px" align="right"/>
					 <img src="images/PDF.png" width="25px" height="25px" align="right"/></a><br />
                 <div id="tft" align="center">
				 	
					 <div class="demo"><br>
							<label for="from"><b>From</b></label>
							<input type="text" id="from" name="from"/>
							<label for="to"><b>To</b></label>
							<input type="text" id="to" name="to"/>
					</div>
					 <table width="200" border="1">
						  <tr>
							<td><b>Total No Of Calls:</b></td>
							<td>&nbsp;</td>
							<td>186</td>
						  </tr>
						  <tr>
							<td><b>No Of Recived Calls:</b></td>
							<td>&nbsp;</td>
							<td>120</td>
						  </tr>
						  <tr>
							<td><b>No Of Missed Calla:</b></td>
							<td>&nbsp;</td>
							<td>30</td>
						  </tr>
						  <tr>
						  	<td><b>No Of Duplicate Calls:</b></td>
							<td>&nbsp;</td>
							<td>20</td>
						  </tr>
						  <tr>
						  	<td><b>No Of Invalid Calls:</b></td>
							<td>&nbsp;</td>
							<td>25</td>
						  </tr>
					</table>

                 </div>
            </div>     
        </div>
      
	    <div class="grid_5">
   	    	<div class="box round">
        		 <h2> Tasks</h2>
				 	<a href="index.php/tasks"><img src="images/cal.jpg" width="30px" height="30px" align="right"/></a>
					<a href="#"><img src="images/CSV.png" width="25px" height="25px" align="right"/>
					 <img src="images/PDF.png" width="25px" height="25px" align="right"/></a><br /><br />
                  <div id="tft" align="center">
				  	 <div class="demo"><br>
							<label for="from1"><b>From</b></label>
							<input type="text1" id="from1" name="from1"/>
							<label for="to1"><b>To</b></label>
							<input type="text1" id="to1" name="to1"/>
					</div>
				  	<table width="200" border="1">
						  <tr>
							<td><b>Total No Of Calls:</b></td>
							<td>&nbsp;</td>
							<td>186</td>
						  </tr>
						  <tr>
							<td><b>No Of Recived Calls:</b></td>
							<td>&nbsp;</td>
							<td>120</td>
						  </tr>
						  <tr>
							<td><b>No Of Missed Calla:</b></td>
							<td>&nbsp;</td>
							<td>30</td>
						  </tr>
						  <tr>
						  	<td><b>No Of Duplicate Calls:</b></td>
							<td>&nbsp;</td>
							<td>20</td>
						  </tr>
						  <tr>
						  	<td><b>No Of Invalid Calls:</b></td>
							<td>&nbsp;</td>
							<td>25</td>
						  </tr>
					</table>

                  </div>
            </div>     
       </div>
 
 		<div class="grid_5">
   	    	<div class="box round">
        		 <h2> Leads</h2>
				 <a href="index.php/tasks"><img src="images/cal.jpg" width="30px" height="30px" align="right"/></a>
				 <a href="#"><img src="images/CSV.png" width="25px" height="25px" align="right"/>
					 <img src="images/PDF.png" width="25px" height="25px" align="right"/></a><br />
                  <div id="tft" align="center">
				 		 <div class="demo"><br>
								<label for="from2"><b>From</b></label>
								<input type="text2" id="from2" name="from2"/>
								<label for="to2"><b>To</b></label>
								<input type="text2" id="to2" name="to2"/>
					     </div>
				  	 <table width="200" border="1">
						  <tr>
							<td><b>Total No Of Leads:</b></td>
							<td>&nbsp;</td>
							<td>186</td>
						  </tr>
						  <tr>
							<td><b>No Of Leads Dropped:</b></td>
							<td>&nbsp;</td>
							<td>50</td>
						  </tr>
						  <tr>
							<td><b>Normal Status Leads:</b></td>
							<td>&nbsp;</td>
							<td>30</td>
						  </tr>
					</table>
                  </div>
            </div>     
       </div>
	   
	   <div class="grid_5">
   	    	<div class="box round">
        		 <h2> Average Calls</h2>
				 <a href="index.php/tasks"><img src="images/cal.jpg" width="30px" height="30px" align="right"/></a>
				 <a href="#"><img src="images/CSV.png" width="25px" height="25px" align="right"/>
					 <img src="images/PDF.png" width="25px" height="25px" align="right"/></a><br />
                  <div id="tft" align="center">
				  		 <div class="demo"><br>
							<label for="from3"><b>From</b></label>
							<input type="text3" id="from3" name="from3"/>
							<label for="to3"><b>To</b></label>
							<input type="text3" id="to3" name="to3"/>
					    </div>
				  	 <table width="200" border="1">
						  <tr>
							<td><b>Avg calls/today:</b></td>
							<td>&nbsp;</td>
							<td>70</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
					</table>
                  </div>
            </div>     
       </div>
		
        <div class="clear">
        </div>
		
</div>
    
    