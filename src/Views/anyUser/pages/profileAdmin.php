<?php

include '../../../Models/admin.php';
$admin = new Admin();

$adminData =  $admin->getAdmin("admin1");

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

    <div class="pt-7 pb-6 bg-cover" style="background-image: url('../assets/img/header-blue-purple.jpg'); background-position: bottom;"></div>
    <div class="container">
      <div class="card card-body py-2 bg-transparent shadow-none">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
              <img src="<?php echo $adminData["image_url"]; ?>" alt="..." class="w-100">
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
                  </div>

                </div>
              </div>
              <div class="card-body p-3">
                <p class="text-sm mb-4">
                  <?php echo $adminData["description"]; ?>
                </p>
                <ul class="list-group">
                  <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm"><span class="text-secondary">First Name:</span> &nbsp; <?php echo $adminData["first_name"]; ?></li>
                  <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Last Name:</span> &nbsp; <?php echo $adminData["last_name"]; ?></li>
                  <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Mobile:</span> &nbsp; <?php echo $adminData["phone_number"]; ?></li>
                  <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">country:</span> &nbsp; <?php echo $adminData["country"]; ?></li>
                  <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Location:</span> &nbsp; <?php echo $adminData["city"] . " " . $adminData["address"]; ?></li>
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
                  $products = $listProduct->getAdminProducts($adminData["admin_id"]);
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