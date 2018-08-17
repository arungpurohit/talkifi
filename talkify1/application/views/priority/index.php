<link rel="stylesheet" type="text/css" href="css1/colorpicker.css" />
<!--<link rel="stylesheet" type="text/css" href="css1/jquery-ui-1.8.1.custom.css" />-->
<script type="text/javascript" src="js1/colorpicker.js"></script>
<div class="grid_10">
            <div class="box round first">
                <h2>
                   Priority Details</h2>
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
                    <th><input type="checkbox" name="checkAllPri" /></th>
                    <th>Priority Name</th>
					<th>Priority Color</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">

        <form action="" method="post" >
           <p>
               <label for="cName">Priority Name:</label>
               <input type="text" id="priority_name" name="priority_name" />
           </p>
		   <p>
               <label for="cColor">Priority color:</label>
			   <div id="colorSelectorForeground">
			   <div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="priority_color" name="priority_color" value="#ffffff">
               <!--<input type="text" id="priority_color" name="priority_color" />-->
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
               <label for="cName">Priority Name:</label>
               <input type="text" id="upriority_name" name="upriority_name" />
           </p>
		   <p>
               <label for="cColor">Priority color:</label>
			    <div id="ucolorSelectorForeground">
			   <div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;">
			   </div>
			   </div>
							<input type="hidden" id="upriority_color" name="upriority_color" value="#ffffff">
               <!--<input type="text" id="upriority_color" name="upriority_color" />-->
           </p>
            <input type="hidden" id="lead_priority_id" name="lead_priority_id" />
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
    <tr id="${lead_priority_id}">
        <td><input type="checkbox" name="checkAllPri${lead_priority_id}" /></td>
        <td>${lead_priority_name}</td>
		<td>${lead_priority_color}<div style="background-color: ${lead_priority_color}; width:30px; height:30px; border: 2px solid #000000;"></td>
        <td>${priority_status}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/priority.js"></script>
               
        </div>
        
        <div class="clear">
        </div>
    </div>
	</div>