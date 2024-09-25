<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "adabof";

$servername = "adabofsteel.com";
$username = "u500921674_steel";
$password = "OnGod@123";
$dbname = "u500921674_steel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
