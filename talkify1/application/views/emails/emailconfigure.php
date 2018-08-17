<script src="js/emails.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Configure Email for Download  </h2>
                <div class="block ">
                    <form method="post">
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
						<td width="84%"><input type="text" name="username" id="username" class="medium" /></td>
					  </tr>
					  <tr>
						<td>Email Address</td>
						<td>:</td>
						<td><input type="text" name="emailaddress" id="emailaddress" class="medium"  /></td>
					  </tr>
					  <tr>
						<td>Email Password</td>
						<td>:</td>
						<td><input type="password" name="emailpass" id="emailpass" class="medium" /></td>
					  </tr>
					  <tr>
						<td>Pop</td>
						<td>:</td>
						<td><input type="text" name="pop" id="pop" class="medium" /></td>
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
                            <td>NO rep group configured
                            </td>
							<td>
                                <label>
                                    Status</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('status',$status);?>
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
				<div id="selectClient" title="selectClient">
    <div>
        <table id="records">
            <thead>
                <tr>
                    <th>User name</th>
                    <th>First name</th>
					<th>Last name</th>
					<th>Email</th>
					<th>Phone</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
		<script type="text/template" id="readTemplate">
    	<tr id="${client_id}">
			<td><a class="cl_username" href="${client_username}">${client_username}</a></td>
			<td>${client_fname}</td>
			<td>${client_lname}</td>
			<td>${client_email}</td>
			<td>${client_phone}</td>
		</tr>
</script>
    </div>
</div>	
				
            </div>
        </div>
