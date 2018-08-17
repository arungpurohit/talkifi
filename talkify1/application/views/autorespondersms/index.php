<div class="grid_10">
            <div class="box round first">
                <h2>Auto Responder Sms List</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    
    <ul>
		<!--<button class="btn btn-grey btn-small">Delete All</button>-->
		<br>
		<a href="index.php/autorespondersms/create/"><button class="btn btn-grey btn-small" >Add New Auto Responder Sms</button></a>
    </ul>
   <div id="read">

        <table id="records" border="1">
            <thead>
                <tr>
                    <th><input type="checkbox" name="sms_id" /></th>
					<th>Auto Reponder Sms Name</th>
					<th>Subject</th>
                    <th>Action</th>
                </tr>
	            </thead>
            <tbody>
<?php foreach($results as $val):?>

			<tr align="center" > 
			<td><input type="checkbox" name="sms_id<?php echo $val['autorespondersms_id'];?>" /></td>
			<td><?php echo $val['autorespondersms_name'];?></td>
			<td><?php echo $val['autorespondersms_subject'];?></td>
			<td><a class="updateBtn" href="index.php/autorespondersms/update/<?php echo $val['autorespondersms_id'];?>">Update</a> <!--| <a class="deleteBtn" href="${deleteLink}">Delete</a>--></td>
			</tr>
<?php endforeach;?>			
		
			</tbody>
        </table>
    </div>

</div> <!-- end tabs -->



<script type="text/javascript" src="js/autoressms.js"></script>
	<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>					
										
                </div>
            </div>
            
        </div>