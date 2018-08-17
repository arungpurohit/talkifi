<script src="js/emails.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Email Compose </h2>
                <div class="block ">
                    <form method="post">
                    <table width="100%" class="form" >
					 <tr>
						<td colspan="3"><?php echo validation_errors();?></td>
					  </tr>
					  <tr>
						<td>To</td>
						<td>:</td>
						<td><input type="text" name="email_to" id="email_to" class="medium" /></td>
					  </tr>
					  <tr>
						<td>CC</td>
						<td>:</td>
						<td><input type="text" name="email_cc" id="email_cc" class="medium" onclick="someclick();" /></td>
					  </tr>
					  <tr>
						<td>BCC</td>
						<td>:</td>
						<td><input type="text" name="email_bcc" id="email_bcc" class="medium" /></td>
					  </tr>
					  <tr>
						<td>Subject</td>
						<td>:</td>
						<td><input type="text" name="subject" id="subject" class="medium" /></td>
					  </tr>
					  <tr>
						<td>Body</td>
						<td>:</td>
						<td> <textarea id="msgbody" name="msgbody" class="tinymce">
						<?php echo $templatess;?>
						</textarea>
						</td>
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
        
