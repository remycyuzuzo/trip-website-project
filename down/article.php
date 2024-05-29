<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_GET['article_id'])) {
    echo '<script>window.location="/errors/404"</script>';
}
$article_id = $_GET['article_id'];

require "includes/db_config.php";
$sql = "SELECT * from articles where article_id = $article_id";
$res = $conn->query($sql);
$row = $res->fetch_assoc();

?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $row['title'] ?> - TRIP Organization Rwanda</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!--    bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    font awesome-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGWP9EPSYQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SGWP9EPSYQ');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/styles.css">

</head>

<body>

    <?php include "includes/header.php" ?>
    <!-- End Header -->

    <!-- End #main -->
    <main>
        <?= $row['body'] ?>
    </main>
    <?php include "includes/footer.php" ?>
    <!-- End Footer -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".images").magnificPopup({
                delegate: ".gallery-item",
                type: "image",
                gallery: {
                    enabled: true,
                },
                image: {
                    titleSrc: 'title'
                }
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/res/js/main.js"></script>

</body>

</html>