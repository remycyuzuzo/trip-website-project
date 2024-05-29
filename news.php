<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/trip%20logo%202.jpg" type="image/x-icon">
    <meta name="description" content="TRIP is a non-government organization which facilitates in rural development through partnerships between rural communities in Rwanda">
    <link rel="apple-touch-icon" href="/images/trip%20logo%202.jpg">
    <link rel="canonical" href="https://www.trip-terimbere.org">
    <!--    bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--    main styles-->
    <link rel="stylesheet" href="./styles.css">
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
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NGO",
            "name": "Terimbere Rural Integrated Partnership",
            "alternateName": "TRIP",
            "url": "https://www.trip-terimbere.org",
            "logo": "https://www.trip-terimbere.org/images//images/trip%20logo%202.jpg",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+250786660467",
                "contactType": "customer service",
                "areaServed": "RW",
                "availableLanguage": "en"
            }
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <title>TRIP - Terimbere Rural Integrated Partnership</title>

    <?php include "includes/functions.php" ?>


    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "e8d39fd7-4536-42bf-96a7-cf9de7695978",
            });
        });
    </script>


</head>

<body>
    <?php
    include "includes/header.php";
    ?>
    <div class="hero">
        <div class="cont d-flex flex-column justify-content-start parallax">
            <div class="bg-overly"></div>
            <div class="container">
                <div class="desc">
                    <h1 class="mx-auto">
                        TRIP
                    </h1>
                    <h2 class="mx-auto">Terimbere Rural Integrated Partnership</h2>
                    <a href="/what-we-do" class="btn btn-primary mx-3">about us</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
    // The article's section will apear only if there is an article available
    $sql = "SELECT article_id,title,description,thumbnail,date,article_type FROM articles where status='published' ORDER BY article_id DESC";
    $result = $conn->query($sql);
    $number = $result->num_rows;
    if ($number > 0) {
    ?>
        <section id="stories">
            <div class="container">
                <h2 class="main-title">ALL News and Events</h2>
                <div class="my-3 story-cont <?php if ($number === 1) echo 'story-row';
                                            else echo 'row' ?>">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="<?php if ($number === 1) echo 'single';
                                    elseif ($number === 2) echo 'col-md-6 mb-3';
                                    elseif ($number === 3) echo 'col-md-4 mb-3';
                                    else echo 'col-md-3 mb-3'; ?>">
                            <div class="story <?php if ($number == 1) echo  'd-flex' ?> h-100">
                                <div class="image">
                                    <img src="./images/thumbnails/<?= $row['thumbnail'] ?>" class="w-100" alt="">
                                </div>
                                <div class="story-desc py-2 py-md-4 px-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="type">
                                            <?php
                                            if ($row['article_type'] === "news") {
                                                echo '<i class="fas fa-book"></i> News';
                                            } else if ($row['article_type'] === "event") {
                                                echo '<i class="fas fa-calendar-plus"></i> Event';
                                            }
                                            ?>
                                        </div>
                                        <div class="title py-2">
                                            <a href="/article.php?article_id=<?= $row['article_id'] ?>"><?= $row['title'] ?></a>
                                        </div>
                                        <div class="description">
                                            <?= $row['description'] ?>
                                            <div class="date my-2"><i class="fas fa-calendar-alt"></i> <?= formatDate($row['date']) ?></div>
                                        </div>
                                    </div>
                                    <div class="link py-2">
                                        <a href="/article.php?article_id=<?= $row['article_id'] ?>" class="btn read-more">read more <i class="fas fa-arrow-alt-circle-right    "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php
    } //end of articles
    ?>
    <section id="news-letter">
    </section>

    <!-- Footer -->
    <?php
    include "includes/footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./res/js/main.js"></script>
</body>

</html>