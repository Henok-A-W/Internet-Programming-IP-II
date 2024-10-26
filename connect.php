<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// SQL to create the registration table
$sql = "CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    gender ENUM('m', 'f') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    number VARCHAR(15) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'registration' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>