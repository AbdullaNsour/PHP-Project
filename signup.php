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
    if ($_POST['email'] != "") {
        $email = $_POST['email'];

        if ($_POST['f-name'] != "") {
            $fname = $_POST['f-name'];

            if ($_POST['fam-name'] != "") {
                $famname = $_POST['fam-name'];

                if ($_POST['phone'] != "") {
                    $phone_number = $_POST['phone'];

                    if ($_POST['date'] != "") {
                        $date = $_POST['date'];

                        if ($_POST['password'] != "") {
                            $password = $_POST['password'];

                            if ($_POST['passwordconfirm'] != "") {
                                $passwordconfirm = $_POST['passwordconfirm'];

                                $conn->query("INSERT INTO `user`(email,first_name,last_name,phone_number,birthday,password)
        VALUES('$email','$fname','$famname','$phone_number','$date','$password')");
                                $_SESSION['first_name'] = $row['first_name'];
                                $_SESSION['last_name'] = $row['last_name'];
                                header('location:welcomeuser.php');
                            }
                        }
                    }
                }
            }
        }
    }
}
?>



<?php
include "./includes/head.php";
?>
<div class="container mt-5">
    <h1 class="text-center">Sign up</h1>
    <p class="text-center mt-2 fs-2 text-muted">Create an Account,its free</p>

    <form method="POST" action="" class="w-75" style="margin:0 auto;" onsubmit="return Registervalidate()">

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="inputFirstName" class="form-label ">First Name</label>
                <input type="text" class="form-control  " id="inputFirstName" name="f-name" placeholder="First Name">
                <div id="fname-error"></div>
            </div>

            <div class="col-md-3">
                <label for="inputFamilyName" class="form-label">Family Name</label>
                <input type="text" class="form-control" id="inputFamilyName" name="fam-name">
                <div id="fam-name-error"></div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
                <div id="email-error"></div>
            </div>

        </div>
        <div class="mb-3">
            <label for="inputphone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="inputphone" name="phone">
            <div id="phone-error"></div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date" name="date">
            <div id="date-error"></div>
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
            <div id="password-error"></div>
        </div>
        <div class="mb-3">
            <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="inputPasswordConfirm" name="passwordconfirm">
            <div id="confirm-password-error"></div>
        </div>
        <p class="text-center mt-2 fs-2 text-muted">Already have an account?<a href="login.php">login</a></p>
        <div class="d-grid gap-2 col-6 mx-auto mt-5 ">
            <button id="sub_nsour" class="btn btn-primary rounded-5 fs-3" type="submit" name="submit" style="background-color:palevioletred ;">Sign up</button>

        </div>
    </form>
</div>
<script src="script.js"></script>
<?php
include "./includes/footer.php";
?>