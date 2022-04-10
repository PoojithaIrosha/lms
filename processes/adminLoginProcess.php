<?php

session_set_cookie_params(3600);
session_start();
require "../connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$remember_me = $_POST["rememberMe"];


// Validate User Inputs
if (empty($email)) {
    echo "Please Enter Your Email Address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Admin Email Address is Invalid";
} else if (empty($password)) {
    echo "Please Enter Your Password";
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo "Password Length Should Be Between 5 to 45 Characters";
} else {

    // Search Database
    $admin_rs = Database::search("SELECT * FROM admin WHERE `email`='" . $email . "' AND `password` = '" . $password . "'");
    $admin_n = $admin_rs->num_rows;

    if ($admin_n == 1) {  // User Found in DB
        echo "success";
        // Store User in Session
        $admin_data = $admin_rs->fetch_assoc();
        $_SESSION["admin"] = $admin_data;

        // Set Cookies
        if ($remember_me == "true") {
            setcookie("adminemail", $email, time() + (60 * 60 * 24 * 365), '/');
            setcookie("adminpassword", $password, time() + (60 * 60 * 24 * 365), '/');
        } else {
            setcookie("adminemail", "", -1, '/');
            setcookie("adminpassword", "", -1, '/');
        }
    } else { // User didn't find in DB
        echo "Invalid Email or Password";
    }
}


?>