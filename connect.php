<?php
$servername = "localhost";
$username = "Dhruvi";
$password = "dhruvi";
$dbname = "madbatter";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected to $dbname successfully!!";
?>