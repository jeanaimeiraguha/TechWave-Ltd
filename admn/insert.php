<?php
include('conn.php');

if (isset($_POST['add'])) {
$name=$_POST['name'];
$password=$_POST['password'];

$insert=mysqli_query($conn,"INSERT INTO admin(id,`name`,`password`)VALUES('','$name','$password')");

if($insert){
     echo "<script> alert('Admin inserted successfully')</script>";
     header('location:login.php');
}
else{
echo "failed";
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
    <form action="" method="post">

 Name:<input type="text" name="name" required> <br>
Password:<input type="password" name="password" required> <br>
<button name="add">Register</button>
</form> 
</body>
</html>