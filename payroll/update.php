<?php
include('conn.php');

$e_id = $_GET['e_id'];
$select = mysqli_query($conn, "SELECT * FROM payroll WHERE e_id='$e_id'");
$row = mysqli_fetch_array($select);
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
        Employee Id: <input type="text" name="e_id" required value="<?php echo $row['e_id']; ?>"> <br>
        Month: <input type="text" name="month" required value="<?php echo $row['month']; ?>"> <br>
        Base Salary: <input type="text" name="B_salary" required value="<?php echo $row['B_Salary']; ?>"> <br>
        Deductions: <input type="text" name="Deductions" required value="<?php echo $row['Deductions']; ?>"> <br>
        Net Salary: <input type="text" name="NetSalary" required value="<?php echo $row['NetSalary']; ?>"> <br>
        <button type="submit" name="add">Update</button>
    </form> 
</body>
</html>

<?php
if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $month = $_POST['month'];
    $B_Salary = $_POST['B_salary']; 
    $Deductions = $_POST['Deductions'];
    $NetSalary = $_POST['NetSalary'];

    $update = mysqli_query($conn, "UPDATE payroll SET month='$month', B_Salary='$B_Salary', Deductions='$Deductions', NetSalary='$NetSalary' WHERE e_id='$e_id'");
    
    if ($update) {
        echo "<script>alert('Payroll updated successfully'); window.location.href='select.php';</script>";
    } else {
        echo "Failed to update record: " . mysqli_error($conn); 
    }
}
?>
