<?php
include('conn.php');

if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $B_Salary = $_POST['B_salary']; 
    $Deductions = $_POST['Deductions'];
    $NetSalary = $_POST['NetSalary'];

  
    $insert = mysqli_query($conn, "INSERT INTO payroll (e_id, B_Salary, Deductions, NetSalary) VALUES ('$e_id', '$B_Salary', '$Deductions', '$NetSalary')");

    if ($insert) {
        echo "<script> alert('Payroll recorded successfully'); window.location.href='select.php'; </script>";
    } else {
        echo "Failed to record: " . mysqli_error($conn); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
</head>
<body>
    <form action="" method="post">
        Employee Id: <input type="text" name="e_id" required> <br>
        Base Salary: <input type="text" name="B_salary" required> <br>
        Deductions: <input type="text" name="Deductions" required> <br>
        Net Salary: <input type="text" name="NetSalary" required> <br>
        <button name="add">Register</button>
    </form> 
</body>
</html>

