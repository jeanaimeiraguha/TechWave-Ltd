<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <a href="insert.php">Record New</a>
     <table border="2">
          <tr>
               <th>Employee id</th>
               <th>Date</th>
               <th>status</th>
               <th colspan="2">Operations</th>
          </tr>
          <?php
          include('conn.php');

          $select=mysqli_query($conn,"SELECT * FROM attendance");
          while($row=mysqli_fetch_array($select)){
          ?>
          <tr>
               <td><?php echo $row['e_id']?></td>
               <td><?php echo $row['date']?></td>
               <td><?php echo $row['status']?></td>
               <td><a href="update.php?e_id=<?php echo $row['e_id']?>">Edit</a></td>
               <td><a href="delete.php?e_id=<?php echo $row['e_id']?>">Delete</a></td>
          </tr>
          <?php
          }
          ?>
     </table>
</body>
</html>