<?php

require_once 'connect.php'; // Assuming you have a separate 'connect.php' file to establish the database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form data
    $programLevel = mysqli_real_escape_string($conn, $_POST['programLevel']);
    $adviser = mysqli_real_escape_string($conn, $_POST['adviser']);

    // Check if the program_level already exists
    $checkSql = "SELECT * FROM programlevel WHERE program_level = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $programLevel);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Program level already exists, display an error
        $error = "Program level already exists.";
        header("Location: ../grade_add.php?error=" . urlencode($error));
        exit();
    } else {
        // Program level doesn't exist, proceed with insertion
        $insertSql = "INSERT INTO programlevel (program_level, adviser) VALUES (?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("ss", $programLevel, $adviser);

        if ($stmt->execute()) {
            $success = "New program level added successfully!";
            header("Location: ../grade_add.php?success=" . urlencode($success)); // Assuming your form page is program_level_add.php
            exit();
        } else {
            $error = "Error: " . $stmt->error;
            header("Location: ../grade_add.php?error=" . urlencode($error));
            exit();
        }

        $stmt->close();
    }

    $checkStmt->close();
}

// Close the database connection
$conn->close();

?>