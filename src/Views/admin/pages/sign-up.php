<?php

Model('admin');
$admin = new Admin();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $userName = $_POST["userName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $secretCode = $_POST["secretCode"];
  // Compare passwords
  if ($password === $confirmPassword) {


    if ($admin->createAccountAdmin($userName, $email, $password, $confirmPassword) == TRUE) {
      header('Location: ./');
    } else {
      echo "user name or password not correct or this account exists";
    }
  } else {
    echo "non valid input data";
  }
} ?>

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
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8" style="background-image:url('assets/img/image-sign-up.jpg')">
                  <div class="my-auto text-start max-width-350 ms-7">
                    <h1 class="mt-3 text-white font-weight-bolder">Start your <br> new shop.</h1>
                    <p class="text-white text-lg mt-4 mb-4">create new account in your project for free.</p>
                    <div class="d-flex align-items-center">
                      <div class="avatar-group d-flex">
                        <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Jessica Rowland">
                          <img alt="Image placeholder" src="assets/img/team-3.jpg" class="">
                        </a>
                        <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                          <img alt="Image placeholder" src="assets/img/team-4.jpg" class="rounded-circle">
                        </a>
                        <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Michael Lewis">
                          <img alt="Image placeholder" src="assets/img/marie.jpg" class="rounded-circle">
                        </a>
                        <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                          <img alt="Image placeholder" src="assets/img/team-1.jpg" class="rounded-circle">
                        </a>
                      </div>
                      <p class="font-weight-bold text-white text-sm mb-0 ms-2">Join 2+ users</p>
                    </div>
                  </div>
                  <div class="text-start position-absolute fixed-bottom ms-7">
                    <h6 class="text-white text-sm mb-5">Copyright © 2022 shop Design System by Creative Tim.</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Sign up</h3>
                  <p class="mb-0">Nice to meet you! Please enter your details.</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="/sign-up">
                    <label>Email Address</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon" required>
                    </div>
                    <label>UserName</label>
                    <div class="mb-3">
                      <input type="text" name="userName" class="form-control" placeholder="Enter your userName" aria-label="userName" aria-describedby="name-addon" required>
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="text" name="password" class="form-control" placeholder="Create a password" aria-label="Password" aria-describedby="password-addon" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" name="confirmPassword" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" required>
                    </div>
                    <label>Secret Code</label>
                    <div class="mb-3">
                      <input type="text" name="secretCode" class="form-control form-control-lg" placeholder="Date of your Birth 'dd-mm-yyyy' " aria-label="" required>
                    </div>
                    <div class="form-check form-check-info text-left mb-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                      <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bold">Terms and Conditions</a>.
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign up</button>
                      
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-xs mx-auto">
                    Already have an account?
                    <a href="/" class="text-dark font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


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