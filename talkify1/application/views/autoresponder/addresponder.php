<script src="js/autoresponder.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>

<div class="grid_10">
            <div class="box round first">
                <h2>Add New Auto Responder </h2>
                <div class="block ">
				
				<div id="create">
				
         			<form method="post" action="index.php/autoresponder/create">
					<?php echo validation_errors();?>
							<table width="100%" class="form" >
							<tr>
								<td colspan="4"></td>
							  </tr>
							  <tr>
								<td>Auto Responder Name</td>
								<td>:</td>
								
								<td width="69%"><input type="text" name="autoresponder_name" id="autoresponder_name" class="medium" /></td>
								<td rowspan="4">
							<ul>
									<li>UserName</li>
									<li>FirstName</li>
									<li>LastName</li>
									<li>RepName</li>
									<li>CompanyName</li>
									<li>RepMobile</li>
							  </ul>
							 </td>
							  </tr>
								<td>Subject</td>
								<td>:</td>
								<td><input type="text" name="autoresponder_subject" id="autoresponder_subject" class="medium" /></td>
							  </tr>
							  <tr>
								<td>Body</td>
								<td>:</td>
								<td> <textarea id="autoresponder_body" name="autoresponder_body" class="tinymce">
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
                </div>
            </div>
        </div>
