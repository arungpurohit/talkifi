$(document).ready(function() {
    
	setupLeftMenu();
	setSidebarHeight();
    
	jQuery("#grid_name").jqGrid({
	   	url:'index.php/deletedleads',
		datatype: "json",
		mtype : "post",
		colNames:['Lead#','Creation Date','Client Name','Subject','Assigned To','Status','Priority','action'],
	   	colModel:[
			{name:'lead_unique_id',index:'lead_unique_id', width:45, align:"center"},
	   		{name:'lead_creation_date',index:'lead_creation_date', width:92},
	   		{name:'client_id',index:'client_id', width:120,align:"left"},
	   		{name:'subject', index:'subject', width:160},
			{name:'rep_id', index:'rep_id', width:120},
			{name:'lead_status_id', index:'lead_status_id', width:90},
			{name:'lead_priority_id', index:'lead_priority_id', width:80},
	   		{name:'act',index:'act', width:120, align:"center", sortable:false}
	   	],
	   	rownumbers: true,
	   	rowNum:15,
	   	rowList:[15,25,50,100],
	   	pager: jQuery('#pager2'),
	   	sortname: 'lead_unique_id',
	   	autowidth: true,
	   	height: "100%",
	    viewrecords: true,
		multiselect: true,
	    loadComplete: function(){
						$("#grid_name").setLabel("lead_unique_id","",{'text-align':'center'});
						$("#grid_name").setLabel('role_name',"",{'text-align':'center'});
						var ids = jQuery("#grid_name").getDataIDs();
							for(var i=0;i<ids.length;i++){

								var cl = ids[i];

								be = '<span class="one_line">'
								+'<a href="index.php/leadview/showLead/'+ids[i]+'" ><strong>Update</strong></a> | <a href="javascript:;" onclick="reopen_lead(\''+ids[i]+'\');"><b>ReOpen</b></a>'
								+'</span>';
								jQuery("#grid_name").setRowData(ids[i],{act:be});
							}
					    },

	    sortorder: "desc",

	    jsonReader: { repeatitems : false, id: "0" },
	    caption:"Inbox",
	}).navGrid('#pager2',{edit:false,add:false,del:false});
	
	
	$( '#deleteLead' ).dialog({
        autoOpen: false }); //end update dialog
	
	
	jQuery("#assignTo").click( function() {
		var s;
		s = jQuery("#grid_name").jqGrid('getGridParam','selarrrow');
		if(s!='')
		{
				$('#selectReps').dialog( 'open' );
		}
		else
		alert('No Leads Selected');
	});
	
	$("#canclbtn").click(function(){$('#deleteLead').dialog( 'close');});
	
	$("#dltbtn").click(function(){
		var s;
		s = jQuery("#grid_name").jqGrid('getGridParam','selarrrow');
		if(s!='')
		{
			$('#lid').val(s);
			 $.ajax({
                    url: "index.php/show-reopen",
                    type: 'POST',
                    data: $( '#deleteLead form' ).serialize(),
                    success: function( response ) {
						alert(response);
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        $( '#deleteLead form textarea' ).val( '' );
						$('#lid').val('');
						$('#deleteLead').dialog( 'close');
						jQuery("#grid_name").trigger("reloadGrid");
                    } //end success
                }); //end ajax()	
			 return false;
		}
		else
			alert('No Leads Selected');
		});
}); //end document ready

function reopen_lead(message_id)
{
	$('#deleteLead').dialog( 'open' );
}