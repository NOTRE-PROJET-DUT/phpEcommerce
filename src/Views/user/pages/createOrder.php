<?php
$jsonData = $_POST['jsonData'];

// Decode the JSON data
$receivedData = json_decode($jsonData);

// Check if the decoding was successful
if ($receivedData === null && json_last_error() !== JSON_ERROR_NONE) {
    // Handle JSON decoding error
    $error = json_last_error_msg();
    echo "Error decoding JSON data: $error";
} else {
    Model("order");
    $order = new Order();
    $total = 0;

    // Check if $receivedData is an array or an object
    if (is_array($receivedData) || is_object($receivedData)) {
        foreach ($receivedData as $item) {
            // Note: Access properties using -> for objects, or ['property'] for arrays
            $total += $item->price * $item->quantity;
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        try {
            // Create the order
            $order_id = $order->createOrder($_SESSION['user_id'], $total);

            // Insert order items
            foreach ($receivedData as $item) {
                // Assuming $item is an object with properties like product_id, quantity, and price
                $product_id = $item->id;
                $quantity = $item->quantity;
                $price = $item->price;

                // Insert the order item into the database
                $success = $order->insertOrderItem($order_id, $product_id, $quantity, $price);

                // Check if the insertion was successful
                if (!$success) {
                    throw new Exception("Error inserting order item into the database.");
                }
            }

            // Generate HTML invoice content
            $htmlContent = generateHtmlInvoice($order_id, $receivedData, $total);

            // Output the HTML content
            echo $htmlContent;

            echo "Order and order items inserted successfully!";
        } catch (Exception $e) {
            // Handle exceptions and provide detailed error message
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid data format"; // Handle the case where $receivedData is not an array or object
    }
}

// Function to generate HTML invoice
function generateHtmlInvoice($order_id, $order_data, $total) {
    $html = '<html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Invoice for Order #' . $order_id . '</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }
                        th, td {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                    </style>
                </head>
                <body >
                <div id="myBody" >
                    <h2>Invoice for Order #' . $order_id . '</h2>
                    <p><strong>Order Date:</strong> ' . date('Y-m-d H:i:s') . '</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>';

    foreach ($order_data as $item) {
        $html .= '<tr>
                    <td>' . $item->name . '</td>
                    <td>' . $item->quantity . '</td>
                    <td>$' . $item->price . '</td>
                    <td>$' . ($item->quantity * $item->price) . '</td>
                  </tr>';
    }

    $html .= '</tbody>
              </table>
              <p><strong>Total Amount:</strong> $' . $total . '</p>
              </div>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
              <script>
              function generatePDF() {
                      var element = document.getElementById("myBody");
          
                      // Ensure html2pdf is properly loaded before using it
                      if (typeof html2pdf !== "undefined") {
                          // Set up options for pdf generation
                          var options = {
                              margin: 10,
                              filename: "table.pdf",
                              image: { type: "png", quality: 0.98 },
                              html2canvas: { scale: 2 },
                              jsPDF: { unit: "mm", format: "a4", orientation: "portrait" }
                          };
          
                          html2pdf(element, options).then(function () {
                            // PDF generation completed, now redirect
                            localStorage.setItem("cart", JSON.stringify([]));
                            window.location.href = "/";
                        }).catch(function (error) {
                            console.error("Error generating PDF:", error);
                        });
                      } else {
                          console.error("html2pdf library is not properly loaded.");
                      }
                  }
                  generatePDF()
                  
            </script>
            </body>
          </html>';
         

    return $html;
}
?>
