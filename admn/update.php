<?php
include('conn.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id'");
    $row = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Records</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="name" required value="<?php echo $row['name'] ?>"> <br>
        Password: <input type="password" name="password" required value="<?php echo $row['password'] ?>"><br>
        <button name="add">Update</button>
    </form> 
</body>
</html>

<?php
include('conn.php');
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $update = mysqli_query($conn, "UPDATE `admin` SET `name`='$name', `password`='$password' WHERE id='$id'");

    if ($update) {
        echo "<script>alert('Admin updated successfully');</script>";
        header('location:select.php');
     //    exit();
    } else {
        echo "Update failed";
    }
}
?>
