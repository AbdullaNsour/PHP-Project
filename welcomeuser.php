<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Admin CRUD</title>
</head>

<body>
  <?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "e-commerce";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } ?>
  <a href="logout.php" class="btn btn-danger float-end">logout</a>
  <?php
  echo "welcome " . $_SESSION['first_name'] . $_SESSION['last_name'];
  ?>
</body>

</html>