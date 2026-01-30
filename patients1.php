<?php
// CONNECT TO DATABASE
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Skyviewhealth";  // change to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// RECEIVE FORM DATA
$patientName = $_POST['patientName'];
$age         = $_POST['age'];
$gender      = $_POST['gender'];
$phone       = $_POST['phone'];
$address     = $_POST['address'];
$dob         = $_POST['dob'];

// PREPARE INSERT STATEMENT
$sql = "INSERT INTO Patient (PatientName, Age, Gender, Phone, Address, DOB)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sissss", $patientName, $age, $gender, $phone, $address, $dob);

// EXECUTE
if ($stmt->execute()) {
    echo "<h3>Patient Saved Successfully!</h3>";
    echo "<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h3>✅ Patient Saved Successfully!</h3>
    <br>
    <a href='Home.php'>← Go back</a>
</body>
</html>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
