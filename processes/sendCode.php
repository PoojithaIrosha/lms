<?php

// connection class
require "../connection.php";

// PHPMailer
require "../assets/PHPMailer/SMTP.php";
require "../assets/PHPMailer/Exception.php";
require "../assets/PHPMailer/PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"])) {
    $email = $_POST["email"];

    if (empty($email)) {
        echo "Please Enter Your Email First";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email Address is Invalid";
    } else {

        $student_rs = Database::search("SELECT * FROM student WHERE `email` = '" . $email . "'");
        $admin_rs = Database::search("SELECT * FROM admin WHERE `email` = '" . $email . "'");

        if ($student_rs->num_rows == 1) {
            // Student
            $student = $student_rs->fetch_assoc();

            $code = uniqid(); // Verification Code
            Database::iud("UPDATE student SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

            // email code
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'andruehudson9311@gmail.com'; // Sender's Email Address
            $mail->Password = '!h~DHuq/$9311'; // Sender's Email Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('andruehudson9311@gmail.com', 'English As A Hobby');
            $mail->addReplyTo('andruehudson9311@gmail.com', 'English As A Hobby');
            $mail->addAddress($email); // Receiver's Email Address
            $mail->isHTML(true);
            $mail->Subject = 'Student Password Reset Verification Code | English As A Hobby';
            $bodyContent = '<span>Hello <span>' . $student["first_name"] . ' ' . $student["last_name"] . '</span>! You have requested a verification code to reset user password. Use the verification code given below for resetting password.</span>
            <br><br>
            <span>User Email: ' . $student["email"] . ' </span>
            <br>
            <span>Verification code: ' . $code . '</span>
            <br><br>
            <span>If you did not attempt to reset your password. Please just ignore this email.</span>
            <br><br>
            <span>Thanks,</span>
            <br>
            <span>English As A Hobby</span>';
            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo "Verification code sending failed";
            } else {
                echo "success";
            }
        } else if ($admin_rs->num_rows == 1) {
            // Admin
            $admin = $admin_rs->fetch_assoc();
            $code = uniqid(); // Verification Code
            Database::iud("UPDATE admin SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

            // email code
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'andruehudson9311@gmail.com'; // Sender's Email Address
            $mail->Password = ''; // Sender's Email Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('andruehudson9311@gmail.com', 'English As A Hobby');
            $mail->addReplyTo('andruehudson9311@gmail.com', 'English As A Hobby');
            $mail->addAddress($email); // Receiver's Email Address
            $mail->isHTML(true);
            $mail->Subject = 'Admin Password Reset Verification Code | English As A Hobby';
            $bodyContent = '<span>Hello <span>' . $admin["first_name"] . ' ' . $admin["last_name"] . '</span>! You have requested a verification code to reset user password. Use the verification code given below for resetting password.</span>
            <br><br>
            <span>User Email: ' . $admin["email"] . ' </span>
            <br>
            <span>Verification code: ' . $code . '</span>
            <br><br>
            <span>If you did not attempt to reset your password. Please just ignore this email.</span>
            <br><br>
            <span>Thanks,</span>
            <br>
            <span>English As A Hobby</span>';
            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo "Verification code sending failed";
            } else {
                echo "success";
            }
        } else {
            echo "Email Address not found.";
        }
    }
}
