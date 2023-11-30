<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    // Compare passwords
    if ($pass == $cpass) {
        // Hash the password before saving it in the database
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // SQL query to insert data into the database
        $sql = "INSERT INTO connecter (email, pass) VALUES ('$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
          echo "<script> alert('Record created successfully')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Passwords do not match";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
<?php  include '../component/head.php'; ?>
  
  <title>
  Nabil-Bilal
  </title>
  
</head>

<body class="sign-in-illustration">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg blur border-radius-sm top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid px-1">
      <a class="navbar-brand font-weight-bolder ms-lg-0 " href="../pages/indexPage.php">
      Nabil-Bilal
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
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="../pages/sign-in.php">
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" text-dark  me-1">
                <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" />
              </svg>
              Sign In
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="../pages/about-us.php" >
              <span class="ps-3">About Us</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 text-dark font-weight-bold" href="../pages/contact-us.php" >
              <span class="ps-3">Contact Us</span>
            </a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
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
                <p class="mb-0">Enter your email and password to sign up</p>
              </div>
              <div class="card-body">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg"placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                     <input type="password" name="pass" class="form-control form-control-lg placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="cpass" class="form-control form-control-lg" placeholder="Confirmer Password" aria-label="Email" aria-describedby="email-addon">
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
                  <a href="../pages/sign-in.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
              <img src="../assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
              <div class="position-relative">
                <img class="max-width-500 w-100 position-relative z-index-2" src="../assets/img/illustrations/chat.png">
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
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script> -->
  <script src="../assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>
</body>

</html>