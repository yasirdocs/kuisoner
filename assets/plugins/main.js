$(document).ready(function(){

	$(window).load(function() { 
		$(".adjust").fadeOut("slow"); 
	});

	$(document).find('.dateTime').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    $(document).find('.dateTimes').datetimepicker({
        format: 'HH:mm'
    });

    $(document).find('.dateTimeYear').datetimepicker({
        format: 'YYYY'
    });

    $(document).on('keypress', '.dateTime,.dateTimes,.dateTimeYear', function(e){
        e.preventDefault();
    });

});