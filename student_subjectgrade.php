<?php
require_once 'connection/connect.php';

$program_level = $_GET['program'];

// Check if 'student_id' exists in the URL parameters
if (isset($_GET['student_id'])) {
    $student_id = urldecode($_GET['student_id']);

    // Use a prepared statement to prevent SQL injection
    $sql2 = "SELECT * FROM studentsubjectenrolled WHERE student_id = ?";
    $stmt = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt, "s", $student_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful and there are results
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $last_name = $row['last_name'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $start_year = $row['academic_year_from'];
        $end_year = $row['academic_year_to'];
        $subject = $row['subject'];
        $address = $row['address'];
    } else {
        // Handle the case where the student record is not found
        echo "Student record not found.";
        exit; // Or redirect to an error page
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the case where 'student_id' is not provided in the URL
    echo "Student ID not provided in the URL.";
    exit;
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

        <!-- <div class="pagetitle">
            <h1>Subject List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item">Manage Subject</li>
                    <li class="breadcrumb-item active">View Subject List</li>
                </ol>
            </nav>
        </div> -->

        <section class="section">
            <div class="row">
                <div class="pagetitle">
                    <h1>Student Information</h1>
                    <span><b><?php echo $last_name; ?>, <?php echo $first_name; ?> <?php echo $middle_name; ?></b></span><br>
                    <span><?php echo $address; ?></span><br>
                    <span><?php echo $program_level; ?></span><br>
                    <span>Academic Year: <?php echo $start_year; ?> - <?php echo $end_year; ?> </span><br>
                    <br>
                    <!-- <a href="student_subjectgrade.php" >View Grade</a> -->
                    <?php
                    echo "<td> <a href='student_enrollsubject.php?program=" . $row['grade_level'] . "&lastname=" . urlencode($row['last_name']) . "&firstname=" . urlencode($row['first_name']) . "&student_id=" . urlencode($row['student_id']) . "&middle=" . urlencode($row['middle_name']) .  "'> View Subjects</a></td>";

                    ?>

                    <br>
                    <br>

                    <h1>Grade</h1>

                </div>
                <br>





                <div class="col-lg-12">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>First</th>
                                        <th>Second</th>
                                        <th>Third</th>
                                        <th>Fourth</th>
                                        <th>Average</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    <?php
                                    require_once 'connection/connect.php';

                                    $program_level1 = $_GET['program'];
                                    $student_id = urldecode($_GET['student_id']);
                                    $enrolled_id = urldecode($_GET['enrolled_id']);


                                    // Fetch student data from the database using a prepared statement
                                    $sql = "SELECT * FROM studentsubjectenrolled WHERE grade_level = ? AND enrolled_id = ?";
                                    $stmt = mysqli_prepare($conn, $sql);
                                    mysqli_stmt_bind_param($stmt, "ss", $program_level, $enrolled_id);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            // Convert start_time and end_time to 12-hour format with AM/PM
                                            // Calculate the average
                                            $total = $row['first'] + $row['second'] + $row['third'] + $row['fourth'];
                                            $average = $total / 4;

                                            echo "<tr>";

                                            echo "<td>" . $row['subject'] . "</td>";
                                            echo "<td>" . $row['first'] . "</td>";
                                            echo "<td>" . $row['second'] . "</td>";
                                            echo "<td>" . $row['third'] . "</td>";
                                            echo "<td>" . $row['fourth'] . "</td>";
                                            echo "<td>" . $average . "</td>";
                                            echo "<td>" . $row['remarks'] . "</td>";
                                            echo "<td><a href='subject_gradeupdate.php?id=" . $row['student_id'] . "&subject=" . urlencode($row['subject']) . "&enrolled_id=" . urlencode(string: $row['enrolled_id']) .   "&grade_level=" . urlencode(string: $row['grade_level']) ."'>Update</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No Subject records found</td></tr>";
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