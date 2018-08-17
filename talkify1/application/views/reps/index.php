<div class="grid_10">
            <div class="box round first">
                <h2>
                   Rep Details</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="http://localhost/talkify/images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    <button class="btn btn-grey btn-small">Delete All</button><br />
    <ul>
        <li><a href="#read">Read</a></li>
        <li><a href="#create">Create</a></li>
		<!--<button class="btn btn-grey btn-small">Delete All</button>-->
    </ul>
    
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <th><input type="checkbox" name="checkAllRep" /></th>
                    <th>User Name</th>
                    <th>Email</th>
					<th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">

        <form action="" method="post" >
           <p>
               <label for="cName">User Name:</label>
               <input type="text" id="rep_username" name="rep_username" />
           </p>
           
           <p>
               <label for="cEmail">Password:</label>
               <input type="password" id="rep_password" name="rep_password" />
           </p>
		   <p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="rep_fname" name="rep_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="rep_lname" name="rep_lname" />
           </p>
			<p>
               <label for="cEmail">Email:</label>
               <input type="text" id="rep_email" name="rep_email" />
           </p>
		   <p>
               <label for="cEmail">Mobile:</label>
               <input type="text" id="rep_phone" name="rep_phone" />
           </p>
		   <p>
               <label for="cEmail">Role of Emp:</label>
               <select id="roleofemp" name="roleofemp" >
				  <option value="">Please Select</option>
				   <?php 
				   	foreach($groupsview as $key=>$vals)
					{
				   ?>
				   <option value="<?php echo $vals['id'];?>"><?php echo $vals['name'];?></option>
				   <?php }?>
			   </select>
           </p>
		   
           <p>
               <label>&nbsp;</label>
               <input type="submit" name="createSubmit" value="Submit" />
           </p>
        </form>
    </div>

</div> <!-- end tabs -->

<!-- update form in dialog box -->
<div id="updateDialog" title="Update">
    <div>
        <form action="" method="post" >
           <p>
               <label for="cName">User Name:</label>
               <input type="text" id="urep_username" name="urep_username" disabled="disabled" />
           </p>
           
           <!--<p>
               <label for="cEmail">Password:</label>
               <input type="password" id="urep_password" name="urep_password" />
           </p>-->
		   <p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="urep_fname" name="urep_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="urep_lname" name="urep_lname" />
           </p>
			<p>
               <label for="cEmail">Email:</label>
               <input type="text" id="urep_email" name="urep_email" />
           </p>
		   <p>
               <label for="cEmail">Mobile:</label>
               <input type="text" id="urep_phone" name="urep_phone" />
           </p>
            <input type="hidden" id="rep_id" name="rep_id" />
        </form>
    </div>
</div>

<!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirm">
    <p>Are you sure?</p>
</div>


<!-- message dialog box -->
<div id="msgDialog"><p></p></div>


<script type="text/template" id="readTemplate">
    <tr id="${id}">
        <td><input type="checkbox" name="checkAllRep${id}" /></td>
        <td>${username}</td>
        <td>${email}</td>
		<td>${phone}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/reps.js"></script>
						
										
                </div>
            </div>
            
        </div>
        
        <div class="clear">
        </div>
    </div>