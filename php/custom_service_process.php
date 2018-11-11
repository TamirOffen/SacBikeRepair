<?php

session_start();

date_default_timezone_set('America/Los_Angeles');
$date = date('m/d/Y h:i a', time());

if(isset($_POST['submit'])) {

  if(empty($_POST['name'])) {
    die("You need to enter your name");
  }
  if(empty($_POST['email'])) {
    die("You need to enter your email");
  }
  if(empty($_POST['bike_type'])) {
    die("You need to enter Bike Type");
  }

  $name = '"' . $_POST['name'] . '"';
  $subject = 'Custom Service ' . $date;
  $mailFrom = $_POST['email'];
  $bike_type = $_POST['bike_type'];
  $notes = $_POST['notes'];
  $days = "";

  $mailTo = "tamiroffen@sacbikerepair.com";
  $headers = "From: " . $mailFrom;
  $txt = "Name: " . $name . "\nEmail: " . $mailFrom
          . "\n\nBike Type: " . $bike_type
          . "\n\nCustom Service Notes:\n" . $notes;

  mail($mailTo, $subject, $txt, $headers);

  header("Location: ../index.html?mailsend");

}

?>