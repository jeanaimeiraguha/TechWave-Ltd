<?php
include('conn.php');

if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $month = $_POST['month'];
    $B_Salary = $_POST['B_salary']; 
    $Deductions = $_POST['Deductions'];
    $NetSalary = $_POST['NetSalary'];

    // Corrected the SQL INSERT statement
    $insert = mysqli_query($conn, "INSERT INTO payroll (e_id, `month`, B_Salary, Deductions, NetSalary) VALUES ('$e_id', '$month', '$B_Salary', '$Deductions', '$NetSalary')");

    if ($insert) {
        echo "<script>alert('Payroll recorded successfully'); window.location.href='select.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to record payroll: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payroll Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Payroll Registration</h2>
    
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="e_id" class="form-label">Employee ID:</label>
            <input type="text" name="e_id" id="e_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="month" class="form-label">Month:</label>
            <input type="text" name="month" id="month" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="B_salary" class="form-label">Base Salary:</label>
            <input type="text" name="B_salary" id="B_salary" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Deductions" class="form-label">Deductions:</label>
            <input type="text" name="Deductions" id="Deductions" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="NetSalary" class="form-label">Net Salary:</label>
            <input type="text" name="NetSalary" id="NetSalary" class="form-control" required>
        </div>

        <button type="submit" name="add" class="btn btn-primary w-100">Register Payroll</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
