var readUrl   = 'index.php/emails-view',
    updateUrl = 'index.php/clients/update',
    delUrl    = 'index.php/clients/delete',
    delHref,
    clientUserName,
    clientId;

$( function() {
	setupLeftMenu();
	setSidebarHeight();
	 setupTinyMCE();	
	 
	  $('#selectClient').dialog({
        autoOpen: false,
        
        buttons: {
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
		width:'80%'
    });
	  
	  $( '#records' ).delegate( 'a.cl_username', 'click', function() {
        clientUserName =  $( this ).attr( 'href' );
		clientId = $( this ).parents( 'tr' ).attr( "id" );
       //--- assign id to hidden field ---
		$( '#client_id' ).val( clientId );
		$( '#email_to' ).val( clientUserName);
               
        $( '#selectClient' ).dialog( 'close' );
		return false;
    }); //end update delegate
	 
	 $( '.block' ).delegate( '#email_to', 'click', function() {
 		$( '#selectClient' ).dialog( 'open' );
		$( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
		$.ajax({
				url: readUrl,
				dataType: 'json',
				success: function( response ) {
					
				
					/*for( var i in response ) {
						response[ i ].updateLink = updateUrl + '/' + response[ i ].client_id;
						response[ i ].deleteLink = delUrl + '/' + response[ i ].client_id;
					}
					*/
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
		
		 
		 
    }); //end update delegate
	 
}); //end document ready

