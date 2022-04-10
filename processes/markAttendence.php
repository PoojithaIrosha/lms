<?php
session_start();
require "../connection.php";

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$time = $d->format("H:i:s");

$class_id = $_GET["class_id"];

$classes_rs = Database::search("SELECT * FROM `class_schedule` WHERE `id`='" . $class_id . "'");
$class = $classes_rs->fetch_assoc();


$attendance_rs = Database::search("SELECT * FROM `attendance` WHERE `student_email`='" . $_SESSION["student"]["email"] . "' AND `class_date`='" . $class["date"] . "'");

if ($attendance_rs->num_rows < 0) {
    // Database::iud("INSERT INTO `attendance` (`grade_id`, `student_email`, `class_date`, `class_name`, `datetime`, ``) VALUES ('" . $class["grade_id"] . "', '" . $_SESSION["student"]["email"] . "','" . $class["date"] . "', '" . $class["title"] . "', '" . $time . "')");
    // echo "success";
    // echo "No result";
} else {
    Database::iud("UPDATE `attendance` SET `time`='" . $time . "', `attendance_status_id`='1' WHERE `student_email`='" . $_SESSION["student"]["email"] . "' AND `class_date`='" . $class["date"] . "' ");
    // echo "Update";
}
