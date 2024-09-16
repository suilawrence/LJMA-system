<?php

// Assuming you have the database connection established in a separate file (e.g., connect.php)
require_once 'connection/connect.php'; 

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted data
    $id = $_POST["id"];
    $programLevel = $_POST["program_level"];
    $adviser = $_POST["adviser"];

    // Basic input validation (you can add more checks as needed)
    if (empty($id) || empty($programLevel) || empty($adviser)) {
        // Handle missing data
        echo "Error: Missing required fields.";
        exit; 
    }

    // Prepare the SQL update statement
    $sql = "UPDATE programlevel SET program_level = ?, adviser = ? WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssi", $programLevel, $adviser, $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Update successful, redirect back to the page with the table
            header("Location: ../program_level.php"); // Adjust the path as needed
            exit; 
        } else {
            // Handle the database error
            echo "Error updating record: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the error in preparing the statement
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle the case where the script is accessed directly, not via form submission
    echo "Invalid request.";
}
?>