<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- PayHere -->
    <script defer type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</head>

<body>
    <div class="col-12 bg-white shadow-sm">
        <div class="row mt-3 mb-3 mx-5">
            <?php
            require "connection.php";
            $student = $_SESSION["student"];
            ?>
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center mb-3 mb-lg-0">
                <img src="./assets/img/profile.png" width="50px">
                <span class="text-lg-start fw-bold ms-3">Hi, <b class="user-name text-primary"><?php echo $student["first_name"] . " " . $student["last_name"]; ?></b></span>
            </div>

            <div class="col-4 d-none d-lg-flex justify-content-center align-items-center">
                <h2 class="fw-bold lead text-uppercase">English As A Hobby</h2>
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center gap-2">
                <?php
                // If user hasn't paid
                if ($student["status_id"] == 2) {
                ?>
                    <button class="btn btn-warning" onclick="showPaymentModal();">Pay For This Month</button>
                <?php
                }
                ?>
                <button class="btn btn-danger px-5 px-lg-3" onclick="signOut();">Sign Out</button>
            </div>
        </div>
    </div>
    <script src="./assets/js/script.js"></script>

</body>

</html>
<!DOCTYPE html>
<html>