<?php

session_start(); 

date_default_timezone_set('America/Los_Angeles');
$date = date('m/d/Y h:i a', time());

if(isset($_POST['submit'])) {

  if(empty($_POST['first_name'])) {
    die("You need to enter your first name");
  }
  if(empty($_POST['last_name'])) {
    die("You need to enter your last name");
  }
  if(empty($_POST['email'])) {
   die("You need to enter your email");
  }
  if(empty($_POST['message'])) {
    die("You need to enter your message");
  }

  $name = '"' . $_POST['first_name'] . ' ' . $_POST['last_name'] . '"';
  $subject = 'Contact ' . $date;
  $mailFrom = $_POST['email'];
  $message = $_POST['message'];

  $mailTo = "tamiroffen@sacbikerepair.com";
  $headers = "From: " . $mailFrom;
  $txt = "Name: " . $name . "\nEmail: " . $mailFrom . "\n\n" .  $message;

  mail($mailTo, $subject, $txt, $headers);

  header("Location: ../index.html?mailsend");
}

?>