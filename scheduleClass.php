<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Schedule Class</title>

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
</head>

<body>
    <?php
    session_start();
    require "connection.php";

    if (isset($_SESSION["admin"])) {
    ?>
        <div class="container-fluid min-vh-100 d-flex align-items-center">
            <div class="row">
                <div class="col-12 mt-1 fw-bold text-primary text-center text-uppercase">
                    <h3>Schedule a Class</h3>
                </div>

                <!-- Breadcrumb -->
                <div class="col-10 offset-1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminHome.php">Admin Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Schedule a Class</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb -->

                <!-- Error MSG -->
                <div class="col-10 offset-1 d-none" id="errorDiv">
                    <div class="ui negative message">
                        <i class="close icon" onclick="closeMsg();"></i>
                        <div class="header" id="errMsg"></div>
                    </div>
                </div>
                <!-- Error MSG -->

                <!-- Form -->
                <div class="col-10 offset-1 mt-2 border p-4 rounded mb-4">
                    <div class="row d-flex justify-content-center">
                        <!-- Class Name -->
                        <div class="col-10 col-lg-12">
                            <label class="form-label fs-4" for="">Class Name</label>
                            <input class="form-control" type="text" id="className">
                        </div>
                        <div class="col-10 col-lg-12 my-3">
                            <hr class="hr-break-1">
                        </div>
                        <!-- Date -->
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Date</label>
                            <input type="date" class="form-control" id="classDate">
                        </div>
                        <!-- Time From -->
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Time From</label>
                            <input type="time" class="form-control" id="classTimeFrom">
                        </div>
                        <!-- Time To -->
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Time To</label>
                            <input type="time" class="form-control" id="classTimeTo">
                        </div>

                        <div class="col-10 col-lg-12 my-3">
                            <hr class="hr-break-1">
                        </div>
                        <!-- Grade -->
                        <div class="col-10 col-lg-6 mb-2">
                            <label class="form-label fs-4" for="">Select Grade</label>
                            <select class="form-select" id="classGrade">
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
                        <!-- Class Link -->
                        <div class="col-10 col-lg-6">
                            <label for="" class="form-label fs-4">Class Link</label>
                            <input class="form-control" type="text" placeholder="https://zoom.us/" id="classLink">
                        </div>
                        <div class="col-10 d-grid mt-4">
                            <button class="btn btn-primary py-2 fs-5" onclick="scheduleClass();">Schedule Class</button>
                        </div>
                    </div>
                </div>
                <!-- Form -->

                <!-- Footer -->
                <?php
                require "footer2.php";
                ?>
                <!-- Footer -->

            </div>
        </div>
</body>

</html>


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