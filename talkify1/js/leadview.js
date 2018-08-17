var readUrl   = 'index.php/leadview/otherleads',
    updateUrl = 'index.php/category/update',
    delUrl    = 'index.php/category/delete',
	addNotes = 'index.php/leadview/insertNotes',
    delHref,
    updateHref,
    updateId;

$( function() {
    
	setupLeftMenu();
	setSidebarHeight();
	 setupTinyMCE();
	 
	  $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' },
    });
	  
	  
	  $( '#createNotes' ).dialog({
        autoOpen: false,
        buttons: {
            'Add Note': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );

			   $.ajax({
                    url: addNotes,
                    type: 'POST',
                    data: $( '#createNotes form' ).serialize(),
                    success: function( response ) {
					//	$( '#msgDialog > p' ).html( response );
                       // $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                       
					   var currentdate = new Date(); 
					var datetime = currentdate.getDate() + "/"
  					                + (currentdate.getMonth()+1)  + "/" 
				                    + currentdate.getFullYear() + " @ "  
									+ currentdate.getHours() + ":"  
									+ currentdate.getMinutes() + ":" 
									+ currentdate.getSeconds();
					   
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                      $("#addnotesid").last().append("<tr><td></td><td></td></tr><tr><td></td><td>"+datetime+"</td><td></td><td>"+datetime+"</td></tr><tr><td></td><td>"+$('#internalnotes').val()+"</td><td></td><td>"+$('#externalnotes').val()+"</td></tr>");
					  

//--- update row in table with new values ---
                     /*   var lead_priority_name = $( 'tr#' + updateId + ' td' )[ 1 ];
                        var priority_name = $( 'tr#' + updateId + ' td' )[ 2 ];
						var priority_color = $( 'tr#' + updateId + ' td' )[ 3 ];

						$( lead_priority_name ).html( $( '#upriority_name' ).val() );
						$( priority_color ).html( $( '#upriority_color' ).val() );
	                       
                        */
						//--- clear form ---
                        $( '#createNotes form textarea' ).val( '' );
						
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
    
	  
	  
	  readOtherLeads();
}); //end document ready

function readOtherLeads() {
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            $.ajax({
                url: readUrl,
                type: 'POST',
               data: $( '#leadsview' ).serialize(),
                
                success: function( response ) {
					
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
            
            return false;
        
	
} // end readUsers

function addNotesBtnClick()
{
  $( '#createNotes' ).dialog( 'open' );
}
