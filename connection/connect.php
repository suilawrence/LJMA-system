<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost"; // Usually 'localhost'
$username = "root";
$password = "";
$dbname = "javanna";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection   

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}