<?php
// Get values from form
$email = $_POST['Email'];
$password = $_POST['Password'];

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

// Prepare and execute the SQL query
$sql = "SELECT * FROM Register WHERE Email = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if login is successful
if ($result->num_rows === 1) {
    echo "Login successful!";
    header("Location: student.php");
} else {
    echo "Invalid email or password.";
}

$stmt->close();
$conn->close();
?>
