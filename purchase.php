<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    // Validate form data (you may add more validation as needed)
    if (empty($email) || empty($telephone) || empty($address) || empty($payment_method)) {
        // Handle empty fields
        echo "Please fill in all required fields.";
    } else {
        // Process the purchase (e.g., save data to the database, send confirmation email, etc.)
        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $fims = "fims"; // Replace with your database name
        $conn = new mysqli($servername, $username, '', $fims);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement to insert purchase data into the database
        $sql = "INSERT INTO purchases (email, telephone, address, payment_method)
                VALUES ('$email', '$telephone', '$address', '$payment_method')";

        if ($conn->query($sql) === TRUE) {
            echo "Purchase successful. Thank you!";
            // You can also redirect the user to a confirmation page
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // Handle if the form is not submitted
    echo "Form not submitted.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Vehicle</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<nav>
    <ul>
        <li><a href="Cars home.html">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="about.html">About Us</a></li>
    </ul>
</nav>

<main>
    <div id='SignUpform'>
        <form action="purchase_process.php" method="POST">
            <header>
                <h2>Purchase Vehicle</h2>
            </header>
            <div class="input">
                <label for="email">Email:</label>
                <input type="email" placeholder="Enter email" id="email" name="email" required>
            </div>
            <div class="input">
                <label for="telephone">Phone Number:</label>
                <input type="tel" placeholder="Enter number" id="telephone" name="telephone" required>
            </div>
            <div class="input">
                <label for="address">Address:</label>
                <textarea placeholder="Enter address" id="address" name="address" required></textarea>
            </div>
            <div class="input">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="mpesa">Mpesa</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>
            <input type="submit" value="Purchase">
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2024 FIMS. All rights reserved.</p>
</footer>
</body>
</html>
