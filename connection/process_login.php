<?php
require_once 'connect.php';

// Get form data (ensure proper sanitization and validation in a real application)
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL query (using prepared statements to prevent SQL injection)
$stmt = $conn->prepare("SELECT * FROM admin_account WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Similar prepared statements for teacher and student queries
$stmt1 = $conn->prepare("SELECT * FROM instructorinfo WHERE username = ?");
$stmt1->bind_param("s", $email);
$stmt1->execute();
$result1 = $stmt1->get_result();

$stmt2 = $conn->prepare("SELECT * FROM studentinfo WHERE username = ?");
$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result(); // Fix: use $stmt2 here

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else if ($result1->num_rows == 1) { // Teacher login
    $row1 = $result1->fetch_assoc(); // Fetch from $result1
    $hashed_password = $row1['password'];

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['username'] = $email;
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else if ($result2->num_rows == 1) { // Student login
    $row2 = $result2->fetch_assoc(); // Fetch from $result2
    $hashed_password = $row2['password'];

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['username'] = $email;
        header("Location: ../dashboard.php");
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
