<?php

session_start();


require_once 'connect.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form data (Important for security!)
    $yearFrom = mysqli_real_escape_string($conn, $_POST['yearfrom']);
    $yearTo = mysqli_real_escape_string($conn, $_POST['yearto']);
    // $studentType = isset($_POST['noLRN']) ? 'noLRN' : (isset($_POST['wLRN']) ? 'wLRN' : 'balik'); 
    $psaBirthCertNo = mysqli_real_escape_string($conn, $_POST['PSA']);
    $lrninput = mysqli_real_escape_string($conn, $_POST['lrninput']);
    $LRNtype = mysqli_real_escape_string($conn, $_POST['LRNtype']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
    $extensionName = mysqli_real_escape_string($conn, $_POST['exName']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthday']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $indigenousPeople = isset($_POST['indiPeople']) ? 'Yes' : 'No';
    $indigenousCommunity = mysqli_real_escape_string($conn, $_POST['indiSpecify']);
    $motherTongue = mysqli_real_escape_string($conn, $_POST['motherTonge']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $cellphoneNo = mysqli_real_escape_string($conn, $_POST['celphone']);
    $fatherLastName = mysqli_real_escape_string($conn, $_POST['fatherLast']);
    $fatherFirstName = mysqli_real_escape_string($conn, $_POST['fatherFirst']);
    $fatherMiddleName = mysqli_real_escape_string($conn, $_POST['fatherMiddle']);
    $motherLastName = mysqli_real_escape_string($conn, $_POST['motherLast']);
    $motherFirstName = mysqli_real_escape_string($conn, $_POST['motherFirst']);
    $motherMiddleName = mysqli_real_escape_string($conn, $_POST['motherMiddle']);
    $guardianLastName = mysqli_real_escape_string($conn, $_POST['guardianLast']);
    $guardianFirstName = mysqli_real_escape_string($conn, $_POST['guardianFirst']);
    $guardianMiddleName = mysqli_real_escape_string($conn, $_POST['guardianMiddle']);
    $lastGradeLevelCompleted = mysqli_real_escape_string($conn, $_POST['lastGradeLevel']);
    $lastSchoolYearCompleted = mysqli_real_escape_string($conn, $_POST['lastSchoolYear']);
    $previousSchoolName = mysqli_real_escape_string($conn, $_POST['schoolName']);
    $previousSchoolId = mysqli_real_escape_string($conn, $_POST['schoolID']);
    $previousSchoolAddress = mysqli_real_escape_string($conn, $_POST['schoolAddress']);
    $previousSchoolContactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
    $grade_level = mysqli_real_escape_string($conn, $_POST['grade_level']);

    // Handle file upload for parent_guardian_esignature (Adjust as needed based on your file storage)
    $parentGuardianESignature = ''; // Placeholder - Implement your file upload logic here

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    // Hash the password (Important for security!)
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare and execute the SQL INSERT query
    $sql = "INSERT INTO studentInfo (academic_year_from, academic_year_to, student_type, psa_birth_cert_no, lrn, last_name, first_name, middle_name, extension_name, birthdate, sex, age, indigenous_people, indigenous_community, mother_tongue, address, cellphone_no, father_last_name, father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, guardian_last_name, guardian_first_name, guardian_middle_name, last_grade_level_completed, last_school_year_completed, previous_school_name, previous_school_id, previous_school_address, previous_school_contact_person, parent_guardian_esignature, username, password, grade_level, status) 
            VALUES ('$yearFrom', '$yearTo', '$LRNtype', '$psaBirthCertNo', '$lrninput', '$lastName', '$firstName', '$middleName', '$extensionName', '$birthdate', '$sex', '$age', '$indigenousPeople', '$indigenousCommunity', '$motherTongue', '$address', '$cellphoneNo', '$fatherLastName', '$fatherFirstName', '$fatherMiddleName', '$motherLastName', '$motherFirstName', '$motherMiddleName', '$guardianLastName', '$guardianFirstName', '$guardianMiddleName', '$lastGradeLevelCompleted', '$lastSchoolYearCompleted', '$previousSchoolName', '$previousSchoolId', '$previousSchoolAddress', '$previousSchoolContactPerson', '$parentGuardianESignature', '$username', '$password', '$grade_level' , 'Pending')";
    
   
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['username'] = $username;



        $success = "New record created successfully.";
        header("Location: ../student_add.php?success=" . urlencode($success)); // Pass the success message in the URL
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// ... (Close the database connection)
