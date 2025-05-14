<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Attendance Records</h1>
        
        <a href="insert.php" class="btn btn-success mb-3">Record New</a>
        
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $select = mysqli_query($conn, "SELECT * FROM attendance");
                while($row = mysqli_fetch_array($select)){
                ?>
                    <tr>
                        <td><?php echo $row['e_id']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="update.php?e_id=<?php echo $row['e_id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                        <td><a href="delete.php?e_id=<?php echo $row['e_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
