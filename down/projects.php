<!DOCTYPE html>
<html lang="en">
<?php
include "includes/db_config.php";
if (isset($_GET['project_title'])) {
    $proj_url = $_GET['project_title'];
    $title = str_replace('-', ' ', $proj_url);
}
$sql = "SELECT * FROM dvt_projects where proj_title LIKE '%$title%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else echo "<h1>Nothing</h1>";
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $row['proj_title'] ?> | TRIP Project</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link rel="shortcut icon" href="/images/trip favicon 256x256.png" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" /> <!--    main styles-->
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
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "includes/header.php" ?>
    <!-- End Header -->

    <main id="main" class="project-page">

        <section class="inner-page project-page">
            <div class="container">
                <?= $row['project_essay'] ?>

            </div>
        </section>

    </main><!-- End #main -->

    <?php include "includes/footer.php" ?>
    <!-- End Footer -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/res/js/main.js"></script>

    <body>

</html>