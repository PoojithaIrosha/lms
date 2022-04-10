<?php

session_start();
require "../connection.php";

$student_email = $_POST["email"];

$attendance_rs = Database::search("SELECT * FROM attendance WHERE `student_email`='" . $student_email . "' ORDER BY `class_date` ASC");
if ($attendance_rs->num_rows != 0) {

?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Class Name</th>
                <th scope="col">Date</th>
                <th scope="col">Joined Time</th>
                <th scope="col">Attendence</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($attendance = $attendance_rs->fetch_assoc()) {

            ?>

                <tr>
                    <?php
                    $student_rs = Database::search("SELECT * FROM student WHERE `email`='" . $student_email . "'");
                    $student = $student_rs->fetch_assoc();
                    ?>
                    <td><?php echo  $student["first_name"]; ?></td>
                    <td><?php echo $attendance["class_name"]; ?></td>
                    <td><?php echo $attendance["class_date"]; ?></td>
                    <td class="text-center"><?php if ($attendance["time"] == null) {
                                            ?>
                            <i class="bi bi-clock-history"></i>
                        <?php
                                            } else {
                                                echo $attendance["time"];
                                            } ?>
                    </td>
                    <?php
                    $attendance_status_rs = Database::search("SELECT * FROM `attendance_status` WHERE `id`='" . $attendance["attendance_status_id"] . "'");
                    $attendance_status = $attendance_status_rs->fetch_assoc();

                    if ($attendance_status["id"] == 1) {
                    ?>
                        <td class="text-center"><span class="badge bg-success"><?php echo $attendance_status["name"]; ?></span></td>
                    <?php
                    } else {
                    ?>
                        <td class="text-center"><span class="badge bg-danger"><?php echo $attendance_status["name"]; ?></span></td>

                    <?php
                    }
                    ?>
                </tr>


            <?php

            }

            ?>
        </tbody>
    </table>
<?php
} else {
?>

    <!-- <div class="col-12 text-center text-danger text-uppercase">
        <h2>No Attendance</h2>
    </div> -->
    <!-- <div class="alert alert-danger fade show d-flex justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>No Attendance</div>
    </div> -->

    <div class="text-center p-5">
        <p class="fs-1 text-black-50"><i class="bi bi-exclamation-circle-fill fs-1"></i>&nbsp;&nbsp;No Attendance</p>
    </div>
<?php
}
?>