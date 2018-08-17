<link rel="stylesheet" type="text/css" media="screen" href="js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="js/jqgrid/css/ui.jqgrid.css"></link>	
	<script src="js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	<div class="grid_10">
            <div class="box round first">
                <h2>Deleted Leads</h2>
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
    <a href="index.php/show-inbox" class="btn">Show Active Leads</a> <br />
<br />
</div>
   
    <div id="read">
        <table id="grid_name" cellpadding="0" cellspacing="0"></table>
	<div id="pager2" class="scroll" style="text-align: center;"></div>

    </div>
</div> <!-- end tabs -->
                </div>
            </div>
<div id="deleteLead" title="Reason for Re Open">
<div>
        <form  method="post" >
			<strong>Reason </strong>
			<input type="hidden" name="lid" id="lid" />
			<textarea name="reasontoreopen" id="reasontoreopen"></textarea><br />
			<input type="submit" name="dltbtn" id="dltbtn" class="btn" value="ReOpen"/>&nbsp;
			<input type="button" name="canclbtn" id="canclbtn" class="btn" value="Cancel" />
        </form>
</div>
</div>
</div>
	<script type="text/javascript" src="js/deletedinbox.js"></script>
	