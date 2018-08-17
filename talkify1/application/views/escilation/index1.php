<script src="js/escilation.js" type="text/javascript"></script>
<style type="text/css">
#b{
	width:910px;
	height:20px;
	border:0.1em solid #FFFFFF;
	box-shadow: 5px 5px 5px rgba(68,68,68,0.6);
	}
	
</style>
<div class="grid_10">
   <div class="box round first">
      <h2>Workflow</h2>
        <div class="block">
		   <div id="ajaxLoadAni">
    		  <img src="http://localhost/talkify/images/ajax-loader.gif" alt="Ajax Loading Animation" />
    		   <span>Loading...</span>
		   </div>
		   
		   		<div id="b">
			 <form action="index1.php" method="get" accept-charset="utf-8"   style="float:right; display:inline;">
					<b>Select Module: </b>
					<select class="importBox" name="list_module" id="pick_module">
						<option value="All">All</option>
							
						<option value="reps">
							Rep details
						</option>
						<option value="clients">
							Clients
						</option>
						<option value="category">
							Category
						</option>
						<option value="type">
							Types
						</option>
						<option value="status">
							Status
						</option>
						<option value="channels" >
							Channels
						</option>
						<option value="priority">
							Priority
						</option>
						<option value="sms">
							SMS
						</option>
						<option value="email">
							EMail
						</option>
						<option value="task">
							Task
						</option>
						<option value="escilation">
							Escillation
						</option>
						
					</select>
					<!--<input name="module" value="com_vtiger_workflow" type="hidden">
					<input name="action" value="workflowlist" type="hidden">-->
				</form>
			 </div><br />
			 <button class="btn btn-grey btn-small" id="ctemps" style="float:right">New Workflow</button><br /><br />
		     <div id="sss" title="create workflow">
				<form action="escilation/index" method="post">
				<input name="source" value="from_module" checked="true" class="workflow_creation_mode" type="radio">
				<b style="font-style:normal; font-size:10px;">For Module</b>
				<input name="source" value="from_template" class="workflow_creation_mode" type="radio">
				<b style="font-style:normal; font-size:10px;">From Template</b><br /><br />
				<label style="font-size:12px;"><b>Create a workflow for</b></label>
					<b style="font-size:12px;"><select>
					<option><a href="reps/index.php">
							Rep details</a>
						</option>
						<option value="clients">
							Clients
						</option>
						<option value="category">
							Category
						</option>
						<option value="type">
							Types
						</option>
						<option value="status">
							Status
						</option>
						<option value="channels" >
							Channels
						</option>
						<option value="priority">
							Priority
						</option>
						<option value="sms">
							SMS
						</option>
						<option value="email">
							EMail
						</option>
						<option value="task">
							Task
						</option>
						<option value="escilation">
							Escillation
						</option>
				</select></b>
			</div>	
		   
		   <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <!--<td><input type="checkbox" name="checkAllRep" /></td>-->
                    <th>Models</th>
                    <th>Description</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
		   
	    </div>
    </div>
</div>