<?php
    include '../../../Models/product.php';
    $product = new Product();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve values from the form
        $name = $_POST["name"];
        $price = $_POST["price"];
        $stock_quantity = $_POST["stock_quantity"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $imageProduct = $_POST["imageProduct"];

        if (isset($_FILES["image"])) {
            $uploadDir = '../../../../storage/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    
            // Move the uploaded file to the specified directory and if not work echo 
            // an error message.
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                echo "Upload failed.";
            }
        } else {
            echo "No file selected.";
        }
        if ($product->createProduct($admin=1,$name,$price,$description,$uploadFile,$category,$stock_quantity) == TRUE) {
          // Start the session
          session_start();
          $_SESSION["userName"] = $userName;
          $_SESSION["role"] = "admin";
          
          header('Location: ./createProduct.php');
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

<body>
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <a class="mb-0" href="./dashboard.php"><i class="fas fa-angle-left mt-1"></i> Go Back </a>
                                <h4 class="font-weight-bolder">Create New Product </h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="container px-4 px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-6">
                                                <div style="position: relative;">
                                                    <input type="file" name="image" id="imageInput" style="position: absolute;width:100%; height:100%;opacity: 0; cursor: pointer;" onchange="displayImage(this);" accept="image/*" required>
                                                    <img id="previewImage"  class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Name of Product" aria-label="name" aria-describedby="email-addon" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" name="price" min="0" class="form-control form-control-lg " placeholder="price $ " aria-label="Password" aria-describedby="password-addon" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" name="stock_quantity" class="form-control form-control-lg" placeholder="quantity in stock " aria-label="" required>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control form-control-lg" placeholder="Description" aria-label="" required></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select name="category" id="category" class="form-control form-control-lg" placeholder="category" aria-label="" required>
                                            <option value="" disabled>category</option>
                                            <option value="Books" selected>Books</option>
                                            <option value="Clothing">Clothing</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Home and Garden">Home and Garden</option>
                                            <option value="Toys and Games">Toys and Games</option>

                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">create Product</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function displayImage(input) {
            var previewImage = document.getElementById('previewImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>