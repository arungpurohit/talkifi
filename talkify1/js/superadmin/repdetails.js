$(document).ready(function() {
	setupLeftMenu();
	//setSidebarHeight();
	
	jQuery("#grid_name").jqGrid({
	   	url:'index.php/listallreps',
		datatype: "json",
		mtype : "post",
		colNames:['Compnay ID','Compnay Name','No Of Reps','action'],
	   	colModel:[
			{name:'ccmp_id',index:'ccmp_id', width:45, align:"center"},
	   		{name:'company_name',index:'company_name', width:120,align:"left"},
	   		{name:'nooftelephonyusers', index:'nooftelephonyusers', width:160},
			{name:'act',index:'act', width:120, align:"center", sortable:false}
	   	],
	   	rownumbers: true,
	   	rowNum:15,
	   	rowList:[15,25,50,100],
	   	pager: jQuery('#pager2'),
	   	sortname: 'ccmp_id',
	   	autowidth: true,
	   	height: "100%",
	    viewrecords: true,
		multiselect: true,
	    loadComplete: function(){
						$("#grid_name").setLabel("ccmp_id","",{'text-align':'center'});
						var ids = jQuery("#grid_name").getDataIDs();
							for(var i=0;i<ids.length;i++){

								var cl = ids[i];

								be = '<span class="one_line">'
								+'<a href="index.php/edit-reps/'+ids[i]+'" ><strong>Update</strong></a> | <a href="javascript:;" onclick="del_message(\''+ids[i]+'\');"><b>Delete</b></a>'
								+'</span>';
								jQuery("#grid_name").setRowData(ids[i],{act:be});
							}
					    },

	    sortorder: "desc",

	    jsonReader: { repeatitems : false, id: "0" },
	    caption:"Reps Modules",
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
	