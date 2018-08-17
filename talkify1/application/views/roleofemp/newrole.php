<link rel="stylesheet" type="text/css" href="css/role.css" />
<script type="text/javascript" src="js/common.js"></script>

<div class="grid_10">
            <div class="box round first fullpage">
                <h2> Roles and Permission</h2>
				<div class="block ">
                    <form method="post" action="index.php/Add-New-Role">

                    <table>
						<tr>
                    			<td style="padding: 10px;" nowrap="nowrap">
                    			<?php echo validation_errors();?>
								</td>
                    		</tr>
							<tr>
                    		<td style="padding: 10px;"><b>ROLE Name: </b></td>
                    			<td width="110"><input name="role_name" type="text"/></td>
                    			<td>* (Mandatory)&nbsp;</td>
                    		</tr>
                    	</table>
                    	<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;"><b>MODULES:</b> </td>
                    		</tr>
							<?php 
								$listmodule = explode(':',$moduleslist->modules_purchased);
								array_pop($listmodule);
								$i=1;
								foreach($listmodule as $val)
								{
									if($i%7==0)
									{ ?>
									<tr nowrap="nowrap">
									<?php }?>
									<td style="padding: 10px;"><input type="checkbox" name="module_name[]"  value="<?php echo $val;?>" /> : <?php echo $val;?> 							</td><?php 
									if($i/7==0)
									{  ?>
									</tr>
									<?php } $i++; }?>
                    	</table>
						<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;" width="180px;"><b>LEAD ATTRIBUTES: </b></td>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Category:</b>&nbsp;&nbsp;&nbsp;</td>
                    		<?php foreach($category as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="category[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    		<?php }?>
                    			
                    			
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Type:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($types as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="types[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Status:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($status as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="status[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Channel:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($channels as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="channels[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Priority:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($priority as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="priority[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    	</table>
						
						<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;"><B>REP:</B> </td>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Assigned to:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($reps as $value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="assignperm[]" value="<?php echo $value['id'];?>" /><?php echo $value['first_name'];	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>View Other Leads:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php foreach($reps as $value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" checked="checked" name="otherleads[]" value="<?php echo $value['id'];?>" /><?php echo $value['first_name'];	?></td>
                    			<?php }?>
                    		</tr>
                    	</table>
                    	<hr>
                      <table border="1">
						 <tr>
							<td height="28" colspan="2" align="center">
								<input type="submit" name="sms_submit" class="btn" value="Submit"/>&nbsp;
								<input type="reset" name="sms_reset" class="btn" value="Reset"/>
   						  	</td>
						</tr>
                      </table>
                    </form>
		</div>			
				
	</div>
</div>



