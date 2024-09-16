<?php
// Check for error or success messages in the query parameters
if (isset($_GET['error'])) {
  $error = $_GET['error'];
} elseif (isset($_GET['success'])) {
  $success = urldecode($_GET['success']); // Decode the success message
}

// Get the student ID from the URL parameter
if (isset($_GET['id'])) {
  $subjectid = $_GET['id'];
  // $subjectid1 = $_GET['student_id'];
  $subjectname = $_GET['subject'];
  $enrolled_id = $_GET['enrolled_id'];
  $program = $_GET['grade_level'];

  // Assuming you have the database connection established in a separate file (e.g., connect.php)
  require_once 'connection/connect.php';

  // Fetch student data from the database
  $sql = "SELECT *
        FROM studentsubjectenrolled 
        WHERE enrolled_id = $enrolled_id AND subject = '$subjectname'";
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful and there are results
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc(result: $result);
    $subject_name = $row['subject'];
    $studentId = $row['student_id'];
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $grade_level = $row['grade_level'];
    $first = $row['first'];
    $second = $row['second'];
    $third = $row['third'];
    $fourth = $row['fourth'];
  } else {
    // Handle the case where the student record is not found
    echo "Student record not found.";
    exit; // Or redirect to an error page
  }
  // Handle the form submission (if the user has submitted the form)
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_quarter = $_POST['first_quarter'];
    $second_quarter = $_POST['second_quarter'];
    $third_quarter = $_POST['third_quarter'];
    $fourth_quater = $_POST['fourth_quarter'];

    // Update the program level in the database
    $update_sql = "UPDATE studentsubjectenrolled SET 
    first = '$first_quarter' ,
    second = '$second_quarter' ,
    third = '$third_quarter' ,
    fourth = '$fourth_quater'
    WHERE enrolled_id = $enrolled_id AND subject= '$subject_name'";
    if (mysqli_query($conn, $update_sql)) {
      // Redirect back to the page displaying the program levels after a successful update
      header("Location: student_subjectgrade.php?student_id=" . $studentId . "&program=" . $grade_level . "&enrolled_id=" . $enrolled_id);
      exit;
    } else {
      echo "Error updating program level: " . mysqli_error($conn);
    }
  }
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

  <title>Basic Education- LJMA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img2/logoicon.png" rel="icon">

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
      <h1>New Subject</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Manage Program Level</li>
          <li class="breadcrumb-item active">Add Subject</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">




        <?php if (isset($error)) : ?>
          <div class="error-message">
            <p><?php echo $error; ?></p>
          </div>
        <?php endif; ?>

        <?php if (isset($success)) : ?>
          <div class="success-message">
            <p><?php echo $success; ?></p>
          </div>
        <?php endif; ?>


        <div class="col-lg-12">

          <div class="card" style=" 
     
          background-size: cover; 
    background-repeat: no-repeat;
    background-position: center; ">
            <div class="card-body">
              <h5 class="card-title">PROGRAM SUBJECT INFORMATION</h5>
              <style>
                .form-control1 {
                  /* display: block; */
                  width: 35%;
                  padding: .375rem .75rem;
                  font-size: 1rem;
                  font-weight: 400;
                  line-height: 1.5;
                  color: var(--bs-body-color);
                  -moz-appearance: none;
                  appearance: none;
                  background-color: var(--bs-body-bg);
                  background-clip: padding-box;
                  border: var(--bs-border-width) solid var(--bs-border-color);
                  border-radius: var(--bs-border-radius);
                  transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                }
              </style>

              <form class="row g-3 needs-validation" action="" method="post" novalidate>
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Student Name</label>
                  <input type="text" class="form-control" name="subjectName" value="<?php echo $last_name; ?>, <?php echo $first_name; ?>" id="validationCustom02" required disabled>
                  <div class="invalid-feedback">
                    Please input Program Level.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Subject Name</label>
                  <input type="text" class="form-control" name="subjectName" value="<?php echo $subject_name; ?>" id="validationCustom02" required disabled>
                  <div class="invalid-feedback">
                    Please input Program Level.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">First Quarter</label>
                  <input type="text" class="form-control" name="first_quarter" value="<?php echo $first; ?>" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input First Quarter Grade.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Second Quarter</label>
                  <input type="text" class="form-control" name="second_quarter" value="<?php echo $second; ?>" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input Second Quarter Grade.
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Third Quarter</label>
                  <input type="text" class="form-control" name="third_quarter" value="<?php echo $third; ?>" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input Third Quarter Grade.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Fourth Quarter</label>
                  <input type="text" class="form-control" name="fourth_quarter" value="<?php echo $fourth; ?>" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input Fourth Quarter Grade.
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Grade Level</label>


                  <select disabled class="form-select" name="grade_level" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php
                    // Assuming you have the database connection established in a separate file (e.g., connect.php)

                    $sql1 = "SELECT * FROM programlevel";
                    $result = mysqli_query($conn, $sql1);

                    // Check if the query was successful and there are results
                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {

                        $selected = ($row['program_level'] == $grade_level) ? 'selected' : '';
                        echo "<option value='" . $row['program_level'] . "'$selected>" . $row['program_level'] . "</option>";
                      }
                    } else {
                      // Handle the case where there are no instructors in the database
                      echo "<option value='' disabled>No Program found</option>";
                    }

                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Grade Level.
                  </div>
                </div>
                <!-- 
                <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Adviser in Charge</label>
                  <select class="form-select" name="adviser" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>

                    <php

                    $sql1 = "SELECT * FROM instructorinfo";
                    $result = mysqli_query($conn, $sql1);

                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {

                        $selected = ($row['full_name'] == $subjectInstructor) ? 'selected' : '';
                        echo "<option value='" . $row['full_name'] . "'$selected>" . $row['full_name'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>No Program found</option>";
                    }

                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Adviser.
                  </div>
                </div> -->

                <div class="col-12">
                  <button class="btn btn-warning" type="submit">Update Grade</button>
                </div>
              </form>
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


  <script>
    function toggleRequiredFields() {
      const withLRNRadio = document.getElementById('wLRN');
      const balikRadio = document.getElementById('balik');
      const withLRNInput = document.getElementById('withLRNinput');

      const LgradeLevel = document.getElementById('LgradeLevel');
      const LschoolYear = document.getElementById('LschoolYear');
      const schoolName = document.getElementById('schoolName');
      const schoolID = document.getElementById('schoolID');
      const schoolAddress = document.getElementById('schoolAddress');
      const contactPerson = document.getElementById('contactPerson');

      // Additional fields to be toggled
      const balikFields = [LgradeLevel, LschoolYear, schoolName, schoolID, schoolAddress, contactPerson];

      // Listen for changes on the radio buttons
      document.querySelectorAll('input[name="LRNtype"]').forEach(radio => {
        radio.addEventListener('change', function() {
          // Toggle required attribute for With LRN input
          if (withLRNRadio.checked) {
            withLRNInput.required = true;
          } else {
            withLRNInput.required = false;
          }

          if (balikRadio.checked) {
            withLRNInput.required = true;
          }


          // Toggle required attribute for Balik fields
          balikFields.forEach(field => {
            field.required = balikRadio.checked;
          });
        });
      });
    }

    // Call the function on page load
    toggleRequiredFields();
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>