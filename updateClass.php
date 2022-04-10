<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Update Class Scheduled</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="./assets/semantic/semantic.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Bootstrap Icon -->
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
        $class_id = $_GET["class"];
        $class_rs = Database::search("SELECT * FROM class_schedule WHERE `id`='" . $class_id . "'");
        $class_data = $class_rs->fetch_assoc();

    ?>

        <div class="container mt-4 d-flex align-items-center">
            <div class="row">
                <div class="col-12 mt-3 fw-bold text-primary text-center text-uppercase">
                    <h2>Update Class Details</h2>
                </div>

                <!-- Breadcrumb -->
                <div class="col-10 offset-1 offset-lg-0 mt-3 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminHome.php">Admin Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Class Details</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb -->

                <!-- Error MSG -->
                <div class="col-12 d-none" id="errorDiv">
                    <div class="ui negative message">
                        <i class="close icon" onclick="closeMsg();"></i>
                        <div class="header" id="errMsg"></div>
                    </div>
                </div>
                <!-- Error MSG -->

                <!-- Form -->
                <div class="col-12 mt-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10 col-lg-12">
                            <label class="form-label fs-4" for="">Class Name</label>
                            <input class="form-control" type="text" placeholder="English" id="upclassName" value="<?php echo $class_data["title"]; ?>">
                        </div>
                        <div class="col-10 col-lg-12 my-3">
                            <hr class="hr-break-1">
                        </div>
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Date</label>
                            <input type="date" class="form-control" id="upclassDate" value="<?php echo $class_data["date"]; ?>">
                        </div>
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Time From</label>
                            <input type="time" class="form-control" id="upclassTimeFrom" value="<?php echo $class_data["time_from"]; ?>">
                        </div>
                        <div class="col-10 col-lg-4 mb-2">
                            <label class="form-label fs-4" for="">Time To</label>
                            <input type="time" class="form-control" id="upclassTimeTo" value="<?php echo $class_data["time_to"]; ?>">
                        </div>

                        <div class="col-10 col-lg-12 my-3">
                            <hr class="hr-break-1">
                        </div>
                        <div class="col-10 col-lg-6 mb-2">
                            <label class="form-label fs-4" for="">Select Grade</label>
                            <select class="form-select" disabled>
                                <?php
                                $grades_rs = Database::search("SELECT * FROM grade WHERE `id`='" . $class_data["grade_id"] . "'");
                                $grade = $grades_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $grade["id"]; ?>"><?php echo $grade["name"]; ?></option>
                            </select>
                        </div>
                        <div class="col-10 col-lg-6">
                            <label for="" class="form-label fs-4">Class Link</label>
                            <input class="form-control" type="text" placeholder="https://zoom.us/" id="upclassLink" value="<?php echo $class_data["link"]; ?>">
                        </div>
                        <div class="col-10 d-grid mt-4">
                            <button class="btn btn-success py-2 fs-5" onclick="updateClass(<?php echo $class_id; ?>);">Update Class</button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
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