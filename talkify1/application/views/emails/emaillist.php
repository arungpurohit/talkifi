<div class="grid_10">
            <div class="box round first">
                <h2>Email List</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    
    <ul>
		<!--<button class="btn btn-grey btn-small">Delete All</button>-->
		<a href="index.php/emailconf/"><button class="btn btn-grey btn-small" >Add New Email</button></a>
    </ul>
    <div id="read">

        <table id="records" border="1">
            <thead>
                <tr>
                    <th><input type="checkbox" name="email_conf_id" /></th>
					<th>User Name</th>
                    <th>Email Address</th>
					<th>Category</th>
					<th>Priority</th>
                    <th>Last Downloaded</th>
					<th>Action</th>
                </tr>
	            </thead>
            <tbody>
<?php foreach($results as $val):?>
			<tr align="center" > 
			<td><input type="checkbox" name="email_conf_id<?php echo $val['email_conf_id'];?>" /></td>
			<!--<td><div id="colorSelectorForeground"><div style="background-color: ; width:30px; height:30px; border: 2px solid #000000;"></div></div></td>-->
			<td><?php echo $val['email_conf_emailaddr'];?></td>
			<td><?php echo $val['email_conf_emailid'];?></td>
			<td><?php echo $val['lead_category_name'];?></td>
			<td><?php echo $val['lead_priority_name'];?></td>
			<td><?php echo $val['email_conf_last_downloaded'];?></td>
			<td><a class="updateBtn" href="index.php/emailconf/update/<?php echo $val['email_conf_id'];?>">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
			</tr>
<?php endforeach;?>			
			</tbody>
        </table>
    </div>

</div> <!-- end tabs -->



<script type="text/javascript" src="js/emails.js"></script>
						
										
                </div>
            </div>
            
        </div>