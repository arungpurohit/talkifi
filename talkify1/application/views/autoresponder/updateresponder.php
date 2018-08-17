<script src="js/autoresponder.js" type="text/javascript"></script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<style type="text/css">

</style>
<div class="grid_10">
            <div class="box round first">
                <h2> Auto Responder </h2>
                <div class="block ">
				
				<div id="update">
				
         			<form action="index.php/autoresponder/update/<?php echo $response[0]->autoresponder_id;?>" method="post">
					
					<?php echo validation_errors();?>
					<input type="hidden" name="autoresponder_id" value="<?php echo $response[0]->autoresponder_id;?>" />
					
							<table width="100%" class="form" >
							<tr>
								<td colspan="4"></td>
							  </tr>
							  <tr>
								<td>Auto Reponder Name</td>
								<td>:</td>
								
								<td width="69%"><input type="text" name="autoresponder_name" id="autoresponder_name" class="medium" value="<?php echo $response[0]->autoresponder_name; ?>"/></td>
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
								<td><input type="text" name="autoresponder_subject" id="autoresponder_subject" class="medium" value="<?php echo $response [0]->autoresponder_subject; ?>" /></td>
							  </tr>
							  <tr>
								<td>Body</td>
								<td>:</td>
								<td> <textarea id="autoresponder_body" name="autoresponder_body" class="tinymce" >
										<?php echo $response [0]->autoresponder_body; ?>
										</textarea>
								</td>
							  </tr>
							  <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><input type="submit" name="update" class="btn" value="updateauto"/>&nbsp;
									<input type="reset" name="cmp_reset" class="btn" value="Reset"/>
									</td>
								</tr>
							
							</table>
					
                    </form>
   		 </div>
                </div>
            </div>
        </div>
