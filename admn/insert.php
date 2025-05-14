<?php
include('conn.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Inserting data into the database
    $insert = mysqli_query($conn, "INSERT INTO admin(id, `name`, `password`) VALUES('', '$name', '$password')");

    if ($insert) {
        echo "<script>alert('Admin inserted successfully'); window.location.href='login.php';</script>";
    } else {
        echo "Failed to insert admin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <style>




     </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Admin Registration</h2>
                <form action="" method="post" class="shadow p-4 rounded bg-light">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
