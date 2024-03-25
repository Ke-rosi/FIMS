<?php

	$connect = mysqli_connect('localhost', 'root', '', 'Car');
	if (!$connect) {
		die(mysqli_connect_error());
	} else {
    echo "Connection succesful";
}
?>
