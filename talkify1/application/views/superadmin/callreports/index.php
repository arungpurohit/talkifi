<link rel="stylesheet" type="text/css" media="screen" href="js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>

<!--<script type="text/javascript" src="js/superadmin/callreports.js"></script>-->
<script type="text/javascript" src="js/superadmin/common.js"></script>
<div class="grid_10" align="center">
            <div class="box round first">
                <h2><?php echo $title;?></h2>
                <div class="block">
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>
<div id="tabs">
    <div id="read" ><br />
        <table id="grid_name" cellpadding="0" cellspacing="0"></table>
	<div id="pager2" class="scroll" style="text-align: center;"></div>
    </div>
</div> <!-- end tabs -->
<form method="post" action="index.php/superadmin/callreports/">
<table width="100%" cellspacing="1" cellpadding="5" border="0">
				<tbody>
					<tr>
                    			<td style="padding-left: 75px" width="50%"><b>COMPANY:</b> </td>
								<td>
									<select name="company">
										<option>Please Select</option>
										<?php foreach($companylist as $value) 
										 { 
										 ?>
										<option value="<?php echo $value['cmp_unique_id'];?>" <?php if($value['cmp_unique_id']==$cmp_unique_id){?>selected="selected"<?php }?> ><?php  echo $value['company_name']; ?></option>
										<?php } ?>
									</select>	
								</td>
							<td><br /><br /><br /></td>
							</tr>
					<tr>
						<td style="padding-left: 75px" width="50%"><b> TOTAL CALLS:</b></td>
						<td width="50%"><?php echo (int)($answeredcalls+$missedcalls);?></td>
						
						<td><br /><br /><br /></td>
					</tr>
					<tr>
						<td style="padding-left: 75px" width="50%"><b>RECIEVED CALLS:</b></td>
						<td width="50%"><?php echo $answeredcalls;?></td>
						<td><br /><br /><br /></td>
					</tr>
					<tr>
						<td style="padding-left: 75px" width="50%"><b>MISSED CALLS:</b></td>
						<td width="50%"><?php echo $missedcalls;?></td>
						<td><br /><br /><br /><br /><br /><br /></td>
					</tr>
					<tr>
						<td style="padding-left: 250px" width="50%">
						<input type="submit" name="submitreport" value="Get Report" class="btn"/>
						</td>
						
					</tr>
				</tbody>
			</table>
	</form>							

</div>
</div>	
</div>
        
    



