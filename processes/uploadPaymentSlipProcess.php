<?php
require "../connection.php";
session_start();

$allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg");

if (isset($_FILES["img"])) {
    $img = $_FILES["img"];

    $file_extension = $img["type"];
    if (in_array($file_extension, $allowed_image_extensions)) {
        $fileName = "assets//payment_slips//" . uniqid("slip_") . $img["name"];
        move_uploaded_file($img["tmp_name"], "../" . $fileName);

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date_time = $d->format("Y-m-d H:i:s");
        $date = $d->format("Y-m-d");

        Database::iud("INSERT INTO payment_slip(`code`,`paid_date`, `student_email`) VALUES('" . $fileName . "', '" . $date_time . "', '" . $_SESSION["student"]["email"] . "')");
        $last_id = Database::$connection->insert_id;
        Database::iud("UPDATE student SET `status_id`=1 WHERE `email`='" . $_SESSION["student"]["email"] . "'");
        $notification_text = $_SESSION["student"]["email"] . " has uploaded payment slip on " . $date;
        Database::iud("INSERT INTO notification(`notification`,`payment_slip_id`, `notification_view_status_id`, `student_email`) VALUES ('" . $notification_text . "', '" . $last_id . "', '2', '" . $_SESSION["student"]["email"] . "')");
        echo "success";
    } else {
        echo "Image is not valid. Please select a valid Image";
    }
}
