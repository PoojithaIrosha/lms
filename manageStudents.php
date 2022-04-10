<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Admin Home</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="./assets/semantic/semantic.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- JS -->
    <script defer src="./assets/bootstrap/bootstrap.bundle.js"></script>
    <script defer src="./assets/bootstrap/bootstrap.js"></script>
    <script defer src="./assets/js/script.js"></script>

    <!-- Pace -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./assets/pace/flash.css">
    <!-- Pace -->
</head>

<body>
    <?php
    if (isset($_SESSION["admin"])) {
        $admin = $_SESSION["admin"];
        $pageno;
    ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                require "adminHeader.php";
                ?>

                <!-- Payment Slips Modal -->
                <div class="col-12">
                    <div class="modal fade" tabindex="-1" id="paymentSlipImg">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Slips</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="hidePaymentSlipImgModal();"></button>
                                </div>
                                <div class="modal-body ">
                                    <!-- Tab View -->
                                    <!-- Tab Navs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Payment Slips</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Invoices</button>
                                        </li>
                                    </ul>
                                    <!-- Tab Navs -->
                                    <!-- Tab Content -->
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row" id="paymentImgResults"></div>
                                        </div>
                                        <div class="tab-pane fade text-center p-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <p class="fs-3 text-black-50"><i class="bi bi-exclamation-circle-fill fs-3"></i>&nbsp;&nbsp;Currently Not Supported</p>
                                        </div>
                                    </div>
                                    <!-- Tab Content -->
                                    <!-- Tab View -->

                                    <!-- Spinner -->
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border" role="status" id="loader">
                                        </div>
                                    </div>
                                    <!-- Spinner -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hidePaymentSlipImgModal();">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment Slips Modal -->

                <!-- Show Payment Slip Img Modal -->
                <div class="modal fade" id="showSlipImg" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Payment Slip</h5>
                                <button type="button" class="btn-close" data-bs-target="#paymentSlipImg" data-bs-toggle="modal" aria-label="Close" onclick="restoreDiv();"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center d-none" id="imageResult">
                                <img class="img-thumbnail" id="slipImg">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show Payment Slip Img Modal -->

                <!-- Student Attendance Modal -->
                <div class="col-12">
                    <div class="modal fade" tabindex="-1" id="studentAttendance">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Student Attendance</h5>
                                    <button type=" button" class="btn-close" data-bs-dismiss="modal" onclick="hideStudentAttendanceModal();"></button>
                                </div>
                                <div class="modal-body" id="studentAttendanceResults">

                                    <!-- Spinner -->
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border" role="status" id="loader2">
                                        </div>
                                    </div>
                                    <!-- Spinner -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideStudentAttendanceModal();">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Attendance Modal -->

                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="adminHome.php">Admin Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Manage Students</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row flex-lg-nowrap">
                            <div class="col">
                                <div class="e-tabs mb-3 px-3">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" href="#">Students</a></li>
                                    </ul>
                                </div>

                                <div class="row flex-lg-nowrap">
                                    <div class="col-12 col-lg-9 mb-3">
                                        <div class="e-panel card">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h6 class="mr-2">Manage all students</h6>
                                                </div>

                                                <!-- Table -->
                                                <div id="results">
                                                    <div class="e-table">
                                                        <div class="table-responsive table-lg mt-3">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="max-width">Email</th>
                                                                        <th class="max-width">Name</th>
                                                                        <th>Mobile</th>
                                                                        <th>Grade</th>
                                                                        <th class="sortable">Last Login</th>
                                                                        <th>Status</th>
                                                                        <th>Attendance</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <?php


                                                                    if (isset($_GET["page"])) {
                                                                        $pageno = $_GET["page"];
                                                                    } else {
                                                                        $pageno = 1;
                                                                    }


                                                                    $students_rs = Database::search("SELECT * FROM student");
                                                                    $nstudents = $students_rs->num_rows;
                                                                    $student = $students_rs->fetch_assoc();

                                                                    $results_per_page = 10;
                                                                    $number_of_pages = ceil($nstudents / $results_per_page);


                                                                    $page_first_result = ($pageno - 1) * $results_per_page;
                                                                    $std_rs = Database::search("SELECT * FROM `student` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                                                                    if ($std_rs->num_rows > 0) {

                                                                        while ($std = $std_rs->fetch_assoc()) {

                                                                    ?>
                                                                            <tr>
                                                                                <td class="text-nowrap align-middle"><?php echo $std["email"]; ?></td>
                                                                                <td class="text-nowrap align-middle"><?php echo $std["first_name"] . " " . $std["last_name"]; ?></td>
                                                                                <td class="text-nowrap align-middle"><?php echo $std["mobile"]; ?></td>

                                                                                <?php
                                                                                $grades_rs = Database::search("SELECT * FROM grade WHERE `id`='" . $std["grade_id"] . "'");
                                                                                $grade = $grades_rs->fetch_assoc();
                                                                                ?>

                                                                                <td class="text-nowrap align-middle"><?php echo $grade["name"]; ?></td>
                                                                                <td class="text-nowrap align-middle"><span><?php echo $std["last_login"]; ?></span></td>

                                                                                <td class="text-center align-middle">
                                                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                                                        <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch" onclick="changeStatus('<?php echo $std['email']; ?>');" <?php
                                                                                                                                                                                                                                if ($std["status_id"] == 1) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                ?>>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <div>
                                                                                        <button class="btn btn-sm btn-warning badge" onclick="showStudentAttendanceModal('<?php echo $std['email']; ?>');">Attendance</button>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <div class="btn-group align-top">
                                                                                        <a href="<?php echo "adminUpdateStudent.php?student_email=" . $std["email"]; ?>" class="btn btn-sm btn-primary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</a>
                                                                                        <button class="btn btn-sm btn-primary badge" onclick="showPaymentSlipImgModal('<?php echo $std['email']; ?>')">Payments</button>
                                                                                        <button onclick="deleteStudent('<?php echo $std['email']; ?>');" class="btn btn-sm btn-danger badge"><i class="fa fa-trash"></i></button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="8" class="text-center fs-1 p-5 text-black-50"><i class="bi bi-people-fill fs-1"></i>&nbsp;&nbsp;No Students Yet!</td>
                                                                        </tr>

                                                                    <?php
                                                                    }


                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- Table -->

                                                        <div class="d-flex justify-content-center">
                                                            <ul class="pagination mt-3 mb-0">
                                                                <li class=" page-item"><a href="<?php
                                                                                                if ($pageno <= 1) {
                                                                                                    echo "#";
                                                                                                } else {
                                                                                                    echo "?page=" . ($pageno - 1);
                                                                                                }
                                                                                                ?>" class="page-link">‹</a></li>

                                                                <?php

                                                                for ($page = 1; $page <= $number_of_pages; $page++) {

                                                                    if ($page == $pageno) {
                                                                ?>
                                                                        <li class="active page-item"><a href="<?php echo "?page=" . ($page) ?>" class="page-link"><?php echo $page ?></a></li>

                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <li class="page-item"><a href="<?php echo "?page=" . ($page); ?>" class="page-link"><?php echo $page ?></a></li>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                                <li class="page-item"><a href="<?php
                                                                                                if ($pageno >= $number_of_pages) {
                                                                                                    echo "#";
                                                                                                } else {
                                                                                                    echo "?page=" . ($pageno + 1);
                                                                                                }
                                                                                                ?>" class="page-link">›</a></li>
                                                            </ul>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sort Options -->
                                    <div class="col-12 col-lg-3 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div>
                                                    <label class="d-flex justify-content-center fs-5 fw-bold text-primary">Search Students</label><br>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group mb-3">
                                                        <label>Search by Name:</label>
                                                        <div><input class="form-control w-100" type="text" placeholder="Name" id="sort-by-name" onkeyup="sortStudents(0);"></div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Search by Email:</label>
                                                        <div><input class="form-control w-100" type="email" placeholder="Email Address" id="sort-by-email" onkeyup="sortStudents(0);"></div>
                                                    </div>
                                                    <label>Search by grade:</label>
                                                    <select class="form-select" id="sort-by-grade" onchange="sortStudents(0);">
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

                                                <hr class="my-3">
                                                <div class="">
                                                    <label class="mb-2">Status:</label>
                                                    <div class="px-2 mb-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="user-status" id="users-status-disabled">
                                                            <label class="custom-control-label" for="users-status-disabled">Disabled</label>
                                                        </div>
                                                    </div>
                                                    <div class="px-2 mb-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="user-status" id="users-status-active">
                                                            <label class="custom-control-label" for="users-status-active">Active</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-3">

                                                <div class="text-center px-xl-3">
                                                    <a href="registerStudent.php" class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#user-form-modal"><i class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Add New User</a>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center mt-2">
                                                    <a onclick="ativateAllStudents();" class="btn btn-primary"><i class="bi bi-check2-circle"></i>&nbsp;&nbsp;Ativate All Students</a>
                                                </div>
                                                <hr class="my-3">
                                                <div class="col-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-6 d-grid">
                                                            <button class="btn btn-danger" onclick="resetSortStudents();"><i class="bi bi-arrow-clockwise"></i>&nbsp;Reset</button>
                                                        </div>
                                                        <div class="col-6 d-grid">
                                                            <button class="btn btn-success" onclick="sortStudents(0);"><i class="bi bi-search"></i> Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Sort Options -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php
            require "footer2.php";
            ?>
            <!-- Footer -->
        </div>
        </div>

    <?php
    } else {
    ?>
        <script>
            alert("You have to login first");
            window.location = "index.php";
        </script>
    <?php
    }
    ?>



</body>

</html>