<?php
// Get values from form
$prescription = $_POST['Prescription'];
$patientID = $_POST['PatientID'];



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

// Check if PatientId exists first
$checkSql = "SELECT PatientID FROM Patient WHERE PatientID = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $patientID);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows == 0) {
 echo "
<!DOCTYPE html>
<html>
<head>
    <title>Patient Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }
        .error-box {
            max-width: 420px;
            margin: 100px auto;
            padding: 25px;
            text-align: center;
            background: #fff;
            border-left: 6px solid #dc3545;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 6px;
        }
        .error-box h3 {
            color: #dc3545;
            margin-bottom: 10px;
        }
        .error-box p {
            color: #555;
            margin-bottom: 20px;
        }
        .error-box a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: bold;
        }
        .error-box a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class='error-box'>
        <h3>❌ Patient Not Found</h3>
        <p>The Patient ID you entered does not exist in the system.</p>
        <a href='pharmacy.php'>← Go back</a>
    </div>
</body>
</html>
";
    
    $checkStmt->close();
    $conn->close();
    exit(); // stop execution
}

$checkStmt->close();

// If patient exists → insert into Pharmacy
$sql = "INSERT INTO Pharmacy (Prescription, PatientId) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $prescription, $patientID);

if ($stmt->execute()) {
   
   echo "
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }
        .success-box {
            max-width: 420px;
            margin: 100px auto;
            padding: 25px;
            text-align: center;
            background: #ffffff;
            border-left: 6px solid #28a745;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 6px;
        }
        .success-box h3 {
            color: #28a745;
            margin-bottom: 15px;
        }
        .success-box a {
            display: inline-block;
            margin: 8px;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-back {
            background-color: #007bff;
        }
        .btn-home {
            background-color: #6c757d;
        }
        .success-box a:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <div class='success-box'>
        <h3>✅ Prescription Issued & Saved Successfully!</h3>
        <a href='pharmacy.php' class='btn-back'>← Go Back</a>
        <a href='Home.php' class='btn-home'>🏠 Home</a>
    </div>
</body>
</html>
";

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

