<?php
include 'connect.php';

// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$fims = "fims";

$conn = new mysqli($servername, $username, $password, $fims);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $email_check_sql = "SELECT * FROM users WHERE email='$email'";
    $email_check_result = $conn->query($email_check_sql);

    if ($email_check_result->num_rows > 0) {
        // Email already exists, set flag to indicate unsuccessful registration
        $unsuccess = 1;
    } else {
        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, telephone, password)
                VALUES ('$username', '$email', '$telephone', '$hashed_password')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // Signup successful
            $success = 1;
        } else {
            // Signup unsuccessful
            $unsuccess = 1;
        }
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="registerr.js"></script>
</head>
<body>
<nav>
     <ul>
            <li><a href="Cars home.html">Welcome</a></li>       
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="Gallery.html">Home</a></li>
            <li><a href="vehicles.html">Vehicles</a></li>
            <li><a href="about.html">About Us</a></li>

        </ul>
    
</nav>

<div id="SignUpform">
    <h2>Register</h2>
    <hr>
    <p>Please enter your information</p>
   <form action="register.php" method="POST" onsubmit="return validateForm()">
        <div class="input">
            <label for="username">Username:</label>
            <input type="text" placeholder="Only alphabetic characters, no spaces or numbers" name="username" id="username"  required>
        </div>
        <div class="input">
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>

        </div>
        <div class="input">
            <label for="telephone">Telephone Number:</label>
            <input type="tel" placeholder="Format: phone number" name="telephone" id="telephone" required>
        </div>  
        <div class="input">
            <label for="password">Password:</label>
            <input type="password" placeholder="At least 8 characters including uppercase, lowercase, numbers, and special characters" name="password" id="password" required>
        </div>
        <div class="input">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
        </div>
        
        <input type="submit" name="Register" value="Register">
    </form>
    <div class="logregi-link">
        <p>Already registered? <a href="login.html">Log in</a></p> 
    </div>
</div>
</body>
</html>

