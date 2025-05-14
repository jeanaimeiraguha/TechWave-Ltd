<!DOCTYPE html>
<html lang="en">
<head>
         <link rel="stylesheet" href="css/bootstrap.min.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <div class="mt-4 container">
     <a href="insert.php" class="btn btn-primary mb-3">Record New</a>
     <table border="2" class="table table-sm table-bordered table-striped">
        
     <thead class="table-dark">
     <tr>
               <th>Employee id</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Position</th>
               <th>Salary</th>
               <th>Hire Date</th>
               <th colspan="2">Operations</th>
          </tr>
</thead>
          <?php
          include('conn.php');

          $select=mysqli_query($conn,"SELECT * FROM employees");
          while($row=mysqli_fetch_array($select)){
          ?>
          <tr>
               <td><?php echo $row['e_id']?></td>
               <td><?php echo $row['f_name']?></td>
               <td><?php echo $row['l_name']?></td>
               <td><?php echo $row['position']?></td>
               <td><?php echo $row['salary']?></td>
               <td><?php echo $row['hiredate']?></td>
               <td><a href="update.php?e_id=<?php echo $row['e_id']?>" class=" btn btn-success">Edit</a></td>
               <td><a href="delete.php?e_id=<?php echo $row['e_id']?>" class=" btn btn-danger">Delete</a></td>
          </tr>
          <?php
          }
          ?>
     </table>
     </div>
</body>
</html>