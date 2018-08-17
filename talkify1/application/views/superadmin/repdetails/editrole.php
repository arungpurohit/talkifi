<link rel="stylesheet" type="text/css" href="css/role.css" />
<script type="text/javascript" src="js/superadmin/common.js"></script>
<div class="grid_10">
            <div class="box round first fullpage">
                <h2> Reps Permission</h2>
				<div class="block ">
                   <form method="post" action="index.php/superadmin/repdetails_display/updateReps/<?php echo $moduleslist->ccmp_id?>">
					<input name="ccmp_id" type="hidden"  value="<?php echo $moduleslist->ccmp_id?>"/>
                    <table>
						<tr>
                    			<td style="padding: 10px;" nowrap="nowrap">
                    			<?php echo validation_errors();?>
								</td>
                    		</tr>
							<tr>
                    		<td style="padding: 10px;"><b>Company Name: </b></td>
                    			<td width="110"><input name="role_name" disabled="disabled" type="text" value="<?php echo $moduleslist->company_name;?>"/></td>
                    			<td></td>
                    		</tr>
                    	</table>
                    	<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;"><b> No Of REPS:</b> </td>
								<td><?php  //echo $moduleslist->nooftelephonyusers;?>
								<select name="noofreps">
									<option value="">Please select</option>
									<?php for($i=1;$i<20;$i++)
									{?>
										<option <?php if($i==$moduleslist->nooftelephonyusers){?> selected="selected" <?php }?>value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php }?>
								</select>
								</td>
							
							</tr>
							<?php /*?><?php 
							$i=1;
							$listmodule = explode(':',$moduleslist->nooftelephonyusers);
							array_pop($listmodule);
							$listmodule= array_flip($listmodule);
							foreach($modules_present as $key=> $val)
							{
							
							if($i%7==0)
							{ ?>
                    		<tr nowrap="nowrap">
							<?php }?><?php */?>
                    		<?php /*?><td style="padding: 10px;"><input type="checkbox" name="module_name[]" 
							<?php 
							if(array_key_exists($val['module_name'],$listmodule)){?> checked="checked" <?php }?> value="<?php echo $val['module_name'];?>" /> : <?php echo $val['module_name'];?>  </td>                    		<?php 
							if($i/7==0)
							{  ?>
							</tr>
							<?php }
							$i++; }?><?php */?>
							
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



