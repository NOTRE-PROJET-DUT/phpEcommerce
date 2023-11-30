<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- <link href="./../../../bootstrap/dist/css/bootstrap.css" rel="stylesheet" /> -->
    <?php  include '../component/head.php'; ?>
  
    <title>
    Soft UI Design System by Creative Tim
    </title>
    
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
        <!-- Navigation-->
            <?php  include '../component/nav.php'; ?>
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
                  <button type="button" class="btn btn-white btn-icon px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                  </button>
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
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
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
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
 








    <!-- Bootstrap core JS-->
    <div class="row">
        <div class="col-md-4">
          <h6 class="text-sm font-weight-semibold mb-1">Billing history</h6>
          <p class="text-sm">We’ll credit your account if you need to <br> downgrade during the billing cycle.</p>
        </div>
        <div class="col-md-8 mb-6">
          <div class="card shadow-xs border mb-4">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="text-xs font-weight-semibold opacity-7 ms-1">All invoices</span>
                    </th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Amount</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Plan</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Jan 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Feb 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Mar 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Apr 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">May 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Jun 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center py-3 px-4 text-sm">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                      <span class="font-weight-semibold text-dark ms-1">Jul 2022</span>
                    </td>
                    <td>
                      <span class="badge badge-sm border border-success text-success bg-success border-radius-sm">
                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                          <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Paid
                      </span>
                    </td>
                    <td>
                      <span class="text-sm">USD $30.00</span>
                    </td>
                    <td>
                      <span class="text-sm">Basic Plan</span>
                    </td>
                    <td class="text-sm font-weight-semibold text-dark">
                      <span class="text-sm">Download</span>
                    </td>
                  </tr>
                </tbody>
              </table>
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
        <div class="col-md-4">
          <h6 class="text-sm font-weight-semibold mb-1">Card details</h6>
          <p class="text-sm">We’ll credit your account if you need to <br> downgrade during the billing cycle.</p>
        </div>
        <div class="col-md-8 mb-4">
          <div class="card border shadow-xs">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-5">
                  <div class="card card-background card-background-after-none align-items-start mb-2">
                    <div class="full-background" style="background-image: url('../assets/img/curved-images/img-6.jpg')"></div>
                    <div class="card-body text-start ps-3 pe-2 pt-2 pb-2 w-100">
                      <div class="row">
                        <div class="col-8 py-2">
                          <p class="text-white text-sm font-weight-bold mb-6">Corporate UI</p>
                          <div class="d-flex align-items-center mb-0 mt-auto">
                            <p class="font-weight-semibold mb-0">Noah Jackes</p>
                            <span class="ms-auto text-xs font-weight-bolder text-pt-mono">08/28</span>
                          </div>
                          <span class="ms-auto text-sm font-weight-bolder text-pt-mono">1234&nbsp;&nbsp;6578&nbsp;&nbsp;9000&nbsp;&nbsp;1234</span>
                        </div>
                        <div class="col-4">
                          <div class="blur d-flex flex-column w-80 h-100 py-2 ms-auto border-radius-lg border border-white">
                            <div class="text-center w-100">
                              <img src="../assets/img/logos/wifi-white.png" class="w-25 mx-auto" alt="wifi" />
                            </div>
                            <div class="text-center mt-auto w-100">
                              <img src="../assets/img/logos/mastercard-white.png" class="w-40 mx-auto mt-2" alt="mastercard" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="progress-wrapper w-100 mb-lg-0 mb-5">
                    <div class="d-flex align-items-center mb-2">
                      <span class="text-sm font-weight-semibold">This month</span>
                      <p class="text-dark font-weight-bold ms-auto mb-0">$56,982.20</p>
                    </div>
                    <div class="progress">
                      <div class="progress-bar progress-bar-lg bg-gradient-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="card card-background card-background-after-none align-items-start mb-2">
                    <div class="full-background" style="background-image: url('../assets/img/curved-images/img-7.jpg')"></div>
                    <div class="card-body text-start p-2 w-100">
                      <div class="row">
                        <div class="col-12">
                          <div class="blur d-flex align-items-center w-100 border-radius-md border border-white mb-4 p-2">
                            <p class="text-white text-sm w-50 mb-0 font-weight-bold">Corporate UI</p>
                            <div class="text-end ms-auto w-100 pe-2">
                              <img src="../assets/img/logos/wifi-white.png" class="w-10 ms-auto" alt="wifi" />
                            </div>
                          </div>
                        </div>
                        <div class="col-8 py-2 mt-auto">
                          <div class="d-flex align-items-center mb-0 mt-auto ms-2">
                            <p class="font-weight-semibold mb-0 mt-3">Noah Jackes</p>
                            <span class="ms-auto text-xs font-weight-bolder text-pt-mono">08/28</span>
                          </div>
                          <span class="text-sm font-weight-bolder text-pt-mono ms-2">1234&nbsp;&nbsp;6578&nbsp;&nbsp;9000&nbsp;&nbsp;1234</span>
                        </div>
                        <div class="col-4 py-2 text-end mt-auto">
                          <img src="../assets/img/logos/visa-white.png" class="w-50 ms-auto me-3" alt="visa" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="progress-wrapper w-100">
                    <div class="d-flex align-items-center mb-2">
                      <span class="text-sm font-weight-semibold">This month</span>
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






        <!-- Footer-->
        <footer class="py-2 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>

    </body>
</html>