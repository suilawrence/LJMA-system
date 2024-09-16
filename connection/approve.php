<?php
// Assuming you have the database connection established in a separate file (e.g., connect.php)
require_once 'connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the status to 'Approved' in the database
    $sql = "UPDATE studentinfo SET status='Approved' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page displaying the student list (adjust the filename as needed)


        $sql1 = "SELECT * FROM studentinfo WHERE id = $id";
        $result1 = mysqli_query($conn, $sql1);

        // Check if the query was successful and there are results
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $studentrow = mysqli_fetch_assoc($result1);

            $student_id = $studentrow['id'];
            $last_name = $studentrow['last_name'];
            $first_name = $studentrow['first_name'];
            $middle_name = $studentrow['middle_name'];
            $start_year = $studentrow['academic_year_from'];
            $end_year = $studentrow['academic_year_to'];
            $address = $studentrow['address'];
            $cellphone_no = $studentrow['cellphone_no'];
            $grade_level = $studentrow['grade_level'];

            // Fetch all subjects for the student's grade level (using a prepared statement)
            $sql2 = "SELECT * FROM subjectinfo WHERE grade_level = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "s", $grade_level); // 's' indicates a string parameter
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);

            // Generate a random 6-digit enrolled_id
            $enrolled_id = mt_rand(100000, 999999);

            // Loop through each subject and insert into studentsubjectenrolled
            while ($subjectrow = mysqli_fetch_assoc($result2)) {
                $subject_name = $subjectrow['subject_name']; // Get the subject 
                $subject_instructor = $subjectrow['subjectInstructor']; // Get the subject 

                // Prepare and execute the SQL INSERT query (use prepared statements for security)
                $insert_sql = "INSERT INTO studentsubjectenrolled (enrolled_id, student_id, academic_year_from, academic_year_to, last_name, first_name, middle_name, address, cellphone_no, grade_level, subject, subject_instructor, status) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Enrolled')";
                $stmt = mysqli_prepare($conn, $insert_sql);
                mysqli_stmt_bind_param($stmt, "ssssssssssss", $enrolled_id, $student_id, $start_year, $end_year, $last_name, $first_name, $middle_name, $address, $cellphone_no, $grade_level, $subject_name, $subject_instructor);
                mysqli_stmt_execute($stmt);
            }
        }

        // You don't need this `mysqli_query($conn, $sql2)` anymore as we are using prepared statements above
        // if (mysqli_query($conn, $sql2)) { 

        $success = "Student Enrollment Approved!!";
        header("Location: ../student_enrollment.php?success=" . urlencode($success));
        exit();
        // }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Missing student ID.";
}

// Close the database connection
mysqli_close($conn);
