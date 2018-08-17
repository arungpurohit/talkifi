<script src="js/workflow.js" type="text/javascript"></script>
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
    <h2>Inbox</h2>
      <div class="block">
		<div id="ajaxLoadAni">
    		<img src="http://localhost/talkify/images/ajax-loader.gif" alt="Ajax Loading Animation" />
    		<span>Loading...</span>
		</div>
			<div id="b">
			 <form action="index.php" method="get" accept-charset="utf-8" id="filter_modules" onsubmit="VtigerJS_DialogBox.block();" style="display: inline;" style="float:right;">
					<b>Select Module: </b>
					<select class="importBox" name="list_module" id="pick_module">
						<option value="All">All</option>
							<option value="All" disabled="disabled">-----------------------------</option>
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
					<input name="module" value="com_vtiger_workflow" type="hidden">
					<input name="action" value="workflowlist" type="hidden">
				</form>
			  <!--<form style="float:right">
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
				</form> -->
			</div><br />
			<button class="btn btn-grey btn-small" id="ctemps" style="float:right">New Workflow</button><br /><br />
			
			<div id="workflow">
  <form action="index.php/workflow" method="post" accept-charset="utf-8" onsubmit="workflow;">
		
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody><tr align="left">
					<td><input name="source" value="from_module" checked="true" class="workflow_creation_mode" type="radio">
						For Module</td>
					<td><input name="source" value="from_template" class="workflow_creation_mode" type="radio">
						From Template</td>
				</tr>
			</tbody></table>
			<table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-family:Arial, Helvetica, sans-serif">
				<strong><tbody><tr align="left">
					<td nowrap="nowrap" width="10%">Create a workflow for</td>
					<td>
						<strong><select name="module_name" id="module_list" class="small">
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
						</select></strong>
					</td>
				</tr>
				<tr id="template_select_field" style="display:none;" align="left">
					<td>Choose a template</td>
					<td>
						<span id="template_list_busyicon"><b>Loading...</b><img src="themes/images/vtbusy.gif" border="0"></span>
						<span id="template_list_foundnone" style="display:none;"><b>No Templates</b></span>
						<select id="template_list" name="template_id" class="small"></select>						
					</td>
				</tr>
			</tbody></table>
			<input name="save_type" value="new" id="save_type_new" type="hidden">
			<input name="module" value="com_vtiger_workflow" id="save_module" type="hidden">
			<input name="action" value="editworkflow" id="save_action" type="hidden">
			<table class="layerPopupTransport" border="0" cellpadding="5" cellspacing="0" width="100%">
				<tbody><tr><td align="center">
					<input class="crmButton small save" value="Create" name="save" id="new_workflow_popup_save" type="submit"> 
					<input class="crmButton small cancel" value="Cancel " name="cancel" id="new_workflow_popup_cancel" type="button">
				</td></tr>
			</tbody></strong></table>
		
	</form>
</div>
	<table class="listTableTopButtons" border="0" cellpadding="5" cellspacing="0" width="100%">			
<tbody><tr>
			<td class="colHeader small" width="20%">
				Module
			</td>
			<td class="colHeader small" width="65">
				Description
			</td>
			<td class="colHeader small" width="15%">
				Tools
			</td>
		</tr>
		<tr>
			<td class="listTableRow small">Trouble Tickets</td>
			<td class="listTableRow small">test workflow when big problem</td>
			<td class="listTableRow small">
				<a href="index.php?module=com_vtiger_workflow&amp;action=editworkflow&amp;workflow_id=6&amp;return_url=%2Findex.php%3Fmodule%3Dcom_vtiger_workflow%26action%3Dworkflowlist%26list_module%3DHelpDesk">
					<img title="Edit" alt="Edit" \="" style="cursor: pointer;" id="expressionlist_editlink_6" src="themes/images/editfield.gif" border="0">
				</a>
								<a href="index.php?module=com_vtiger_workflow&amp;action=deleteworkflow&amp;workflow_id=6&amp;return_url=%2Findex.php%3Fmodule%3Dcom_vtiger_workflow%26action%3Dworkflowlist%26list_module%3DHelpDesk" onclick="return confirm('Are you sure you want to delete ?');">
					<img title="Delete" alt="Delete" \="" src="themes/images/delete.gif" style="cursor: pointer;" id="expressionlist_deletelink_6" border="0">
				</a>
							</td>
		</tr>
		<tr>
			<td class="listTableRow small">Trouble Tickets</td>
			<td class="listTableRow small">Workflow for Ticket Created from Portal</td>
			<td class="listTableRow small">
				<a href="index.php?module=com_vtiger_workflow&amp;action=editworkflow&amp;workflow_id=8&amp;return_url=%2Findex.php%3Fmodule%3Dcom_vtiger_workflow%26action%3Dworkflowlist%26list_module%3DHelpDesk">
					<img title="Edit" alt="Edit" \="" style="cursor: pointer;" id="expressionlist_editlink_8" src="themes/images/editfield.gif" border="0">
				</a>
							</td>
		</tr>
		<tr>
			<td class="listTableRow small">Trouble Tickets</td>
			<td class="listTableRow small">Workflow for Ticket Updated from Portal</td>
			<td class="listTableRow small">
				<a href="index.php?module=com_vtiger_workflow&amp;action=editworkflow&amp;workflow_id=9&amp;return_url=%2Findex.php%3Fmodule%3Dcom_vtiger_workflow%26action%3Dworkflowlist%26list_module%3DHelpDesk">
					<img title="Edit" alt="Edit" \="" style="cursor: pointer;" id="expressionlist_editlink_9" src="themes/images/editfield.gif" border="0">
				</a>
							</td>
		</tr>
		<tr>
			<td class="listTableRow small">Trouble Tickets</td>
			<td class="listTableRow small">Workflow for Ticket Change, not from the Portal</td>
			<td class="listTableRow small">
				<a href="index.php?module=com_vtiger_workflow&amp;action=editworkflow&amp;workflow_id=10&amp;return_url=%2Findex.php%3Fmodule%3Dcom_vtiger_workflow%26action%3Dworkflowlist%26list_module%3DHelpDesk">
					<img title="Edit" alt="Edit" \="" style="cursor: pointer;" id="expressionlist_editlink_10" src="themes/images/editfield.gif" border="0">
				</a>
							</td>
		</tr>
	</tbody></table>
			<!--<div id="tabs">
        	  <div id="read">
				<table id="records" border="1">
					<thead>
						<tr>
							<th>Module</th>
							<th>Description</th>
							<th>Tools</th>
					  </tr>
						</thead>
					<tbody>
			<?php /*?><?php foreach($results as $val):?>
			<tr align="center" > 
			<td><input type="checkbox" name="email_conf_id<?php echo $val['wflow_id'];?>" /></td>
			<!--<td><div id="colorSelectorForeground"><div style="background-color: ; width:30px; height:30px; border: 2px solid #000000;"></div></div></td>-->
			<td><?php echo $val['module'];?></td>
			<td><?php echo $val['description'];?></td>
			<td><a class="updateBtn" href="index.php/workflow/<?php echo $val['wflow_id'];?>">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
			</tr>
<?php endforeach;?>			<?php */?>
					</tbody>
				</table>
			</div>

	     </div>--> <!-- end tabs -->
    </div>
   </div>
</div>

        
      