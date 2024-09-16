<?php

session_start(); 
require_once 'connect.php'; // Assuming you have a separate 'connect.php' file to establish the database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form data
    $fullName = mysqli_real_escape_string($conn, $_POST['instructorName']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
    $username = mysqli_real_escape_string($conn, $_POST['instructor_username']);
    $password = password_hash($_POST['instructor_password'], PASSWORD_DEFAULT); // Hash the password

    // Check for existing contact number or username
    $checkSql = "SELECT * FROM instructorinfo WHERE contact_no = ? OR username = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ss", $contactNo, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If there are any matching rows, display an error message
        $error = "Contact number or username already exists.";
        header("Location: ../instructor_add.php?error=" . urlencode($error));
        exit();
    } else {
        // If no matching rows, proceed with the insertion
        $insertSql = "INSERT INTO instructorinfo (full_name, gender, contact_no, username, password) 
                       VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sssss", $fullName, $gender, $contactNo, $username, $password);

        if ($stmt->execute()) {
            $success = "New instructor added successfully!";
            header("Location: ../instructor_add.php?success=" . urlencode($success));
            exit();
        } else {
            $error = "Error: " . $stmt->error;
            header("Location: ../instructor_add.php?error=" . urlencode($error));
            exit();
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();

?>