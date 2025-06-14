<?php
// This script will create 15 mock directories with character pages
$characters = [
    'ninja', 'hacker', 'cyber', 'matrix', 'terminal', 'binary',
    'cyberpunk', 'virus', 'worm', 'trojan', 'malware', 'botnet',
    'phisher', 'cracker', 'exploiter'
];

foreach ($characters as $char) {
    $dir = "system/$char";
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
        
        // Create character page
        $content = "<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>{$char} Character</title>
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
        <h1>{$char}</h1>
        <p>Dancing in the matrix...</p>
    </div>
</body>
</html>";
        
        file_put_contents("$dir/index.php", $content);
    }
}

// Create hidden admin directory
$adminDir = "system/admin";
if (!file_exists($adminDir)) {
    mkdir($adminDir, 0777, true);
    
    // Create admin login page
    $adminContent = "<?php
session_start();
require_once '../config.php';

if ($_SERVER[\"REQUEST_METHOD\"] == \"POST\") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Intentional SQL injection vulnerability
    $sql = \"SELECT * FROM users WHERE username='$username' AND password='$password' AND role='admin'\";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header(\"Location: secret.php\");
        exit();
    } else {
        $error = \"Invalid admin credentials\";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
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
        input[type=\"text\"], input[type=\"password\"] {
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
        .error {
            color: #f00;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <h1>Admin Login</h1>
        <?php if(isset($error)): ?>
            <div class=\"error\"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method=\"POST\" action=\"\">
            <input type=\"text\" name=\"username\" placeholder=\"Admin Username\" required>
            <input type=\"password\" name=\"password\" placeholder=\"Admin Password\" required>
            <button type=\"submit\">Login</button>
        </form>
    </div>
</body>
</html>";
    
    file_put_contents("$adminDir/index.php", $adminContent);
    
    // Create secret page
    $secretContent = "<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin'])) {
    header(\"Location: index.php\");
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
    <div class=\"secret\">
        <h1>Admin Secret Found!</h1>
        <p>You have successfully bypassed the security measures.</p>
        <p>Congratulations on completing the challenge!</p>
    </div>
</body>
</html>";
    
    file_put_contents("$adminDir/secret.php", $secretContent);
}

// Create logout script
$logoutContent = "<?php
session_start();
session_destroy();
header(\"Location: ../index.php\");
exit();
?>";
file_put_contents("logout.php", $logoutContent);

?>
