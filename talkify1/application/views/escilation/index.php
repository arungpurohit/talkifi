<script src="js/escilation.js" type="text/javascript"></script>
<style type = "text/css">
    table, td, th {
      border: 1px solid #CCCCCC;
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
				<form style="float:right">
					<b>Select Module: </b>
					<select>
						<option value="Potentials">
							Opportunities
						</option>
						<option value="Contacts" selected="selected">
							Contacts
						</option>
						<option value="Accounts">
							Organizations
						</option>
						<option value="Leads">
							Leads
						</option>
						<option value="Calendar">
							Calendar
						</option>
						<option value="HelpDesk">
							Trouble Tickets
						</option>
						<option value="Products">
							Products
						</option>
						<option value="Faq">
							FAQ
						</option>
					</select>
				</form> <br /><br />
				<button class="btn btn-grey btn-small" id="ctemps" style="float:right">New Workflow</button><br /><br />
				<table id="records">
					<thead>
						<tr>
							<th>Module</th>
							<th>Description</th>
							<th><a href="escilation/index2.php">Tools</a></th>
						</tr>
							<tr>
							<td></td>
							<td></td>
							<td><a href="escilation/index2.php">Tools</a></td>
						  </tr>
						
						  <tr>
							<td></td>
							<td></td>
							<td></td>
						  </tr>
						
						  <tr>
							<td></td>
							<td></td>
							<td></td>
						  </tr>
						  <tr>
							<td></td>
							<td></td>
							<td></td>
						  </tr>
					   </thead>
        </table>


	<div id="sss" title="create workflow">
		<form action="escilation/index" method="post">
			<input name="source" value="from_module" checked="true" class="workflow_creation_mode" type="radio">
			For Module
			<input name="source" value="from_template" class="workflow_creation_mode" type="radio">
			From Template<br /><br />
			<label>Create a workflow for</label>
				<select>
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
				<br /><br />
				
	</div>
	
	
	
   		  </div>
	</div>
</div>