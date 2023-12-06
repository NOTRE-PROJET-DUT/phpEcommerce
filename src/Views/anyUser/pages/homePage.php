<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <link href="./../../../bootstrap/dist/css/bootstrap.css" rel="stylesheet" /> -->
    <?php include '../component/head.php'; ?>

    <title>
        Soft UI Design System by Creative Tim
    </title>

    <!-- Core theme CSS (includes Bootstrap)-->
</head>

<body>
    <!-- Navigation-->
    <?php include '../component/nav.php'; ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include '../../../Models/product.php';
                $listProduct = new Product();
                $products = $listProduct->getProducts();
                foreach ($products as $product) : ?>
                    <div class="col mb-5">
                        <a  href="product.php?idProduct=<?php echo $product['product_id']; ?>">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="<?php echo $product['image_url']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder" ><?php echo $product['product_name']; ?></h5>
                                        <!-- Product reviews-->
                                        <!-- <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div> -->
                                        <!-- Product price-->
                                        <h5><?php echo $product['price'] . " $"; ?></h5>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent" onclick="addToCart(<?php echo $product['product_id'].',\''.$product['product_name'].'\','.$product['price'].',\''.$product['image_url'].'\''; ?>)">
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

    <?php include '../component/footer.php'; ?>

    <!-- Bootstrap core JS
        <script src="./../../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
    <script>
        function addToCart(product_id,name,price,image_url) {
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
                    srcUrl:image_url,
                    quantity: 1
                });
            }

            // Save the updated cart data back to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    </script>
</body>

</html>