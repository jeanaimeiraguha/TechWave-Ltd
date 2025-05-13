<?php
include('conn.php');
$id=$_GET['id'];
$delete=mysqli_query($conn,"DELETE FROM admin where id='$id'");
if($delete){
     echo "<script>alert('Admin deleted successfully')</script>";
     header('location:select.php');
}
else{

     echo "failed";
}



?>