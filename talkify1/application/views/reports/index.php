 <!--<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />-->
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
   <!-- <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>-->
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <!--<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />-->
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
   <!-- <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.donutRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.bubbleRenderer.min.js"></script>
    <!-- END: load jqplot -->
   <!-- <script src="js/setup.js" type="text/javascript"></script>-->
   <!-- <script  src="js/dashboarddetails.js"type="text/javascript">-->
	<!--<script>
        $(document).ready(function () {

          
            
            setupLeftMenu();
			setSidebarHeight();
        });
    </script>-->
	<!--<link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
	<script src="../../jquery-1.8.0.js"></script>
	<script src="../../ui/jquery.ui.core.js"></script>
	<script src="../../ui/jquery.ui.widget.js"></script>
	<script src="../../ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../demos.css">-->
	<!--<script>
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
	
		</script>-->
 <!--<div class="grid_10">
     <div class="box round first">
        <h2>Reports</h2>
            <div class="block">
				<div id="ajaxLoadAni">
    				<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    				<span>Loading...</span>
				</div>
				<div id="tft" align="center">
				 	
					<div class="demo">
							<label for="from"><b>From</b></label>
							<input type="text" id="from" name="from"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
</div>-->  
<!--<div class="container_12">
        <div class="grid_5">
        	<div class="box round">
        		 <h2>Organization and Contact Reports</h2>
                 <div id="tft" align="center">
					 <table width="100%" cellspacing="1" cellpadding="5" border="0">
														<tbody>
															<tr>
																<td width="5%">#</td>
																<td width="35%">Report Name</td>
																<td width="60%">Description</td>
															</tr>
															<tr>
																<td>1</td>
																<td><a href="#">Contacts by Organizations</a></td>
																<td>Contacts related to Organization</td>
															</tr>
															<tr>
																<td>2</td>
																<td><a href="#">Contacts without Organizations</a></td>
																<td>Contacts not related to Organizations</td>
															</tr>
															<tr>
																<td>3</td>
																<td><a href="#">Contacts by Opportunities</a></td>
																<td>Contacts related to Opportunities</td>
															</tr>
														</tbody>
													</table>

                 </div>
            </div>     
        </div>
      
	    <div class="grid_5">
   	    	<div class="box round">
        		 <h2> Tasks</h2>
                  <div id="tft" align="center">
				  	<table width="100%" cellspacing="1" cellpadding="5" border="0">
														<tbody>
															<tr>
																<td width="5%">#</td>
																<td width="35%">Report Name</td>
																<td width="60%">Description</td>
															</tr>
															<tr>
																<td>1</td>
																<td><a href="#">Contacts by Organizations</a></td>
																<td>Contacts related to Organization</td>
															</tr>
															<tr>
																<td>2</td>
																<td><a href="#">Contacts without Organizations</a></td>
																<td>Contacts not related to Organizations</td>
															</tr>
															<tr>
																<td>3</td>
																<td><a href="#">Contacts by Opportunities</a></td>
																<td>Contacts related to Opportunities</td>
															</tr>
														</tbody>
													</table>
                  </div>
            </div>     
       </div>
 
 		<div class="grid_5">
   	    	<div class="box round">
        		 <h2> Leads</h2>
                  <div id="tft" align="center">
				 
				  	 <table width="100%" cellspacing="1" cellpadding="5" border="0">
														<tbody>
															<tr>
																<td width="5%">#</td>
																<td width="35%">Report Name</td>
																<td width="60%">Description</td>
															</tr>
															<tr>
																<td>1</td>
																<td><a href="#">Lead by Source</a></td>
																<td>Lead by Source</td>
															</tr>
															<tr>
																<td>2</td>
																<td><a href="#">Lead Status Report</a></td>
																<td>Lead Status Report</td>
															</tr>
														</tbody>
													</table>
                  </div>
            </div>     
       </div>
	   
	   <div class="grid_5">
   	    	<div class="box round">
        		 <h2> Average Calls</h2>
                  <div id="tft" align="center">
				  	  <table width="100%" cellspacing="1" cellpadding="5" border="0">
														<tbody>
															<tr>
																<td width="5%">#</td>
																<td width="35%">Report Name</td>
																<td width="60%">Description</td>
															</tr>
															<tr>
																<td>1</td>
																<td><a href="#">Lead by Source</a></td>
																<td>Lead by Source</td>
															</tr>
															<tr>
																<td>2</td>
																<td><a href="#">Lead Status Report</a></td>
																<td>Lead Status Report</td>
															</tr>
														</tbody>
													</table>
                  </div>
            </div>     
       </div>
	  
        <div class="clear">
        </div>
		
</div>-->
    
 