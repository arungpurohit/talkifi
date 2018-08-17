<link rel="stylesheet" type="text/css" href="css/role.css" />
<script type="text/javascript" src="js/superadmin/common.js"></script>
<div class="grid_10">
            <div class="box round first fullpage">
                <h2> Roles and Permission</h2>
				<div class="block ">
                   <form method="post" action="index.php/superadmin/modules_display/updateRole/<?php echo $moduleslist->company_id?>">
					<input name="company_id" type="hidden"  value="<?php echo $moduleslist->company_id?>"/>
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
                    			<td style="padding: 10px;"><b>MODULES:</b> </td>
                    		</tr>
							<?php 
							$i=1;
							$listmodule = explode(':',$moduleslist->modules_purchased);
							array_pop($listmodule);
							$listmodule= array_flip($listmodule);
							foreach($modules_present as $key=> $val)
							{
							
							if($i%7==0)
							{ ?>
                    		<tr nowrap="nowrap">
							<?php }?>
                    		<td style="padding: 10px;"><input type="checkbox" name="module_name[]" 
							<?php 
							if(array_key_exists($val['module_name'],$listmodule)){?> checked="checked" <?php }?> value="<?php echo $val['module_name'];?>" /> : <?php echo $val['module_name'];?>  </td>                    		<?php 
							if($i/7==0)
							{  ?>
							</tr>
							<?php }
							$i++; }?>
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



