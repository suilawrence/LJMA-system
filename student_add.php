<?php
// Check for error or success messages in the query parameters
if (isset($_GET['error'])) {
  $error = $_GET['error'];
} elseif (isset($_GET['success'])) {
  $success = urldecode($_GET['success']); // Decode the success message
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
      <h1>Add Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manage Student</li>
          <li class="breadcrumb-item active">Add Students</li>
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
              <h5 class="card-title">STUDENT INFORMATION</h5>
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

              <form class="row g-3 needs-validation" action="connection/process_studentregister.php" method="post" novalidate>


              <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Grade Level to Enroll</label>
                  <select class="form-select" name="grade_level" id="validationCustom04" required>
                    <option selected disabled value="">Choose grade to be enroll...</option>
                    <?php
                    // Assuming you have the database connection established in a separate file (e.g., connect.php)
                    require_once 'connection/connect.php';

                    
                    $sql = "SELECT program_level FROM programlevel";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful and there are results
                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['program_level'] . "'>" . $row['program_level'] . "</option>";
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



                <div class="col-md-6">
                  <p>Academic Year: <input type="number" name="yearfrom" class="form-control" size="4" required> to <input type="number" class="form-control" name="yearto" size="4" required>
                  </p>
                </div>
                <div class="col-md-6">
                  <div class="checkbox-group">
                    <label><input type="radio" name="LRNtype" value="noLRN" id="noLRN" checked> No LRN</label>
                    <label><input type="radio" name="LRNtype" value="wLRN" id="wLRN"> With LRN</label>
                    <label><input type="radio" name="LRNtype" value="returning" id="balik"> Returning (Balik-Aral)</label>
                  </div>
                </div>


                <div class="col-md-12">
                  <label for="validationCustom05" class="form-label">PSA Birth Certificate NO.</label>
                  <input type="text" class="form-control" name="PSA" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid PSA Birth Certificate NO..
                  </div>
                </div>

                <div class="col-md-12">
                  <label for="withLRNinput" class="form-label">Learner Reference No. (LRN)</label>
                  <input type="tel" maxlength="11" minlength="11" name="lrninput" class="form-control" id="withLRNinput">
                  <div class="invalid-feedback">
                    Please provide a valid Learner Reference No. (LRN).
                  </div>
                </div>



                <div class="col-md-3">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" class="form-control" name="lastName" id="validationCustom02" required>
                  <!-- <div class="valid-feedback">
                    Looks good!
                  </div> -->
                  <div class="invalid-feedback">
                    Please choose a Last name.
                  </div>

                </div>
                <div class="col-md-3">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" class="form-control" id="validationCustom01" name="firstName" required>
                  <div class="invalid-feedback">
                    Please choose a First name.
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="validationCustomUsername" class="form-label">Middle name</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="middleName" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustomUsername" class="form-label">Extenstion name</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="validationCustomUsername" name="exName" aria-describedby="inputGroupPrepend" placeholder="eg. Jr., III (If Applicable)">
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" id="validationCustom03" name="birthday" required>
                  <div class="invalid-feedback">
                    Please provide a valid Birthdate.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Sex</label>
                  <select class="form-select" name="sex" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Sex.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Age</label>
                  <input type="number" class="form-control" name="age" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid Age.
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom05" class="form-label">Belonging to any indigenous People (IP) Community/ Indigenous cultural communty?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="indiPeople" id="gridRadios1" value="Yes">
                    <label class="form-check-label" for="gridRadios1">
                      Yes
                    </label>

                    <input type="text" class="form-control" name="indiSpecify" placeholder=" If Yes, Please specify:">

                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="indiPeople" id="noIndigenous" value="No">
                    <label class="form-check-label" for="noIndigenous">
                      No
                    </label>
                  </div>


                </div>

                <div class="col-md-12">
                  <label for="validationCustom05" class="form-label">Mother Tonge</label>
                  <input type="text" class="form-control" name="motherTonge" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid Mother Tonge.
                  </div>
                </div>

                <span class="form-label"><b> ADDRESS</b></span>

                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Home Number and Street</label>
                  <input type="text" class="form-control" name="address" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid Address.
                  </div>
                </div>
                <span class="form-label"><b> PARENT'S/GUARDIAN INFORMATION</b></span>

                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Cellphone No</label>
                  <input type="tel" maxlength="11" minlength="11" name="celphone" class="form-control" id="validationCustom03" placeholder="eg. 0912345678" required>
                  <div class="invalid-feedback">
                    Please provide a valid Cellphone No.
                  </div>
                </div>



                <div class="row mb-12">
                  <div class="col-md-12">
                    <br>

                    <label for="validationCustom03" class="form-label">Father's Name</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="validationCustom03" name="fatherLast" placeholder="Your Name" required>
                      <label for="validationCustom03">Last Name</label>
                    </div>

                    <div class="invalid-feedback">
                      Please provide a valid Last name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="fatherFirst" placeholder="Your Name" required>
                      <label for="floatingName">First Name</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="fatherMiddle" placeholder="Your Name" required>
                      <label for="floatingName"> Complete Middle Name</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-12">
                  <div class="col-md-12">
                    <br>

                    <label for="validationCustom03" class="form-label">Mothers's Name</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="validationCustom03" name="motherLast" placeholder="Your Name" required>
                      <label for="validationCustom03">Last Name</label>
                    </div>

                    <div class="invalid-feedback">
                      Please provide a valid Last name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="motherFirst" placeholder="Your Name" required>
                      <label for="floatingName">First Name</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="motherMiddle" placeholder="Your Name" required>
                      <label for="floatingName"> Complete Middle Name</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-12">
                  <div class="col-md-12">
                    <br>

                    <label for="validationCustom03" class="form-label">Guardian's Name</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="validationCustom03" name="guardianLast" placeholder="Your Name" required>
                      <label for="validationCustom03">Last Name</label>
                    </div>

                    <div class="invalid-feedback">
                      Please provide a valid Last name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="guardianFirst" placeholder="Your Name" required>
                      <label for="floatingName">First Name</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" name="guardianMiddle" placeholder="Your Name" required>
                      <label for="floatingName"> Complete Middle Name</label>
                    </div>
                  </div>
                </div>



                <div class="card balikaral_container" style="border: 1px solid black; border-style:dashed; box-shadow: none;">
                  <div class="card-body">
                    <span class="form-label">
                      <center><b>For Returning Learners (Balik-Aral) and those Who shall Transfer/ Move In</b></center>
                    </span>

                    <div class="col-md-12" style="display: flex; justify-content: space-between;">
                      <div class="col-md-6">
                        <label for="LgradeLevel" class="form-label">Last Grade Level completed</label>
                        <input type="text" class="form-control" name="lastGradeLevel" id="LgradeLevel">
                        <div class="invalid-feedback">Please provide a valid Last Grade Level Completed.</div>
                      </div>
                      <div class="col-md-5">
                        <label for="LschoolYear" class="form-label">Last School Year Completed</label>
                        <input type="text" class="form-control" name="lastSchoolYear" id="LschoolYear">
                        <div class="invalid-feedback">Please provide a valid Last School Year Completed.</div>
                      </div>
                    </div>

                    <div class="col-md-12" style="display: flex; justify-content: space-between;">
                      <div class="col-md-6">
                        <label for="schoolName" class="form-label">School Name</label>
                        <input type="text" class="form-control" name="schoolName" id="schoolName">
                        <div class="invalid-feedback">Please provide a valid School Name.</div>
                      </div>
                      <div class="col-md-5">
                        <label for="schoolID" class="form-label">School ID No.</label>
                        <input type="text" class="form-control" name="schoolID" id="schoolID">
                        <div class="invalid-feedback">Please provide a valid School ID.</div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="schoolAddress" class="form-label">School Address</label>
                      <input type="text" class="form-control" name="schoolAddress" id="schoolAddress">
                      <div class="invalid-feedback">Please provide a valid School Address.</div>
                    </div>

                    <div class="col-md-12">
                      <label for="contactPerson" class="form-label">Contact Person Number from Previous School</label>
                      <input type="tel" maxlength="11" class="form-control" name="contactPerson" id="contactPerson">
                      <div class="invalid-feedback">Please provide a valid Contact Person.</div>
                    </div>
                  </div>
                </div>


                <span class="form-label">
                  <center><b> I hereby certify that the above information given are true and correct to the best of my
                      knowledge.
                    </b></center>
                </span>

                <div class="row mb-6">
                  <label for="inputNumber" class="col-sm-12 col-form-label">Parent/Guardian Signature Over Printed Name </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="parentESignature" id="formFile">
                  </div>
                </div>


                <div class="col-md-12">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username">
                  <div class="invalid-feedback">Please provide a valid Username.</div>
                </div>

                <div class="col-md-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                  <div class="invalid-feedback">Please provide a valid Password.</div>
                </div>



                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
              </form><!-- End Custom Styled Validation -->
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