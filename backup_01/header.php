<?php
include "includes/db_config.php";
?>
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/trip logo 2.jpg" alt="Trip Logo" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-top-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-top-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/what-we-do">What we do</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about/who-we-are">
                            About Us
                            <!-- <i class="fas fa-chevron-down"></i> -->
                        </a>
                        <!-- <div class="dropdown-menu">
                            <a class="dropdown-item nav-link" href="/about/who-we-are">Who we are</a>
                            <a class="dropdown-item nav-link" href="/about/our-team">Our Leadership</a>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Our Projects <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <?php
                            $sql = "SELECT proj_id, proj_title from dvt_projects";
                            $result = $conn->query($sql);
                            while ($get_proj = $result->fetch_assoc()) {
                            ?>
                                <a class="dropdown-item nav-link" href="/projects/<?= str_replace(' ', '-', strtolower($get_proj['proj_title'])) ?>"><?= $get_proj['proj_title'] ?></a>
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
                        <a class="nav-link" href="/contact-us">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>