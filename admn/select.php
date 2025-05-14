<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Admin Management</h1>
        
        <a href="insert.php" class="btn btn-primary mb-3">Add New Admin</a>
        
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <!-- <th colspan="2">Operations</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $select = mysqli_query($conn, "SELECT * FROM admin");
                while($row = mysqli_fetch_array($select)){
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <!-- <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td> -->
                        <!-- <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td> -->
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
