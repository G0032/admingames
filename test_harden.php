<?php
require_once 'config.php';

// Test regular login
$username = 'kmu';
$password = 'kapasa';
$sql = "SELECT * FROM users WHERE username='kmu' AND password='kapasa' AND username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Regular login successful!\n";
} else {
    echo "Regular login failed.\n";
}

// Test SQL injection
$username = "kmu' OR '1'='1";
$password = "anything";
$sql = "SELECT * FROM users WHERE username='kmu' AND password='kapasa' AND username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "SQL Injection successful!\n";
} else {
    echo "SQL Injection failed.\n";
}

// Test admin login
$username = 'admin';
$password = 'gabacho';
$sql = "SELECT * FROM users WHERE username='admin' AND password='gabacho' AND role='admin' AND username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Admin login successful!\n";
} else {
    echo "Admin login failed.\n";
}

// Test admin SQL injection
$username = "admin' OR '1'='1";
$password = "anything";
$sql = "SELECT * FROM users WHERE username='admin' AND password='gabacho' AND role='admin' AND username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Admin SQL Injection successful!\n";
} else {
    echo "Admin SQL Injection failed.\n";
}
?>
