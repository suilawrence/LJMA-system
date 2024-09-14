<?php
require_once 'connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (important for security)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL query to insert data
$sql = "INSERT INTO admin_account (email, password) VALUES ('$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
