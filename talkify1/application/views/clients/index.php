<div class="grid_10">
            <div class="box round first">
                <h2>
                   Clients Details</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    <button class="btn btn-grey btn-small">Delete All</button><br />
    <ul>
        <li><a href="#read">Read</a></li>
        <li><a href="#create">Create</a></li>
    </ul>
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <th><input type="checkbox" name="checkAllStat" /></th>
                    <th>User name</th>
                    <th>First name</th>
					<th>Last name</th>
					<th>Email</th>
					<th>Phone</th>
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
               <input type="text" id="client_username" name="client_username" />
           </p>
            <p>
               <label for="cColor">Password:</label>
               <input type="password" id="client_password" name="client_password" />
           </p>
			<p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="cleint_fname" name="client_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="client_lname" name="client_lname" />
           </p>
		   <p>
               <label for="cEmail">Email:</label>
               <input type="text" id="client_email" name="client_email" />
           </p>
		   <p>
               <label for="cEmail">Phone:</label>
               <input type="text" id="client_phone" name="client_phone" />
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
               <input type="text" id="uclient_username" name="uclient_username" />
           </p>
            <p>
               <label for="cColor">Password:</label>
               <input type="password" id="uclient_password" name="uclient_password" value="******" />
           </p>
			<p>
               <label for="cEmail">First Name:</label>
               <input type="text" id="uclient_fname" name="uclient_fname" />
           </p>
			<p>
               <label for="cEmail">Last Name:</label>
               <input type="text" id="uclient_lname" name="uclient_lname" />
           </p>
		   <p>
               <label for="cEmail">Email:</label>
               <input type="text" id="uclient_email" name="uclient_email" />
           </p>
		   <p>
               <label for="cEmail">Phone:</label>
               <input type="text" id="uclient_phone" name="uclient_phone" />
           </p>
            <input type="hidden" id="client_id" name="client_id" />
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
    <tr id="${client_id}">
        <td><input type="checkbox" name="checkAllStat${client_id}" /></td>
        <td>${client_username}</td>
		<td>${client_fname}</td>
        <td>${client_lname}</td>
		<td>${client_email}</td>
		<td>${client_phone}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/clients.js"></script>
						
										
                </div>
            </div>
            
        </div>
        
        <div class="clear">
        </div>
    </div>