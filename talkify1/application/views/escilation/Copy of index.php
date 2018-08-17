<script src="js/escilation.js" type="text/javascript"></script>
<style type = "text/css">
    table, td, th {
      border: 1px solid #CCCCCC;
    } 
    </style>
<div class="grid_10">
   <div class="box round first">
      <h2>Work Flow</h2>
          <div class="block">
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
							<th>Tools</a></th>
						</tr>
							<tr>
							<td></td>
							<td></td>
							<td><a href="escillation/index2">T </a></td>
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


	<div id="sms_tabs" title="create workflow">
		<form>
			<input name="source" value="from_module" checked="true" class="workflow_creation_mode" type="radio">
			For Module
			<input name="source" value="from_template" class="workflow_creation_mode" type="radio">
			From Template<br /><br />
			<label>Create a workflow for
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
				</select>
				<br /><br />
				<label>Choose a template</label>
				<select>
					<option value="">
						Opportunities
					</option>
					<option value="" >
						Contacts
					</option>			
					<option value="">
						
					</option>
					<option value="">
						
					</option>
					<option value="">
						
					</option>			
				</select>
	</div>
	
	
	
   		  </div>
	</div>
</div>