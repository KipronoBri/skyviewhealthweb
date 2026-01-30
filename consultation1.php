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
$PatientID = (int) $_POST['PatientID'];
$patientHistory = $_POST['PatientHistory'];
$symptoms = $_POST['Symptoms'];
$notes = $_POST['Notes'];

// PREPARE INSERT STATEMENT
$sql = "INSERT INTO Consultation1 (PatientID, patientHistory, symptoms, DiagnosisNotes)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $PatientID, $patientHistory, $symptoms, $notes);

// EXECUTE
if ($stmt->execute()) {
    echo "<h3>Consultation Saved Successfully!</h3>";
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
