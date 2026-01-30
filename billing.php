<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Billing & Payment</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-image: url('billing.jpg');  
      background-size: cover;
      font-family: Arial, sans-serif;
    }
    .container {
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      width: 400px;
      margin: 50px auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    input, select, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    button {
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
    nav a {
      margin-left: 20px;
      display: inline-block;
      margin-bottom: 20px;
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body>
  <nav><a href="home.php">← Back to Home</a></nav>
  <div class="container">
    <h1>Billing & Payment Processing</h1>
    <form action="billing1.php" method="post">
      <input type="text" placeholder="Patient ID" name="patientId" required>
      <input type="text" placeholder="Services" name="Services" required>
      <input type="number" placeholder="Amount" name="Amount" required min="1" step="0.01">
      <select name="PaymentMethod" required>
        <option value="">Select Payment Method</option>
        <option value="Cash">Cash</option>
        <option value="M-Pesa">M-Pesa</option>
      </select>
      <input type="tel" placeholder="Phone Number (2547XXXXXXXX)" name="PhoneNumber" required pattern="254[0-9]{9}">
      <button type="submit">Process Payment</button>
    </form>
  </div>
</body>
</html>
