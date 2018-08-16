$(function()
{
	$("button:eq(0)").on('click', function(e) 
	{
		$("form:eq(0)").toggleClass('d-none');
	});
	$("button:eq(1)").on('click', function(e) 
	{
		$("form:eq(1)").toggleClass('d-none');
	});
});