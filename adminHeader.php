<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="./assets/bootstrap/bootstrap.bundle.js"></script>
    <script src="./assets/js/script.js"></script>

</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationResults">
                    <!-- Spinner -->
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status" id="loader3">
                        </div>
                    </div>
                    <!-- Spinner -->

                    <!-- <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill fs-2 me-3"></i>

                        <div id="notificationText">
                            poojithairosha9311@gmail.com uploaded payment slip on 2022-03-14
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>



    <div class="col-12 bg-white shadow-sm">
        <div class="row mt-3 mb-3 mx-5">
            <?php
            require "connection.php";
            $admin = $_SESSION["admin"];
            ?>
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center mb-3 mb-lg-0">
                <img src="./assets/img/profile.png" width="50px">
                <span class="text-lg-start fw-bold ms-3">Hi, <b class="user-name text-primary"><?php echo $admin["first_name"] . " " . $admin["last_name"]; ?></b></span>


                <?php

                $notifications = Database::search("SELECT * FROM `notification` WHERE `notification_view_status_id`=2");
                $notification_n = $notifications->num_rows;

                ?>
                <!-- Paid Notification -->
                <button class="btn btn-sm btn-light position-relative ms-3" data-bs-toggle="modal" data-bs-target="#notificationModal" onclick="loadNotifications();">
                    <i class="bi bi-bell-fill fw-bold"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo $notification_n; ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
                <!-- Paid Notification -->
            </div>

            <div class="col-4 d-none d-lg-flex justify-content-center align-items-center">
                <h2 class="fw-bold lead text-uppercase">English As A Hobby</h2>
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center gap-2">

                <button class="btn btn-danger px-5 px-lg-3 ms-3" onclick="signOut();">Sign Out</button>
            </div>
        </div>
    </div>
    <script src="./assets/js/script.js"></script>

</body>

</html>
<!DOCTYPE html>
<html>