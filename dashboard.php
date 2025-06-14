<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', monospace;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #0f0;
            border-radius: 5px;
        }
        .message {
            margin: 20px 0;
            padding: 15px;
            background-color: #000;
            border: 1px solid #0f0;
        }
        .hint {
            color: #00ff00;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <div class="message">
            <p>System Message: Access granted to user level.</p>
            <p class="hint">Find the boss admin and see his secret...</p>
        </div>
        <p>Hint: Look for the hidden admin panel among the system directories.</p>
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
