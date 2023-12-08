<!DOCTYPE html>
<html lang="en">

<head>

  <!-- <link href="./../../../bootstrap/dist/css/bootstrap.css" rel="stylesheet" /> -->
  <?php include_once  'component/head.php'; ?>

  <title>
    Nabil-Bilal
  </title>

  <!-- Core theme CSS (includes Bootstrap)-->
</head>

<body>

  <section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <div>
              <p class="mb-0"><a href="./homePage.php" class="text-body">Go Back<i class="fas fa-angle-left mt-1"></i></a></p>
            </div>
          </div>

          <div id="cartContainer"></div>

          
          <!-- <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row">
              <div class="form-outline flex-fill">
                <input type="text" id="form1" class="form-control form-control-lg" />
                <label class="form-label" for="form1">Discound code</label>
              </div>
              <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
            </div>
          </div> -->

          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  

  <script>
    // Function to generate the card HTML for each item
    // Function to generate the card HTML for each item
    function generateCard(item) {
        var card = document.createElement('div');
        card.className = 'card rounded-3 mb-4';

        var cardBody = document.createElement('div');
        cardBody.className = 'card-body p-4';

        var rowContainer = document.createElement('div');
        rowContainer.className = 'row d-flex justify-content-between align-items-center';

        // Column 1: Image
        var col1 = document.createElement('div');
        col1.className = 'col-md-2 col-lg-2 col-xl-2';

        var image = document.createElement('img');
        image.src = item.srcUrl;
        image.className = 'img-fluid rounded-3';
        image.alt = 'Cotton T-shirt';

        col1.appendChild(image);

        // Column 2: Product Details
        var col2 = document.createElement('div');
        col2.className = 'col-md-3 col-lg-3 col-xl-3';

        var productLead = document.createElement('p');
        productLead.className = 'lead fw-normal mb-2';
        productLead.textContent = item.name;

        var productDetails = document.createElement('p');
        productDetails.innerHTML = '<span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey';

        col2.appendChild(productLead);
        col2.appendChild(productDetails);

        // Column 3: Quantity Input
        var col3 = document.createElement('div');
        col3.className = 'col-md-3 col-lg-3 col-xl-2 d-flex';

        var minusButton = document.createElement('button');
        minusButton.className = 'btn btn-link px-2';
        minusButton.onclick = function () {
            var quantityInput = this.parentNode.querySelector('input[type=number]');
            quantityInput.stepDown();
        };
        minusButton.innerHTML = '<i class="fas fa-minus"></i>';

        var quantityInput = document.createElement('input');
        quantityInput.id = 'form1';
        quantityInput.min = '0';
        quantityInput.name = 'quantity';
        quantityInput.value = item.quantity;
        quantityInput.type = 'number';
        quantityInput.className = 'form-control form-control-sm';

        var plusButton = document.createElement('button');
        plusButton.className = 'btn btn-link px-2';
        plusButton.onclick = function () {
            var quantityInput = this.parentNode.querySelector('input[type=number]');
            quantityInput.stepUp();
        };
        plusButton.innerHTML = '<i class="fas fa-plus"></i>';

        col3.appendChild(minusButton);
        col3.appendChild(quantityInput);
        col3.appendChild(plusButton);

        // Column 4: Price
        var col4 = document.createElement('div');
        col4.className = 'col-md-3 col-lg-2 col-xl-2 offset-lg-1';

        var priceHeading = document.createElement('h5');
        priceHeading.className = 'mb-0';
        priceHeading.textContent = '$' + item.price.toFixed(2);

        col4.appendChild(priceHeading);

        // Column 5: Delete Button
        var col5 = document.createElement('div');
        col5.className = 'col-md-1 col-lg-1 col-xl-1 text-end';

        var deleteLink = document.createElement('a');
        deleteLink.href = '#!';
        deleteLink.className = 'text-danger';
        deleteLink.innerHTML = '<i class="fas fa-trash fa-lg"></i>';

        col5.appendChild(deleteLink);

        // Appending columns to the row
        rowContainer.appendChild(col1);
        rowContainer.appendChild(col2);
        rowContainer.appendChild(col3);
        rowContainer.appendChild(col4);
        rowContainer.appendChild(col5);

        // Appending the row to the card body
        cardBody.appendChild(rowContainer);

        // Appending the card body to the card
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
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Nabil-Bilal 2023</p>
    </div>
  </footer>
</body>

</html>