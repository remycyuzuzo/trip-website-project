<?php
// include "includes/session_check.php"; // for testing only

include "includes/db_config.php";
?>
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="/images/trip logo 2.jpg" alt="Trip Logo" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-top-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-top-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/what-we-do.php">Our Mission</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            About Us <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item nav-link" href="/who-we-are.php"> About Organization</a>
                            <a class="dropdown-item nav-link" href="/stracture.php"> Organization structure</a>
                            <a class="dropdown-item nav-link" href="media/depliant.pdf" target="_blank"> TRIP Depliant</a>
                            <a class="dropdown-item nav-link" href="/article.php?article_id=14">Certificate of Legal Personality</a>

                            <a class="dropdown-item nav-link" href="/members.php"> Organization Board Members</a>

                            <a class="dropdown-item nav-link" href="/our-impact"> Our Impact</a>
                        </div>
                    </li>
                    <!--intro video-->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Introduction Videos <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item nav-link" href="/video.php"> English Version</a>
                        </div>
                    </li>

                    <!--Intro video-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Our Projects <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <?php
                            $sql = "SELECT proj_id, proj_title from dvt_projects where status='done'";

                            $result = $conn->query($sql);
                            while ($get_proj = $result->fetch_assoc()) {
                            ?>
                                <a class="dropdown-item nav-link" href="/projects.php?project_title=<?= str_replace(' ', '-', strtolower($get_proj['proj_title'])) ?>"><?= $get_proj['proj_title'] ?></a>
                            <?php
                            }
                            ?>

                        </div>
                    </li>
                    <?php
                    $sql = "SELECT article_id from articles";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/stories">Stories</a>
                        </li> -->
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/news.php">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>