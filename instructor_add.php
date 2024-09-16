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
      <h1>New Instructor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manage Grade Level</li>
          <li class="breadcrumb-item active">Add Instructor</li>
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
              <h5 class="card-title">INSTRUCTOR INFORMATION</h5>
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

              <form class="row g-3 needs-validation" action="connection/process_addinstructor.php" method="post" novalidate>
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="instructorName" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input Instrtuctor Name.
                  </div>

                </div>

                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Gender</label>
                  <div class="checkbox-group">
                    <label><input type="radio" name="gender" value="Male" id="Male" checked required> Male</label>
                    <label><input type="radio" name="gender" value="Female" id="Female" required> Female</label>
                  </div>
                  <div class="invalid-feedback">
                    Please input Grade Level.
                  </div>

                </div>
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Contact Number</label>
                  <input type="tel" maxlength="11" class="form-control" name="contactNo" id="contactPerson" required>

                  <div class="invalid-feedback">
                    Please input Contact NO.
                  </div>
                </div>


                <!-- Temporaqry Account -->
                <h5 class="card-title">Temporary Account(need to update)</h5>

                <div class="col-md-12">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="instructor_username" id="username" required>
                  <div class="invalid-feedback">Please provide a valid Username.</div>
                </div>

                <div class="col-md-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="instructor_password" id="password" required>
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