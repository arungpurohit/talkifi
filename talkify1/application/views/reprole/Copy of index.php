<script src="js/company_details.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Rep model Details </h2>
                <div class="block ">

                    <?php 	echo form_open_multipart('/reprole/');?>
                    
					<table width="100%" border="1">
					 <tr>
					 <td colspan="2" ><?PHP echo validation_errors();?></td>
					 </tr>
					  <tr>
						<td>role name:</td>
						<td>
						<input type="text" name="role name"  /></td>
					  </tr>
					  <tr>
						<td></td>
						<td><input type="submit" name="submit"  /></td>
					  </tr>
				</table>
					
                    </form>
                </div>
				
				<div id="block">
				
				<table width="100%" border="1">
					<tr>
					<th >role id</th><th>role name</th>
					</tr>
					<?php foreach($dbvalues as $val):?>
					<tr>
						<td > <?php echo $val->role_id;?></td>
						<td><?php echo $val->role_name;?></td>
					</tr>
					<?php endforeach;?>
				</table>
				</div>
				
				
				
            </div>
        </div>


