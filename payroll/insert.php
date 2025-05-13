<?php
include('conn.php');

if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $month = $_POST['month'];
    $B_salary = $_POST['B-salary'];
    $Deductions=$_POST['Deductions'];
    $NetSalary=$_POST['NetSalary'];
    $hiredate=$_POST['hiredate'];
    $insert = mysqli_query($conn, "INSERT INTO employees(e_id, `month`, B_salary,Deductions,NetSalary) VALUES('$e_id', '$month', '$B_salary','$Deductions','$NetSalary')");

    if ($insert) {
        echo "<script> alert('Employee recorded successfully'); window.location.href='select.php'; </script>";
    } else {
        echo "Failed to record employee";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Mn</title>
</head>
<body>
    <form action="" method="post">
        First Name: <input type="text" name="f_name" required> <br>
        LastName: <input type="text" name="l_name" required> <br>
        position: <input type="text" name="position" required> <br>
        Salary: <input type="text" name="salary" required> <br>
        Hired Date: <input type="date" name="hiredate" required> <br>
        <button name="add">Register</button>
    </form> 
</body>
</html>
