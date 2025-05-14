<?php
include('conn.php');

$e_id = $_GET['e_id'];
$select = mysqli_query($conn, "SELECT * FROM employees WHERE e_id='$e_id'");
$row = mysqli_fetch_assoc($select);

if (isset($_POST['update'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hiredate = $_POST['hiredate'];

    $update = mysqli_query($conn, "UPDATE employees SET f_name='$f_name', l_name='$l_name', position='$position', hiredate='$hiredate', salary='$salary' WHERE e_id='$e_id'");

    if ($update) {
        echo "<script>alert('Employee updated successfully'); window.location.href='select.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to update employee. Please try again.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Update Employee</h2>
    
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="f_name" class="form-label">First Name:</label>
            <input type="text" name="f_name" id="f_name" class="form-control" value="<?php echo $row['f_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="l_name" class="form-label">Last Name:</label>
            <input type="text" name="l_name" id="l_name" class="form-control" value="<?php echo $row['l_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input type="text" name="position" id="position" class="form-control" value="<?php echo $row['position']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary:</label>
            <input type="text" name="salary" id="salary" class="form-control" value="<?php echo $row['salary']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="hiredate" class="form-label">Hired Date:</label>
            <input type="date" name="hiredate" id="hiredate" class="form-control" value="<?php echo $row['hiredate']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary w-100">Update Employee</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
