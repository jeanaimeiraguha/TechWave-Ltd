<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Wave</title>
</head>
<body>
<?php
session_start();
include('conn.php');
if (isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
}
?>
<h2>Welcome  <?php echo $_SESSION['name']; ?></h2>  
<a href="logout.php">Logout</a>
</body>
</html>
