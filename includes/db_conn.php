<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="admin";
// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	if(ISSET($_POST['submit'])){
		if($_POST['email'] != ""){
			$task = $_POST['email'];
			$conn->query("INSERT INTO `adminuser` VALUES('$task')");
			header('location:register.php');
		}
	}
?>

