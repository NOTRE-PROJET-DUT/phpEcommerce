
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- <link href="./../../../bootstrap/dist/css/bootstrap.css" rel="stylesheet" /> -->
    <?php  include '../component/head.php'; ?>
  
    <title>
    Nabil-Bilal
    </title>
    
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card ">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#!" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have 4 items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>
                </div>



                <div id="cartContainer"></div>
                <!-- <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>Iphone 11 pro</h5>
                          <p class="small mb-0">256GB, Navy Blue</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">2</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$900</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>Samsung galaxy Note 10 </h5>
                          <p class="small mb-0">256GB, Navy Blue</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">2</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$900</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img3.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>Canon EOS M50</h5>
                          <p class="small mb-0">Onyx Black</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">1</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$1199</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img4.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>MacBook Pro</h5>
                          <p class="small mb-0">1TB, Graphite</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">1</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$1799</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div> -->

              </div>
              <div class="col-lg-5">

                <div class="card bg-secondary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">$4798.00</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">$20.00</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">$4818.00</p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>$4818.00</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Function to generate the card HTML for each item
  function generateCard(item) {
        var card = document.createElement('div');
        card.className = 'card mb-3';

        var cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        var dFlexContainer = document.createElement('div');
        dFlexContainer.className = 'd-flex justify-content-between';

        // Left side of the card
        var leftContainer = document.createElement('div');
        leftContainer.className = 'd-flex flex-row align-items-center';

        var imageDiv = document.createElement('div');
        var image = document.createElement('img');
        image.src = item.srcUrl;
        image.className = 'img-fluid rounded-3';
        image.alt = 'Shopping item';
        image.style.width = '65px';

        var textDiv = document.createElement('div');
        textDiv.className = 'ms-3';

        var itemName = document.createElement('h5');
        itemName.textContent = item.name;

        var itemDetails = document.createElement('p');
        itemDetails.className = 'small mb-0';
        itemDetails.textContent = item.details;

        // Right side of the card
        var rightContainer = document.createElement('div');
        rightContainer.className = 'd-flex flex-row align-items-center';

        var quantityDiv = document.createElement('div');
        quantityDiv.style.width = '50px';

        var quantityHeading = document.createElement('h5');
        quantityHeading.className = 'fw-normal mb-0';
        quantityHeading.textContent = item.quantity;

        var priceDiv = document.createElement('div');
        priceDiv.style.width = '80px';

        var priceHeading = document.createElement('h5');
        priceHeading.className = 'mb-0';
        priceHeading.textContent = '$' + item.price;

        var trashIcon = document.createElement('a');
        trashIcon.href = '#!';
        trashIcon.style.color = '#cecece';
        trashIcon.innerHTML = '<i class="fas fa-trash-alt"></i>';

        // Appending elements to the respective containers
        imageDiv.appendChild(image);
        textDiv.appendChild(itemName);
        textDiv.appendChild(itemDetails);

        leftContainer.appendChild(imageDiv);
        leftContainer.appendChild(textDiv);

        quantityDiv.appendChild(quantityHeading);
        priceDiv.appendChild(priceHeading);

        rightContainer.appendChild(quantityDiv);
        rightContainer.appendChild(priceDiv);
        rightContainer.appendChild(trashIcon);

        dFlexContainer.appendChild(leftContainer);
        dFlexContainer.appendChild(rightContainer);

        cardBody.appendChild(dFlexContainer);
        card.appendChild(cardBody);

        return card;
    }

    // Function to display the cards in the cart container
    function displayCart() {
        var cartContainer = document.getElementById('cartContainer');

        // Loop through each item in the cart and generate the corresponding card
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        cartItems.forEach(function(item) {
            var card = generateCard(item);
            cartContainer.appendChild(card);
        });
    }

    // Call the function to display the cards
    displayCart();
</script>

 <!-- Footer-->
 <footer class="py-2 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Nabil-Bilal 2023</p></div>
</footer>
</body>
</html>