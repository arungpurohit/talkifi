var readUrl   = 'index.php/types-view',
    updateUrl = 'index.php/types/update',
    delUrl    = 'index.php/types/delete',
    delHref,
    updateHref,
    updateId;


$( function() {
    
	$("#colorSelectorForeground").ColorPicker({
				color: "#ffffff",
				onShow: function (colpkr) {
					$(colpkr).css("z-index","10000");
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#colorSelectorForeground div").css("backgroundColor", "#" + hex);
					$("#type_color").val("#" + hex);
				}
			});	
	
	$("#ucolorSelectorForeground").ColorPicker({
				color: "#ffffff",
				onShow: function (colpkr) {
					$(colpkr).css("z-index","10000");
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#ucolorSelectorForeground div").css("backgroundColor", "#" + hex);
					$("#utype_color").val("#" + hex);
				}
			});	
	
	
	setupLeftMenu();
	setSidebarHeight();
	
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    readTypes();
    
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
                        var lead_type_name = $( 'tr#' + updateId + ' td' )[ 1 ];
                        var lead_type_color = $( 'tr#' + updateId + ' td' )[ 2 ];
                        var types_status = $( 'tr#' + updateId + ' td' )[ 3 ];
						
                        $( lead_type_name ).html( $( '#utype_name' ).val() );
						$( lead_type_color ).html( $( '#utype_color' ).val() );
                        $( types_status ).html( $( '#utypes_status' ).val() );
                        
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
						var nSlash=delHref.split("/")
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                       /* $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });*/
                        $('tr#'+nSlash[3]).fadeOut('slow', function() {
							$(this).remove();
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
            url: 'index.php/types/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
                $( '#utype_name' ).val( response.lead_type_name);
				$( '#utype_color' ).val( response.lead_type_color);
				$( '#utypes_status' ).val( response.types_status );
				
                
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#lead_type_id' ).val( updateId );
                
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
            type_name: { required: true },
			type_color: { required: true }
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
                url: 'index.php/types/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
					
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Type already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$( '#msgDialog > p' ).html( 'New Type created successfully!' );
	                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    readTypes();
                    dataTable.fnAddData([
                        response,
                        $( '#type_name' ).val(),
						$( '#type_color' ).val(),
						$( '#types_status' ).val(),
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


function readTypes() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
 $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
			
		
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].lead_type_id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].lead_type_id;
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
} // end readTypes