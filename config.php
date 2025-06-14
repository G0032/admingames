<?php
$host = 'localhost';
$dbname = 'ctf_db';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
    
    // Create users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        role ENUM('user', 'admin') DEFAULT 'user'
    )";
    
    if ($conn->query($sql) === TRUE) {
        // Insert default users
        $sql = "INSERT INTO users (username, password, role) 
                VALUES 
                ('kmu', 'kapasa', 'user'),
                ('admin', 'gabacho', 'admin')";
        $conn->query($sql);
    }
}
?>
