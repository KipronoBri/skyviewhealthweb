<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Appointment Scheduling</title>
  <link rel="stylesheet" href="css/style.css">
  <style>

    body{
      background-image: url(appointment.jpg);
    }
  </style>
</head>
<body>
  <nav><a href="home.php">← Back to Home</a></nav>
  <div class="container">
    <h1>Appointment Scheduling</h1>
    <form action="appointment1.php" method ="post">
      <input type="date" placeholder="Date" required name ="Date"><br>
      <input type="text" placeholder="Doctor" required name ="Doctor" ><br>
      <textarea placeholder="Reason for visit" required name ="Reason" ></textarea><br>
      <button type="submit">Schedule Appointment</button>
    </form>
  </div>
</body>
</html>