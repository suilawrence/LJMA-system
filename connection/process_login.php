<?php
require_once 'connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL query to retrieve admin data
$sql = "SELECT * FROM admin_account WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Successful login
        session_start(); // Start a session
        $_SESSION['email'] = $email; // Store the username in the session

        // Redirect to dashboard.php
        header("Location: ../dashboard.php"); // Use '../' to go up one level
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid username.";
}

$conn->close();
