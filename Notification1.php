<?php
// Get values from form
$appointmentReminders = $_POST['AppointmentReminders'];
$billingAlerts = $_POST['BillingAlerts'];

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
$sql = "INSERT INTO notification (AppointmentReminders, BillingAlerts) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ss", $appointmentReminders, $billingAlerts);

if ($stmt->execute()) {
    echo "<div style='
        background-color: #d4edda; 
        color: #155724; 
        border: 1px solid #c3e6cb; 
        padding: 15px; 
        border-radius: 5px; 
        width: 400px; 
        margin: 50px auto; 
        text-align: center;
        font-family: Arial, sans-serif;
    '>
        <strong>Success:</strong> Notification saved successfully!<br><br>
        <a href='home.php' style='
            text-decoration: none; 
            color: #fff; 
            background-color: #28a745; 
            padding: 8px 15px; 
            border-radius: 4px;
            display: inline-block;
        '>← Go Home</a>
    </div>";
} else {
    echo "<div style='
        background-color: #f8d7da; 
        color: #721c24; 
        border: 1px solid #f5c6cb; 
        padding: 15px; 
        border-radius: 5px; 
        width: 400px; 
        margin: 50px auto; 
        text-align: center;
        font-family: Arial, sans-serif;
    '>
        <strong>Error:</strong> " . $stmt->error . "
    </div>";
}

$stmt->close();
$conn->close();
?>
