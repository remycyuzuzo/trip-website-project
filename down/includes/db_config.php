<?php
$host = "localhost";
$user = "tripteri_user";
$pass = "24177";
$db_name = "tripteri_data";

$conn = new mysqli($host, $user, $pass, $db_name);
if ($conn->error) {
    echo "Failed to access data database. <a href='mailto:remycyuzuzo@gmail.com'>Send feedback</a>";
}
