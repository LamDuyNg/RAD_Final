<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'rad_ft'; 

// Create a connection to MySQL database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>