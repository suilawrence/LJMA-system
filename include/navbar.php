<?php
session_start(); // Make sure the session is started
?>

<!-- Topbar Start -->
<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Monday, January 1, 2045</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-body small" href="#">Login</a> -->

                        <?php if (isset($_SESSION['email'])): ?>
                            <a href="dashboard.php">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                             Dashboard
                            </button></a> 
                        <?php else: ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                Login
                            </button>
                        <?php endif; ?>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title">Basic Modal</h5> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">



                                        <div class="card-body">

                                            <div class="pt-4 pb-2">
                                                <!-- <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5> -->
                                                <h4 class="text-center m-0 text-uppercase font-weight-bold">Admin Login</h4>
                                                <p class="text-center small">Enter your username & password to login</p>
                                            </div>

                                            <form class="row g-3 needs-validation" method="post" action="connection/process_login.php" novalidate>
                                                <div class="col-12">
                                                    <label for="yourUsername" class="form-label">Email</label>
                                                    <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                                                        <div class="invalid-feedback">Please enter your Email.</div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                        <label class="form-check-label" for="rememberMe">Show Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                                </div>
                                                <!-- <div class="col-12">
                                                        <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                                    </div> -->
                                            </form>

                                        </div>


                                        <div class="credits">
                                            <!-- All the links in the footer should remain intact. -->
                                            <!-- You can delete the links only if you purchased the pro version. -->
                                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                            LITTLE JAVANNA <a href="https://bootstrapmade.com/">MONTESSORI ACADEMY</a>
                                        </div>


                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div><!-- End Basic Modal-->

                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <!-- <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav> -->
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-6 text-uppercase text-primary">Little Javanna<span class="text-secondary font-weight-normal"> Montessori Academy</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <!-- <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a> -->
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Little Javanna<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="category.php" class="nav-item nav-link">Program</a>
                <a href="single.php" class="nav-item nav-link">Enroll</a>
                <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div> -->
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <!-- <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div> -->
        </div>
    </nav>
</div>
<!-- Navbar End -->