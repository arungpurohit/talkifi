<script src="js/escilation.js" type="text/javascript"></script>
<style type="text/css">
#b{width:910px;
height:200px;
border:0.1em solid #fffff;
}

</style>
<div class="grid_10">
   <div class="box round first">
      <h2>Work Flow<br />Edit an existing workflow or create a one</h2>
          <div class="block">
     		  <div id="b">
		  	 <h2>Summary &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-grey btn-small" id="satemp">Save as Template</button> <button class="btn btn-grey btn-small">save</button><button class="btn btn-grey btn-small" style="float:right">cancel</button></h2><br /><br />
			
				<form method="post">
                    <table width="100%" class="form" >
					 <tr>
						<td colspan="3"></td>
					  </tr>
					  <tr>
						<td>Description</td>
						<td>:</td>
						<td><input type="text" name="description" id="description" class="medium" /></td>
					  </tr>
					  <tr>
						<td>Module</td>
						<td>:</td>
						<td><input type="text" name="module" id="emamoduleil_cc" class="medium"  /></td>
					  </tr>
					</table>
                    </form>
		 </div>
			
			<h2>When to run the workflow</h2>
			<table border="0">
				<tbody><tr><td><input name="execution_condition" value="ON_FIRST_SAVE" type="radio"></td>
					<td>Only on the first save.</td></tr>
				<tr><td><input name="execution_condition" value="ONCE" checked="checked" type="radio"></td>
					<td>Until the first time the condition is true.</td></tr>
				<tr><td><input name="execution_condition" value="ON_EVERY_SAVE" type="radio"></td>
					<td>Every time the record is saved.</td></tr>
				<tr><td><input name="execution_condition" value="ON_MODIFY" type="radio"></td>
					<td>Every time a record is modified.</td></tr>
				<tr><td><input name="execution_condition" value="MANUAL" disabled="disabled" type="radio"></td>
					<td>System.</td></tr>
				</tbody>
			</table>
			
			<div id="sms_tabe" title="Save as Template ">
			<br /><br />
				<label><strong>title:</strong></label>
				<input type="text" name="title" id="title" class="medium" />
			</div>
			
		  </div>
	</div>
</div>