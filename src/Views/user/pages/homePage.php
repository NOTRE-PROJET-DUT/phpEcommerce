<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once  'component/head.php'; ?>

    <title>
        shop 
    </title>

</head>

<body>
    <!-- Navigation-->
    <?php
        include_once  'component/nav.php';
    ?>
    <!-- Header-->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <header class="bg-dark py-5">
            <div class="container-fluid py-4 px-5">
                <div class="row">
                    <div class="position-relative overflow-hidden m-auto">
                        <div class="swiper mySwiper mt-4 mb-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                        <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                            <div class="full-background bg-cover" style="background-image: url('assets/img/img-2.jpg')"></div>
                                            <div class="card-body text-start px-3 py-0 w-100">
                                                <div class="row mt-12">
                                                    <div class="col-sm-3 mt-auto">
                                                        <h4 class="text-dark font-weight-bolder">#1</h4>
                                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                        <h5 class="text-dark font-weight-bolder">Electronics</h5>
                                                    </div>
                                                    <div class="col-sm-3 ms-auto mt-auto">
                                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                        <h5 class="text-dark font-weight-bolder">E</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover" style="background-image: url('assets/img/img-1.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#2</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Clothing</h5>
                                                </div>
                                                <div class="col-sm-3 ms-auto mt-auto">
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                    <h5 class="text-dark font-weight-bolder">C</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover" style="background-image: url('assets/img/img-3.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#3</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Books</h5>
                                                </div>
                                                <div class="col-sm-3 ms-auto mt-auto">
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                    <h5 class="text-dark font-weight-bolder">B</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover" style="background-image: url('assets/img/img-4.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#4</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Home and Garden</h5>
                                                </div>
                                                <div class="col-sm-3 ms-auto mt-auto">
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                    <h5 class="text-dark font-weight-bolder">H&G</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover" style="background-image: url('assets/img/img-5.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#5</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Toys and Games</h5>
                                                </div>
                                                <div class="col-sm-3 ms-auto mt-auto">
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                    <h5 class="text-dark font-weight-bolder">T&G</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->
                    </div>
                </div>
            </div>
        </header>
    </main>

    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Most Purchased Products</h2>
            <br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                Model("product");
                $listProduct = new Product();
                $productM = $listProduct->getMostPurchasedProducts();
                foreach ($productM as $product) : ?>
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

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $products = $listProduct->getProducts();
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
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="assets/js/core/swiper-bundle.min.js"></script>
    <!-- <script>
        if (document.getElementsByClassName('mySwiper')) {
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                initialSlide: 1,
            });
        };
    </script> -->
    <script>
        // Check if there are elements with the class 'mySwiper'
var swiperElements = document.getElementsByClassName('mySwiper');

if (swiperElements.length > 0) {
    // Initialize the Swiper only if elements with the class 'mySwiper' are found
    var swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        initialSlide: 1,
    });

    // Set up an interval to automatically swipe to the next slide every 1 second
    setInterval(function () {
        swiper.slideNext(); // Go to the next slide

        // Check if the next slide is the last one, and if so, loop back to the first slide
        if (swiper.isEnd) {
            swiper.slideTo(0); // Go to the first slide
        }
    }, 1200);
}

    </script>

</body>

</html>