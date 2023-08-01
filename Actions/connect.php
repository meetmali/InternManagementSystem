<?php
// session_start();
// Database connection parameters
$host = "localhost";
$username = "root";
$password_db = "";
$database = "internship_management_system"; // Assuming this is the name of your database

// Connect to the database
$conn = new mysqli($host, $username, $password_db, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
