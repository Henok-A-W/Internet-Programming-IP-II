<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// SQL to create the registration table with an additional field for the file path
$sql = "CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    gender ENUM('m', 'f') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    number VARCHAR(15) NOT NULL,
    file_path VARCHAR(255) NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'registration' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $number = $conn->real_escape_string($_POST['number']);

    // File upload
    $filePath = "";
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['fileToUpload']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath)) {
                $filePath = $targetFilePath;
                echo "File uploaded successfully.<br>";
            } else {
                echo "Error uploading file.<br>";
            }
        } else {
            echo "Only JPG, JPEG, PNG, GIF, & PDF files are allowed.<br>";
        }
    }

    // Insert registration details into the database
    $sql = "INSERT INTO registration (firstName, lastName, gender, email, password, number, file_path) 
            VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$number', '$filePath')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
