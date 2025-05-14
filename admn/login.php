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
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="name" required> <br>
        Password: <input type="password" name="password" required> <br>
        <button name="add">Login</button>
        <a href="insert.php">Create Account</a>
    </form>
</body>
</html>
