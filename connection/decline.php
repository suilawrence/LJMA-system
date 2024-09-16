<?php
// Assuming you have the database connection established in a separate file (e.g., connect.php)
require_once 'connect.php'; 

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the status to 'Declined' in the database
    $sql = "UPDATE studentinfo SET status='Declined' WHERE id=$id";
    
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the page displaying the student list (adjust the filename as needed)
        $success = "Student Enrollment Declined!!";
        header("Location: ../student_enrollment.php?success=" . urlencode($success));
        exit();

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Missing student ID.";
}

// Close the database connection
mysqli_close($conn);
?>