<?php
# $backURL="urltomainpage"; below is the original code without the thank you page input
$backURL="thankyou.html";
function doEmail($subject,$msg){
#   $theEmail="youremail@domain.com"; below is the original code without the email input
    $theEmail="meadowlandsfc@gmail.com";
    $headers = array(
    'From' => 'Contact Form Submit <no-reply@nowebsite.com>',
    'Reply-To' => 'Contact Form Submit <no-reply@nowebsite.com>',
    'X-Mailer' => 'PHP/' . phpversion()
    );
    mail($theEmail,$subject,$msg,$headers);
    echo("emailed successful");
}
function doContactForm1($name,$email,$comment){
    $name=filter_var($name, FILTER_SANITIZE_STRING);
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    $comment=filter_var($comment, FILTER_SANITIZE_STRING);
 doEmail("Contact Form Submit","Hello, somebody submitted a contact form on your website. Here is their info:
Name: {$name},
Email: {$email},
Comment: {$comment}
    ");
}
function doContactForm2($firstname,$lastname,$email,$phonenumber,$age,$location,$position,$previousteam,$otherinfo){
    $firstname=filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname=filter_var($lastname, FILTER_SANITIZE_STRING);
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    $phonenumber=filter_var($phonenumber, FILTER_SANITIZE_STRING);
    $age=filter_var($age, FILTER_SANITIZE_STRING);
    $location=filter_var($position, FILTER_SANITIZE_STRING);
    $previousteam=filter_var($previousteam, FILTER_SANITIZE_STRING);
    $otherinfo=filter_var($otherinfo, FILTER_SANITIZE_STRING);
 doEmail("Tryout Form Submit","Hello, somebody submitted a tryout form on your website. Here is their info:
First Name: {$firstname},
Last Name: {$lastname},
Email: {$email},
Phone Number: {$phonenumber},
Age: {$age},
Location: {$location}
Previous Team: {$previousteam},
Other Info: {$otherinfo},
    ");
}
if($_GET['formnum']==="1"){
    doContactForm1($_GET['name'],$_GET['email'],$_GET['comment']);
}
if($_GET['formnum']==="2"){
    doContactForm2($_GET['firstname'],$_GET['lastname'],$_GET['email'],$_GET['phonenumber'],$_GET['age'],$_GET['location'],$_GET['position'],$_GET['previousteam'],$_GET['otherinfo']);
}
header(strval("Location: ".$backURL));
?>
