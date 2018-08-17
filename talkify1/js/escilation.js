$( function() {
			
		setupLeftMenu();
	setSidebarHeight();
	
	$('#sss').dialog({
						 autoOpen:false,width:'30%',
						 buttons: {
            'Cancel': function() {
                $( this ).dialog( 'close' );
            },
			'Create': function() {
                $( this ).dialog( 'create' );
            }
			
        }
		
		});
	
	$('.block').delegate('#ctemps','click',function(){
		
		$( '#sss' ).dialog( 'open' );
												   }
												   );
	
	/*$('#sms_tabe').dialog({
						 autoOpen:false,width:'40%',
						 buttons: {
            'Cancel': function() {
                $( this ).dialog( 'close' );
            },
			'Create': function() {
                $( this ).dialog( 'create' );
            }
			
        }
		
		});

	$('.block').delegate('#satemp','click',function(){
		
		$( '#sms_tabe' ).dialog( 'open' );
												   }
												   );

	$('#sss').tabs();
			$( "#smsaccordion" ).accordion({
						autoHeight: false,
						navigation: true
										   
			});
			$( "#builtinaccordion" ).accordion({
						autoHeight: false,
						navigation: true
										   
			});
	 */
	
});