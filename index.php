<?php

// Remember Me Option
$stdEmail = "";
$stdPassword = "";
$adminEmail = "";
$adminPassword = "";

if (isset($_COOKIE["stdemail"])) {
    $stdEmail = $_COOKIE["stdemail"];
}

if (isset($_COOKIE["stdpassword"])) {
    $stdPassword = $_COOKIE["stdpassword"];
}

if (isset($_COOKIE["adminemail"])) {
    $adminEmail = $_COOKIE["adminemail"];
}

if (isset($_COOKIE["adminpassword"])) {
    $adminPassword = $_COOKIE["adminpassword"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English As A Hobby | Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/semantic/semantic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script defer src="assets/bootstrap/bootstrap.js"></script>
    <script defer src="assets/bootstrap/bootstrap.bundle.js"></script>
    <script defer src="./assets/js/script.js"></script>

    <!-- Pace -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./assets/pace/flash.css">
    <!-- Pace -->
</head>

<body>
    <!-- Container -->
    <div class="container-fluid min-vh-100 m-0 p-0">
        <div class="row g-0">

            <!-- Student Modal -->
            <div class="modal fade" tabindex="-1" id="stdForgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Student Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mb-3 ui input">
                                    <input type="email" id="stdFpEmail" placeholder="Email Address">
                                </div>
                                <div class="col-12 d-flex justify-content-end mb-3">
                                    <button class="ui button" id="stdFpSendCodeBtn">Send Code</button>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3 ui icon input">
                                            <input type="password" placeholder="New Password" id="stdFpPassword">
                                            <i class="circular eye link icon me-3" onclick="showPassword('stdFpPassword')"></i>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3 ui icon input">
                                            <input type="password" placeholder="Verify Password" id="stdFpVerifyPassword">
                                            <i class="circular eye link icon me-3" onclick="showPassword('stdFpVerifyPassword')"></i>
                                        </div>
                                        <div class="col-12 ui input">
                                            <input type="text" placeholder="Verification Code" id="stdFpVerificationCode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="ui negative button" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="ui positive button" id="stdFpResetPassword">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student Modal -->

            <!-- Admin Modal -->
            <div class="modal fade" tabindex="-1" id="adminForgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Admin Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mb-3 ui input">
                                    <input type="email" id="adminFpEmail" placeholder="Admin Email Address">
                                </div>
                                <div class="col-12 d-flex justify-content-end mb-3">
                                    <button class="ui button" id="adminFpSendCodeBtn">Send Code</button>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3 ui icon input">
                                            <input type="password" placeholder="New Admin Password" id="adminFpPassword">
                                            <i class="circular eye link icon me-3" onclick="showPassword('adminFpPassword')"></i>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3 ui icon input">
                                            <input type="password" placeholder="Verify Admin Password" id="adminFpVerifyPassword">
                                            <i class="circular eye link icon me-3" onclick="showPassword('adminFpVerifyPassword')"></i>
                                        </div>
                                        <div class="col-12 ui input">
                                            <input type="text" placeholder="Verification Code" id="adminFpVerificationCode">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="ui negative button" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="ui positive button" id="fpResetPassword">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Modal -->

            <!-- Form Section -->
            <div class="col-12 col-lg-6 mt-5 ">
                <div class="row mx-5 mt-4">

                    <div class="col-12 d-flex justify-content-center">
                        <img src="assets/img/english logo.jpg" width="350px" class="d-lg-none">
                        <img src="assets/img/english logo.jpg" width="350px" class="d-none d-lg-block">
                    </div>
                    <div class="col-12 mb-4">
                        <h3 class="text-uppercase text-center header1 fs-1 select-none">English As A Hobby</h3>
                        <div class="d-flex justify-content-center">
                            <span class="fs-6 badge bg-primary ripple-btn select-none" style="cursor: default;">by Chinthana Gallage</span>
                        </div>
                        <h3 id="title">Student Login</h3>
                    </div>

                    <!-- ERROR MSG -->
                    <div class="col-12 mb-3 d-none" id="errorDiv">
                        <div class="ui negative message">
                            <i class="close icon" onclick="closeMsg();"></i>
                            <div class="header" id="errMsg"></div>
                        </div>
                    </div>
                    <!-- ERROR MSG -->

                    <!-- Student Form -->
                    <div class="col-12" id="stdFormDiv">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 ui input">
                                <!-- Email Address -->
                                <input type="email" placeholder="Student Email Address" id="stdEmail" value="<?php echo $stdEmail; ?>">
                            </div>
                            <div class="col-12 col-md-6 mb-3 ui input">
                                <!-- Password -->
                                <input type="password" placeholder="Student Password" id="stdPassword" value="<?php echo $stdPassword; ?>">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-lg-0">
                                <div class="ui checkbox">
                                    <input type="checkbox" id="stdRememberMe">
                                    <label class="lbl1" for="stdRememberMe">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end">
                                <a class="anchor-tag me-3 d-flex align-items-center" id="stdForgotPassword">Forgot Password?</a>
                                <button class="ripple-btn ui primary button" id="stdSignInBtn">Sign In</button>
                            </div>
                            <div class="d-lg-none col-12 mt-3">
                                <hr class="hr-break-1">
                            </div>
                            <div class="col-12 col-lg-3 mt-3 mt-lg-2 d-grid offset-lg-9 mt-lg-4">
                                <button class="btn btn-secondary px-4" id="changeViewBtn" onclick="changeView();">Admin Login</button>


                            </div>
                        </div>
                    </div>
                    <!-- Student Form -->

                    <!-- Admin Form -->
                    <div class="col-12 d-none" id="adminFormDiv">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 ui input">
                                <!-- Email Address -->
                                <input type="email" placeholder="Admin Email Address" id="adminEmail" value="<?php echo $adminEmail; ?>">
                            </div>
                            <div class="col-12 col-md-6 mb-3 ui input">
                                <!-- Password -->
                                <input type="password" placeholder="Admin Password" id="adminPassword" value="<?php echo $adminPassword; ?>">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-lg-0">
                                <div class="ui checkbox">
                                    <input type="checkbox" id="adminRememberMe">
                                    <label class="lbl1" for="adminRememberMe">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end">
                                <a class="anchor-tag me-3 d-flex align-items-center" id="adminForgotPassword">Forgot Password?</a>
                                <button class="ripple-btn ui primary button" id="adminSignInBtn">Sign In</button>
                            </div>
                            <div class="d-lg-none col-12 mt-3">
                                <hr class="hr-break-1">
                            </div>
                            <div class="col-12 col-lg-3 mt-3 mt-lg-2 d-grid offset-lg-9 mt-lg-4">
                                <button class="btn btn-secondary px-4" id="changeViewBtn" onclick="changeView();">Student Login</button>

                            </div>
                        </div>
                    </div>
                    <!-- Admin Form -->

                    <!-- Footer -->
                    <div class="col-6 d-none d-lg-block position-fixed bottom-0 mb-3">
                        <div class="row">
                            <div class="col-6">
                                <button class="ui circular facebook icon button">
                                    <i class="facebook icon"></i>
                                </button>
                                <button class="ui circular twitter icon button">
                                    <i class="twitter icon"></i>
                                </button>
                                <button class="ui circular linkedin icon button">
                                    <i class="linkedin icon"></i>
                                </button>
                                <button class="ui circular google plus icon button">
                                    <i class="google plus icon"></i>
                                </button>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-items-center">
                                <span class="select-none me-4" style="cursor: default;">2022 &copy; Poojitha Irosha</span>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->

                </div>
            </div>
            <!-- Form Section -->

            <!-- Carousel -->
            <div class="col-12 col-lg-6 vh-100 mt-5 mt-lg-0 ">
                <div id="carouselExampleSlidesOnly " class="carousel slides carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="assets/img/carousel_img/1.jpg" class="d-block img">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/carousel_img/2.jpg" class="d-block img">
                        </div>
                        <div class="carousel-item active">
                            <img src="assets/img/carousel_img/3.jpg" class="d-block img">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/carousel_img/4.jpg" class="d-block img">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel -->

        </div>
    </div>
    <!-- Container -->
</body>

</html>