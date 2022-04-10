<?php

require "../connection.php";

$email = $_POST["email"];
$password1 = $_POST["password1"];
$verify_password = $_POST["verifypassword"];
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
} else if (empty($verify_password)) {
    echo "Please re-enter your new password.";
} else if ($password1 != $verify_password) {
    echo "Password & Re-Type Password does not match.";
} else if (empty($verification_code)) {
    echo "Please enter your verification code.";
} else {
    // Reset Admin Password
    $admin_rs = Database::search("SELECT * FROM admin WHERE `email`='" . $email . "' AND `verification_code`='" . $verification_code . "'");

    if ($admin_rs->num_rows == 1) {
        Database::iud("UPDATE admin SET `password` = '" . $password1 . "' WHERE `email` = '" . $email . "'");
        echo "success";
    } else {
        echo "Password reset failed";
    }
}
