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
    <title>Update Payroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Update Payroll</h2>
    
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="e_id" class="form-label">Employee ID:</label>
            <input type="text" name="e_id" id="e_id" class="form-control" required value="<?php echo $row['e_id']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="month" class="form-label">Month:</label>
            <input type="text" name="month" id="month" class="form-control" required value="<?php echo $row['month']; ?>">
        </div>

        <div class="mb-3">
            <label for="B_salary" class="form-label">Base Salary:</label>
            <input type="text" name="B_salary" id="B_salary" class="form-control" required value="<?php echo $row['B_Salary']; ?>">
        </div>

        <div class="mb-3">
            <label for="Deductions" class="form-label">Deductions:</label>
            <input type="text" name="Deductions" id="Deductions" class="form-control" required value="<?php echo $row['Deductions']; ?>">
        </div>

        <div class="mb-3">
            <label for="NetSalary" class="form-label">Net Salary:</label>
            <input type="text" name="NetSalary" id="NetSalary" class="form-control" required value="<?php echo $row['NetSalary']; ?>">
        </div>

        <button type="submit" name="add" class="btn btn-primary w-100">Update Payroll</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
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
        echo "<div class='alert alert-danger'>Failed to update record: " . mysqli_error($conn) . "</div>";
    }
}
?>
