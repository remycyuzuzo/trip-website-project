<?php
session_start();
include "session_check.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel Dashboard | TRIP Org</title>
</head>

<body class="bg-light">
    <?php
    include "top-nav.php";
    ?>
    <div class="container mt-5">
        <?php
        include '../includes/db_config.php';
        $q = "SELECT * FROM users where usr_id=$_SESSION[user_id]";
        $result = $conn->query($q);

        $row = $result->fetch_assoc();
        ?>
        <h4>Welcome <?= $row['usr_full_name'] ?>,</h4>
        <h3>Administrator Control Panel</h3>
        <h4>This interface will help you to control basic website contents</h4>
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        Recent activities
                    </div><a href="news.php">
                        <div class="card-body">
                            <p>
                                add or manage activities/news
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        Team members
                    </div><a href="team-members.php">
                        <div class="card-body">
                            <p>
                                add or customize the leaders of the organization
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        TRIP Projects
                    </div><a href="projects.php">
                        <div class="card-body">
                            <p>
                                Click here to register planned projects
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        Messages
                    </div><a href="contact-us.php">
                        <div class="card-body">
                            <p>
                                view messages sent from <i>contact us</i> form
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        User settings
                    </div><a href="news.php">
                        <div class="card-body">
                            <p>
                                add or manage users
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>