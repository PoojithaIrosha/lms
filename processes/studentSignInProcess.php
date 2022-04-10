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
    echo "Email Address Invalid";
} else if (empty($password)) {
    echo "Please Enter Your Password";
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo "Password Length Should Be Between 5 to 45 Characters";
} else {

    // Setting Up DateTime
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    // Search Database
    $student_rs = Database::search("SELECT * FROM student WHERE `email`='" . $email . "' AND `password` = '" . $password . "'");
    $student_n = $student_rs->num_rows;

    if ($student_n == 1) {  // User Found in DB
        $student_data = $student_rs->fetch_assoc();
        echo "success";
        // Store User in Session
        $_SESSION["student"] = $student_data;

        // Update Last Login
        Database::iud("UPDATE student SET `last_login`='" . $date . "' WHERE `email`='" . $email . "'");

        // Set Cookies
        if ($remember_me == "true") {
            setcookie("stdemail", $email, time() + (60 * 60 * 24 * 365), '/');
            setcookie("stdpassword", $password, time() + (60 * 60 * 24 * 365), '/');
        } else {
            setcookie("stdemail", "", -1, '/');
            setcookie("stdpassword", "", -1, '/');
        }
    } else { // User didn't find in DB
        echo "Invalid Email or Password";
    }
}
