<?php

session_start();
require "../connection.php";

$current_pwd = $_POST["cpwd"];
$new_pwd = $_POST["npwd"];
$verify_pwd = $_POST["vnpwd"];

// Validate User Inputs
if (empty($current_pwd)) {
    echo "Please enter your current password";
} else if ($current_pwd != $_SESSION["admin"]["password"]) {
    echo "Please check your current password";
} else if (empty($new_pwd)) {
    echo "Please enter your new password";
} else if (strlen($new_pwd) < 5 && strlen($new_pwd) > 45) {
    echo "New password should be between 5 to 45 characters";
} else if (empty($verify_pwd)) {
    echo "Please verify your password";
} else if ($new_pwd != $verify_pwd) {
    echo "Password missmatched. Please check your password";
} else {
    // Update Admin Password
    Database::iud("UPDATE admin SET `password`='" . $new_pwd . "' WHERE `email`='" . $_SESSION["admin"]["email"] . "'");
    // Save New Password In SESSION
    $_SESSION["admin"]["password"] = $new_pwd;
    echo "success";
}
