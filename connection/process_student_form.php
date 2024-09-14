<?php
require_once 'connect.php';


// Get form data (assuming you're using POST method)
$lrn = $_POST['lrn'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$name_extension = $_POST['name_extension'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];
$age_end_of_school_year = $_POST['age_end_of_school_year'];
$class_adviser_name = $_POST['class_adviser_name'];
$school_head_name = $_POST['school_head_name'];

// Basic input validation (you'll likely want to add more robust validation)
if (empty($lrn) || empty($last_name) || empty($first_name) || empty($sex) || empty($date_of_birth) || empty($age_end_of_school_year) || empty($class_adviser_name) || empty($school_head_name)) {
    echo "Please fill in all required fields.";
    exit; // Stop further processing
}

// Prepare and execute SQL query to insert data
$sql = "INSERT INTO sf9_es (lrn, last_name, first_name, middle_name, name_extension, sex, date_of_birth, age_end_of_school_year, class_adviser_name, school_head_name) 
        VALUES ('$lrn', '$last_name', '$first_name', '$middle_name', '$name_extension', '$sex', '$date_of_birth', $age_end_of_school_year, '$class_adviser_name', '$school_head_name')";

if ($conn->query($sql) === TRUE) {
    echo "New student record created successfully!";
    // You might want to redirect to a success page or display a success message
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
