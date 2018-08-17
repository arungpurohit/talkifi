<script type="text/javascript" src="js/sms.js"></script>
<div class="grid_10">
            <div class="box round first fullpage">
                <h2> SMS Send </h2>
				
                <div class="block ">
				<button class="btn btn-grey btn-small" id="ctemp">Choose Template</button>
				<button class="btn btn-grey btn-small" id="create">Create Template</button>
				<br />
	<br />

<form method="post">
 <table border="1">
  <tr>
    <td width="340">
		<table  border="0" class="form">
		<?php if(validation_errors()) {?>
		<tr>
				<td colspan="2"  ><span class="error"><?php echo validation_errors();?></span></td>
				</tr>
	<?php }	?>
				<tr>
				<td width="80">TO:</td>
				<td width="253">
				<input type="text" class="medium" name="mobile_numbers" id="mobile_numbers"/></td>
				</tr>
				<tr>
				<td>Content:</td>
				<td>
				<textarea id="sms_content" name="sms_content"></textarea></td>
				</tr>
				<tr>
				<td>Word Count:</td>
				<td ><input type="text" name="sms_word_count" maxlength="100" size="3" value="135" /></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" align="center">
						<input type="submit" name="sms_submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="sms_reset" class="btn" value="Reset"/>
				</td>
				</tr>
		</table>

	
	</td>
	
<td width="730" >
	<div id="sms_tab">
	 <ul>
	 	<li><a href="#existing">Existing</a></li>
        <li><a href="#builtin">Built In</a></li>
        <li><a href="#newcreate">Birthday wishes</a></li>
		 <li><a href="#newcreate">Anniversery wishes</a></li>
		  <li><a href="#newcreate">Thanking Messages</a></li>
    </ul>
	<div id="existing">
			<div id="smsaccordion">
			<h3><a href="#">Welcome Message</a></h3>
			<div>
			<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. </p>
			</div>
			<h3><a href="#">Thank you messages</a></h3>
			<div>
			<p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
			</div>
			<h3><a href="#">Wishes</a></h3>
			<div>
			<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
			<ul>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
			</ul>
			</div>
			<h3><a href="#">Payment</a></h3>
			<div>
			<p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
			</div>
			</div>
	</div>
	<div id="builtin">
		<div id="builtinaccordion">
			<h3><a href="#">Welcome Message</a></h3>
			<div>
			<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. </p>
			</div>
			<h3><a href="#">Thank you messages</a></h3>
			<div>
			<p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
			</div>
			<h3><a href="#">Wishes</a></h3>
			<div>
			<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
			<ul>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
			</ul>
			</div>
			<h3><a href="#">Payment</a></h3>
			<div>
			<p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
			</div>
			</div>
	</div>
<div id="newcreate">
<form method="post">
  <table  border="0">
  <?php if(validation_errors()) {?>
  <tr><tr>
				<td colspan="2"  ><span class="error"><?php echo validation_errors();?></span></td>
				</tr>
	<?php }	?>
    <td width="296">
	<table width="100%" class="form">
	
	<tr>
    <td><b>Template Name:</b> <input type="text" name="smstemplate_name" id="smstemplate_name" class="medium" /> </td>
  </tr><br /><br />
  
  <tr>
    <td><b>SMS Content :</b> <textarea id="newsms_content" name="newsms_content"></textarea></td>
  </tr>
  <tr>
    <td><b>Word Count :</b> <input type="text" name="newsms_word_count" maxlength="3" size="3" value="135" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="sms_submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="sms_reset" class="btn" value="Reset"/>
	</td>
  </tr>
</table>

	</td>
    <td width="33">
	<ul>
		<li>$UserName$</li>
		<li>$FirstName$</li>
		<li>$LastName$</li>
		<li>$RepName$</li>
		<li>$CompanyName$</li>
		<li>$RepMobile$</li>
	</ul>
	</td>
  </tr>
</table>
</form>
</div>
	</div>
	
	</td>
  </tr>
</table>
					
</form>
					
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
        </div>

