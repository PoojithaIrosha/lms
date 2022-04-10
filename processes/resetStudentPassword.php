<?php
require "../connection.php";

$email = $_POST["email"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$verification_code = $_POST["verificationcode"];

// Validate User Inputs
if (empty($email)) {
    echo "Missing Email Address.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email address is invalid";
} else if (empty($password1)) {
    echo "Please enter your new password.";
} else if (strlen($password1) < 5 || strlen($password1) >= 20) {
    echo "Password length should be between 5 to 20.";
} else if (empty($password2)) {
    echo "Please re-enter your new password.";
} else if ($password1 != $password2) {
    echo "Password & Re-Type Password does not match.";
} else if (empty($verification_code)) {
    echo "Please enter your verification code.";
} else {
    // Reset Student Password
    $student_rs = Database::search("SELECT * FROM student WHERE `email`='" . $email . "' AND `verification_code`='" . $verification_code . "'");

    if ($student_rs->num_rows == 1) {
        Database::iud("UPDATE student SET `password` = '" . $password1 . "' WHERE `email` = '" . $email . "'");
        echo "success";
    } else {
        echo "Password reset failed";
    }
}
