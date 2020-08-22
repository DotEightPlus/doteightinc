$(document).ready(function() 
{

	//search
	$("#search").click(function() 
	{
		var searching 	 = $("#searching").val();

		window.location.href = "https://domainavailablitychecker.herokuapp.com/?domain="+searching;
})
})