<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Admin Home</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="./assets/semantic/semantic.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script defer src="./assets/bootstrap/bootstrap.js"></script>
    <script defer src="./assets/bootstrap/bootstrap.bundle.js"></script>
    <script defer src="./assets/js/script.js"></script>

    <!-- Pace -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./assets/pace/flash.css">
    <!-- Pace -->
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["admin"])) {
    ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Header -->
                <?php require "adminHeader.php"; ?>
                <!-- Header -->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-4 ">
                            <div class="d-lg-flex align-items-start">
                                <!-- Right Menu -->
                                <div class="nav flex-row flex-lg-column justify-content-center nav-pills col-12 col-lg-2 gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active shadow-sm border" id="v-pills-classes-tab" data-bs-toggle="pill" data-bs-target="#v-pills-classes" type="button" role="tab" aria-controls="v-pills-classes" aria-selected="true"><i class="bi bi-calendar-event-fill"></i> Classes</button>
                                    <button class="nav-link shadow-sm border" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-person"></i> Profile</button>
                                    <button class="nav-link shadow-sm border" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false"><i class="bi bi-key"></i> Change Password</button>

                                </div>
                                <!-- Right Menu -->

                                <!-- Menu Content -->
                                <div class=" tab-content col-12 col-lg-10 px-lg-5 rounded" id="v-pills-tabContent">

                                    <!-- TIME TABLE -->
                                    <div class="tab-pane fade show active mb-3" id="v-pills-classes" role="tabpanel" aria-labelledby="v-pills-classes-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="fw-bold mt-5 mt-lg-0 text-center text-primary"><i class="bi bi-calendar-event-fill"></i>&nbsp;&nbsp;TIME TABLE</h3>
                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 mt-4 border p-3 shadow-sm rounded">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3 d-grid">
                                                        <a href="scheduleClass.php" class="btn btn-outline-dark fw-bold"><i class="bi bi-plus-circle"></i>&nbsp;&nbsp;Schedule a class</a>
                                                    </div>
                                                    <div class="col-6 col-lg-3 d-grid">
                                                        <a href="manageStudents.php" class="btn btn-outline-dark fw-bold"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Manage Students</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 mt-4 shadow border rounded p-4">
                                                <div class="row g-4">
                                                    <?php
                                                    $query = "SELECT * FROM class_schedule ORDER BY date, time_from ASC";
                                                    $classes_rs = Database::search($query);
                                                    if ($classes_rs->num_rows > 0) {
                                                        while ($class_data = $classes_rs->fetch_assoc()) {
                                                    ?>

                                                            <!-- Card -->
                                                            <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 col-xl-3">
                                                                <div class="card shadow border border-5 border-primary rounded border-bottom-0 border-start-0 border-end-0">
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
                                                                        <div class="row g-2">
                                                                            <div class="col-6 d-grid">
                                                                                <button class="btn btn-danger" onclick="deleteClass(<?php echo $class_data['id']; ?>);">Delete</button>
                                                                            </div>
                                                                            <div class="col-6 d-grid">
                                                                                <a href="<?php echo "updateClass.php?class=" . $class_data["id"]; ?>" class="btn btn-success">Update</a>
                                                                            </div>
                                                                            <div class="col-12 d-grid">
                                                                                <a href="<?php echo $class_data["link"]; ?>" target="_blank" class="btn btn-primary">Click Here to Join</a>
                                                                            </div>
                                                                        </div>
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
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- TIME TABLE -->

                                    <!-- Admin Profile -->
                                    <div class="tab-pane fade mb-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="row">
                                            <div class="col-12 text-center mt-5 mt-lg-0">
                                                <h3 class="fw-bolder text-primary text-uppercase"><i class="bi bi-person-square fs-3"></i>&nbsp;&nbsp; Admin Profile</h3>
                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 shadow border p-4 mt-4">
                                                <div class="row g-3">
                                                    <!-- Form -->

                                                    <!-- Error MSG -->
                                                    <div class="col-12 d-none" id="errorDiv">
                                                        <div class="ui negative message">
                                                            <i class="close icon" onclick="closeMsg();"></i>
                                                            <div class="header" id="errMsg"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Error MSG -->

                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">First Name</label>
                                                        <input type="text" class="form-control" placeholder="First Name" value="<?php echo $_SESSION["admin"]["first_name"]; ?>" id="adminFirstName">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION["admin"]["last_name"]; ?>" id="adminLastName">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Email Address</label>
                                                        <input type="text" class="form-control" placeholder="Email" value="<?php echo $_SESSION["admin"]["email"]; ?>" id="adminEmail">

                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Password</label>
                                                        <input disabled type="text" class="form-control" placeholder="Password" value="<?php echo $_SESSION["admin"]["password"]; ?>">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label" for="">Mobile Number</label>
                                                        <input type="text" class="form-control" placeholder="Mobile Number" value="<?php echo $_SESSION["admin"]["mobile"]; ?>" id="adminMobile">
                                                    </div>

                                                    <div class="col-12 d-grid justify-content-center">
                                                        <button class="btn btn-primary" onclick="updateAdminProfile();">Update Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Admin Profile -->

                                    <!-- Reset Password -->
                                    <div class="tab-pane fade mb-3" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="row">
                                            <div class="col-12 text-center mt-5 mt-lg-0">
                                                <h3 class="fw-bolder text-primary text-uppercase"><i class="bi bi-person-square fs-3"></i>&nbsp;&nbsp; Reset Password</h3>
                                            </div>
                                            <div class="col-10 offset-1 col-lg-12 offset-lg-0 shadow border p-4 mt-4">
                                                <div class="row g-3">
                                                    <!-- Form -->
                                                    <div class="col-12">
                                                        <label for="" class="form-label">Current Password</label>
                                                        <input class="form-control" type="password" id="currentAdminPwd">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">New Password</label>
                                                        <input class="form-control" type="password" id="newAdminPwd">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="">Verify Password</label>
                                                        <input class="form-control" type="password" id="verifyAdminPwd">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary" onclick="changeAdminPassword();">Change Password</button>
                                                    </div>
                                                    <!-- Form -->
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
    <?php
    } else {
    ?>
        <script>
            alert("You have to sign in first");
            window.location = "index.php";
        </script>
    <?php
    }
    ?>
</body>

</html>