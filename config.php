<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name="e-commerce";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['delete']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['delete']);

    $query = "DELETE FROM adminuser WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    header("Location: avarage.php");
    exit(0);
    
}

if(isset($_POST['update']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
    $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['bod']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE adminuser SET 	first_name='$name', middle_name='$name1',salary='$salary',family_name='$name2',email_address='$email',date_of_birth='$date', password='$pass' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    header("Location: welcome.php");
    exit(0);
    

}
if(isset($_POST['adminUpdate']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
    $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['bod']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE adminuser SET 	first_name='$name', middle_name='$name1',salary='$salary',family_name='$name2',email_address='$email',date_of_birth='$date', password='$pass' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    header("Location: avarage.php");
    exit(0);
    

}




?>