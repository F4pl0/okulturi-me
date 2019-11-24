<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okulturi_me";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}