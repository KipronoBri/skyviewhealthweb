<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notifications & Alerts</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
   background-image: url(notification.png);
     
    }
  </style>
</head>
<body>
  <nav><a href="home.html">← Back to Home</a></nav>
  <div class="container">
    <h1>Notifications & Alerts</h1>
    <form action="notification1.php" method="post">
      <textarea placeholder="Appointment Reminders" required name ="AppointmentReminders"></textarea><br>
      <textarea placeholder="Billing Alerts" required name ="BillingAlerts"></textarea><br>
      <button type="submit">Save Notifications</button>
    </form>
  </div>
</body>
</html>