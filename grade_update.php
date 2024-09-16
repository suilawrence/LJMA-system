<?php
// Check for error or success messages in the query parameters

require_once 'connection/connect.php';

if (isset($_GET['error'])) {
  $error = $_GET['error'];
} elseif (isset($_GET['success'])) {
  $success = urldecode($_GET['success']); // Decode the success message
}



// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch the program level details from the database
  $sql = "SELECT * FROM programlevel WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $program_level = $row['program_level'];
    $adviser = $row['adviser']; // Get the adviser value from the programlevel table
  } else {
    // Handle the case where the program level with the given ID doesn't exist
    echo "Program level not found.";
    exit;
  }

  // Handle the form submission (if the user has submitted the form)
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_program_level = $_POST['program_level'];
    $new_adviser = $_POST['adviser'];

    // Update the program level in the database
    $update_sql = "UPDATE programlevel SET program_level = '$new_program_level', adviser = '$new_adviser' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
      // Redirect back to the page displaying the program levels after a successful update
      header("Location: grade_add.php"); // Replace with the actual page name
      exit;
    } else {
      echo "Error updating program level: " . mysqli_error($conn);
    }
  }
} else {
  // Handle the case where the 'id' parameter is missing
  echo "Invalid request.";
  exit;
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

<body>

  <?php
  include("include/sidebar.php");
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Program Level</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Manage Program Level</li>
          <li class="breadcrumb-item active">Update Program Level</li>
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
              <h5 class="card-title">UPDATE PROGRAM LEVEL INFORMATION</h5>

              <form id="updateForm"
                method="POST" action="">
                <input type="hidden" id="updateId" name="id">
                <div class="mb-3">
                  <label for="updateProgramLevel" class="form-label">Program Level</label>
                  <input type="text" class="form-control" id="updateProgramLevel" value="<?php echo $program_level; ?>" name="program_level">
                </div>
                <div class="mb-3">
                  <label for="updateAdviser" class="form-label">Adviser</label>


                  <select class="form-select" name="adviser" id="updateAdviser" required>
                    <option selected disabled value="">Choose...</option>
                    <?php
                    // Fetch advisers from the 'instructorinfo' table
                    $advisers_sql = "SELECT * FROM instructorinfo";
                    $advisers_result = mysqli_query($conn, $advisers_sql);

                    while ($adviser_row = mysqli_fetch_assoc($advisers_result)) {
                      // Check if the current adviser from the database matches the adviser in the 'adviser_row'
                      $selected = ($adviser_row['full_name'] == $adviser) ? 'selected' : '';
                      echo "<option value='" . $adviser_row['full_name'] . "' $selected>" . $adviser_row['full_name'] . "</option>";
                    }

                    // If no advisers match, display a message
                    if (mysqli_num_rows($advisers_result) == 0) {
                      echo "<option value='' disabled>No matching advisers found</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-12">
                  <button class="btn btn-warning" type="submit">Update Program</button>
                  <a href="grade_add.php" class="btn btn-secondary">Cancel</a>
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
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Assuming you have the database connection established in a separate file (e.g., connect.php)
              require_once 'connection/connect.php';

              // Fetch student data from the database
              $sql1 = "SELECT * 
FROM programlevel"; // Adjust column names as needed
              $result1 = mysqli_query($conn, $sql1);

              // Check if the query was successful and there are results
              if ($result1 && mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                  // Construct the student's full name

                  echo "<tr>";
                  echo "<td>" . $row1['id'] . "</td>";
                  echo "<td>" . $row1['program_level'] . "</td>";

                  echo "<td>" . $row1['adviser'] . "</td>";
                  echo "<td> <a href= program_studentlist.php?program=" . $row['program_level'] . "> View</a></td>";
                  echo "<td><a href='grade_update.php?id=" . $row1['id'] . "' class='btn btn-warning'>Update</a>
                  <a href='grade_update.php?id=" . $row1['id'] . "'class='btn btn-danger'>Archive</a></td>";

                  echo "</tr>";
                }
              } else {
                // Handle the case where there are no students in the database
                echo "<tr><td colspan='6'>No student records found</td></tr>";
              }

              // Close the database connection
              // mysqli_close($conn);
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




  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>