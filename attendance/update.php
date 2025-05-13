<?php
include('conn.php');


if (isset($_GET['e_id'])) {
    $e_id = $_GET['e_id'];
    $select = mysqli_query($conn, "SELECT * FROM attendance WHERE e_id='$e_id'");
    $row = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
</head>
<body>
    <form action="" method="post">
     Employee Id: <input type="text" name="e_id" required value="<?php echo $row['e_id'] ?>"> <br>
        Date: <input type="date" name="date" required value="<?php echo $row['date'] ?>"> <br>
        status: <input type="text" name="status" required value="<?php echo $row['status'] ?>"><br>
        <button name="add">Update</button>
    </form> 
</body>
</html>

<?php
include('conn.php');
if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $date = $_POST['date'];
    $status= $_POST['status'];

    $update = mysqli_query($conn, "UPDATE attendance SET e_id='$e_id', `date`='$date' ,`status`='$status'WHERE e_id='$e_id'");

    if ($update) {
        echo "<script>alert('Attendance  record updated successfully');</script>";
        header('location:select.php');
     //    exit();
    } else {
        echo "Update failed";
    }
}
?>
