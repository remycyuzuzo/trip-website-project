<?php
session_start(); ?>
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
  <style>
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;

    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    .pdf-embed {
      width: 80%;
      height: 700px;
    }

    @media only screen and (max-width: 1200px) {
      .pdf-embed {
        width: 100%;
        height: 500px;
        display: none;
      }
    }
  </style>
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

            <h3 data-aos="fade-up">ORGANISATION BOARD MEMBERS LIST <br> </h3><br><br>


            <table style="width: 80%; margin:auto; ">
              <tr>
                <th>No:</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>

              </tr>


              <?php




              $sql = "SELECT * FROM boards order by id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {

                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td> " . $counter . " </td><td> " . $row["lname"] . "</td><td> " . $row["fname"] . "</td><td>" . $row["position"] . "</td></tr>";
                  $counter++;
                }
              } else {
                echo "0 results";
              }


              ?>

            </table>


          </div>
        </div>
        <div class="col-md-4 p-md-3 py-md-5 bg-white">
          <div class="img" data-aos="fade-up" data-aos-offset="0"><img loading="lazy" src="./images/meeting1.png" alt="" class="w-100"></div><br>

          <p> Directors and Representatives Meeting. </p><br><br>


          <div class="img" data-aos="fade-up" data-aos-offset="0"><img loading="lazy" src="./images/meeting2.png" alt="" class="w-100"></div><br>
          <p> Directors and Representatives Meeting. </p><br><br>


        </div>
      </div>
    </div>
  </section>




 
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