<?php

session_start();
require "../connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];

if (empty($fname)) {
    echo "Please Enter Your First Name";
} else if (empty($lname)) {
    echo "Please Enter Your Last Name";
} else if (empty($mobile)) {
    echo "Please Enter Your Mobile Number";
} else {
    // Update Student Details
    Database::iud("UPDATE student SET `first_name`='" . $fname . "', `last_name`='" . $lname . "', `mobile`='" . $mobile . "' WHERE `email`='" . $_SESSION["student"]["email"] . "'");

    // Save Student Details in Session
    $_SESSION["student"]["first_name"] = $fname;
    $_SESSION["student"]["last_name"] = $lname;
    $_SESSION["student"]["mobile"] = $mobile;

    echo "success";
}
