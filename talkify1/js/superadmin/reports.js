$( function() {
	//setupLeftMenu();
	//setSidebarHeight();
	
$( "#date_from" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
		$( "#date_to" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
		$( "#date_from" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 
}); //end document ready