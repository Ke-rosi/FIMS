<?php
  include "connect.php";
  $unsuccess = 0;
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
      // check if there is any record from executing the query
      if (mysqli_num_rows($result)>0) {
        // check if passwords match
        // fetch the password hash from db
        $account = mysqli_fetch_assoc($result);
        $password_hash = $user['password'];
        //password_verify() - compares the hash password with the password the user has inputed
        if (password_verify($password, $password_hash)) {
          //echo "Login successful";
          //sessions - to store user data(in variables) accross multiple pages
          session_start();//start user session
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $user['id'];
          header("location:");
        }else{
          // echo "Invalid login";
          $unsuccess = 1;
        }
      }
    }

  }



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
    <script src="login.js"></script>
   
</head>
<body>
    <nav>
    
        <img src= "images/_4ee83551-ff27-49a5-b569-9ea039c2ad48.jpg" class="logo"> 
      <ul>
            <li><a href="Cars home.html">Welcome</a></li>       
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="Gallery.html">Home</a></li>
            <li><a href="vehicles.html">Vehicles</a></li>
            <li><a href="about.html">About Us</a></li>

        </ul>
    </nav>
    </div>
    <div id="SignUpform">
        
    <h2>Login</h2>
         <form onsubmit="return validateForm()">
            <!--username -->
            <div class="input">
            <i class='bx bx-user-circle'></i>  
            <label>Email:</label> 
           <input type="email" placeholder="Enter Email" name="email" id="email" required><br>
            
 
        </div>
            <!--Password-->
            <div class="input">
            <i class='bx bxs-lock-alt'></i>
              <label>Password:</label>
<input type="password" placeholder="Enter password" name="password" id="password"required><br> 

</div>
<input type="submit" name="Login" value="Login">
        <!--Link to register if you have not signed up-->
        <div class="logregi-link">
            
            <p>You don't have an account <br> Register here: <a href="register.html">Register</p> 
            </div>
          </form>
          </div>
          </div>
          
</div>
</div>
          </body>
</body>
</html>
