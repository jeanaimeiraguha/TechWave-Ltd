<?php
include('conn.php');
session_start();

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Checking credentials against the database
    $select = mysqli_query($conn, "SELECT * FROM admin WHERE `name`='$name' AND `password`='$password'");
    $count = mysqli_num_rows($select);
    
    if ($count >= 1) {
        // Setting session variables
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        // Redirecting to home.php
        header('Location: home.php');
        exit();
    } else {
        // Alert if credentials are wrong
        echo "<script>alert('Wrong credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Admin Login</h2>
                <form action="" method="post" class="shadow p-4 rounded bg-light">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="insert.php" class="btn btn-link">Create Account</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
