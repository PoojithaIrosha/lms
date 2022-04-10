<?php

session_start();
require "../connection.php";

$notification_rs = Database::search("SELECT * FROM `notification` WHERE `notification_view_status_id`='2' ORDER BY `id` DESC");
if ($notification_rs->num_rows >= 1) {
    while ($notification = $notification_rs->fetch_assoc()) {
?>

        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center align-items-center" role="alert">
            <i class="bi bi-check-circle-fill fs-2 me-3"></i>

            <div id="notificationText">
                <?php echo $notification["notification"]; ?>
                <!-- <button onclick="loadStudentDataNotification('<?php echo $notification['student_email']; ?>');" class="btn btn-primary">Show</button> -->
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="changeNotificationViewStatus('<?php echo $notification['id'] ?>')"></button>
        </div>

    <?php
    }
} else {

    ?>
    <div class="text-center p-5 text-black-50">
        <span class="fs-4"><i class="bi bi-bell-fill fs-4"></i>&nbsp;&nbsp;You don't have any notifications right now</span>
    </div>
<?php

}
