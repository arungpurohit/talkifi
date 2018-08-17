<div class="grid_10">
            <div class="box round first">
                <h2>
                   Repsinfo</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="http://localhost/talkify/images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    
    <ul>
        <li><a href="#read">Read</a></li>
        <li><a href="#create">Create</a></li>
		<button class="btn btn-grey btn-small">Delete All</button>
    </ul>
    
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <td><input type="checkbox" name="checkAllRepsinfo" /></td>
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
               <input type="text" id="repsinfo_username " name="repsinfo_username " />
           </p>
           
           <p>
               <label for="cEmail">Password:</label>
               <input type="password" id="repsinfo_password" name="repsinfo_password" />
           </p>
		   <p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="repsinfo_fname" name="repsinfo_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="repsinfo_lname" name="repsinfo_lname" />
           </p>
			<p>
               <label for="cEmail">Email:</label>
               <input type="text" id="repsinfo_email" name="repsinfo_email" />
           </p>
		   <p>
               <label for="cEmail">Mobile:</label>
               <input type="text" id="repsinfo_phone" name="repsinfo_phone" />
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
               <input type="text" id="urepsinfo_username" name="urepsinfo_username"  />
           </p>
           
           <p>
               <label for="cEmail">Password:</label>
               <input type="password" id="urepsinfo_password" name="urepsinfo_password" />
           </p>
		   <p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="urepsinfo_fname" name="urepsinfo_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="urepsinfo_lname" name="urepsinfo_lname" />
           </p>
			<p>
               <label for="cEmail">Email:</label>
               <input type="text" id="urepsinfo_email" name="urrepsinfo_email" />
           </p>
		   <p>
               <label for="cEmail">Mobile:</label>
               <input type="text" id="urepsinfo_phone" name="urepsinfo_phone" />
           </p>
            <input type="hidden" id="repsinfo_id " name="repsinfo_id " />
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
    <tr id="${repsinfo_id }">
        <td><input type="checkbox" name="checkAllRepsinfo${repsinfo_id }" /></td>
        <td>${repsinfo_username}</td>
        <td>${repsinfo_email}</td>
		<td>${repsinfo_phone}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="http://localhost/talkify/js/repsinfo.js"></script>
						
										
                </div>
            </div>
            
        </div>
        
        <div class="clear">
        </div>
    </div>