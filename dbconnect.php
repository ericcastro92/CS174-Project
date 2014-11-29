<?php

//Create a database named cs174 and load guestbook.mysql into it before using this example
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cs174";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
