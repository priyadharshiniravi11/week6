<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "RohitMysql12@"; // Replace with your MySQL password
$dbname = "portfolio"; // Replace with your database name

// Create a new MySQLi connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
