<div class="grid_10">
            <div class="box round first">
                <h2>Auto Responder List</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    
    <ul>
		<!--<button class="btn btn-grey btn-small">Delete All</button>-->
		<a href="index.php/autoresponder/create/"><button class="btn btn-grey btn-small" >Add New Auto Responder</button></a>
    </ul>
    <div id="read">

        <table id="records" border="1">
            <thead>
                <tr>
                    <th><input type="checkbox" name="email_conf_id" /></th>
					<th>Auto Reponder Name</th>
					<th>Subject</th>
                    <th>Action</th>
                </tr>
	            </thead>
            <tbody>
<?php foreach($results as $val):?>
			<tr align="center" > 
			<td><input type="checkbox" name="email_conf_id<?php echo $val['autoresponder_id'];?>" /></td>
			<td><?php echo $val['autoresponder_name'];?></td>
			<td><?php echo $val['autoresponder_subject'];?></td>
			<td><a class="updateBtn" href="index.php/autoresponder/update/<?php echo $val['autoresponder_id'];?>">Update</a> <!--| <a class="deleteBtn" href="${deleteLink}">Delete</a>--></td>
			</tr>
<?php endforeach;?>			
			</tbody>
        </table>
    </div>

</div> <!-- end tabs -->



<script type="text/javascript" src="js/autoresponder.js"></script>
	<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>					
										
                </div>
            </div>
            
        </div>