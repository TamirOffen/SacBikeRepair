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
  if(empty($_POST['phone_number'])) {
    die("You need to enter your phone number");
  }
  if(empty($_POST['bike_type'])) {
    die("You need to enter Bike Type");
  }
  if(empty($_POST['flat_tire_service_type'])) {
    die("You need to enter a flat tire service type");
  }

  $name = '"' . $_POST['name'] . '"';
  $subject = 'Flat Tire ' . $date;
  $mailFrom = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $bike_type = $_POST['bike_type'];
  $service_needed = $_POST['flat_tire_service_type'];
  $notes = $_POST['notes'];
  $days = "";

  if($_POST['sunday'] == 'Sunday') {
    $days = $days . " Sunday ";
  }
  if($_POST['tuesday'] == 'Tuesday') {
    $days = $days . " Tuesday ";
  }
  if($_POST['thursday'] == 'Thursday') {
    $days = $days . " Thursday ";
  }
  if($_POST['saturday'] == 'Saturday') {
    $days = $days . " Saturday ";
  }
  if($_POST['none_of_these'] == 'None') {
    $days = $days . " None ";
  }

  if($notes == "") {
    $notes = "'NONE'";
  }
  if($days == "") {
    $days = "'DAY NOT SELECTED!'";
  }

  $mailTo = "tamiroffen@sacbikerepair.com";
  $headers = "From: " . $mailFrom;
  $txt = "Name: " . $name . "\nEmail: " . $mailFrom . "\nPhone Number: " . $phone_number
          . "\n\nBike Type: " . $bike_type . "\nService Needed:" . $service_needed
          . "\nDays Available: " . $days . "\n\nNotes: " . $notes;

  mail($mailTo, $subject, $txt, $headers);

  header("Location: ../index.html?mailsend");

}

?>