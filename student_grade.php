
<?php

require_once 'connection/connect.php';

// Fetch student data from the database
$sql = "SELECT * FROM studentinfo"; // Adjust column names as needed
$result = mysqli_query($conn, $sql);

// Get the student ID from the URL parameter
if (isset($_GET['id'])) {
  $studentid = $_GET['id'];

  // Assuming you have the database connection established in a separate file (e.g., connect.php)
  require_once 'connection/connect.php';

  // Fetch student data from the database
  $sql = "SELECT *
          FROM studentinfo 
          WHERE id = $studentid";
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful and there are results
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc(result: $result);
    $subject_name = $row['subject_name'];
  } else {
    // Handle the case where the student record is not found
    echo "Student record not found.";
    exit; // Or redirect to an error page
  }
   // Handle the form submission (if the user has submitted the form)
  //  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   $new_subjectName = $_POST['subjectName'];
  //   $new_subjectDescription = $_POST['subjectDescription'];
  //   $new_startTime = $_POST['startTime'];
  //   $new_endTime = $_POST['endTime'];
  //   $new_grade_level = $_POST['grade_level'];
  //   $new_adviser = $_POST['adviser'];

  //   // Update the program level in the database
  //   $update_sql = "UPDATE subjectinfo SET subject_name = '$new_subjectName', description = '$new_subjectDescription', 
  //   start_time = '$new_startTime' ,
  //   end_time = '$new_endTime' ,
  //   grade_level = '$new_grade_level' ,
  //   subjectInstructor = '$new_adviser'
  //   WHERE id = $subjectid";
  //   if (mysqli_query($conn, $update_sql)) {
  //     // Redirect back to the page displaying the program levels after a successful update
  //     header("Location: subject_add.php"); // Replace with the actual page name
  //     exit;
  //   } else {
  //     echo "Error updating program level: " . mysqli_error($conn);
  //   }
  // }
} else {
  // Handle the case where the 'id' parameter is missing
  echo "Student ID not provided.";
  exit; // Or redirect to an error page
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php
  include("include/sidebar.php");
  ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Manage Student</li>
          <li class="breadcrumb-item active">View Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>First Grading</th>
                    <th>Second Grading</th>
                    <th>Third Grading</th>
                    <th>Fourth Grading</th>
                    <th>Average</th>
                    <th>Remarks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Assuming you have the database connection established in a separate file (e.g., connect.php)
                
                  // Check if the query was successful and there are results
                  if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      // Construct the student's full name
                      $fullName = $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name'];

                      echo "<tr>";
                      echo "<td>" . $fullName . "</td>";
                      echo "<td>" . $row['sex'] . "</td>";
                      echo "<td>" . $row['age'] . "</td>";
                      echo "<td>" . $row['address'] . "</td>";
                      echo "<td>" . $row['cellphone_no'] . "</td>";
                      echo "<td>" . $row['grade_level'] . "</td>";
                      echo "<td>" . $row['status'] . "</td>";
                      echo "<td><a href='student_info.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a>
                        <a href='student_grade.php?id=" . $row['id'] . "' class='btn btn-success'>Grade</a>
                      </td>";
                      echo "</tr>";
                    }
                  } else {
                    // Handle the case where there are no students in the database
                    echo "<tr><td colspan='6'>No student records found</td></tr>";
                  }

                  // Close the database connection
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>