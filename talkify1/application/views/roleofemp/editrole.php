<link rel="stylesheet" type="text/css" href="css/role.css" />
<script type="text/javascript" src="js/common.js"></script>
<div class="grid_10">
            <div class="box round first fullpage">
                <h2> Roles and Permission</h2>
				<div class="block ">
                   <form method="post" action="index.php/roleofemp/updateRole/<?php echo $groups[0]->id;?>">
					<input name="role_id" type="hidden"  value="<?php echo $groups[0]->id;?>"/>
                    <table>
						<tr>
                    			<td style="padding: 10px;" nowrap="nowrap">
                    			<?php echo validation_errors();?>
								</td>
                    		</tr>
							<tr>
                    		<td style="padding: 10px;"><b>ROLE Name: </b></td>
                    			<td width="110"><input name="role_name" disabled="disabled" type="text" value="<?php echo $groups[0]->name;?>"/></td>
                    			<td></td>
                    		</tr>
                    	</table>
                    	<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;"><b>MODULES:</b> </td>
                    		</tr>
							<?php 
							$moduleary= explode(':',$groups[0]->page_perm);
							$moduleary=array_flip($moduleary);
							$i=1;
							$listmodule = explode(':',$moduleslist->modules_purchased);
							array_pop($listmodule);
							foreach($listmodule as $val)
							{
							if($i%7==0)
							{ ?>
                    		<tr nowrap="nowrap">
							<?php }?>
                    		<td style="padding: 10px;"><input type="checkbox" name="module_name[]" 
							<?php 
							if(array_key_exists($val,$moduleary)){?> checked="checked" <?php }?> value="<?php echo $val;?>" /> : <?php echo $val;?>  </td>                    		<?php 
							if($i/7==0)
							{  ?>
							</tr>
							<?php }
							$i++; }?>
                    	</table>
						<hr>
                    	<table>
                    		<tr>
                    			<td style="padding: 10px;" width="180px;"><b>LEAD ATTRIBUTES: </b></td>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Category:</b>&nbsp;&nbsp;&nbsp;</td>
                    		<?php 
								$categoryperm= explode(',',$groups[0]->category_perm);
								foreach($category as $key=>$value){?>
                    			<td style="padding: 10px;">
								<input type="checkbox" <?php if(in_array($key,$categoryperm)){?>checked="checked" <?php }?> name="category[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    		<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Type:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php 
								$typesperm= explode(',',$groups[0]->types_perm);
								foreach($types as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($key,$typesperm)){?>checked="checked" <?php }?> name="types[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Status:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php 
								$statusperm= explode(',',$groups[0]->status_perm);
								foreach($status as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($key,$statusperm)){?>checked="checked" <?php }?>  name="status[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Channel:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php 
								$channelsperm= explode(',',$groups[0]->channels_perm);
								foreach($channels as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($key,$channelsperm)){?>checked="checked" <?php }?> name="channels[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>Priority:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php
								$priorityperm= explode(',',$groups[0]->priority_perm);
								 foreach($priority as $key=>$value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($key,$priorityperm)){?>checked="checked" <?php }?> name="priority[]" value="<?php echo $key;?>" /><?php echo $value;	?></td>
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
                    			<?php 
								$assignperm= explode(',',$groups[0]->assign_perm);
								foreach($reps as $value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($value['id'],$assignperm)){?>checked="checked" <?php }?>  name="assignperm[]" value="<?php echo $value['id'];?>" /><?php echo $value['first_name'];	?></td>
                    			<?php }?>
                    		</tr>
                    		<tr>
                    			<td style="padding: 10px;"><b>View Other Leads:</b>&nbsp;&nbsp;&nbsp;</td>
                    			<?php 
								$otherleads= explode(',',$groups[0]->other_leads_view);	
								foreach($reps as $value){?>
                    			<td style="padding: 10px;"> <input type="checkbox" <?php if(in_array($value['id'],$otherleads)){?>checked="checked" <?php }?> name="otherleads[]" value="<?php echo $value['id'];?>" /><?php echo $value['first_name'];	?></td>
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



