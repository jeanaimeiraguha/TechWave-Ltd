<?php
include('conn.php');

if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $insert = mysqli_query($conn, "INSERT INTO attendance(e_id, `date`, `status`) VALUES('$e_id', '$date', '$status')");

    if ($insert) {
        echo "<script> alert('Attendance recorded successfully'); window.location.href='select.php'; </script>";
    } else {
        echo "Failed to record attendance.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Registration</title>
</head>
<body>
    <form action="" method="post">
        Employee ID: <input type="text" name="e_id" required> <br>
        Date: <input type="date" name="date" required> <br>
        Status: <input type="text" name="status" required> <br>
        <button name="add">Register</button>
    </form> 
</body>
</html>
