<?php
session_start();
// set session to lock the site
$_SESSION['deactivate'] = "maintenance";
if ($_SESSION['deactivate'] === "maintenance") {
    echo "Website is under maintenace mode";
} else if ($_SESSION['deactivate'] === "active") {
    echo "The website in working mode";
}
