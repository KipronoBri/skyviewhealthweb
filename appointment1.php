<?php
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

// Get values from form
$date = $_POST['Date'];
$doctor = $_POST['Doctor'];
$reasonForVist = $_POST['Reason'];
// Prepare & insert
$sql = "INSERT INTO Appointment (Doctor,ReasonForVisit,Date) VALUES (?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $doctor , $reasonForVist, $date );

if ($stmt->execute()) {
    echo "Appointment Booked Succesfully!";
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
    <h3>✅ Appointment Booked Successfully!</h3>
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