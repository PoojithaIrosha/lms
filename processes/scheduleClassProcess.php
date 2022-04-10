<?php

require "../connection.php";

$title = $_POST["title"];
$date = $_POST["date"];
$time_from = $_POST["time_from"];
$time_to = $_POST["time_to"];
$link = $_POST["link"];
$grade = $_POST["grade"];

// Validate User Inputs
if (empty($title)) {
    echo "Please enter class name";
} else if (empty($date)) {
    echo "Please enter date";
} else if (empty($time_from)) {
    echo "Please select starting time";
} else if (empty($time_to)) {
    echo "Please select ending time";
} else if (empty($link)) {
    echo "Please enter class link";
} else if (empty($grade)) {
    echo "Please select the grade";
} else {
    // Schedula a class
    Database::iud("INSERT INTO class_schedule(`title`, `date`, `time_from`, `time_to`, `link`, `grade_id`) VALUES('" . $title . "', '" . $date . "', '" . $time_from . "', '" . $time_to . "', '" . $link . "', '" . $grade . "')");
    $last_id = Database::$connection->insert_id;

    $student_rs = Database::search("SELECT * FROM student WHERE `grade_id`='" . $grade . "'");
    $student_n = $student_rs->num_rows;
    for ($x = 0; $x < $student_n; $x++) {
        $student = $student_rs->fetch_assoc();
        // $last_id = Database::$connection->insert

        Database::iud("INSERT INTO `attendance`(`grade_id`, `student_email`,`class_date`,`class_name`, `attendance_status_id`, `class_schedule_id`) VALUES ('" . $grade . "', '" . $student["email"] . "', '" . $date . "', '" . $title . "', '2', '" . $last_id . "')");
    }

    echo "success";
}
