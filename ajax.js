$(document).ready(function() 
{

	//contact us
	$("#sub").click(function() 
	{
		var fname 	 = $("#fname").val();
		var lname 	 = $("#lname").val();
		var email 	 = $("#email").val();
		var subject  = $("#subject").val();
		var message  = $("#message").val();

	var a = document.forms["contact"]["fname"].value;
	var b = document.forms["contact"]["lname"].value;
	var c = document.getElementById("email");
	var g = document.forms["contact"]["email"].value;
	var d = document.forms["contact"]["subject"].value;
	var e = document.forms["contact"]["message"].value;

	 if (a == null || a == "") {
    document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Please Input your First Name</span";
        return false;
    } else{

    	if(b == null || b == "") {

    	document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Please Input your Last Name</span";
        return false;

    	} else {
 		if (!c.checkValidity()) {
    document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>"+c.validationMessage;
        return false;
    		} else {

     if (d == null || d == "") {
    document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Please Input your email</span";
        return false;
    } else {

    if (d == null || d == "") {
    document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Kindly type in a subject</span";
        return false;
    } else {

    	 if (e == null || e == "") {
    document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Please Input your message</span";
        return false;
    } else {

    	document.getElementById("msg").innerHTML = "<span style='color: red; font-size: 24px'>Thank you for sending a message. We will get accross to you soon</span";
        return true;
    }
    }
    }

    		}
    	}
    }

})


	//subscribe
	$("#subscrip").click(function() 
	{
		var emailler 	 = $("#emailler").val();

	var c = document.getElementById("emailler");
	var g = document.forms["subcribe"]["emailler"].value;

	if (!c.checkValidity()) {
    document.getElementById("gsm").innerHTML = "<span style='font-size: 14px'>"+c.validationMessage;
        return false;
    		} else {

     if (g == null || g == "") {
    document.getElementById("gsm").innerHTML = "<span style='font-size: 14px'>Please Input your email</span";
        return false;
    } else {
document.getElementById("gsm").innerHTML = "<span style='font-size: 14px'>Thank you for subscribing. We will get accross to you soon</span";
        return true;
    }
    }

	})
})