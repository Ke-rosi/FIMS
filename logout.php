<?php
	//logout
	session_start();
	session_destroy();
	header("location:Cars home.html");


?>

<link href="logout.css">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logged out</title>
</head>
<body>

         <p>You have now been logged out!</p>
             <li><a href="Cars home.html">Go back to Home page</a></li>   




</body>
</html>
