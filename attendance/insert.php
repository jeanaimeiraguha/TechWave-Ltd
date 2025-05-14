<?php
include('conn.php');

if (isset($_POST['add'])) {
    $e_id = $_POST['e_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    
    $insert = mysqli_query($conn, "INSERT INTO attendance(e_id, `date`, `status`) VALUES('$e_id', '$date', '$status')");

    if ($insert) {
        echo "<script>alert('Attendance recorded successfully'); window.location.href='select.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to record attendance. Please try again.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Attendance Registration</h2>
    
    <form action="" method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="e_id" class="form-label">Employee ID:</label>
            <input type="text" name="e_id" id="e_id" class="form-control" placeholder="Enter Employee ID" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">Select Status</option>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Leave">Leave</option>
            </select>
        </div>

        <button type="submit" name="add" class="btn btn-primary w-100">Register</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
