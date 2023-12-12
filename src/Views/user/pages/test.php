<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Storage Example</title>
</head>
<body>
    <form action="/createOrder" method="POST" id="myForm">
        <!-- Hidden input field to store JSON data -->
        <input type="hidden" name="jsonData" id="jsonDataInput">

        <!-- Submit button to trigger the form submission -->
        <input type="submit" value="Submit">
    </form>

    <script>
        // Retrieve the JSON data from localStorage
        var jsonDataFromStorage = localStorage.getItem('cart');

        // Check if the data is a valid JSON string
        try {
            var parsedData = JSON.parse(jsonDataFromStorage);

            // If parsing is successful, set the value of the hidden input field
            document.getElementById('jsonDataInput').value = jsonDataFromStorage;
        } catch (error) {
            console.error('Error parsing JSON data:', error);

            // Handle the error or provide a default value if needed
            document.getElementById('jsonDataInput').value = '';
        }

        // Submit the form programmatically
        document.getElementById('myForm').submit();
    </script>
</body>
</html>
