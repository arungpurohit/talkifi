$(document).ready(function() {
	setupLeftMenu();
	setSidebarHeight();
	
	jQuery("#grid_name").jqGrid({
	   	url:'index.php/roleofemp/listAllRoles',
		datatype: "json",
		mtype : "post",
		colNames:['Role ID','Role Name','Page Permission','action'],
	   	colModel:[
			{name:'roleid',index:'roleid', width:45, align:"center"},
	   		{name:'role_name',index:'role_name', width:120,align:"left"},
	   		{name:'permission', index:'permission', width:160},
			{name:'act',index:'act', width:120, align:"center", sortable:false}
	   	],
	   	rownumbers: true,
	   	rowNum:15,
	   	rowList:[15,25,50,100],
	   	pager: jQuery('#pager2'),
	   	sortname: 'roleid',
	   	autowidth: true,
	   	height: "100%",
	    viewrecords: true,
		multiselect: true,
	    loadComplete: function(){
						$("#grid_name").setLabel("roleid","",{'text-align':'center'});
						var ids = jQuery("#grid_name").getDataIDs();
							for(var i=0;i<ids.length;i++){

								var cl = ids[i];

								be = '<span class="one_line">'
								+'<a href="index.php/update-role/'+ids[i]+'" ><strong>Update</strong></a> | <a href="javascript:;" onclick="del_message(\''+ids[i]+'\');"><b>Delete</b></a>'
								+'</span>';
								jQuery("#grid_name").setRowData(ids[i],{act:be});
							}
					    },

	    sortorder: "desc",

	    jsonReader: { repeatitems : false, id: "0" },
	    caption:"Inbox",
	}).navGrid('#pager2',{edit:false,add:false,del:false});
	
	
});


function del_message(message_id)
{
	if(confirm("Confirm Message")){

		$.ajax({
			url : site_url+"/message/inbox/del_message",
			type : "post",
			dataType : "json",
			data : "message_id="+message_id+"",
			success : function(e){
				$("#msg").html(e.msg)
				alert($("#msg").html());
				//$.jGrowl(e.code+"<br>"+e.message);
				jQuery("#grid_name").trigger("reloadGrid");
			}
		});
	}
}
	