<?php

require_once '../../../Models/orderItems.php';
$orderItems = new OrderItems();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $order_item_id = $_POST["order_item_id"];
  $status = $_POST["status"];

  if ($orderItems->updateOrderStatus($order_item_id, $status) == true) {
    header('Location: ./tables.php');
  } else {
    echo "no exist";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'component/head.php'; ?>
  <title>
    SHOP
  </title>
</head>

<body class="g-sidenav-show  bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navigation-->
    <?php include 'component/nav.php'; ?>
    <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
            <div class="full-background" style="background-image: url('assets/img/header-blue-purple.jpg')"></div>
            <div class="card-body text-start p-4 w-100">
              <h3 class="text-white mb-2">Collect your benefits 🔥</h3>
              <p class="mb-4 font-weight-semibold">
                Check all the advantages and choose the best.
              </p>
              <button type="button" class="btn btn-outline-white btn-blur btn-icon d-flex align-items-center mb-0">
                <span class="btn-inner--icon">
                  <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="d-block me-2">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM6.61036 4.52196C6.34186 4.34296 5.99664 4.32627 5.71212 4.47854C5.42761 4.63081 5.25 4.92731 5.25 5.25V8.75C5.25 9.0727 5.42761 9.36924 5.71212 9.52149C5.99664 9.67374 6.34186 9.65703 6.61036 9.47809L9.23536 7.72809C9.47879 7.56577 9.625 7.2926 9.625 7C9.625 6.70744 9.47879 6.43424 9.23536 6.27196L6.61036 4.52196Z" />
                  </svg>
                </span>
                <span class="btn-inner--text">Watch more</span>
              </button>
              <img src="assets/img/3d-cube.png" alt="3d-cube" class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
                  <p class="text-sm">See information about all members</p>
                </div>

              </div>
            </div>
            <div class="card-body px-0 py-0">


              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Member</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Product Name</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Price</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $itemsOrderDelivered = $orderItems->getOrderItemsDeliveredAdmin(1);
                    foreach ($itemsOrderDelivered as $orderItem) :
                    ?>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center ms-1">
                              <h6 class="mb-0 text-sm font-weight-semibold"><?php echo $orderItem["full_name"]; ?></h6>
                              <p class="text-sm text-secondary mb-0"><?php echo $orderItem["user_email"]; ?></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm text-dark font-weight-semibold mb-0"><?php echo $orderItem["product_name"]; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm border border-success text-success bg-success"><?php echo $orderItem["status"]; ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-sm font-weight-normal"><?php echo $orderItem["price"] . ' $'; ?></span>
                        </td>
                        <!-- <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td> -->
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 1</p>
                <div class="ms-auto">
                  <button class="btn btn-sm btn-white mb-0">Previous</button>
                  <button class="btn btn-sm btn-white mb-0">Next</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Recent transactions</h6>
                  <p class="text-sm mb-sm-0">These are details about the last transactions</p>
                </div>

              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Product</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Quantity</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Amount</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">ID Order</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $itemsOrder = $orderItems->getOrderItemsAdmin(1);
                    foreach ($itemsOrder as $orderItem) :
                    ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                              <img src="<?php echo $orderItem["image_url"]; ?>" class="w-80" alt="spotify">
                            </div>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm"><?php echo $orderItem["product_name"]; ?></h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm font-weight-normal mb-0"><?php echo $orderItem["quantity"]; ?></p>
                        </td>
                        <td>
                          <span class="text-sm font-weight-normal"><?php echo $orderItem["price"]; ?></span>
                        </td>

                        <td>
                          <?php $status = $orderItem["status"]; ?>
                          <?php if ($status === 'Canceled') : ?>
                            <span class="badge badge-sm border border-danger text-danger bg-danger">
                              <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                              Canceled
                            </span>
                          <?php elseif ($status === 'finished') : ?>
                            <span class="badge badge-sm border border-success text-success bg-success">
                              <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                                <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                              finished
                            </span>
                          <?php else : ?>
                            <span class="badge badge-sm border border-success text-success bg-success">
                              <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                              </svg>
                              <?php echo $status ?>
                            </span>
                          <?php endif; ?>
                        </td>

                        <td class="align-middle">
                          <div class="d-flex">
                            <!-- <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                            <img src="assets/img/logos/visa.png" class="w-90 mx-auto" alt="visa">
                          </div> -->
                            <div class="ms-2">
                              <p class="text-dark text-sm mb-0"><?php echo $orderItem["category"]; ?></p>
                              <p class="text-secondary text-sm mb-0"><?php echo 'ID : ' . $orderItem["product_id"]; ?></p>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle">
                          <button type="button" class="btn btn-white btn-icon px-2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                            </svg>
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update State</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                  <div class="modal-body">
                                  <div class="mb-3">
                                        <select name="status" id="status" class="form-control form-control-lg" placeholder="status" aria-label="status" required>
                                            <option value="" disabled>status</option>
                                            <option value="Canceled" selected>Canceled</option>
                                            <option value="pending">pending</option>
                                            <option value="shipped">shipped</option>
                                            <option value="delivered">delivered</option>
                                            <option value="finished">finished</option>

                                        </select>
                                        <input type="hidden" name="order_item_id" id="order_item_id" value="<?php echo $orderItem["order_item_id"]; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- Modal -->
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                <button class="btn btn-sm btn-white d-sm-block d-none mb-0">Previous</button>

                <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'component/footer.php'; ?>
    </div>
  </main>

  <script src="assets/js/core/bootstrap.bundle.min.js"></script>
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