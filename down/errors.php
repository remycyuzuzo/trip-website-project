<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['error_code'])) {
    $error_code = $_GET['error_code'];

    switch ($error_code) {
        case '500':
            $msg = '
            <h1>Error 500</h1>
            <h2>There was an internal error.</h2>
            <p>Please contact the <a href="mailto:webmaster@trip.org">system adminstrator</a></p>
            ';
            $error = 'Error 500 | Internal error';
            break;
        case '404':
            $msg = '
            <h1>ERROR 404</h1>
            <h2>The page address you are looking for does\'t exist on this server</h2>
            <p>Please check whether the address is written well or contact the <a href="mailto:webmaster@trip.org">system adminstrator</a></p>
            ';
            $error = 'Error 404 | Not Found';
            break;
        case '403':
            $msg = '
                <h1>Error 403: Forbiden</h1>
                <h2>We\'re sorry, but it seems like you are not allowed to access this file/page</h2>
                ';
            $error = 'Error 403 | Forbiden';
            break;

        default:
            $error = "Nothing";
            break;
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $error ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />


    <link rel="shortcut icon" href="/images/trip favicon 256x256.png" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    main styles-->
    <link rel="stylesheet" href="/styles.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGWP9EPSYQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SGWP9EPSYQ');
    </script>
    <style>
        html,
        body {
            height: 100%;
        }

        body main {
            height: calc(100% - 80px);
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "includes/header.php" ?>
    <!-- End Header -->

    <main id="main" class="d-flex flex-column justify-content-center">

        <section>
            <div class="container">
                <?php
                echo $msg;
                ?>

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "includes/footer.php"
    ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="/res/js/main.js"></script>

</body>

</html>