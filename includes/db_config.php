<?php


    // $host = "localhost";
    // $user = "tripteri_user";
    // $pass = "24177";

    // use the development
    $host = "localhost";
    $user = "root";
    $pass = "";



$db_name = "tripteri_data";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->error) {
    echo "Failed to access data database. <a href='mailto:patienceigiraneza2@gmail.com'>Send feedback</a>";
}
