<?php

Model('admin');
$admin = new Admin();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $userName = $_POST["userName"];
  $password = $_POST["password"];

  if ($admin->login($userName, $password) == TRUE) {
    // Start the session
    session_start();
    $_SESSION["userNameAdmin"] = $userName;
    $_SESSION["Admin_id"] = $admin->getAdmin($userName)['admin_id'];
    
    header('Location: ./dashboard');
  } else {
    echo "no exist";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once  'component/head.php'; ?>


  <title>
    SHOP
  </title>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Welcome back</h3>
                  <p class="mb-0">Welcome back! Please enter your details.</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="/">
                    <label>userName</label>
                    <div class="mb-3">
                      <input type="text" name="userName" class="form-control" placeholder="Enter your userName" aria-label="userName" aria-describedby="name-addon" required>
                    </div>
                    <label>Email Address</label>
                    <div class="mb-3">
                      <input type="email" name="Email" class="form-control" placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon" required>
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="form-check form-check-info text-left mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                          Remember for 14 days
                        </label>
                      </div>
                      <a href="/forgetPassword" class="text-xs font-weight-bold ms-auto">Forgot password</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-xs mx-auto">
                    Don't have an account?
                    <a href="/sign-up" class="text-dark font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('assets/img/image-sign-in.jpg')">
                  <div class="blur p-2 text-center border border-white border-radius-md position-absolute fixed-bottom m-2">
                    <h6 class="text-dark text-sm mt-5">Copyright © 2022 shop Design System by Creative Tim.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>

<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->