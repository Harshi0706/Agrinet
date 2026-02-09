<?php
$servername = "localhost";
$username = "root"; // Change as per your DB
$password = ""; // Change as per your DB
$dbname = "agrinet"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>