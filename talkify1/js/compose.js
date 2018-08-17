var readUrl   = 'index.php/compose-view',
    updateUrl = 'index.php/clients/update',
    delUrl    = 'index.php/clients/delete',
    delHref,
    clientUserName,
    clientId;

$( function() {
	setupLeftMenu();
	setSidebarHeight();
	 setupTinyMCE();
	
	var currentDate = new Date();  

	 $( "#due_by" ).datepicker({
		   defaultDate: "+1w",
		   changeMonth: true,
		   numberOfMonths: 1,
		   onSelect: function( selectedDate ) {
		   }
	  });
	
	$("#due_by").datepicker("setDate",currentDate);
	
	 $('#selectClient').dialog({
        autoOpen: false,
        
        buttons: {
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
		width:'80%'
    });
	
	$('#addClient').dialog({
	    autoOpen:false,
	  buttons:{
		  'Add Client': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
				clientUserName = $( '#client_username' ).val();
			$.ajax({
                url: 'index.php/clients/create',
                type: 'POST',
                data: $( '#addClient form' ).serialize(),
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Clients already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$( '#msgDialog > p' ).html( 'New Clients created successfully!' );
	                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
						$( '#client_id' ).val( response );
						$( '#client_name' ).val( clientUserName );
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
           $( this ).dialog( 'close' ); 
		},
		  'Cancel' : function(){
				$( this ).dialog('close');
		  }
	  },
	  width:'40%'
	  });
	 
	$( '#records' ).delegate( 'a.cl_username', 'click', function() {
        clientUserName =  $( this ).attr( 'href' );
		clientId = $( this ).parents( 'tr' ).attr( "id" );
       //--- assign id to hidden field ---
		$( '#client_id' ).val( clientId );
		$( '#client_name' ).val( clientUserName);
               
        $( '#selectClient' ).dialog( 'close' );
		return false;
    }); //end update delegate
	
	
	$( '.block' ).delegate( '#client_name', 'click', function() {
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
		
		 
		 
    }); //end update delegate
	
	 
	 
}); //end document ready

function addclientopen()
{
	$( '#client_username' ).val('');
	$( '#addClient' ).dialog( 'open' );	
}