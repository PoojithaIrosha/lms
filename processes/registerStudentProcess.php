<?php

require "../connection.php";

$email =  $_POST["email"];
$fname =  $_POST["fname"];
$lname =  $_POST["lname"];
$mobile =  $_POST["mobile"];
$pwd =  $_POST["pwd"];
$grade =  $_POST["grade"];
$status =  $_POST["status"];

// Validate User Inputs
if (empty($email)) {
    echo "Please enter student's email address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is not valid";
} else if (empty($fname)) {
    echo "Please enter student's first name";
} else if (empty($lname)) {
    echo "Please enter student's last name";
} else if (empty($mobile)) {
    echo "Please enter student's mobile number";
} else if (empty($pwd)) {
    echo "Please enter the password";
} else if (empty($grade)) {
    echo "Please select student's grade";
} else {
    // Register a new student
    Database::iud("INSERT INTO student(`email`, `first_name`, `last_name`, `mobile`, `password`, `grade_id`,`status_id`) VALUES('" . $email . "','" . $fname . "','" . $lname . "','" . $mobile . "','" . $pwd . "','" . $grade . "','" . $status . "')");
    echo "success";
}
