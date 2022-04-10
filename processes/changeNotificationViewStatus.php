<?php

require "../connection.php";

$notification_id = $_GET["id"];
// echo $notification_id;

Database::iud("UPDATE `notification` SET `notification_view_status_id`='1' WHERE `id`='" . $notification_id . "'");
// echo "status Changed";
