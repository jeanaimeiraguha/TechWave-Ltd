<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Payroll Records</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <div class="container my-5">
          <h2 class="mb-4 text-center">Payroll Records</h2>
          <a href="insert.php" class="btn btn-primary mb-3">Record New</a>
          
          <table class="table table-striped table-bordered">
               <thead class="table-dark">
                    <tr>
                         <th>Employee ID</th>
                         <th>Month</th>
                         <th>Base Salary</th>
                         <th>Deductions</th>
                         <th>Net Salary</th>
                         <th colspan="2">Operations</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    include('conn.php');

                    $select = mysqli_query($conn, "SELECT * FROM payroll");
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <tr>
                         <td><?php echo $row['e_id']; ?></td>
                         <td><?php echo $row['month']; ?></td>
                         <td><?php echo $row['B_Salary']; ?></td>
                         <td><?php echo $row['Deductions']; ?></td>
                         <td><?php echo $row['NetSalary']; ?></td>
                         <td><a href="update.php?e_id=<?php echo $row['e_id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                         <td><a href="delete.php?e_id=<?php echo $row['e_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php
                    }
                    ?>
               </tbody>
          </table>
     </div>
     
     <!-- Bootstrap JS (Optional) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
