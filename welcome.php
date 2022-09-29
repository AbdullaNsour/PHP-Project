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
}

?>
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

    <div class="container mt-4">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Details
                        <a href="logout.php" class="btn btn-danger float-end">logout</a>
                        </h4>
                        

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>first Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Birth Day</th>
                                    <th>Password</th>
                                    <th>Image</th>
                                    <!-- <th>action</th> -->


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                // where  type ='user'
                                $query = "SELECT * FROM user ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['first_name']; ?></td>
                                            <td><?= $row['last_name']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['phone_number']; ?></td>
                                            <td><?= $row['birthday']; ?></td>
                                            <td><?= $row['password']; ?></td>
                                            <td><?= $row['image']; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>