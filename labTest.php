<?php
// Get values from form
$results = $_POST['Results'];
$samples = $_POST['Samples'];



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
$sql = "INSERT INTO labtest (Results,Samples) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $results , $samples,);

if ($stmt->execute()) {
    echo "Labtest Saved Succesfully!";
    echo'<br>';
     echo'<br>';
    echo "
<!DOCTYPE html>
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
    <h3>✅ Labtest Saved Successfully!</h3>
    <br>
    <a href='lab-tests.php'>← Go back</a>
</body>
</html>
";
    
       
} else {
    echo "Error: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>