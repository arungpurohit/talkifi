<script src="js/company_details.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Adevent </h2>
                <div class="block ">
				
				 <?php echo form_open_multipart('adevent');?>
				 	<?php echo validation_errors();?>
					<table width="100%" border="1">
					  <tr>
						<td>Title:</td>
						<td>
							<input type="text" name="title" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Start Date:</td>
						<td>
							<input type="text" name="start date" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>End Date:</td>
						<td>
							<input type="text" name="end date" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Start Time:</td>
						<td>
							<input type="text" name="start time" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>End Time:</td>
				         <td>
							<input type="text" name="end time" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Location:</td>
						<td>
							<input type="text" name="location" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Type:</td>
						<td>
							<input type="text" name="type" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Notes:</td>
						<td>
							<textarea class="tinymce">notes</textarea><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Webaddress</td>
						<td>
							<input type="text" name="webaddress" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td></td>
						<td><input type="submit" name="submit"  /></td>
					  </tr>
					</table>
			</form>
		
			</div>
	   </div>
</div>	