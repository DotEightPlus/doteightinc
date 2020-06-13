$(document).ready(function() 
{

	//user message
	$("#sub").click(function() 
	{
		var fname	 = $("#fname").val();
		var lname 	 = $("#lname").val();
		var email 	 = $("#email").val();
		var mssg 	 = $("#mssg").val();
		$("#exampleModalCenter").modal();

	var a = document.forms["myForm"]["fname"].value;
	var b = document.forms["myForm"]["lname"].value;
	var c = document.getElementById("email");
	var d = document.forms["myForm"]["email"].value;
	var e = document.forms["myForm"]["mssg"].value;

    if (a == null || a == "") {
    document.getElementById("msg").innerHTML = "Please Input your First Name";
        return false;
    } else {

    	 if (b == null || b == "") {
    document.getElementById("msg").innerHTML = "kindly input your telephone number";
        return false;
    } else {

    	  if (d == null || d == "") {
    document.getElementById("msg").innerHTML = "Please Input your Email Address";
        return false;
    } else {

    	 if (!c.checkValidity()) {
    document.getElementById("msg").innerHTML = c.validationMessage;
        return false;
    } else {

    	 if (e == null || e == "") {
    document.getElementById("msg").innerHTML = "Kindly type your message";
        return false;
    }
    }
}
}
}
		$.post("mail.php",{fname:fname,email:email,lname:lname,mssg:mssg},function(data)
		{
			$("#msg").html(data);
		})

	
	})

})