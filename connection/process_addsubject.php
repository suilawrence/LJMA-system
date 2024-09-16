<?php

require_once 'connect.php'; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form data
    $subjectName = mysqli_real_escape_string($conn, $_POST['subjectName']);
    $subjectDescription = mysqli_real_escape_string($conn, $_POST['subjectDescription']);
    $startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
    $endTime = mysqli_real_escape_string($conn, $_POST['endTime']); 
    $gradeLevel = mysqli_real_escape_string($conn, $_POST['grade_level']);
    $subjectInstructor = mysqli_real_escape_string($conn, $_POST['adviser']); 

    // Handle the selected days
    $days = isset($_POST['days']) ? $_POST['days'] : array(); // Get the selected days or an empty array if none are selected
    $daysString = implode(",", $days); // Convert the array to a comma-separated string

    // Insert data into the subjectinfo table, including the days
    $insertSql = "INSERT INTO subjectinfo (subject_name, description, start_time, end_time, grade_level, subjectInstructor, days) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssssss", $subjectName, $subjectDescription, $startTime, $endTime, $gradeLevel, $subjectInstructor, $daysString);

    if ($stmt->execute()) {
        $success = "New subject added successfully!";
        header("Location: ../subject_add.php?success=" . urlencode($success)); 
        exit();
    } else {
        $error = "Error: " . $stmt->error;
        header("Location: ../subject_add.php?error=" . urlencode($error));
        exit();
    }

    $stmt->close();
}

// Close the database connection
$conn->close();

?>