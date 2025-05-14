<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Wave</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>


*{
    font-family: "poppins";
    padding: 0;
/* margin: 15px auto; */

}


        body {
            background-image: url('https://i.pinimg.com/originals/c6/ad/2e/c6ad2ec1fbc13a378d668b5c58a427ed.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8) !important;
            border-bottom: 2px solid #007bff;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: #007bff !important;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff !important;
        }
        .welcome-text {
            margin-top: 200px;
            text-align: center;
           
            padding: 40px;
            border-radius: 15px;
            color: #fff;
        }
    </style>
</head>
<body>
<?php
session_start();
include('conn.php');
if (isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
}
?>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tech Wave</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../attendance/select.php">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../employee/select.php">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../payroll/select.php">Payroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admn/select.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container welcome-text  fw-bold">
    <h2>Welcome, <?php echo $_SESSION['name']; ?> to Tech Wave!</h2>
    <p class="text-center " style="font-size: 17px;">Explorer The Greatest Moment Here</p>
</div>

<footer  style="margin-top: 274px;" class="text-center bg-dark p-2">
    &copy; 2025  Programmed By Jean Aime IRAGUHA
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>