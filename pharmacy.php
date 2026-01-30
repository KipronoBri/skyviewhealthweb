<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pharmacy & Prescription</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
   background-image: url(pharmacy.jpg);  
    }
  </style>
</head>
<body>
  <nav><a href="Home.php">← Go Back</a></nav>
  <div class="container">
    <h1>Pharmacy & Prescription Management</h1>
    <form action ="pharmacy1.php" method="post">
      <textarea placeholder="Prescription Details" name ="Prescription" required></textarea><br>
      <input type="text" placeholder="Patient ID" name ="PatientID" required><br>
      <button type="submit">Submit Prescription</button>
    </form>
  </div>
</body>
</html>