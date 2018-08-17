var readUrl   = 'index.php/category-view',
    updateUrl = 'index.php/category/update',
    delUrl    = 'index.php/category/delete',
    delHref,
    updateHref,
    updateId;


$( function() {
    
	setupLeftMenu();
	setSidebarHeight();
	
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    readCategory();
    
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
                        var lead_category_name = $( 'tr#' + updateId + ' td' )[ 1 ];
                        //var category_name = $( 'tr#' + updateId + ' td' )[ 2 ];
						
                        $( lead_category_name ).html( $( '#ucategory_name' ).val() );
	                       
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
						
						var nSlash=delHref.split("/"); 
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        /*$( 'a[href=' + delHref ).parents( 'tr' ).fadeOut( 'slow', function() {
                            $( this ).remove();
							
                        });*/
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
            url: 'index.php/category/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
                $( '#ucategory_name' ).val( response.lead_category_name);
                
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#category_id' ).val( updateId );
                
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
            category_name: { required: true}
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
                url: 'index.php/category/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Category already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$( '#msgDialog > p' ).html( 'New category created successfully!' );
	                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    readCategory();
                    dataTable.fnAddData([
                        response,
						'<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a>'
                    ]);
                    
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
            
            return false;
        }
    });
	
	$( '#subcat form' ).validate({
        rules: {
            categorysel: { required: true},
			subcategory_name:{ required:true}
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
                url: 'index.php/category/createsubcategory',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
					
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Category already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$( '#msgDialog > p' ).html( 'New category created successfully!' );
	                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
					}
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    readCategory();
                    dataTable.fnAddData([
                        response,
                        //$( '#lead_category_name' ).val(),
						'<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a>'
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


function readCategory() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
 $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].cat_id;
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
} // end readUsers