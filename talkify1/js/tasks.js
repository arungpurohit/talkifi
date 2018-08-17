$(function(){	
	setupLeftMenu();
	setSidebarHeight();
	
	 if (!DateAdd || typeof (DateDiff) != "function") {
            var DateAdd = function(interval, number, idate) {
                number = parseInt(number);
                var date;
                if (typeof (idate) == "string") {
                    date = idate.split(/\D/);
                    eval("var date = new Date(" + date.join(",") + ")");
                }
                if (typeof (idate) == "object") {
                    date = new Date(idate.toString());
                }
                switch (interval) {
                    case "y": date.setFullYear(date.getFullYear() + number); break;
                    case "m": date.setMonth(date.getMonth() + number); break;
                    case "d": date.setDate(date.getDate() + number); break;
                    case "w": date.setDate(date.getDate() + 7 * number); break;
                    case "h": date.setHours(date.getHours() + number); break;
                    case "n": date.setMinutes(date.getMinutes() + number); break;
                    case "s": date.setSeconds(date.getSeconds() + number); break;
                    case "l": date.setMilliseconds(date.getMilliseconds() + number); break;
                }
                return date;
            }
        }
        function getHM(date)
        {
             var hour =date.getHours();
             var minute= date.getMinutes();
             var ret= (hour>9?hour:"0"+hour)+":"+(minute>9?minute:"0"+minute) ;
             return ret;
        }
	
	 		var arrT = [];
            var tt = "{0}:{1}";
            for (var i = 0; i < 24; i++) {
                arrT.push({ text: StrFormat(tt, [i >= 10 ? i : "0" + i, "00"]) }, { text: StrFormat(tt, [i >= 10 ? i : "0" + i, "30"]) });
            }
            $("#timezone").val(new Date().getTimezoneOffset()/60 * -1);
            $("#stparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            $("#etparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            var check = $("#IsAllDayEvent").click(function(e) {
                if (this.checked) {
                    $("#stparttime").val("00:00").hide();
                    $("#etparttime").val("00:00").hide();
                }
                else {
                    var d = new Date();
                    var p = 60 - d.getMinutes();
                    if (p > 30) p = p - 30;
                    d = DateAdd("n", p, d);
                    $("#stparttime").val(getHM(d)).show();
                    $("#etparttime").val(getHM(DateAdd("h", 1, d))).show();
                }
            });
	$("#stpartdate,#etpartdate,#ustpartdate,#uetpartdate").datepicker({ picker: "<button class='calpick'></button>"});    
	
	$('#addTasks').dialog({
	    autoOpen:false,
	  buttons:{
		  'Add Tasks': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
			$.ajax({
                url: 'index.php/tasks/insertTask',
                type: 'POST',
                data: $( '#fmAdd' ).serialize(),
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Clients already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$("#gridcontainer").reload();
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
	  width:'60%'
	  });
	
	
	$('#editTasks').dialog({
	    autoOpen:false,
	  buttons:{
		  'Update Tasks': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
			$.ajax({
                url: 'index.php/tasks/updateTask',
                type: 'POST',
                data: $( '#fmEdit' ).serialize(),
                success: function( response ) {
					if(response == 'present')
					{
						$( '#msgDialog > p' ).html( 'Clients already present!' );
    	                $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' )		
					}
                    else
					{
						$("#gridcontainer").reload();
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
	  width:'60%'
	  });
	
});


