<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "e-commerce";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    $uname = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$uname' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if ($row['email'] == $uname && $row['password'] == $password && $row['role'] == 'admin') {
        echo "Logged in!<br>";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['id'] = $row['id'];

        header("location:welcome.php");
    } elseif ($row['email'] == $uname && $row['password'] == $password && $row['role'] == 'user') {
        echo "Logged in!<br>";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        header("location:welcome.php");
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title> Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>login </h1>
    </center>
    <center>
        <h5>welcome back</h5>
    </center>
    <div class="container">

        <center>
            <form method="POST">
                <div class="email">

                    <input type="email" name="email" placeholder="Enter the User email" required />
                </div>
                <div class="pass">

                    <input type="password" name="password" placeholder="password" required>
                </div>
                <p class="text-center mt-2 fs-2 text-muted">Don't have an account?<a href="signup.php">sign up</a></p>
                <input type="submit" name="submit" type="submit" value="LOGIN" class="btn" />
            </form>
        </center>
    </div>
</body>

</html>