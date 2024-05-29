<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | TRIP ORG</title>

    <link rel="shortcut icon" href="/images/trip favicon 256x256.png" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" /> <!--    main styles-->
    <link rel="stylesheet" href="./style.css">


</head>

<body class="bg-dark">

    <div class="container">
        <div class="splash-container">
            <div class="card ">
                <div class="card-header text-center"><a href="../">Welcome TRIP Administrator</a><span class="splash-description">Please fill in your credentials.</span></div>
                <div class="card-body">
                    <form method="post" enctype="">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="required" name="email" autofocus="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                        <div class="text-danger">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </div>
                    </form>
                    <div class="py-4 text-center">
                        <a href="https://webmail.trip-terimbere.org" target="_blank"> <span class="text-secondary"><i class="fas fa-envelope"></i></span> Staff Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
<?php
include '../includes/db_config.php';
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);


    $sql = "SELECT usr_email,usr_password,usr_id from users where usr_email='$email' && usr_password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['usr_id'];
?>
        <script>
            window.location = "/admin/";
        </script>
    <?php
    } else {
        $_SESSION['error'] = "<strong>Error:</strong> Incorrect Email address or password."; ?>
        <script>
            window.location = "login.php";
        </script>
<?php
    }
}
?>