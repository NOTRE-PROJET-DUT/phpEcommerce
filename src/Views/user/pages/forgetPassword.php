<?php

Model('user');
$user = new user();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $email = $_POST["email"];
    $checkpass = $_POST["checkpass"];
   
  

        if ($user->forgetPassword($email,$checkpass) === TRUE) {
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['emailExist'] = $email;
          header('Location: ./changepassword');
        } else {
          echo "no exist";
        }
   
}

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
<?php  include_once  'component/head.php'; ?>
  
  <title>
    shop
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
                <h4 class="font-weight-bolder">Get Your Password</h4>
                <p class="mb-0">Enter your email to get your passwoed</p>
              </div>
              <div class="card-body">
              <form method="post" action="/forgetPassword">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg"placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  <div class="mb-3">
                    <input type="text" name="checkpass" class="form-control form-control-lg"placeholder="Date of your Birth" aria-label="" required>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Send</button>
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
 
</body>

</html>