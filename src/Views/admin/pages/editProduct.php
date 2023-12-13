<?php
Model('product');
$product = new Product();
$productData;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["idProduct"])){
        exit;
    }
    $idProduct = $_GET["idProduct"];
    $productData = $product->getProduct($idProduct);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $idProduct = $_POST["idProduct"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock_quantity = $_POST["stock_quantity"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    if (isset($_FILES["image"]) && basename($_FILES["image"]["name"]) != "") {
        $uploadDir = '../../../storage/';
        $basename = basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $basename;

        // Move the uploaded file to the specified directory and if not work echo 
        // an error message.
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo "Upload failed.";
        }
    } else {

        $uploadFile = $product->getProduct($idProduct)["image_url"];
    }
    $path = "http://localhost:8005/".$basename;
    if ($product->updateProduct($idProduct, $name, $price, $description, $path, $category, $stock_quantity) == TRUE) {
        header('Location: ./dashboard');
    } else {
        echo "no update";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once  'component/head.php'; ?>
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
                                <a class="mb-0" href="/dashboard"><i class="fas fa-angle-left mt-1"></i> Go Back </a>
                                <h4 class="font-weight-bolder">Edit Product </h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="/editProduct">
                                    <div class="container px-4 px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-6">
                                                <div style="position: relative;">
                                                    <input type="file" name="image" id="imageInput" style="position: absolute;width:100%; height:100%;opacity: 0; cursor: pointer;" onchange="displayImage(this);" accept="image/*" >
                                                    <img id="previewImage" class="card-img-top mb-5 mb-md-0" src="<?php echo $productData['image_url'] ?>" alt="..." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="hidden" name="idProduct" value="<?php echo $productData['product_id'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="<?php echo $productData['product_name'] ?>" type="text" name="name" class="form-control form-control-lg" placeholder="Name of Product" aria-label="name" aria-describedby="email-addon" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input value="<?php echo $productData['price'] ?>" type="number" name="price" min="0.00" step="any" class="form-control form-control-lg " placeholder="price $ " aria-label="Password" aria-describedby="password-addon" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input value="<?php echo $productData['stock_quantity'] ?>" type="text" name="stock_quantity" class="form-control form-control-lg" placeholder="quantity in stock " aria-label="" required>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control form-control-lg" placeholder="Description" aria-label="" required><?php echo $productData['description'] ?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select name="category" id="category" class="form-control form-control-lg" placeholder="category" aria-label="" required>
                                            <option value="" disabled selected>category</option>
                                            <option value="Books">Books</option>
                                            <option value="Clothing">Clothing</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Home and Garden">Home and Garden</option>
                                            <option value="Toys and Games">Toys and Games</option>

                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Edit Product</button>
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