<?php

require "../connection.php";

$student_email =  $_POST["student_email"];
$stdUpdateEmail = $_POST["stdUpdateEmail"];
$stdUpdateFname = $_POST["stdUpdateFname"];
$stdUpdateLname = $_POST["stdUpdateLname"];
$stdUpdateMobile = $_POST["stdUpdateMobile"];
$stdUpdatePwd = $_POST["stdUpdatePwd"];
$stdUpdateStatus = $_POST["stdUpdateStatus"];
$stdUpdateGrade = $_POST["stdUpdateGrade"];

// Validate User Inputs
if (empty($stdUpdateEmail)) {
    echo "Please enter student's email address";
} else if (!filter_var($stdUpdateEmail, FILTER_VALIDATE_EMAIL)) {
    echo "Email address is invalid";
} else if (empty($stdUpdateFname)) {
    echo "Please enter student's first name";
} else if (empty($stdUpdateLname)) {
    echo "Please enter student's last name";
} else if (empty($stdUpdateMobile)) {
    echo "Please enter student's mobile number";
} else if (empty($stdUpdatePwd)) {
    echo "Please enter student's password";
} else if (empty($stdUpdateGrade)) {
    echo "Please select student's grade";
} else if (empty($stdUpdateStatus)) {
    echo "Please select student's status";
} else {
    // Update Student Details
    Database::iud("UPDATE student SET `email`='" . $stdUpdateEmail . "', `first_name`='" . $stdUpdateFname . "', `last_name`='" . $stdUpdateLname . "', `mobile`='" . $stdUpdateMobile . "', `password`='" . $stdUpdatePwd . "', `grade_id`='" . $stdUpdateGrade . "', `status_id`='" . $stdUpdateStatus . "' WHERE `email`='" . $student_email . "'");
    echo "success";
}
