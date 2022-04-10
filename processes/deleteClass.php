<?php

require "../connection.php";

$class_id = $_GET["class"];


if (isset($class_id)) {

    $class_rs = Database::search("SELECT * FROM class_schedule WHERE `id`='" . $class_id . "'");
    $class = $class_rs->fetch_assoc();

    // Delete a scheduled class
    Database::iud("DELETE FROM `attendance` WHERE `class_schedule_id`='" . $class["id"] . "'");
    Database::iud("DELETE FROM class_schedule WHERE `id` ='" . $class_id . "'");
}

echo "success";
