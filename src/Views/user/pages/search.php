<?php
$nameProduct = "";
if (isset($_GET['nameProduct'])) {
    // Get the value of the 'data' parameter
    $nameProduct = $_GET['nameProduct'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once  'component/head.php'; ?>

    <title>
        shop 
    </title>

    <!-- Core theme CSS (includes Bootstrap)-->
</head>

<body>
    <!-- Navigation-->
    <?php
        include_once  'component/nav.php';
    ?>
    <!-- Header-->
    
   
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form action="/search" method="GET">
                <div class="input-group mb-5">
                        <span class="input-group-text text-body bg-white  border-end-0 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input type="text" name="nameProduct" class="form-control ps-0" placeholder="Search">
                    </div>
                        </form>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                Model("product");
                $listProduct = new Product();
                $products = $listProduct->getProductsByName($nameProduct);
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

    <?php include_once  'component/footer.php'; ?>
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
    </script>
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="../assets/js/plugins/swiper-bundle.min.js"></script>
    <script>
        if (document.getElementsByClassName('mySwiper')) {
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                initialSlide: 1,
                // navigation: {
                //   nextEl: '.swiper-button-next',
                //   prevEl: '.swiper-button-prev',
                // },
            });
        };
    </script>

</body>

</html>