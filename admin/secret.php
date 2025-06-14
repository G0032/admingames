<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secret Admin Page</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', monospace;
            text-align: center;
            padding: 100px;
        }
        .secret {
            font-size: 24px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }
    </style>
</head>
<body>
    <div class="secret">
        <h1>Admin Secret Found!</h1>
        <h2>Flag{You_are_now_an_admin_boss}<h2>
        <p>You have successfully bypassed the security measures.</p>
        <p>Congratulations on completing the challenge!</p>
    </div>
</body>
</html>
