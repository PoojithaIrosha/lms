<?php
session_start();
require "../connection.php";

$title = $_POST["title"];
$date = $_POST["date"];
$time_from = $_POST["time_from"];
$time_to = $_POST["time_to"];
$link = $_POST["link"];
$id = $_POST["id"];

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
} else {
    // Update a scheduled class
    Database::iud("UPDATE class_schedule SET `title`='" . $title . "', `date`='" . $date . "', `time_from`='" . $time_from . "', `time_to`='" . $time_to . "', `link`='" . $link . "' WHERE `id`='" . $id . "'");
    Database::iud("UPDATE attendance SET `class_date`='" . $date . "' WHERE `class_schedule_id`='" . $id . "'");
    echo "success";
}
