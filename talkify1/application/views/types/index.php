<link rel="stylesheet" type="text/css" href="css1/colorpicker.css" />
<!--<link rel="stylesheet" type="text/css" href="css1/jquery-ui-1.8.1.custom.css" />-->
<script type="text/javascript" src="js1/colorpicker.js"></script>
<div class="grid_10">
            <div class="box round first">
                <h2>
                   Type Details</h2>
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
                    <th><input type="checkbox" name="checkAllType" /> </th>
                    <th>Type Name</th>
                    <th>Type Color</th>
					<th>Type Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">

        <form action="" method="post" >
           <p>
               <label for="cName">Type Name:</label>
               <input type="text" id="type_name" name="type_name" />
           </p>
           
            <p>
               <label for="cEmail">Type Color:</label>
			   	<div id="colorSelectorForeground">
				<div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="type_color" name="type_color" value="#ffffff">
             <!--  <input type="text" id="type_color" name="type_color" />-->
           </p>
			<!--<p>
               <label for="cEmail">Type Status:</label>
               <input type="text" id="type_status" name="type_status" />
           </p>-->
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
               <label for="cName">Type Name:</label>
               <input type="text" id="utype_name" name="utype_name" />
           </p>
            
		   <p>
               <label for="cColor">Type Color:</label>
			   <div id="ucolorSelectorForeground">
			   <div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;">
			   </div>
			   </div>
							<input type="hidden" id="utype_color" name="utype_color" value="#ffffff">
               <!--<input type="text" id="ustatus_color" name="ustatus_color" />-->
           </p>
			<p>
               <label for="cEmail">Type Status:</label>
               <input type="hidden" id="utype_status" name="utype_status" />
           </p>

            <input type="hidden" id="lead_type_id" name="lead_type_id" />
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
    <tr id="${lead_type_id}">
        <td><input type="checkbox" name="checkAllType${lead_type_id}" /></td>
        <td>${lead_type_name}</td>
        <td>${lead_type_color}<div style="background-color: ${lead_type_color}; width:30px; height:30px; border: 2px solid #000000;"></td>
		<td>${types_status}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/types.js"></script>
						
										
                </div>
            </div>
    </div>