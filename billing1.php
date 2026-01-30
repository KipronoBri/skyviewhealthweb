<?php
// Get values from form
$patientID = $_POST['patientId'];
$services = $_POST['Services'];
$amount = $_POST['Amount'];
$paymentMethod = $_POST['PaymentMethod'];
$phoneNumber = $_POST['PhoneNumber']; // Add phone number input on your form

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
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    '>
    <strong>Error:</strong> Patient with ID above does not exist!<br><br>
    <a href='billing.php' style='
        text-decoration: none; 
        color: #fff; 
        background-color: #dc3545; 
        padding: 8px 15px; 
        border-radius: 4px;
        display: inline-block;
    '>← Go Back</a>
</div>";

    
    $checkStmt->close();
    $conn->close();
    exit(); // stop execution
}

$checkStmt->close();

// Insert billing record
$sql = "INSERT INTO Billing (PatientID,Services,Amount,PaymentMethod) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isds", $patientID , $services, $amount, $paymentMethod );

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
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    '>
    <strong>Success:</strong> Billing record created successfully!<br><br>
    <a href='billing.php' style='
        text-decoration: none; 
        color: #fff; 
        background-color: #28a745; 
        padding: 8px 15px; 
        border-radius: 4px;
        display: inline-block;
    '>← Go Back</a>
</div>";


    // Only trigger STK Push if PaymentMethod is M-Pesa
    if(strtolower($paymentMethod) == "mpesa") {
        // Daraja API credentials
        $consumerKey = "Yn6RJ7opoeqifr7XF4asEhpP3ec1ybXwBxSLA5uRgt3xXOrE";
        $consumerSecret = "a1FhlH146mC01rYueuFoGuAoGklpciLXDAaDqkOpttuUgf3OoVfKUd23XWGmAFyI";
        $shortCode = "6389544"; // Your till/shortcode
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"; // Daraja API passkey
        $callbackURL = "https://mydomain.com/mpesa-express-simulate/"; // Replace with your callback URL

        // Get access token
        $credentials = base64_encode($consumerKey . ":" . $consumerSecret);
        $token_url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic $credentials"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $token = json_decode($result)->access_token;

        // Prepare STK push payload
        $timestamp = date('YmdHis');
        $password = base64_encode($shortCode . $passkey . $timestamp);

        $stk_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

        $curl_post_data = [
            "BusinessShortCode" => $shortCode,
            "Password" => $password,
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $amount,
            "PartyA" => $phoneNumber,
            "PartyB" => $shortCode,
            "PhoneNumber" => $phoneNumber,
            "CallBackURL" => $callbackURL,
            "AccountReference" => $patientID,
            "TransactionDesc" => $services
        ];

        $data_string = json_encode($curl_post_data);

        $ch = curl_init($stk_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response, true);
        if(isset($res['ResponseCode']) && $res['ResponseCode'] == "0"){
            echo "STK Push sent successfully! Check your phone to complete payment.";
        } else {
            echo "STK Push failed: " . json_encode($res);
        }
    }

    
} else {
    echo "Payment Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
