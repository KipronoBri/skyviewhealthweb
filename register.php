<?php
// Get values from form
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];


// DB connection settings
$servername = "localhost";
$dbname = "Skyviewhealth";
$dbuser = "root";
$dbpass = "";

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare & insert
$sql = "INSERT INTO Register (name,email,password) VALUES (?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password );

if ($stmt->execute()) {
    echo "User registered successfully proceed to log in!";
        header("Location: login.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>->close();
?>
