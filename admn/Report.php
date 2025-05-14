<?php
include('conn.php');

if (isset($_POST['generate_salary_slip'])) {
    if (isset($_POST['e_id'])) {
        $e_id = $_POST['e_id'];
        $month = $_POST['month'];

        $sql = "SELECT * FROM Payroll WHERE e_id = '$e_id' AND Month = '$month'";
        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $slip = mysqli_fetch_assoc($result);
            echo '<div class="alert alert-info"><h3>Salary Slip for ' . $month . '</h3>';
            echo '<p>Employee ID: ' . $e_id . '</p>';
            echo '<p>Base Salary: ' . $slip['B_Salary'] . '</p>';
            echo '<p>Deductions: ' . $slip['Deductions'] . '</p>';
            echo '<p>Net Salary: ' . $slip['NetSalary'] . '</p></div>';
        } else {
            echo '<div class="alert alert-warning"><p>No payroll data found for this employee and month.</p></div>';
        }
    } else {
        echo '<div class="alert alert-danger"><p>Employee ID is missing!</p></div>';
    }
}

if (isset($_POST['generate_performance_report'])) {
    if (isset($_POST['e_id'])) {
        $e_id = $_POST['e_id'];

        $sql = "SELECT COUNT(*) AS TotalDays, SUM(CASE WHEN Status = 'Present' THEN 1 ELSE 0 END) AS PresentDays FROM Attendance WHERE e_id = '$e_id'";
        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $report = mysqli_fetch_assoc($result);
            $totalDays = $report['TotalDays'];
            $presentDays = $report['PresentDays'];
            $attendanceRate = ($presentDays / $totalDays) * 100;

            echo '<div class="alert alert-info"><h3>Performance Report</h3>';
            echo '<p>Employee ID: ' . $e_id . '</p>';
            echo '<p>Total Working Days: ' . $totalDays . '</p>';
            echo '<p>Days Present: ' . $presentDays . '</p>';
            echo '<p>Attendance Rate: ' . number_format($attendanceRate, 2) . '%</p></div>';
        } else {
            echo '<div class="alert alert-warning"><p>No attendance data found for this employee.</p></div>';
        }
    } else {
        echo '<div class="alert alert-danger"><p>Employee ID is missing!</p></div>';
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Generate Reports</h1>

    <form method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="e_id" class="form-label">Employee ID:</label>
            <input type="text" name="e_id" id="e_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="month" class="form-label">Month (For Salary Slip):</label>
            <input type="text" name="month" id="month" class="form-control">
        </div>

        <button type="submit" name="generate_salary_slip" class="btn btn-primary w-100 mb-2">Generate Salary Slip</button>
        <button type="submit" name="generate_performance_report" class="btn btn-secondary w-100">Generate Performance Report</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
