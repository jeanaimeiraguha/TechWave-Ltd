<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <a href="insert.php">Add New Admin</a>
     <table border="2">
          <tr>
               <th>Id</th>
               <th>Username</th>
               <th>Password</th>
               <th colspan="2">Operations</th>
          </tr>
          <?php
          include('conn.php');

          $select=mysqli_query($conn,"SELECT * FROM admin");
          while($row=mysqli_fetch_array($select)){
          ?>
          <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['name']?></td>
               <td><?php echo $row['password']?></td>
               <td><a href="update.php?id=<?php echo $row['id']?>">Edit</a></td>
               <td><a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
          </tr>
          <?php
          }
          ?>
     </table>
</body>
</html>