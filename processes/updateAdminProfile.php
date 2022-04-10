<?php

require "../connection.php";
session_start();

$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];

// Validate User Inputs
if (empty($fname)) {
    echo "Please enter your first name";
} else if (empty("$lname")) {
    echo "Please enter your last name";
} else if (empty($email)) {
    echo "Please enter your email address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address";
} else if (empty($mobile)) {
    echo "Please enter your mobile number";
} else {
    // Update Admin Details
    Database::iud("UPDATE admin SET `first_name`='" . $fname . "', `last_name` ='" . $lname . "', `mobile` ='" . $mobile . "', `email`='" . $email . "' WHERE `email`='" . $_SESSION["admin"]["email"] . "'");
    // Save new details in session
    $_SESSION["admin"]["email"] = $email;
    $_SESSION["admin"]["first_name"] = $fname;
    $_SESSION["admin"]["last_name"] = $lname;
    $_SESSION["admin"]["mobile"] = $mobile;
    echo "success";
}
