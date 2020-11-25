$(function(){
	$('.datepicker-input').datepicker({
			dateFormat: js_date_format,
			yearRange: "-100:+50", // last hundred years
			showButtonPanel: true,
			changeMonth: true,
			changeYear: true
	});
	
	$('.datepicker-input-clear').button();
	
	$('.datepicker-input-clear').click(function(){
		$(this).parent().find('.datepicker-input').val("");
		return false;
	});
	
});