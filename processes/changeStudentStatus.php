<?php

require "../connection.php";

$student_email = $_GET["student_email"];
$status_id = $_GET["status_id"];

$student_rs = Database::search("SELECT * FROM student WHERE `email`='" . $student_email . "'");
$sn = $student_rs->num_rows;

if ($sn == 1) {
    $sd = $student_rs->fetch_assoc();
    $statusId = $sd["status_id"];

    if ($statusId == 1) {
        // Change Status to disabled
        Database::iud("UPDATE student SET `status_id`=2 WHERE `email`='" . $student_email . "'");
        echo "success";
    } else if ($statusId == 2) {
        // Change Status to disabled
        Database::iud("UPDATE student SET `status_id`=1 WHERE `email`='" . $student_email . "'");
        echo "success";
    }
} else {
    echo "Something went wrong.";
}
