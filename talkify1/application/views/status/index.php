<link rel="stylesheet" type="text/css" href="css1/colorpicker.css" />
<!--<link rel="stylesheet" type="text/css" href="css1/jquery-ui-1.8.1.custom.css" />-->
<script type="text/javascript" src="js1/colorpicker.js"></script>


<div class="grid_10">
            <div class="box round first">
                <h2>
                   Status Details</h2>
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
                    <th>Status Name</th>
                    <th>Status Color</th>
					<th>Rep Display</th>
					<th>Client Display</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">

        <form action="" method="post" >
           <p>
               <label for="cName">Status Name:</label>
               <input type="text" id="status_name" name="status_name" />
           </p>
            <p>
			<label for="cColor">Status Color:</label>
	<div id="colorSelectorForeground"><div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="status_color" name="status_color" value="#ffffff">
              
               <!--<input type="text" id="status_color" name="status_color" />-->
           </p>
			<p>
               <label for="cEmail">Rep Display:</label>
               <input type="text" id="rep_display" name="rep_display" />
           </p>
			<p>
               <label for="cEmail">Client Display:</label>
               <input type="text" id="client_display" name="client_display" />
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
               <label for="cName">Status Name:</label>
               <input type="text" id="ustatus_name" name="ustatus_name" />
           </p>
            <p>
               <label for="cColor">Status Color:</label>
			   <div id="ucolorSelectorForeground"><div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="ustatus_color" name="ustatus_color" value="#ffffff">
               <!--<input type="text" id="ustatus_color" name="ustatus_color" />-->
           </p>
			<p>
               <label for="cEmail">Rep Display:</label>
               <input type="text" id="urep_display" name="urep_display" />
           </p>
			<p>
               <label for="cEmail">Client Display:</label>
               <input type="text" id="uclient_display" name="uclient_display" />
           </p>
            <input type="hidden" id="lead_status_id" name="lead_status_id" />
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
    <tr id="${lead_status_id}">
        <td><input type="checkbox" name="checkAllStat${lead_status_id}" /></td>
        <td>${lead_status_name}</td>
		<td>${lead_status_color}<div style="background-color: ${lead_status_color}; width:30px; height:30px; border: 2px solid #000000;"></td>
        <td>${lead_status_rep_display}</td>
		<td>${lead_status_client_display}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/status.js"></script>
						
										
                </div>
            </div>
            
        </div>
        
        <div class="clear">
        </div>
    </div>