<?php

$server = "localhost";
$user = "root";
$password = "";
$name_database = "easpweb";

$db = mysqli_connect($server, $user, $password, $name_database);

if (!$db) {
    die("Failed creating a connection to the database: " . mysqli_connect_error());
}

?>