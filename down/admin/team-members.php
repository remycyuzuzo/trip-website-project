<?php
session_start();
include "session_check.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Customize the team members</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Team members</li>
                </ol>
            </div>
        </div>
        <div class="row my-2">
            <div class="container">
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']) ?>
                    </div>
                <?php
                }
                ?>
                <fieldset class="border p-2">
                    <legend><i class="fas fa-question-circle"></i></legend>
                    <p class="m-0">
                        employees shown here are the ones to be shown on the main website Employees page.<br> Here they are grouped in their working positions.
                    </p>
                </fieldset>

                If you find a position missing, <a href="" data-toggle='modal' data-target='#modal-add-position'><span class="text-secondary"><i class="fas fa-plus-circle"></i></span> add a working position</a>
                <?php
                include "../includes/db_config.php";
                $sql = "SELECT * FROM employee_positions";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="row my-2">
                            <div class="col-md-9">
                                <div class="card card-light">
                                    <div class="card-header">
                                        <h4 class="m-0"><?= $row['pos_title'] ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $sql = "SELECT * FROM employees WHERE emp_pos_id = $row[pos_id]";
                                        $query = $conn->query($sql);
                                        $number_records = $query->num_rows;
                                        if ($query->num_rows > 0) {
                                        ?>
                                            <table class="table table-striped">
                                                <tr class="thead-dark">
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Tel(s)</th>
                                                    <th>Email Address(s)</th>
                                                    <th>More actions</th>
                                                </tr>
                                                <?php $i = 1;
                                                while ($row2 = $query->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <?= $row2['emp_first_name'] . ' ' . $row2['emp_sec_name'] ?>
                                                        </td>
                                                        <td><?= $row['pos_title'] ?></td>
                                                        <td>
                                                            <?php
                                                            $sql = "SELECT phone_number,emp_id from employee_phone where emp_id = $row2[emp_id]";
                                                            $result2 = $conn->query($sql);
                                                            if ($result2->num_rows > 0) {
                                                                while ($row3 = $result2->fetch_assoc()) {
                                                                    echo $row3['phone_number'] . " ";
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $sql = "SELECT email_addr,emp_id from emp_email_addr where emp_id = $row2[emp_id]";
                                                            $result2 = $conn->query($sql);
                                                            if ($result2->num_rows > 0) {
                                                                while ($row3 = $result2->fetch_assoc()) {
                                                                    echo $row3['email_addr'] . " ";
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="update_employee.php?emp_id=<?= $row2['emp_id'] ?>"><i class="fas fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                } ?>
                                            </table>
                                            <?php
                                            if ($number_records > $row['emp_max_number']) {
                                                echo "<a  href='#'data-toggle='modal' data-target='#modal-add-employee'>add more personnels</a>";
                                            }
                                        } else {
                                            ?>
                                            <a href='#' data-toggle='modal' data-target='#modal-add-employee'><span class="text-secondary"><i class="fas fa-plus-circle"></i></span> please add a person in this position</a>
                                        <?php
                                        };
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>

                <?php
                } else {
                    echo "<h3>No position registered</h3>
                    <a class='btn btn-secondary' href='#'data-toggle='modal' data-target='#modal-add-position'><i class='fas fa-plus-circle'></i> add an employee position</a>
                    ";
                }
                ?>
            </div>
        </div>

    </div>
    <!-- Positions modal -->
    <div class="modal" id="modal-add-position">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">add a job position</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="pos_title">Position title</label>
                            <input type="text" name="pos_title" class="form-control" id="pos_title">
                        </div>
                        <div class="form-group">
                            <label for="max_no">Maximum number of employees</label>
                            <input type="number" value="1" id="max_no" name="max_no" class="form-control">
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit_pos">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end of Positions modal -->

    <!-- employee modal -->
    <div class="modal" id="modal-add-employee">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">add a job position</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="form_employee" action="" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First name</label>
                                <input type="text" name="fname" class="form-control" id="fname" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last name</label>
                                <input type="text" class="form-control" name="lname" id="lname" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option selected disabled>are you.. </option>
                                <option value="M"><i class="fas fa-male"></i> Male</option>
                                <option value="F"><i class="fas fa-female"></i> Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="tel">Telephone number</label>
                            <input type="tel" name="tel" class="form-control" id="tel">
                        </div>
                        <div class="form-group">
                            <label for="pos_title">Position</label>
                            <select name="pos_title" id="pos_title" class="form-control">
                                <option selected disabled>Select the position</option>
                                <?php
                                $sql = "SELECT * from employee_positions";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['pos_id'] . '">' . $row['pos_title'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pic">Profile picture</label>
                            <input class="form-control" type="file" name="pic" id="pic">
                        </div>
                        <div class="form-group">
                            <label for="bio" class="float-left">Employee Bio </label><small class="float-right"><span id="chars">200</span> chars</small>
                            <textarea class="form-control" maxlength="400" name="bio" id="bio" cols="30" rows="7"></textarea>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit_emp"><i class="fas fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">&times; Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end of employee modal -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php
    // PHP SCRIPTS 
    // Submit a position
    if (isset($_POST['submit_pos'])) {
        $title = $conn->real_escape_string($_POST['pos_title']);
        $max_nber = $conn->real_escape_string($_POST['max_no']);

        $query = $conn->query("INSERT INTO employee_positions VALUES('','$title',$max_nber)");
        if ($query) {
    ?>
            <script>
                window.location = "team-members.php";
            </script>
    <?php
        } else {
            $_SESSION['error'] = "error occured: " . $conn->error;
        }
    } // end of 1st script


    if (isset($_POST['submit_emp'])) {
        $fname = $conn->real_escape_string($_POST['fname']);
        $lname = $conn->real_escape_string($_POST['lname']);
        $tel = $conn->real_escape_string($_POST['tel']);
        $email = $conn->real_escape_string($_POST['email']);
        $pos = $conn->real_escape_string($_POST['pos_title']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $bio = $conn->real_escape_string($_POST['bio']);

        // Upload file
        $uploadedFile = '';
        $uploadStatus =  0;
        $_response['message'] = "";
        if (!empty($_FILES["pic"]["name"])) {

            // File path config
            $uploadDir = "../images/team/";
            $fileType = strtolower(pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION));
            $fileName =  strtolower(str_replace(" ", "-", $fname . ' ' . $lname)) . '.' . $fileType;
            $targetFilePath = $uploadDir . $fileName;


            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'jtif');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath)) {
                    $uploadStatus = 1;
                    $uploadedFile = $fileName;
                } else {
                    $uploadStatus = 0;
                    $_response['message'] .= 'Sorry, there was an error uploading your file.';
                }
            } else {
                $uploadStatus = 0;
                $_response['message'] .= 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
            }
        } else {
            $_response['message'] .= "Profile Picture is mandatory";
        }

        if ($uploadStatus === 1) {
            $sql = "INSERT INTO employees VALUES('', '$fname', '$lname', $pos, '$bio', '$uploadedFile', 'active', '$gender' )";
            $result = $conn->query($sql);
            if ($result) {
                $sql1 = $conn->query("SELECT emp_id from employees ORDER BY emp_id DESC LIMIT 1");
                $row = $sql1->fetch_assoc();

                $sql1 = $conn->query("INSERT INTO emp_email_addr VALUES('','$email',$row[emp_id])");
                if (!$sql1) {
                    $_response .= $conn->error;
                }
                $sql2 = $conn->query("INSERT INTO employee_phone VALUES('', '$tel', $row[emp_id])");
                if (!$sql2) {
                    $_response['message'] .= $conn->error;
                }
            } else $_response['message'] .= "Error occured while inserting employee: " . $conn->error;
        }
    }
    ?>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script>
        var bio = document.querySelector("#bio");
        document.addEventListener('DOMContentLoaded', function() {
            bio.onkeyup = function() {
                var number = bio.value.length;
                document.querySelector('#chars').innerHTML = 400 - number;
            }
        });
    </script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>