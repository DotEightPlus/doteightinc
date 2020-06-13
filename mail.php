<?php

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['mssg'])) {

    $to = 'doteightinc@outlook.com';
    $firstname = $_POST["fname"];
    $from = $_POST["email"];
    $text  = $_POST['mssg'];
    $phone = $_POST["lname"];

  $headers = "From: $from";
  $headers = "From: " . $from . "\r\n";
  $headers .= "Reply-To: ". $from . "\r\n";
  $headers .= "X-Priority: 1 (Highest)\r\n";
  $headers .= "X-MSMail-Priority: High\r\n";
  $headers .= "Importance: High\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "DotEightInc - Website Message";

    $logo = 'https://doteightinc.com/images/icon.png';
    $url  = 'https://doteightinc.com';

  $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>PediaPlus</title></head><body style='text-align: center;'>";
  $body .= "<section style='margin: 30px; margin-top: 50px ; background: white; color: black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>";
  $body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotEightInc'>";
  $body .= "<h1 style='margin-top: 45px; color: black; width: 100%'>Website Notification</h1>
    <br/>";
  $body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hello!</p>";
  $body .= "<p style='margin-left: 45px; text-align: left; font-size: 17px;'>{$firstname} sent a message from the website</p>
    <br/>"; 
  $body .= "<p style='margin-left: 45px; text-align: left;'>Full Name: {$firstname} <br/> Email: {$from} <br/>Telephone Number: {$phone} <br/> Message: {$text}</p>
    <br/>";
  $body .= "<p style='margin-left: 45px; text-align: left;'>Kindly get accross to the user</p>
    <br/>"; 
  $body .= "</section>";  
  $body .= "</body></html>";

 if(mail($to, $subject, $body, $headers)) {
 echo 'message sent. We`ll get accross to you soon! <br/> Do not resend this message';
} else {
    echo 'There was an error sending your message.<br/> Kindly try again';
}
}
?>