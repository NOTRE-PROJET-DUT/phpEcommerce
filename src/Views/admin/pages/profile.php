<?php

include '../../../Models/admin.php';
$admin = new Admin();

$adminData =  $admin->getAdmin("test");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $email = $_POST["email"];
  $password = $_POST["password"];

  if ($admin->updateAdmin($userName="admin1", $password,$email,$phone="0",$address="0") == TRUE) {
    header('Location: ./profile.php');
  } else {
    echo "no exist";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../component/head.php'; ?>
  <title>
    SHOP
  </title>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navigation-->
    <?php include '../component/nav.php'; ?>

    <div class="pt-7 pb-6 bg-cover" style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;"></div>
    <div class="container">
      <div class="card card-body py-2 bg-transparent shadow-none">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
              <img src="../assets/img/team-2.jpg" alt="profile_image" class="w-100">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h3 class="mb-0 font-weight-bold">
                <?php echo $adminData["username"]; ?>
              </h3>
              <p class="mb-0">
                <?php echo $adminData["email"]; ?>
              </p>
            </div>
          </div>
          <!-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
            <a href="javascript:;" class="btn btn-sm btn-white">Cancel</a>
            <a href="javascript:;" class="btn btn-sm btn-dark">Save</a>
          </div> -->
        </div>
      </div>
    </div>
    <div class="container my-3 py-3">
      <div class="row">
        <div class="col-12 col-xl-4 mb-4">
          <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 col-9">
                  <h6 class="mb-0 font-weight-semibold text-lg">Profile information</h6>
                  <p class="text-sm mb-1">Edit the information about you.</p>
                </div>
                <div class="col-md-4 col-3 text-end">
                  <button type="button" class="btn btn-white btn-icon px-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                              <label for="email" class="col-form-label">New Email:</label>
                              <input type="email" name="email" class="form-control" id="email" required>
                              <label for="password" class="col-form-label">New Password:</label>
                              <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->

                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <p class="text-sm mb-4">
                Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
              </p>
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm"><span class="text-secondary">First Name:</span> &nbsp; Noah</li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Last Name:</span> &nbsp; Mclaren</li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Mobile:</span> &nbsp; +(44) 123 1234 123</li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Function:</span> &nbsp; Manager - Organization</li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Location:</span> &nbsp; USA</li>
                <!-- <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                  <span class="text-secondary">Social:</span> &nbsp;
                  <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                    <i class="fab fa-linkedin fa-lg"></i>
                  </a>
                  <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                    <i class="fab fa-github fa-lg"></i>
                  </a>
                  <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                    <i class="fab fa-slack fa-lg"></i>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
          <div class="card h-100 card-plain border border-dashed px-5">
            <div class="card-body d-flex flex-column justify-content-center text-center">
              <a href="./createProduct.php">
                <div class="icon icon-shape bg-dark text-center text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" height="19" width="19" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                  </svg>
                </div>
                <h5 class="text-dark text-lg"> Create new Poduct </h5>
                <p class="text-sm text-secondary mb-0">Drive into the editor and add your product.</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card shadow-xs border mb-4 pb-3">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0 font-weight-semibold text-lg">Last Product</h6>
              <p class="text-sm mb-1">Here you will find the latest Product .</p>
            </div>
            <div class="card-body p-3">
            <div class="row">
                <?php
                include '../../../Models/product.php';
                $listProduct = new Product();
                $products = $listProduct->getProducts();
                foreach ($products as $product) : ?>
                  <div class="col-12 col-xl-4 mb-4">
                    <a href="##">
                      <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?php echo $product['image_url']; ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                          <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $product['product_name']; ?></h5>
                            <?php echo $product['price'] . " $"; ?>
                          </div>
                        </div>

                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include '../component/footer.php'; ?>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <!-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> -->
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
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