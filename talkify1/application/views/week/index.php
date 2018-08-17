<link rel="stylesheet" type="text/css" href="css/fullcalendar.css" />
<link rel="stylesheet" type="text/css" href="css/fullcalendar.print.css" media="print"/>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
	
		});
		
	});

</script>
<div class="grid_10">
            <div class="box round first">
                <h2> Week </h2>
                <div class="block ">
					<style type='text/css'>
					
						body {
							margin-top: 40px;
							text-align: center;
							font-size: 14px;
							font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
							}
					
						#calendar {
							width: 750px;
							margin: 0 auto;
							}
					
					</style>
					<div id='calendar'></div>
			</div>
		</div>
</div>
