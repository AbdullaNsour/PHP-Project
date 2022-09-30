<?php

include 'config.php';


if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['first_name']);
   $last = mysqli_real_escape_string($conn, $_POST['last_name']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone_number']);
   $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `users`(first_name, last_name,email,phone_number,birthday, password, image) VALUES('$name', '$last', '$email','$phone','$birthday', '$pass', '$image')") or die('query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'registeration failed!';
         }
      }
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

		<!-- <div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');"> -->
		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/rg1.jpg" alt="">
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" name="first_name" placeholder="First Name" class="form-control" required>
						<input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="date" name="birthday" placeholder="Dote of Birth" class="form-control">
						
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email Address" class="form-control" required>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="number" name="phone_number" placeholder="Add phone Number" class="form-control" required>
						<i class="zmdi zmdi-account"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" name="password" placeholder="enter password" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="cpassword" placeholder="confirm password" class="form-control"  required>
						<i class="zmdi zmdi-lock"></i>
					</div>

					<div class="form-wrapper">
						<input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<button type="submit" name="submit" class="btn" >Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<p>already have an account? <a href="login.php">login now</a></p>
				</form>
			</div>
		</div>
		
	</body>
</html>