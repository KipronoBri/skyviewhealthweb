<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor's Consultation</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
   background-image: url(doctor.jpg);
     
    }
  </style>
</head>
<body>
  <nav><a href="home.php">← Back to Home</a></nav>
  <div class="container">
    <h1>Doctor's Consultation</h1>
    <form>
       <textarea placeholder="PaientID" name ="PatientID" required></textarea><br>
      <textarea placeholder="Patient History" name ="PatientHistory" required></textarea><br>
      <textarea placeholder="Symptoms" name ="Symptoms" required></textarea><br>
      <textarea placeholder="Diagnosis Notes" name ="Notes" required></textarea><br>
      <button type="submit">Save Consultation</button>
    </form>
  </div>
</body>
</html>