

<?php
include('conn.php');
$e_id=$_GET['e_id'];

$select=mysqli_query($conn,"SELECT * FROM employees where e_id='$e_id'");
$row=mysqli_fetch_array($select);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Mn</title>
</head>
<body>
    <form action="" method="post">
        First Name: <input type="text" name="f_name" required value="<?php echo $row['f_name']?>"> <br>
        LastName: <input type="text" name="l_name" required value="<?php echo $row['l_name']?>"> <br>
        position: <input type="text" name="position" required value="<?php echo $row['position']?>"> <br>
        Salary: <input type="text" name="salary" required value="<?php echo $row['salary']?>"> <br>
        Hired Date: <input type="date" name="hiredate" required> <br>
        <button name="add">Update</button>
    </form> 
</body>
</html>
<?php
include('conn.php');

if (isset($_POST['add'])) {
//     $e_id = $_POST['e_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $hiredate=$_POST['hiredate'];
    $insert = mysqli_query($conn, "UPDATE employees SET f_name='$f_name', l_name='$l_name',position='$position',hiredate='$hiredate',salary='$salary' where e_id='$e_id'");

    if ($insert) {
        echo "<script> alert('Employee updated successfully'); window.location.href='select.php'; </script>";
    } else {
        echo "Failed to record employee";
    }
}
?>
