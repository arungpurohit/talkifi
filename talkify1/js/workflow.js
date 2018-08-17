$( function() {
	setupLeftMenu();
	setSidebarHeight();
	$('#workflow').dialog({
				autoOpen:false,width:'40%'});
	
	$('.block').delegate('#ctemps','click',function(){
													
		$('#workflow').dialog('open');
			});
});