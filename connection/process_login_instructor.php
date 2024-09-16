<?php
require_once 'connect.php';

// Get form data (ensure proper sanitization and validation in a real application)
$username = $_POST['username'];
$password = $_POST['password'];


// Similar prepared statements for teacher and student queries
$stmt1 = $conn->prepare("SELECT * FROM instructorinfo WHERE username = ?");
$stmt1->bind_param("s", $username);
$stmt1->execute();
$result1 = $stmt1->get_result();

if ($result1->num_rows == 1) {
    $row = $result1->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../dashboard1.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid username or password.";
}


// Close statements and connection
$stmt->close();
$stmt1->close();
$stmt2->close();
$conn->close();
