<?php
// Check for error or success messages in the query parameters

require_once 'connection/connect.php';

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
      <h1>New Program Level</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Manage Program Level</li>
          <li class="breadcrumb-item active">Add Program Level</li>
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
              <h5 class="card-title">PROGRAM LEVEL INFORMATION</h5>
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

              <form class="row g-3 needs-validation" action="connection/process_addprogramlevel.php" method="post" novalidate>
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Program Level</label>
                  <input type="text" class="form-control" name="programLevel" id="validationCustom02" required>
                  <div class="invalid-feedback">
                    Please input Program Level.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Adviser</label>
                  <select class="form-select" name="adviser" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php
                    // Assuming you have the database connection established in a separate file (e.g., connect.php)
                    require_once 'connection/connect.php';

                    // Fetch instructor full names from the database
                    $sql = "SELECT full_name FROM instructorinfo";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful and there are results
                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['full_name'] . "'>" . $row['full_name'] . "</option>";
                      }
                    } else {
                      // Handle the case where there are no instructors in the database
                      echo "<option value='' disabled>No instructors found</option>";
                    }

                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Adviser.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-success" type="submit">Submit form</button>
                </div>
              </form>



            </div>
          </div>


          <div class="modal fade" id="updateModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Program Info</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="updateForm"
                    method="POST" action="connection/update_gradeinfo.php">
                    <input type="hidden" id="updateId" name="id">
                    <div class="mb-3">
                      <label for="updateProgramLevel" class="form-label">Program Level</label>
                      <input type="text" class="form-control" id="updateProgramLevel" name="program_level">
                    </div>
                    <div class="mb-3">
                      <label for="updateAdviser" class="form-label">Adviser</label>
                      <select class="form-select" name="adviser" id="updateAdviser" required>
                        <option selected disabled value="">Choose...</option>
                        <?php
                        // Assuming you have the database connection established in a separate file (e.g., connect.php)
                        require_once 'connection/connect.php';

                        // Fetch instructor full names from the database
                        $sql = "SELECT full_name FROM instructorinfo";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query was successful and there are results
                        if ($result && mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            // We'll set the 'selected' attribute dynamically using JavaScript later
                            echo "<option value='" . $row['full_name'] . "'>" . $row['full_name'] . "</option>";
                          }
                        } else {
                          // Handle the case where there are no instructors in the database
                          echo "<option value='' disabled>No instructors found</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <table class="table datatable">
            <thead>
              <tr>
                <th>id</th>
                <th>Grade Level List</th>
                <th>Adviser</th>
                <th>Student List</th>
                <th>Subject List</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Assuming you have the database connection established in a separate file (e.g., connect.php)
              require_once 'connection/connect.php';

              // Fetch student data from the database
              $sql = "SELECT * 
FROM programlevel"; // Adjust column names as needed
              $result = mysqli_query($conn, $sql);

              // Check if the query was successful and there are results
              if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  // Construct the student's full name

                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['program_level'] . "</td>";

                  echo "<td>" . $row['adviser'] . "</td>";
                  echo "<td> <a href='program_studentlist.php?program=" . $row['program_level'] . "'> View</a></td>";
                  echo "<td> <a href='subject_list.php?program=" . $row['program_level'] . "'> View</a></td>";
                  echo "<td><a href='grade_update.php?id=" . $row['id'] . "' class='btn btn-warning'>Update</a>
                  <a href='grade_update.php?id=" . $row['id'] . "'class='btn btn-danger'>Archive</a></td>";

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


  <!-- <script>
    // JavaScript to handle modal population and form submission
    const updateButtons = document.querySelectorAll('.update-button');
    const updateModal = new bootstrap.Modal(document.getElementById('updateModal')); // Use Bootstrap's Modal class
    const updateForm = document.getElementById('updateForm');
    const updateIdInput = document.getElementById('updateId');
    const updateProgramLevelInput = document.getElementById('updateProgramLevel');
    const updateAdviserSelect = document.getElementById('updateAdviser');

    updateButtons.forEach(button => {
      button.addEventListener('click', () => {
        const id = button.dataset.id;
        const programLevel = button.dataset.programLevel;
        const adviser = button.dataset.adviser;

        updateIdInput.value = id;
        updateProgramLevelInput.value = programLevel;

        // Set the selected option in the adviser select
        for (const option of updateAdviserSelect.options) {
          if (option.value === adviser) {
            option.selected = true;
            break;
          }
        }

        updateModal.show();
      });
    });
  </script> -->


  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>