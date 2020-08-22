$(document).ready(function() 
{

	//signin
	$("#signup").click(function() 
	{
		var usrname 	 = $("#usrname").val();
		var password 	 = $("#password").val();
$("#SignupModal").modal();

		

	$.ajax
	(
	{
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {usrname:usrname,password:password},
		success 	:  function(data)
		{
			$('#msg').html(data);
		}
	}
		)

})
})