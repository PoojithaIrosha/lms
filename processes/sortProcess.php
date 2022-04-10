<!-- Sort Students -->

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

                session_start();
                require "../connection.php";


                $srtgrade = $_POST["grade"];
                $srtname =  $_POST["name"];
                $srtemail =  $_POST["email"];
                $srtstatus = $_POST["status"];

                $query = "SELECT * FROM student ";
                $status = 0;

                // Search Name
                if (!empty($srtname)) {
                    $query .= "WHERE `first_name` LIKE '%" . $srtname . "%'";
                    $status = 1;
                }

                if (!empty($srtemail) && $status == 0) {
                    $query .= "WHERE `email` LIKE '%" . $srtemail . "%'";
                } else if (!empty($srtemail) && $status == 1) {
                    $query .= "AND `email` LIKE '%" . $srtemail . "%'";
                }

                //grade
                if ($srtgrade != "0" && $status == 0) {
                    $query .= "WHERE `grade_id`='" . $srtgrade . "'";
                    $status = 1;
                } else if ($srtgrade != "0" && $status == 1) {
                    $query .= "AND `grade_id`='" . $srtgrade . "'";
                }

                //active status
                if ($srtstatus != "undefined" && $status == 0) {
                    $query .= "WHERE `status_id`='" . $srtstatus . "'";
                    $status = 1;
                } else if ($srtstatus != "undefined" && $status == 1) {
                    $query .= "AND `status_id`='" . $srtstatus . "'";
                }

                $query1 = $query;

                $pageno;

                // Pagination
                if ($_POST["page"] != "0") {
                    $pageno = $_POST["page"];
                } else {
                    $pageno = 1;
                }

                $students_rs = Database::search($query);
                $students_rn = $students_rs->num_rows;
                $student = $students_rs->fetch_assoc();

                $results_per_page = 10;
                $number_of_pages = ceil($students_rn / $results_per_page);
                $page_first_result = ((int)$pageno - 1) * $results_per_page;
                $query1 .= " LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "";

                // echo $page_first_result;
                // echo $query1;
                $std_rs = Database::search($query1);
                $std_rn = $std_rs->num_rows;

                while ($std = $std_rs->fetch_assoc()) {
                    // echo $std["email"];

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
                                <a href="<?php echo "adminUpdateStudent.php?student_email=" . $std["email"]; ?>" class="btn btn-sm btn-primary  badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</a>
                                <button class="btn btn-sm btn-primary badge" onclick="showPaymentSlipImgModal('<?php echo $std['email']; ?>')">Payments</button>
                                <button onclick="deleteStudent('<?php echo $std['email']; ?>');" class="btn btn-sm btn-danger badge"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Table -->

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        <ul class="pagination mt-3 mb-0">
            <li class=" page-item"><a <?php if ($pageno <= 1) {
                                            echo "href='#'";
                                        } else {
                                        ?> onclick="sortStudents('<?php echo ($pageno - 1); ?>');" <?php
                                                                                                } ?> class="page-link">‹</a></li>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {
            ?>
                    <li class="active page-item active"><a onclick="sortStudents(<?php echo $pageno; ?>);" class="page-link"><?php echo $page ?></a></li>

                <?php
                } else {
                ?>
                    <li class="page-item"><a onclick="sortStudents(<?php echo $pageno; ?>);" class="page-link"><?php echo $page ?></a></li>

            <?php
                }
            }
            ?>

            <li class="page-item"><a <?php if ($pageno >= $number_of_pages) {
                                            echo "href='#'";
                                        } else {
                                        ?> onclick=" sortStudents(<?php echo $pageno + 1; ?>);" <?php
                                                                                            } ?> class="page-link">›</a></li>
        </ul>
    </div>

</div>