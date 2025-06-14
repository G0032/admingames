<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cracker Character</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', monospace;
            text-align: center;
            padding: 50px;
        }
        .character {
            font-size: 24px;
            animation: dance 2s infinite;
        }
        @keyframes dance {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="character">
        <h1>Cracker</h1>
        <p>Dancing in the matrix...</p>
    </div>
</body>
</html>
