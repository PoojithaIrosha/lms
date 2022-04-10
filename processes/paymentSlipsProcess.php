<?php


require "../connection.php";

$email = $_POST["email"];

// Show all payment slips student has uploaded
$paymentSlips_rs = Database::search("SELECT * FROM payment_slip WHERE `student_email`='" . $email . "' ORDER BY `paid_date` DESC");
$paymentSlips_n = $paymentSlips_rs->num_rows;
if ($paymentSlips_n != 0) {
?>



    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">First</th>
                    <th class="text-center" scope="col">Date</th>
                    <th class="text-center" scope="col">Slip</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($slip = $paymentSlips_rs->fetch_assoc()) {
                ?>
                    <!-- <div class="col-12 my-2">
            <p class="fw-bold text-light badge bg-danger fs-6">Paid On: <?php echo $slip["paid_date"] ?></p>
            <img src="<?php echo $slip["code"]; ?>" class="img-thumbnail">
        </div> -->
                    <tr>
                        <?php
                        $students_rs = Database::search("SELECT * FROM student WHERE `email`='" . $slip["student_email"] . "'");
                        $student = $students_rs->fetch_assoc();
                        ?>
                        <td class="text-center"><?php echo $student["first_name"]; ?></td>
                        <td class="text-center"><?php echo $slip["paid_date"]; ?></td>
                        <!-- <td><span onclick="" class="badge bg-success">Payment Slip</span></td> -->
                        <td>
                            <div class="col-12 d-flex justify-content-center">
                                <span class="badge bg-primary px-3" data-bs-target="#showSlipImg" data-bs-toggle="modal" onclick="showPaymentSlipImg('<?php echo $slip['code']; ?>');" style="cursor: pointer;">Show Slip</span>
                            </div>
                        </td>

                    </tr>
                <?php

                }

                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
?>
    <div class="col-12 p-5 text-center">
        <!-- <div class="alert alert-danger fade show d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>No Payment Slips To Show</div>
        </div> -->
        <p class="fs-3 text-black-50">Student Haven't Paid Yet</p>
    </div>
<?php
}
