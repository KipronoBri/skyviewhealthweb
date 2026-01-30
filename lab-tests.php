<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lab Test Management</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
   background-image: url(labtest.jpg);  
    }
  </style>
</head>
<body>
  <nav><a href="home.php">← Back to Home</a></nav>
  <div class="container">
    <h1>Lab Test Management</h1>
    <form action="labTest.php" method ="post">
      <textarea placeholder="Lab Test Results" name ="Results" required></textarea><br>
      <textarea placeholder="Samples" name ="Samples" required></textarea><br>
      <button type="submit">Submit Lab Info</button>
    </form>
  </div>
</body>
</html>