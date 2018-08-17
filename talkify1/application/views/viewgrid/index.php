<div class="grid_10">
            <div class="box round first">
                <h2>
                   Reports</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>demo example</title>


	<link rel="stylesheet" type="text/css" media="screen" href="http://localhost/talkify/js2/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="http://localhost/talkify/js2/jqgrid/css/ui.jqgrid.css"></link>	
	
	<!--<script src="http://localhost/ciapp/js/jquery.min.js" type="text/javascript"></script>
	<script src="http://localhost/ciapp/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>-->
	<script src="http://localhost/talkify/js2/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="http://localhost/talkify/js2/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/table.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	jQuery("#grid_name").jqGrid({
	   	url:'http://localhost/talkify/index.php/table/browse',
		datatype: "json",
		mtype : "post",
		colNames:['id','uname','fname','lname','email','phone','action'],
	   	colModel:[
			{name:'id',index:'id', width:70, align:"center",hidden:true},
	   		{name:'uname',index:'uname', width:180},
	   		{name:'fname',index:'fname', width:180,align:"left"},
	   		{name:'lname', index:'lname', width:150},
			{name:'email', index:'email', width:150},
			{name:'phone', index:'phone', width:150},
	   		{name:'act',index:'act', width:90, align:"center", sortable:false}
	   	],
	   	rownumbers: true,
	   	rowNum:10,
	   	rowList:[10,20,30],
	   	pager: jQuery('#pager2'),
	   	sortname: 'client_id',
	   	autowidth: true,
	   	height: "100%",
	    viewrecords: true,
	    loadComplete: function(){
						$("#grid_name").setLabel("id","",{'text-align':'center'});
						$("#grid_name").setLabel('role_name',"",{'text-align':'center'});
						var ids = jQuery("#grid_name").getDataIDs();
							for(var i=0;i<ids.length;i++){

								var cl = ids[i];

								be = '<span class="one_line">'
								+'<a href="javascript:;" onclick="del_message(\''+ids[i]+'\');"><span class="ui-icon ui-icon-closethick"></span></a>'
								+'</span>';
								jQuery("#grid_name").setRowData(ids[i],{act:be});
							}
					    },

	    sortorder: "desc",

	    jsonReader: { repeatitems : false, id: "0" },
	    caption:"demo page",
	}).navGrid('#pager2',{edit:true,add:true,del:false});
});

function del_message(message_id)
{
	if(confirm("Confirm Message")){

		$.ajax({
			url : site_url+"/message/table/del_message",
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

</script>
</head>

<body>

<table id="grid_name" cellpadding="0" cellspacing="0"></table>
<div id="pager2" class="scroll" style="text-align: center;"></div>

</body>
</html>
</div></div></div>