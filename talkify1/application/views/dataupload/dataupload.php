
<div class="grid_10">
            <div class="box round first">
                <h2> <?php echo $title;?> </h2>
                <div class="block ">
				<div align="center" >
				<div align="center" >&nbsp;<?php //echo validation_errors(); ?> </div>
<form action="<?php echo base_url()?>index.php/dataupload/ticket" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<table cellpadding=0 cellspacing=0 border=0 width=99%>
<tr>
<td width='20%'><b>Fields Sequence in Csv</b></td>
<td width='3%'>:</td>
<td width='25%' colspan="4"><?=implode(', ',$ticket_rows)?></td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr>
<td width='20%'><b>Upload File</b></td>
<td width='3%'>:</td>
<td width='25%'><input name="ticket_upload" id="ticket_upload" value="" type="file" required="required"/></td>
<td width='20%'><b>Sample Download</b></td>
<td width='3%'>:</td>
<td width='25%'><a style="cursor:pointer; text-decoration:none;" href="<?php echo base_url();?>reports_csv/sample_leads.csv" >sample_leads.csv</a></td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr><td colspan="6" align="center">
<input type="submit" name="submit" class="btn" value="Upload" />&nbsp;&nbsp;<input type="button" class="btn" onClick="javascript:history.back(-1);" value="Cancel" /></td></tr>
</table>
</form></div>
<div align="center" >&nbsp;</div>
<div class="Heading">
<span>Client Upload</span>
</div>
<div align="center" >&nbsp; </div>
<div align="center" >
<form action="<?php echo base_url()?>index.php/dataupload/client" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<table cellpadding=0 cellspacing=0 border=0 width=99%>
<tr>
<td width='20%'><b>Fields Sequence in Csv</b></td>
<td width='3%'>:</td>
<td width='25%' colspan="4"><?=implode(', ',$client_rows)?></td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr>
<td width='20%'><b>Upload File</b></td>
<td width='3%'>:</td>
<td width='25%'><input name="client_upload" id="client_upload" value="" type="file" required="required"  /></td>
<td width='20%'><b>Sample Download</b></td>
<td width='3%'>:</td>
<td width='25%'><a style="cursor:pointer; text-decoration:none;" href="<?php echo base_url();?>reports_csv/sample_clients.csv" >sample_clients.csv</a></td>
</tr>
<tr><td height=10px colspan=6></td></tr>
<tr><td colspan="6" align="center">
<input type="submit" name="submit" class="btn" value="Upload" />&nbsp;&nbsp;<input type="button" class="btn" onClick="javascript:history.back(-1);" value="Cancel" /></td></tr>
</table>
</form></div>
<div align="center" >&nbsp;</div>
                    
    <div>
    </div>
</div>	
				
            </div>
        </div>