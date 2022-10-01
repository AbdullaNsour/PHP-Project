<?php
session_start();
include 'config.php';










if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   $row = mysqli_fetch_assoc($select);



   if(mysqli_num_rows($select) > 0  && $row['role'] == 'user' ){
    //   $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      header('location:home.php');
	  
   }elseif(mysqli_num_rows($select) > 0  && $row['role'] == 'admin' ){
    //   $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      header('location:admin.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/rg1.jpg" alt="">
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<h3>Registration Form</h3>
					<?php
					if(isset($message)){
					   foreach($message as $message){
						  echo '<div class="message">'.$message.'</div>';
					   }
					}
					?>

					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email Address" class="form-control" required>
						<i class="zmdi zmdi-email"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" name="password" placeholder="enter password" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
		

					<button type="submit" name="submit" class="btn" >Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<br>
					<p style="padding-left:25px;"> don't have an account? <a href="register.php">regiser now</a></p>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>