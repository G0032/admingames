<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='kmu' AND password='kapasa' AND username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CTF Login</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', monospace;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 2px solid #0f0;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #000;
            border: 1px solid #0f0;
            color: #0f0;
        }
        button {
            background-color: #000;
            color: #0f0;
            border: 1px solid #0f0;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: #000;
            border-color: #00ff00;
        }
        .error {
            color: #f00;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>System Login</h1>
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
