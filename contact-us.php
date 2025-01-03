<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TRIP | Contact Us</title>
    <meta content="Contact the TRIP Rwanda Organization Team" name="description" />
    <meta content="TRIP,Terimbere,Rwanda,Rural,Development" name="keywords" />


    <link rel="shortcut icon" href="/images/trip favicon 256x256.png" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--    main styles-->
    <link rel="stylesheet" href="/styles.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGWP9EPSYQ"></script>
     <script src="https://www.google.com/recaptcha/api.js"></script>
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

    <main id="main" class="d-flex flex-column justify-content-center">

        <!-- Hero -->
        <section id="heading" class="hero d-flex flex-column justify-content-center">
            <div class="container">
                <h1 class="main-title">Contact Us</h2>
            </div>
            <div class="bg-overly"></div>
        </section><!-- ./hero -->
        <section class="fdb-block pt-0">
            <div class="container bg-r">
                <div class="row-100"></div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5">
                        <h2>Call or email</h2>
                        <p class="text-large">Get in touch with us by directly contacting our team via these addresses or this form</p>

                        <p class="h3 mt-4 mt-lg-5">
                            <strong>Support</strong>

                        </p>
                        <p>+250 786 660 467</p>
                        <p class="h3 mt-4 mt-lg-5">
                            <strong>General inquiries</strong>
                        </p>
                        <p>
                            <a href="mailto:contact@trip-terimbere.org" rel="nofollow">contact@trip-terimbere.org</a>
                        </p>
                    </div>

                    <div class="col-12 col-md-6 ml-auto">
                        <h2>Send us a message</h2>
                        <form method="post" action="/send-message">
                            <div class="row">
                                <div class="col">
                                    <label for="fname">First name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="fname" placeholder="First name">
                                </div>
                                <div class="col">
                                    <label for="fname">Last name </label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last name">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname">E-mail addess<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname">Telephone number <small>optional</small></label>
                                    <input type="text" class="form-control" name="tel" placeholder="Phone">
                                </div>
                                <div class="col">
                                    <label for="fname">Country <small>optional</small></label>
                                    <input type="text" class="form-control" name="country" placeholder="Country">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname">Subject<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="subject" placeholder="Type in your subject here">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname">Message</label>
                                    <textarea class="form-control" name="message" rows="5" placeholder="your message here"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-info">Send</button>
                                </div>
                            </div>
                            <?php
                                if (isset($_SESSION['sent'])) {
                                    ?>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <div class="alert alert-success">
                                                Your message has been sent!
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    unset($_SESSION['sent']);
                                } elseif (isset($_SESSION['failed'])) {
                                    ?>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <div class="alert alert-danger">
                                                sending message failed
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    unset($_SESSION['failed']);
                                }
                            ?>
                            
                        </form>
                    </div>
                </div>
            </div>


        </section>
<br><br> 


    
    </main><!-- End #main -->
    
                <div class="container">
                <h1 class="main-title">OUR LOCATION ON MAP</h2> <br><br> 
            </div>

<div style="margin-left: 2%; width:98%">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57423.175191811264!2d29.663316686162897!3d-1.5486420590694696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbad910908296ebd7!2zMcKwMzMnMDUuOCJTIDI5wrA0MScxMC41IkU!5e1!3m2!1sen!2srw!4v1661173156683!5m2!1sen!2srw" width="96%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe> 
   </div><br><br>

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


