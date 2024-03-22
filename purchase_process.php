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
            echo '<a href="browse_cars.php">Continue browsing</a>';
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
