<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>DormFund - Dashboard</title>
    <style>
        body{font-family:Arial;background:#f0f2f5;padding:20px}
        .box{background:white;padding:20px;border-radius:10px;max-width:600px;margin:auto}
        a{color:red;text-decoration:none}
    </style>
</head>
<body>
<div class="box">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Login successful</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>