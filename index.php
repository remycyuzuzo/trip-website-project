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
    <section id="fore-word" class="bg-light">
        <div class="container">
            <div class="row bg-white">
                <div class="col-md-8 p-md-0 bg-white">
                    <div class="p-md-5 h-100 d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up">Together we can contribute to sustainable rural development</h3>
                        <p data-aos="fade-up" data-aos-offset="0">According to the results from the fifth Population and Housing Census (PHC) conducted in 2022 Rwanda’s population was 13,246,394 and 72.1% of them are still living in rural areas; many of them living in poor conditions. The Government of Rwanda in partnership with different development partners are implementing different initiatives to promote rural development </p>
                        <p data-aos="fade-up" data-aos-offset="0">
                            <strong>TRIP NGO</strong>, is committed to fight against poverty and ensure decent life. It ensures Human Security in rural areas and promotes inclusive community development mostly based on families and <b>Community self-resilience and cooperative development</b> , <b>Education and family well being</b>, <b>climate change action and environment protection</b> and <b>Market-oriented farming</b>.
                        </p>
                        <p data-aos="fade-up" data-aos-offset="0"><a href="/about/who-we-are" class="learn-more">learn more <i class="fas fa-arrow-alt-circle-right"></i></a></p>
                    </div>
                </div>
                <div class="col-md-4 p-md-3 py-md-5 bg-white">
                    <div class="img" data-aos="fade-up" data-aos-offset="0"><img loading="lazy" src="./images/trip-well-being-competition.jpg" alt="" class="w-100"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="objective" data-aos="fade-up">
        <div class="container">
            <h2 class="main-title">WHAT WE DO</h2>
            <h3 class="mb-5">Our main objective is to contribute to the improvement of socio-economic conditions of people in the intervention zone.</h3>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3" data-aos="zoom-in">
                    <div class="objective h-100 pb-3 d-flex flex-column bg-light">
                        <div class="icon-box">
                            <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                        </div>
                        <div class="desc d-flex flex-column justify-content-between px-3">
                            <h4 class="title">
                                To increase food security, improve maternal and child nutrition and enhanced household incomes
                            </h4>
                            <a href="/what-we-do/#food-security" class="learn-more">learn more <i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3" data-aos="zoom-in">
                    <div class="objective h-100 pb-3 d-flex flex-column bg-light">
                        <div class="icon-box">
                            <i class="fas fa-hands-helping" aria-hidden="true"></i>
                        </div>
                        <div class="desc d-flex flex-column justify-content-between px-3">
                            <h4 class="title">
                                To promote the local, national and regional market in order to generate monetary income at the household level of the target groups.
                            </h4>
                            <a href="/what-we-do" class="learn-more">learn more <i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3" data-aos="zoom-in">
                    <div class="objective h-100 pb-3 d-flex flex-column bg-light">
                        <div class="icon-box">
                            <i class="fas fa-handshake" aria-hidden="true"></i>
                        </div>
                        <div class="desc  d-flex flex-column justify-content-between px-3">
                            <h4 class="title">
                                To introduce new approaches in order to support the community initiatives in social and governance pillars especially in education sector
                            </h4>
                            <a href="/what-we-do" class="learn-more">learn more <i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-impact">
        <div class="container">
            <div class="d-flex border-top border-success shadow impact flex-lg-row flex-column align-items-center position-relative">

                <div class="image w-100 w-lg-50  position-relative">
                    <div class="bg-overly"> </div>
                    <img src="/images/revived banana plants.jpg" class="w-100" alt="BIZIMANA Venuste a TRIP Officer inspecting pigs" srcset="">
                </div>
                <div class="text px-4 py-3 w-100 w-lg-50">
                    <h2 class="main-title text-primary">Our Impacts</h2>
                    <h3>Check out our impact on the rural society and how we help people in our operation areas</h3>
                    <a href="/our-impact" title="Our impacts in rural societies" class="btn btn-success">Our Impacts</a>
                </div>
            </div>
        </div>
    </section>
    <section id="projects" data-aos="fade-up" class="bg-light">
        <div class="container">
            <h2 class="main-title">
                Our Projects
            </h2>
            <h3>TRIP supports Modern Agriculture</h3>
            <p class="text-justify">The current economy of Rwanda is based mostly on agriculture and its value chains. The agriculture sector has remained pivotal in improving the livelihoods of Rwandans and sustaining the country’s economy. The agricultural sector currently accounts for 25% of the national Gross Domestic Product (GDP).</p>
            <p class="text-justify">Rwanda’s agriculture sector has enjoyed an annual average growth of 5% over the last fifteen years, while the country’s GDP per capita per year increased from US$ 441 in 2007 to US$1,004 in 2022</p>
            <p class="text-justify">Because of its high rate of demography population (2.3% over the last ten years, lands became insufficient for extensive agriculture. Researches show that the mean arable land for households is about ¼ Ha. For this reason, farmers are encouraged to practice Modern and professional and climate resilient farming which gives living and market production. The Comprehensive Food Security and Vulnerability and Nutrition Analysis Survey (CFSVA 2021) revealed that 20.6% of our population faces food insecurity, and although there has been a decrease in stunting rates from 34.9 % in 2018 to 32.4 % in 2021, it remains a concern.</p>
            <div class="row align-items-center mb-3" data-aos="fade-up">
                <div class="col-md-6 mb-3">
                    <?php
                    $sql = "SELECT * FROM dvt_projects LIMIT 4";
                    $result = $conn->query($sql);
                    $project_data  = array();
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $project_data['project_name'][$i] = $row['proj_title'];
                        $project_data['project_thumb'][$i] = $row['proj_thumbnail'];
                        $i++;
                    }
                    ?>
                    <img loading="lazy" src="./images/thumbnails/<?= $project_data['project_thumb'][0] ?>" class="w-100" alt="Banana plantations are more popural in Rwandan country life">
                </div>
                <div class="col-md-6 mb-3">
                    <h4><?= $project_data['project_name'][0] ?></h4>
                    <p>
                        Banana has carried significant importance to Rwanda’s diet for a long time now. An average Rwandan consumes about 227 kilograms per year (RAB, 2017). Apart from the increasing demand at the household level, demand has also been coming from processing local factories.
                    <p>Bananas provide food as well as desert, beer, fertilizer, wine, beautification of the area and protection of the environment (...)</p>
                    <p><a href="./projects/<?= str_replace(' ', '-', strtolower($project_data['project_name'][0])) ?>" class="learn-more">read more</a></p>
                </div>
            </div>
            <div class="row align-items-center mb-3" data-aos="fade-up">
                <div class="col-md-6 mb-3">
                    <img loading="lazy" src="./images/thumbnails/<?= $project_data['project_thumb'][1] ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 mb-3">
                    <h4><?= $project_data['project_name'][1] ?></h4>
                    <p>
                        Pig production or hog farming is a farm of livestock keeping that does not necessarily require access to agricultural land and has therefore gained importance in the growing.
                    </p>
                    <p>Targeted people benefit financially from pig farming, it helps them to develop themselves (...)</p>
                    <p><a href="/projects/<?= str_replace(' ', '-', strtolower($project_data['project_name'][1])) ?>" class="learn-more">read more</a></p>

                </div>
            </div>
        </div>
    </section>
    <?php
    // The article's section will apear only if there is an article available
    $sql = "SELECT article_id,title,description,thumbnail,date,article_type FROM articles where status='published' ORDER BY article_id DESC LIMIT 3";
    $result = $conn->query($sql);
    $number = $result->num_rows;
    if ($number > 0) {
    ?>
        <section id="stories">
            <div class="container">
                <h2 class="main-title">News and Events</h2>
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