$(document).ready(function() 
{

	//search
	$("#search").click(function() 
	{
		var searching 	 = $("#searching").val();

	$.ajax
	(
	{
		type 		:  'post',
		url			:  'https://domainavailablitychecker.herokuapp.com',
		data 		:  {searching:searching},
		success 	:  function(data)
		{
			$('#msg').html(data);
		}
	}
		)

})
})