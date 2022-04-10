<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>English As A Hobby | Student Home</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script defer src="./assets/bootstrap/bootstrap.bundle.js"></script>
    <script src="./assets/js/script.js"></script>

    <!-- Pace -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./assets/pace/flash.css">
    <!-- Pace -->

</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["student"])) {

    ?>
        <!-- Container -->
        <div class="container-fluid">

            <div class="row bg-light">

                <!-- Header -->
                <?php require "stdHeader.php"; ?>
                <!-- Header -->

                <div class="col-12">
                    <div class="row">


                        <div class="modal fade" tabindex="-1" id="paymentModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-12 my-2 fw-bold">
                                                <p>Upload Payment Slip Here.</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="slipUploader">
                                                    <label class="input-group-text" for="slipUploader">Upload</label>
                                                </div>
                                                <label class="text-danger">Only these types are allowed - JPG, JPEG, PNG, SVG</label>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end ">
                                                <button class="btn btn-primary px-5" onclick="uploadPaymentSlip();" id="UploadBtn">Upload</button>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <div class="col-12 m-2 fw-bold">
                                                Pay Online
                                            </div>
                                            <!-- Error MSG -->
                                            <div class="col-12 d-none" id="errorDiv">
                                                <div class="ui negative message">
                                                    <i class="close icon" onclick="closeMsg();"></i>
                                                    <div class="header" id="errMsg1"></div>
                                                </div>
                                            </div>
                                            <!-- Error MSG -->
                                            <div class="col-6">
                                                <label for="" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="paymentFname">
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="paymentLname">
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">Email Address</label>
                                                <input type="text" class="form-control" id="paymentEmail">
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">Mobile</label>
                                                <input type="text" class="form-control" id="paymentMobile">
                                            </div>
                                            <div class="col-12">
                                                <label for="" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="paymentAddress">
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Amount" id="paymentAmount">
                                                    <span class="input-group-text">Rs</span>
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end mt-3 mb-3">
                                                <button onclick="showpemsg();" class="btn btn-outline-success px-5">Pay Now</button> <!-- onclick="payHerePay();" -->
                                                <script>
                                                    function showpemsg() {
                                                        // alert("");
                                                        document.getElementById("errorDiv").classList.remove("d-none");
                                                        document.getElementById("errMsg1").innerHTML = "Online payments are not allowed. Please upload your slip or contact your teacher.";
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 bg-white my-3 py-4 ">

                            <div class="d-lg-flex align-items-start ">
                                <!-- Right Menu -->
                                <div class="nav flex-row flex-lg-column justify-content-center nav-pills col-12 col-lg-2 gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active shadow-sm border" id="v-pills-classes-tab" data-bs-toggle="pill" data-bs-target="#v-pills-classes" type="button" role="tab" aria-controls="v-pills-classes" aria-selected="true"><i class="bi bi-calendar-event-fill"></i> Classes</button>
                                    <button class="nav-link shadow-sm border border" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-person"></i> Profile</button>
                                    <button class="nav-link shadow-sm border border" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false"><i class="bi bi-key"></i> Change Password</button>
                                </div>
                                <!-- Right Menu -->

                                <!-- Menu Content -->
                                <div class=" tab-content col-12 col-lg-10 px-lg-5 rounded" id="v-pills-tabContent">
                                    <!-- TIME TABLE -->
                                    <div class="tab-pane fade show active" id="v-pills-classes" role="tabpanel" aria-labelledby="v-pills-classes-tab">
                                        <div class="row">
                                            <?php
                                            if ($_SESSION["student"]["status_id"] == 1) {
                                            ?>
                                                <div class="col-12">

                                                    <h3 class="fw-bold mt-5 mt-lg-0 text-center text-primary"><i class="bi bi-calendar-event-fill"></i>&nbsp;&nbsp;TIME TABLE</h3>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 mt-4 shadow p-4 border">
                                                <div class="row g-4">

                                                    <?php
                                                    if ($_SESSION["student"]["status_id"] == 1) {

                                                        $classes_rs = Database::search("SELECT * FROM class_schedule WHERE `grade_id`='" . $_SESSION["student"]["grade_id"] . "' ORDER BY date, time_from ASC");
                                                        if ($classes_rs->num_rows > 0) {
                                                            while ($class_data = $classes_rs->fetch_assoc()) {
                                                    ?>

                                                                <!-- Card -->
                                                                <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 col-xl-3">
                                                                    <div class="card shadow border border-5 border-primary rounded border-bottom-0 border-start-0 border-end-0" style="height: 20rem;">
                                                                        <div class="card-body p-4 mt-2">
                                                                            <h5 class="card-title fs-4 mb-4 fw-bold text"><i class="bi bi-stack"></i>&nbsp;&nbsp;<?php echo $class_data["title"] ?></h5>
                                                                            <p class="card-text text-black-50"><i class="bi bi-calendar-date"></i>&nbsp;&nbsp;<?php echo $class_data["date"] ?></p>
                                                                            <p class="card-text text-black-50"><i class="bi bi-clock"></i>&nbsp;&nbsp;<span><?php echo $class_data["time_from"] ?></span> to <span><?php echo $class_data["time_to"] ?></span></p>
                                                                            <p class="card-text text-black-50"><i class="bi bi-mortarboard"></i>&nbsp;&nbsp;
                                                                                <?php
                                                                                $grades_rs = Database::search("SELECT * FROM grade WHERE `id` = '" . $class_data["grade_id"] . "'");
                                                                                if ($grades_rs->num_rows == 1) {
                                                                                    $grade = $grades_rs->fetch_assoc();
                                                                                    echo $grade["name"];
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                            <p class="card-text text-black-50"><i class="bi bi-person-fill">&nbsp;&nbsp;</i>Chinthana Gallage</p>
                                                                            <a href="<?php echo $class_data["link"]; ?>" target="_blank" class="btn btn-primary d-grid" onclick="markAttendence('<?php echo $class_data['id']; ?>');">Click Here to Join</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Card -->
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="col-12">

                                                                <h3 class="fw-bold text-danger text-center">Classes Not Scheduled</h3>
                                                            </div>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <i class="bi bi-exclamation-octagon-fill fs-1 text-danger"></i>
                                                        </div>
                                                        <div class="col-12">
                                                            <h1 class="text-danger fw-bold text-center ">Seems like you haven't paid yet!</h1>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>

                                                    <!-- Card 
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <div class="card shadow border border-5 border-primary rounded border-bottom-0 border-start-0 border-end-0" style="height: 20rem;">
                                                            <div class="card-body p-4 mt-2">
                                                                <h5 class="card-title fs-4 mb-4 fw-bold text"><i class="bi bi-stack"></i>&nbsp;&nbsp;ENGLISH</h5>
                                                                <p class="card-text text-black-50"><i class="bi bi-calendar-date"></i>&nbsp;&nbsp;2022-03-15</p>
                                                                <p class="card-text text-black-50"><i class="bi bi-clock"></i>&nbsp;&nbsp;<span>08:00 AM</span> to <span>10:30 AM</span></p>
                                                                <p class="card-text text-black-50"><i class="bi bi-mortarboard"></i>&nbsp;&nbsp;Grade 10</p>
                                                                <p class="card-text text-black-50"><i class="bi bi-person-fill">&nbsp;&nbsp;</i>Chinthana Gallage</p>
                                                                <a href="#" class="btn btn-primary d-grid">Click Here to Join</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    Card  -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- TIME TABLE -->

                                    <!-- Student Profile -->
                                    <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="row">
                                            <div class="col-12 text-center mt-5 mt-lg-0">
                                                <h3 class="fw-bolder text-primary text-uppercase"><i class="bi bi-mortarboard"></i>&nbsp;&nbsp; Student Profile</h3>
                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 mt-4 shadow border p-4">
                                                <div class="row g-3">
                                                    <!-- Form -->
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">First Name</label>
                                                        <input type="text" class="form-control" placeholder="First Name" value="<?php echo $_SESSION["student"]["first_name"]; ?>" id="stdFirstName">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION["student"]["last_name"]; ?>" id="stdLastName">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Email Address</label>
                                                        <input disabled type="text" class="form-control" placeholder="Email" value="<?php echo $_SESSION["student"]["email"]; ?>">

                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Password</label>
                                                        <input disabled type="text" class="form-control" placeholder="Password" value="<?php echo $_SESSION["student"]["password"]; ?>">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label" for="">Mobile Number</label>
                                                        <input type="text" class="form-control" placeholder="Mobile Number" value="<?php echo $_SESSION["student"]["mobile"]; ?>" id="stdMobile">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <?php
                                                        $status_rs = Database::search("SELECT * FROM status WHERE `id`='" . $_SESSION["student"]["status_id"] . "'");
                                                        $status = $status_rs->fetch_assoc();
                                                        ?>
                                                        <label class="form-label" for="">Active/Deactive Status</label>
                                                        <input disabled type="text" class="form-control" placeholder="Status" value="<?php echo $status["name"]; ?>">
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <?php
                                                        $grades_rs = Database::search("SELECT * FROM grade WHERE `id` = '" . $_SESSION["student"]["grade_id"] . "'");
                                                        $grade = $grades_rs->fetch_assoc();
                                                        ?>
                                                        <label class="form-label" for="">Grade</label>
                                                        <input disabled type="text" class="form-control" placeholder="Grade XX" value="<?php echo $grade["name"]; ?>">
                                                    </div>
                                                    <div class="col-12 d-grid justify-content-center">
                                                        <button class="btn btn-primary" onclick="updateStdProfile();">Update Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Student Profile -->

                                    <!-- Reset Password -->
                                    <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                                        <div class="row">
                                            <div class="col-12 mt-5">
                                                <h3 class="fw-bold mt-5 mt-lg-0 text-center text-primary"><i class="bi bi-calendar-event-fill"></i>&nbsp;&nbsp;TIME TABLE</h3>

                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 mt-3 shadow border p-4">
                                                <div class="row g-3">

                                                    <!-- Error MSG -->
                                                    <div class="col-12 d-none" id="errorDiv">
                                                        <div class="ui negative message">
                                                            <i class="close icon" onclick="closeMsg();"></i>
                                                            <div class="header" id="errMsg"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Error MSG -->

                                                    <div class="col-12">
                                                        <label for="" class="form-label">Current Password</label>
                                                        <input class="form-control" type="password" id="currentStdPwd">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">New Password</label>
                                                        <input class="form-control" type="password" id="newStdPwd">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Verify Password</label>
                                                        <input class="form-control" type="password" id="verifyStdPwd">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary" onclick="changeStdPassword();">Change Password</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Reset Password -->

                                </div>
                                <!-- Menu Content -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php
                require "footer.php";
                require "footer2.php";
                ?>
                <!-- Footer -->
            </div>



        </div>
        <!-- Container -->
    <?php
    } else {
    ?>
        <script>
            alert("You need to sign in first");
            window.location = "index.php";
        </script>
    <?php
    }
    ?>
</body>

</html>