<?php

require "../connection.php";

if (isset($_GET["student_email"])) {
    $student_email =  $_GET["student_email"];

    $paymentSlips = Database::search("SELECT * FROM payment_slip WHERE `student_email`='" . $student_email . "'");
    while ($paymentSlip = $paymentSlips->fetch_assoc()) {
        unlink('../' . $paymentSlip["code"]);
    }

    // Delete payment slips of the student
    Database::iud("DELETE FROM `payment_slip` WHERE `student_email`='" . $student_email . "'");
    // Delete Student's Attendance
    Database::iud("DELETE FROM `attendance` WHERE `student_email`='" . $student_email . "'");
    //Delete Notifications
    Database::iud("DELETE FROM `notification` WHERE `student_email`='" . $student_email . "'");
    //Delete Payment Slips
    Database::iud("DELETE FROM `payment_slip` WHERE `student_email`='" . $student_email . "'");
    // Delete Student Account
    Database::iud("DELETE FROM `student` WHERE `email`='" . $student_email . "'");
    echo "success";
}
