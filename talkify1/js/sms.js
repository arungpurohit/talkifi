var readUrl   = 'index.php/sms-view',
    updateUrl = 'index.php/clients/update',
    delUrl    = 'index.php/clients/delete',
    delHref,
    clientUserName,
    clientId;
	
$(function(){
	setupLeftMenu();
	setSidebarHeight();
	//choose template//
	$('#sms_tab').dialog({
						 autoOpen:false,width:'80%'});
	
	$('.block').delegate('#ctemp','click',function(){
		
		$( '#sms_tab' ).dialog( 'open' );
		 });

//create template //
	$('#newcreate').dialog({
				autoOpen:false,width:'30%'});
	
	$('.block').delegate('#create','click',function(){
													
		$('#newcreate').dialog('open');
			});
	
//to selection//
	 $('#selectClient').dialog({
        autoOpen: false,
        
        buttons: {
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
		width:'80%'
    });
//open client popupbox//
	 $('.block').delegate('#mobile_numbers','click',function()
			{	
 		$( '#selectClient' ).dialog( 'open' );
		$( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
		$.ajax({
				url: readUrl,
				dataType: 'json',
				success: function( response ) {
					
				
					for( var i in response ) {
						response[ i ].updateLink = updateUrl + '/' + response[ i ].client_id;
						response[ i ].deleteLink = delUrl + '/' + response[ i ].client_id;
					}
					
					//clear old rows
					$( '#records > tbody' ).html( '' );
					
					//append new rows
					$( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
					
					//apply dataTable to #records table and save its object in dataTable variable
					if( typeof dataTable == 'undefined' )
						dataTable = $( '#records' ).dataTable({"bJQueryUI": true});
					
					//hide ajax loader animation here...
					$( '#ajaxLoadAni' ).fadeOut( 'slow' );
				}
		});
				
		});
//select details//
	$('#records').delegate('a.cl_username','click',function()
	 {
		clientUserName =  $( this ).attr( 'href' );
		clientId = $( this ).parents( 'tr' ).attr( "id" );
       //--- assign id to hidden field ---
		$( '#client_id' ).val( clientId );
		$( '#mobile_numbers' ).val( clientUserName);
               
        $( '#selectClient' ).dialog( 'close' );
		return false;
			});
	
	
	
	$('#sms_tab').tabs();
			$( "#smsaccordion" ).accordion({
						autoHeight: false,
						navigation: true
										   
			});
			$( "#builtinaccordion" ).accordion({
						autoHeight: false,
						navigation: true
										   
			});
		
	
});