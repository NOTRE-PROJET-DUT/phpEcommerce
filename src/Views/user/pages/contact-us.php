<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if (!isset($fullName) || !isset($email) || !isset($message)) {
        echo 'Invalid input. Please check your details and try again.';
        exit;
    }
    $contact = "fullName: $fullName, email: $email, message: $message";
    file_put_contents('contact-us.log', $contact . PHP_EOL, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

<?php  include_once  'component/head.php'; ?>
  
  <title>
    Soft UI Design System by Creative Tim
  </title>
  
</head>

<body class="contact-us">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg blur border-radius-sm top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid px-1">
      <a class="navbar-brand font-weight-bolder ms-lg-0 " href="/">
        shop
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ms-xl-auto">
          
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="/sign-in">
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" text-dark  me-1">
                <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" />
              </svg>
              Sign In
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="/sign-up">
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="opacity-6 me-1">
                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
              </svg>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="/about-us" >
              <span class="ps-3">About Us</span>
            </a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  <header>
    <div class="page-header min-vh-85">
      <div>
        <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0" src="assets/img/curved-images/curved8.jpg" alt="image">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 d-flex justify-content-center flex-column">
            <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="text-center">
                <h3 class="text-gradient text-primary">Contact us</h3>
                <p class="mb-0">
                  For further questions, including partnership opportunities, please email hello@creative-tim.com
                  or contact using our contact form.
                </p>
              </div>
              <form id="contact-form" method="POST" autocomplete="off">
                <div class="card-body pb-2">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Full Name</label>
                      <div class="input-group mb-4">
                        <input required class="form-control" name="fullName" placeholder="Full Name" aria-label="Full Name" type="text">
                      </div>
                    </div>
                    <div class="col-md-6 ps-md-2">
                      <label>Email</label>
                      <div class="input-group">
                        <input type="email" required name="email" class="form-control" placeholder="test@test.test">
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-0 mt-md-0 mt-4">
                    <label>How can we help you?</label>
                    <textarea name="message" required class="form-control" id="message" rows="6" placeholder="Describe your problem in at least 250 characters"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->

  <?php  include_once  'component/footer.php'; ?>

 
</body>

</html>

<!--
=========================================================
* Soft UI Design System - v1.0.9
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system 
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
