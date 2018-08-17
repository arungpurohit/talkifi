$(function(){
	setupLeftMenu();
	setSidebarHeight();
	
	$( "#date_from_category" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_category" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_category" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_category" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 
	$( "#date_from_status" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_status" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_status" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_status" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 
	
$( "#date_from_type" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_type" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_type" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_type" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 

$( "#date_from_channel" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_channel" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_channel" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_channel" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 

$( "#date_from_priority" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_priority" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_priority" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_priority" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 

$( "#date_from_reps" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_to_reps" ).datepicker( "option", "minDate", selectedDate );
	}
});
$( "#date_to_reps" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
		$( "#date_from_reps" ).datepicker( "option", "maxDate", selectedDate );
	}
}); 

});



