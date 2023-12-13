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

  <?php include_once 'component/head.php'; ?>

  <title>
    shop
  </title>

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
                  </tr>
                </thead>
                <tbody>
                  <?php
                  Model("order");
                  $orderItems = new Order();
                  if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                  $itemsOrder = $orderItems->getproductOrder($_SESSION['user_id']);
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

                      <td >
                        <div >
                        <?php $status = $orderItem["status"]; ?>
                        <?php if ($status === 'Canceled') : ?>
                          <span class="badge badge-sm border border-danger text-danger bg-danger">
                            <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg><span style="color:aliceblue !important;">Canceled</span>
                            
                          </span>
                        <?php elseif ($status === 'finished') : ?>
                          <span class="badge badge-sm border border-success text-success bg-success">
                            <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                              <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg><span style="color:aliceblue !important;">finished</span>
                            
                          </span>
                        <?php else : ?>
                          <span class="badge badge-sm border border-success text-success bg-success">
                            <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                              <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                            </svg><span style="color:aliceblue !important;"><?php echo $status ?></span>
                            
                          </span>
                        <?php endif; ?>
                      </div>
                        
                      </td>

                      <td class="align-middle">
                        <div class="d-flex">

                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0"><?php echo $orderItem["category"]; ?></p>
                            <p class="text-secondary text-sm mb-0"><?php echo 'ID : ' . $orderItem["order_id"]; ?></p>
                          </div>
                        </div>
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

    
     
      
    </div>
  </div>






  <!-- Footer-->
  <footer class="py-2 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; shop 2023</p>
    </div>
  </footer>

</body>

</html>