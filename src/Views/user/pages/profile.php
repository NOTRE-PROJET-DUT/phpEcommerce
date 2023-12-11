<?php

Model('user');
$user = new User();

$userData =  $user->getUser(1);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $email = $_POST["email"];
  $password = $_POST["password"];
  session_start();
  if ($user->updateUser($_SESSION['user_id'], $email, $password) == TRUE) {
    header('Location: ./profile');
  } else {
    echo "no exist";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- <link href="./../../../bootstrap/dist/css/bootstrap.css" rel="stylesheet" /> -->
  <?php include_once 'component/head.php'; ?>

  <title>
    shop
  </title>

  <!-- Core theme CSS (includes Bootstrap)-->
</head>

<body>
  <!-- Navigation-->
  <?php include_once 'component/nav.php'; ?>
  <!-- Header-->





  <!-- Section-->
  <div class="pt-7 pb-6 bg-cover" style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;"></div>
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
                      <form role="form" method="POST" action="/profile">
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="email" class="col-form-label">New Email:</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                            <label for="password" class="col-form-label">New Password:</label>
                            <input type="text" name="password" class="form-control" id="password" required>
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

              </div>
            </div>
          </div>
          <div class="card-body p-3">

            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm"><span class="text-secondary">First Name:</span> &nbsp; Noah</li>
              <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Last Name:</span> &nbsp; Mclaren</li>
              <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span class="text-secondary">Email:</span> &nbsp; +(44) 123 1234 123</li>
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
    </div>









    <!-- Bootstrap core JS-->
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center mb-3">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Recent order</h6>
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
                              <form role="form" method="POST" action="/tables">
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

    <!-- cart -->
    <div class="row">
      <div class="col-12">
        <div class="d-md-flex align-items-center mb-4">
          <div class="mb-md-0 mb-4">
            <h5 class="font-weight-semibold mb-1">Your cards</h5>
            <p class="text-sm mb-0">Pick an account plan that fits your workflow.</p>
          </div>
          <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 ms-md-auto">
            <span class="btn-inner--icon">
              <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
              </svg>
            </span>
            <span class="btn-inner--text">Manage cards</span>
          </button>
        </div>
      </div>
      <hr>
      <!-- <div class="col-md-4">
      <h6 class="text-sm font-weight-semibold mb-1">Card details</h6>
      <p class="text-sm">We’ll credit your account if you need to <br> downgrade during the billing cycle.</p>
    </div> -->
      <div class="col-md-12 mb-4">
        <div class="card border shadow-xs">
          <div class="card-body">
            <div class="row">

              <div class="col-lg-5">
                <div class="card card-background card-background-after-none align-items-start mb-2">
                  <div class="full-background" style="background: white;"></div>
                  <div class="card-body text-start p-2 w-100">
                    <div class="row">
                      <div class="col-12">
                        <div class="blur d-flex align-items-center w-100 border-radius-md border border-white mb-4 p-2">
                          <p class="text-dark text-sm w-50 mb-0 font-weight-bold">web shop</p>

                        </div>
                      </div>
                      <div class="progress-wrapper w-100">
                        <div class="d-flex align-items-center mb-2">
                          <span class="text-sm text-dark font-weight-semibold ">This month</span>
                          <p class="text-dark font-weight-bold ms-auto mb-0">$16,748.05</p>
                        </div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-lg bg-gradient-dark w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- Footer-->
  <footer class="py-2 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; shop 2023</p>
    </div>
  </footer>
  <script src="../assets/js/core/bootstrap.bundle.min.js"></script>

  <!-- <script>

const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')


})
</script> -->
</body>

</html>