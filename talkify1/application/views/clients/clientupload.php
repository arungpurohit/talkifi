<div class="grid_10">
            <div class="box round first">
                <h2>
                   Clients Upload</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>
	
	<?php 
	if(isset($uploadcount)){
		echo "<b>Number Client uploaded is = ".$uploadcount."</b><br />";
	}
	?>
<form action="index.php/client_upload/clientupload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<table cellpadding=0 cellspacing=0 border=0 width=99%>
<tr>
<td width='20%'><b>Fields Sequence in Csv</b><br>
					<span style="color:#FF0000">*</span> marked fields are mandatory</td>
<td width='3%'>:</td>
<td width='25%' colspan="4"><?php //make this is dynamic?>
	<table width="80%" border="1">
  <tr>
    <th align="left" >Field Name</th>
    <th>&nbsp;</th>
    <th align="left">Type</th>
  </tr>
  <tr>
    <td>user name <span style="color:#FF0000">*</span></td>
    <td>&nbsp;</td>
    <td>Email / Mobile Number</td>
  </tr>
  <tr>
    <td>First Name</td>
    <td>&nbsp;</td>
    <td>Valid First name</td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td>&nbsp;</td>
    <td>Valid Last name</td>
  </tr>
  <tr>
    <td>Email <span style="color:#FF0000">*</span></td>
    <td>&nbsp;</td>
    <td>Valid Email</td>
  </tr>
  <tr>
    <td>Mobile <span style="color:#FF0000">*</span></td>
    <td>&nbsp;</td>
    <td>Valid Mobile</td>
  </tr>
</table>

</td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr>
<td width='20%'><b>Upload File</b></td>
<td width='3%'>:</td>
<td width='25%'><input name="client_upload" id="client_upload" value="" type="file" required="required"  /></td>
<td width='20%'><b>Sample Format to upload the Clients</b></td>
<td width='3%'>:</td>
<td width='25%'><a style="cursor:pointer; text-decoration:none;" href="downloads/clients.csv" ><b>clients.csv</b></a> <span style="color:#FF0000"><= Download here</span> </td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr><td colspan="6" align="center">
<input type="submit" name="submit" value="Upload" />&nbsp;&nbsp;<input type="button" onClick="javascript:history.back(-1);" value="Cancel" /></td></tr>
</table>
</form>
<script type="text/javascript" src="js/clients.js"></script>
                </div>
            </div>
            
        </div>
        <div class="clear">
        </div>
    </div>