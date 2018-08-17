<script src="js/emails.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Configure Email for Download  </h2>
                <div class="block ">
                    <form method="post" action="index.php/emailconf/updateEmail/<?php echo $getEmailUpdate[0]['email_conf_id'];?>" >
					<input type="hidden" name="email_conf_id" value="<?php echo $getEmailUpdate[0]['email_conf_id'];?>" />
                    <table width="100%" class="form" >
					<tr><td colspan="3">
					<marquee style="color:#FF0000"><h3>Caution: Do not configure personal Email Id's</h3></marquee>
					</td>
					</tr>
					 <tr>
						<td colspan="3"><?php echo validation_errors();
							if(isset($err_msg))
							echo $err_msg;?></td>
					  </tr>
					  
					  <tr>
						<td width="14%">User Name</td>
						<td width="2%">:</td>
						<td width="84%"><input type="text" name="username" id="username" class="medium" value="<?php echo  $getEmailUpdate[0]['email_conf_emailaddr'];?>" disabled="disabled"  /></td>
					  </tr>
					  <tr>
						<td>Email Address</td>
						<td>:</td>
						<td><input type="text" name="emailaddress" id="emailaddress" class="medium" value="<?php echo  $getEmailUpdate[0]['email_conf_emailid'];?>" disabled="disabled"  /></td>
					  </tr>
					  <tr>
						<td>Email Password</td>
						<td>:</td>
						<td><input type="password" name="emailpass" id="emailpass" class="medium" value="<?php echo  $getEmailUpdate[0]['email_conf_emailpass'];?>"  /></td>
					  </tr>
					  <tr>
						<td>Pop</td>
						<td>:</td>
						<td><input type="text" name="pop" id="pop" tabindex="1" class="medium" value="<?php echo  $getEmailUpdate[0]['email_conf_pop'];?>" disabled="disabled"/></td>
					  </tr>
					  <tr>
						<td colspan="3">&nbsp;</td>
						 </tr>
						 <tr>
						 <td colspan="3">
						 <h2>Assign below values </h2></td>
					  </tr>
						 </tr>
						 <tr>
						<td colspan="3">
						<table class="form">
                         <tr>
                            <td>
                                <label>Rep Group name </label>
                            </td>
                            <td>
							<select id="roleofemp" name="roleofemp" >
				 				 <option value="">Please Select</option>
				  				 <?php 
				   					foreach($groupsview as $key=>$vals)
									{
				  					 ?>
				 				  <option value="<?php echo $vals['id'];?>"><?php echo $vals['name'];?></option>
				   					<?php }?>
			  					 </select>
                            </td>
							<td>
                                <label>
                                    Status</label>
                            </td>
                            <td>
                                <?php 
								echo form_dropdown('status',$status);?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Types </label>
                            </td>
                            <td>
                                <?php echo form_dropdown('types',$types);?>
                            </td>
							<td >
                                <label>Priority</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('priority',$priority);?>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Category</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('category',$category);?>
                            </td>
							<td>
							<label>
                                    Channels </label>
                            </td>
                            <td>
                               <?php echo form_dropdown('channels',$channels );?> 
                            </td>
				     </tr>
					 
                    </table>
						
						</td>
					  </tr>
						  <tr>
						<td colspan="3">&nbsp;</td>
						 </tr>
						
					  <tr>
                            <td>&nbsp;</td>
							<td>&nbsp;</td>
                            <td><input type="submit" name="cmp_submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="Reset"/>
							</td>
						</tr>
					</table>
                    </form>
                </div>
				
            </div>
        </div>
