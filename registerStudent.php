<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Student Registration</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="./assets/semantic/semantic.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script defer src="./assets/bootstrap/bootstrap.js"></script>
    <script defer src="./assets/bootstrap/bootstrap.bundle.js"></script>
    <script defer src="./assets/js/script.js"></script>
</head>

<body>
    <?php
    session_start();
    require "connection.php";
    if (isset($_SESSION["admin"])) {

    ?>
        <div class="container mt-4 d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="fs-2 mt-2 text-primary">Student Registration</h3>
                </div>

                <!-- Breadcrumb -->
                <div class="col-10 mt-3 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminHome.php">Admin Home</a></li>
                            <li class="breadcrumb-item"><a href="manageStudents.php">Manage Students</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Registration</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb -->

                <!-- ERROR MSG -->
                <!-- <div class="col-12 mb-3 d-none" id="errorDiv">
                    <div class="ui negative message">
                        <i class="close icon" onclick="closeMsg();"></i>
                        <div class="header" id="errMsg2"></div>
                    </div>
                </div> -->
                <div class="d-none" id="alertDiv">
                    <div class="alert alert-danger alert-dismissible fade show d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div id="alertMsg"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <!-- ERROR MSG -->

                <!-- Form -->
                <div class="col-12">
                    <div class="row">

                        <!-- Email Address -->
                        <div class="col-12 mb-3">
                            <label for="stdUpdateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="stdRegEmail">
                        </div>
                        <!-- First Name -->
                        <div class="col-6">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="stdRegFname">
                        </div>
                        <!-- Last Name -->
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="stdRegLname">
                        </div>
                        <!-- Mobile -->
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="stdRegMobile">
                        </div>
                        <!-- Password -->
                        <div class=" col-6 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" id="stdRegPwd">
                        </div>
                        <!-- Grade -->
                        <div class="col-6">
                            <label for="" class="form-label">Grade</label>
                            <select class="form-select" id="stdRegGrade">
                                <option value="0">Select Grade</option>
                                <?php
                                $grades_rs = Database::search("SELECT * FROM grade");
                                while ($grade = $grades_rs->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $grade["id"]; ?>"><?php echo $grade["name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Active Status -->
                        <div class="col-6">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" id="stdRegStatus">
                                <option value="0">Select Status</option>
                                <?php
                                $status_rs = Database::search("SELECT * FROM status");
                                while ($status = $status_rs->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $status["id"] ?>"><?php echo $status["name"]; ?></option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-12 d-grid mt-3">
                            <button class="btn btn-primary" onclick="registerStudent();">Register Student</button>
                        </div>
                    </div>
                </div>
                <!-- Form -->

            </div>
        </div>
    <?php
    } else {
    ?>
        <script>
            alert("You have to sign in first");
            window.location = 'index.php';
        </script>
    <?php
    }

    ?>
</body>

</html>