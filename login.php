<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else { $error = "Incorrect password"; }
    } else { $error = "User not found"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>DormFund - Login</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Arial; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display:flex; justify-content:center; align-items:center; 
            height:100vh; margin:0;
        }
        .box { 
            background:white; padding:40px; border-radius:15px; 
            box-shadow:0 10px 30px rgba(0,0,0,0.2); width:380px; 
        }
        h2 { text-align:center; color:#333; margin-bottom:25px; }
        input { 
            width:100%; padding:12px 15px; margin:10px 0; 
            border:1px solid #ddd; border-radius:8px; font-size:14px;
        }
        input:focus { border-color:#667eea; outline:none; }
        button { 
            width:100%; padding:12px; background:#667eea; 
            color:white; border:none; border-radius:8px; 
            cursor:pointer; font-weight:bold; font-size:15px; margin-top:10px;
        }
        button:hover { background:#5a67d8; }
        .test { text-align:center; font-size:13px; color:#666; margin-top:15px; }
    </style>
</head>
<body>
<div class="box">
    <h2>🏠 DormFund Login</h2>
    <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <p class="test">Test: <b>admin</b> / <b>password</b></p>
</div>
</body>
</html>