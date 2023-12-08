<?php

Model('user');
$user = new user();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $email = $_POST["email"];
    $npass = $_POST["npass"];
    $cpass = $_POST["cpass"];
    
    // Compare passwords
    if ($npass == $cpass) {
      

        if ($user->updateUserPassword($email, $npass)=== TRUE) {
          header('Location: /');
        } else {
          echo "no exist";
        }
    } else {
        echo "non valid password";
    }
    
}?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
<?php  include_once  'component/head.php'; ?>
  
  <title>
  Nabil-Bilal
  </title>
  
</head>

<body class="sign-in-illustration">

      </div>
    </div>
  </div>
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h4 class="font-weight-bolder">Sign Up</h4>
                <p class="mb-0">Enter New password </p>
              </div>
              <div class="card-body">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg"placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  <div class="mb-3">
                     <input type="password" name="npass" class="form-control form-control-lg "placeholder="New Password " aria-label="Password" aria-describedby="password-addon" required>
                  </div>
                  <div class="mb-3">
                    <input type="password" name="cpass" class="form-control form-control-lg" placeholder="Confirmer Password" required>
                  </div>
                  
                  <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                     <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="/sign-in" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
              <img src="assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
              <div class="position-relative">
                <img class="max-width-500 w-100 position-relative z-index-2" src="assets/img/illustrations/chat.png">
              </div>
              <h4 class="mt-5 text-white font-weight-bolder">"Attention is the new currency"</h4>
              <p class="text-white">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script> -->
  <script src="assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>
</body>

</html>