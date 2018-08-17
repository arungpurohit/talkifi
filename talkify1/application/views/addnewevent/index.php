<script src="js/company_details.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Add New Event </h2>
                <div class="block ">
				 <?php echo form_open_multipart('addnewevent');?>
				 	<?php echo validation_errors();?>
					<table width="100%" border="1">
					  <tr>
						<td>What:</td>
						<td>
							<input type="what" name="what" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Start Date:</td>
						<td>
							<input type="text" name="start_date" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Start Hour:</td>
						<td>
							<input type="text" name="start_hour" /><br><br>
						</td>
					  </tr>
					   <tr>
						<td>Start Minute:</td>
				         <td>
							<input type="text" name="start_minute" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Start AM/PM:</td>
						
						<td>
							<input type="text" name="startam/pm" /><br><br>
						</td>
						<td><select>
							<option value="am">AM</option>
							<option value="pm">PM</option>
						</select></td>
					  </tr>
					  <tr>
						<td>End Date:</td>
						<td>
							<input type="text" name="end_date" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>End Hour:</td>
						<td>
							<input type="text" name="end_hour" /><br><br>
						</td>
					  </tr>
					   <tr>
						<td>End Minute:</td>
				         <td>
							<input type="text" name="end_minute" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>End AM/PM:</td>
						<td>
							<input type="text" name="end_am/pm" /><br><br>
						</td>
					  </tr>
					   <tr>
						<td>Background Color:</td>
						<td>
							<input type="text" name="backg_color" /><br><br>
						</td>
					  </tr>
					  <tr>
						<td>Text Color:</td>
						<td>
							<input type="text" name="text_color" /><br><br>
						</td>
					  
					  
					  <tr>
						<td></td>
						<td><input type="submit" name="submit"  /></td>
					  </tr>
					</table>
			</form>
		
			</div>
	   </div>
</div>	