<?php
if (!isset($_GET['idProduct']))exit;

    $idProduct = $_GET['idProduct'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once  'component/head.php'; ?>

    <title>
        product
    </title>
</head>

<body>
    <!-- Navigation-->
    <?php include_once  'component/nav.php'; ?>
    <!-- Product section-->
    <section class="py-5 my-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="card-header pb-0 text-left">
                <a class="mb-0" href="/"><i class="fas fa-angle-left mt-1"></i> Go Back </a>
            </div>
            <?php
            
            Model('product');
             
            
            $listProduct = new Product();
            $product = $listProduct->getProduct($idProduct);
            ?>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $product['image_url']; ?>" alt="...imageProduct" /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><a href="/profileAdmin?idAdmin=<?php echo $product['admin_id']; ?>">Page Shop create by @admin </a></div>
                    <h1 class="display-5 fw-bolder"><?php echo $product['product_name']; ?></h1>
                    <div class="fs-5 mb-5">
                        <div class="small mb-1"><?php echo $product['category']; ?></div>
                        <span><?php echo $product['price'] . " $"; ?></span>
                    </div>
                    <p class="lead"><?php echo $product['description']; ?></p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="addStockToCart(<?php echo $product['product_id'] . ',\'' . $product['product_name'] . '\',' . $product['price'] . ',\'' . $product['image_url'] . '\''; ?>)">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $products = $listProduct->getProductsByCategory($product['category']);
                foreach ($products as $product) : ?>
                    <div class="col mb-5">
                        <a href="/product?idProduct=<?php echo $product['product_id']; ?>">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="<?php echo $product['image_url']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $product['product_name']; ?></h5>
                                        <!-- Product price-->
                                        <h5><?php echo $product['price'] . " $"; ?></h5>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent" onclick="addToCart(<?php echo $product['product_id'] . ',\'' . $product['product_name'] . '\',' . $product['price'] . ',\'' . $product['image_url'] . '\''; ?>)">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto">Add to cart</a></div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-2 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <script>
        function addToCart(product_id, name, price, image_url) {
            // Retrieve existing cart data from localStorage
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if the product is already in the cart
            var productInCart = cart.find(item => item.id === product_id);

            if (productInCart) {
                // If the product is in the cart, increase the quantity
                productInCart.quantity++;
            } else {
                // If the product is not in the cart, add it
                cart.push({
                    id: product_id,
                    name: name,
                    price: price,
                    srcUrl: image_url,
                    quantity: 1
                });
            }

            // Save the updated cart data back to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function addStockToCart(product_id, name, price, image_url) {
            // Retrieve existing cart data from localStorage
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if the product is already in the cart
            var productInCart = cart.find(item => item.id === product_id);
            let quantity = document.getElementById("inputQuantity").value;
            if (productInCart) {
                // If the product is in the cart, increase the quantity
                productInCart.quantity = quantity;
            } else {
                // If the product is not in the cart, add it
                cart.push({
                    id: product_id,
                    name: name,
                    price: price,
                    srcUrl: image_url,
                    quantity: quantity
                });
            }

            // Save the updated cart data back to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    </script>
</body>

</html>