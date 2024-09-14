<?php
session_start(); // Start the session

if (isset($_SESSION['email'])) {
    // User is logged in, display dashboard content
    echo "Welcome, " . $_SESSION['email'] . "!";
    // ... rest of your dashboard content
} else {
    // User is not logged in, redirect to login page
    header("Location: ../index.php");
    exit();
}
// Get the current page's filename (e.g., 'student_add.php')
$current_page = basename($_SERVER['PHP_SELF']);

?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="img2/logoicon.png" alt="">
            <span class="d-none d-lg-block">LJMA Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->




            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        <?php echo  $_SESSION['email'] ?>
                        <!-- show username from session -->
                    </span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6> <?php echo  $_SESSION['email'] ?></h6>
                        <span>ADMIN</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? '' : 'collapse'; ?>" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Manage Students</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse  <?php if ($current_page == 'student_add.php' || $current_page == 'student_view.php' || $current_page == 'student_grade.php' || $current_page == 'student_enroll.php' ) echo 'show'; ?> " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="student_add.php" <?php if ($current_page == 'student_add.php') echo 'class="active"'; ?>>
                        <i class="bi bi-circle"></i><span>Add Student</span>
                    </a>
                </li>
                <li>
                    <a href="student_view.php" <?php if ($current_page == 'student_view.php') echo 'class="active"'; ?>>
                        <i class="bi bi-circle"></i><span>View Students</span>
                    </a>
                </li>
                <li>
                    <a href="student_grade.php" <?php if ($current_page == 'student_grade.php') echo 'class="active"'; ?>>
                        <i class="bi bi-circle"></i><span>Students Grade</span>
                    </a>
                </li>
                <li>
                    <a href="student_enroll.php" <?php if ($current_page == 'student_enroll.php') echo 'class="active"'; ?>>
                        <i class="bi bi-circle"></i><span>Enrollment</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.php">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.php">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li>
                <li>
                    <a href="components-badges.php">
                        <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                </li>
                <li>
                    <a href="components-breadcrumbs.php">
                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                </li>
                <li>
                    <a href="components-buttons.php">
                        <i class="bi bi-circle"></i><span>Buttons</span>
                    </a>
                </li>
                <li>
                    <a href="components-cards.php">
                        <i class="bi bi-circle"></i><span>Cards</span>
                    </a>
                </li>
                <li>
                    <a href="components-carousel.php">
                        <i class="bi bi-circle"></i><span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="components-list-group.php">
                        <i class="bi bi-circle"></i><span>List group</span>
                    </a>
                </li>
                <li>
                    <a href="components-modal.php">
                        <i class="bi bi-circle"></i><span>Modal</span>
                    </a>
                </li>
                <li>
                    <a href="components-tabs.php">
                        <i class="bi bi-circle"></i><span>Tabs</span>
                    </a>
                </li>
                <li>
                    <a href="components-pagination.php">
                        <i class="bi bi-circle"></i><span>Pagination</span>
                    </a>
                </li>
                <li>
                    <a href="components-progress.php">
                        <i class="bi bi-circle"></i><span>Progress</span>
                    </a>
                </li>
                <li>
                    <a href="components-spinners.php">
                        <i class="bi bi-circle"></i><span>Spinners</span>
                    </a>
                </li>
                <li>
                    <a href="components-tooltips.php">
                        <i class="bi bi-circle"></i><span>Tooltips</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.php">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.php">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.php">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.php">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.php">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.php">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.php">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.php">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.php">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="icons-bootstrap.php">
                        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-remix.php">
                        <i class="bi bi-circle"></i><span>Remix Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-boxicons.php">
                        <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.php">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.php">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.php">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->\