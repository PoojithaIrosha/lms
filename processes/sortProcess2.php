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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                session_start();
                require "../connection.php";


                $srtgrade = $_POST["grade"];
                $srtname =  $_POST["name"];
                $srtstatus = $_POST["status"];

                $query = "SELECT * FROM student ";
                $status = 0;

                // Search Name
                if (!empty($srtname)) {
                    $query .= "WHERE `first_name` LIKE '%" . $srtname . "%'";
                    $status = 1;
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
                // echo $query;

                $std_rs = Database::search($query1);
                $std_rn = $std_rs->num_rows;

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
                            <div class="btn-group align-top">
                                <a href="<?php echo "adminUpdateStudent.php?student_email=" . $std["email"]; ?>" class="btn btn-sm btn-primary  badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</a>
                                <button class="btn btn-sm btn-primary badge">Payments</button>
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

</div>