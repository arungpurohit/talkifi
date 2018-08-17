var readUrl   = 'index.php/clients-view',
    updateUrl = 'index.php/clients/update',
    delUrl    = 'index.php/clients/delete',
    delHref,
    updateHref,
    updateId;

$( function() {
    
	setupLeftMenu();
	setSidebarHeight();
	
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    readClients();
    
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
    
    $( '#updateDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Update': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: updateHref,
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        //--- update row in table with new values ---
                        var client_username = $( 'tr#' + updateId + ' td' )[ 1 ];
                        var client_fname = $( 'tr#' + updateId + ' td' )[ 2 ];
                        var client_lname = $( 'tr#' + updateId + ' td' )[ 3 ];
						var client_email = $( 'tr#' + updateId + ' td' )[ 4 ];
						var client_phone = $( 'tr#' + updateId + ' td' )[ 5 ];
						
                        $( client_username ).html( $( '#uclient_username' ).val() );
						$( client_fname ).html( $( '#uclient_fname' ).val() );
                        $( client_lname ).html( $( '#uclient_lname' ).val() );
						$( client_email ).html( $( '#uclient_email' ).val() );
						$( client_phone ).html( $( '#uclient_phone' ).val() );
						
                        
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Yes': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
				
                $.ajax({
                    url: delHref,
                    
                    success: function( response ) {
                        //hide ajax loader animation here...
						var nSlash=delHref.split("/"); 
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                       // $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        //.fadeOut( 'slow', function() {
                          //  $( this ).remove();
                        //});
                        $('tr#'+nSlash[3]).fadeOut('slow', function() {
                            $( this ).remove();
                        });
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/clients/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
                $( '#uclient_username' ).val( response.client_username);
				$( '#uclient_fname' ).val( response.client_fname);
				$( '#uclient_lname' ).val( response.client_lname);
				$( '#uclient_email' ).val( response.client_email );
                $( '#uclient_phone' ).val( response.client_phone);
				
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#client_id' ).val( updateId );
                
                $( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update delegate
    
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create form' ).validate({
        rules: {
            client_username: { required: true},
			client_fname: { required: true },
			client_lname: { required: true },
			client_email: { required: true },
			client_phone: { required: true },
            },
        /*
        //uncomment this block of code if you want to display custom messages
        messages: {
            cName: { required: "Name is required." },
            cEmail: {
                required: "Email is required.",
                email: "Please enter valid email address."
            }
        },
        */
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/clients/create',
                type: 'POST',
                data: $( form ).serialize(),
                
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
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of Status by reading it
                    readClients();
                    dataTable.fnAddData([
                        response,
                        $( '#client_username' ).val(),
						$( '#client_fname' ).val(),
						$( '#client_lname' ).val(),
						$( '#client_email' ).val(),
						$( '#client_phone' ).val(),
                        '<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Delete</a>'
                    ]);
                    
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
            
            return false;
        }
    });
    
}); //end document ready


function readClients() {
    //display ajax loader animation
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
} // end readClients