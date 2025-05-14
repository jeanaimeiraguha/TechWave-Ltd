<?php
include('conn.php');

if (isset($_GET['e_id'])) {
    $e_id = $_GET['e_id'];
    $select = mysqli_query($conn, "SELECT * FROM attendance WHERE e_id='$e_id'");
    $row = mysqli_fetch_assoc($select);
}

if (isset($_POST['update'])) {
    $e_id = $_POST['e_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $update = mysqli_query($conn, "UPDATE attendance SET `date`='$date', `status`='$status' WHERE e_id='$e_id'");

    if ($update) {
        echo "<script>alert('Attendance record updated successfully'); window.location.href='select.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Update failed. Please try again.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Update Attendance</h2>

    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="e_id" class="form-label">Employee ID:</label>
            <input type="text" name="e_id" id="e_id" class="form-control" required value="<?php echo $row['e_id']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required value="<?php echo $row['date']; ?>">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Present" <?php echo ($row['status'] == 'Present') ? 'selected' : ''; ?>>Present</option>
                <option value="Absent" <?php echo ($row['status'] == 'Absent') ? 'selected' : ''; ?>>Absent</option>
                <option value="Leave" <?php echo ($row['status'] == 'Leave') ? 'selected' : ''; ?>>Leave</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
