<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - SkyviewHealth</title>
  <link rel="stylesheet" href="css/style.css">
<style>
body {
      font-family: Arial, sans-serif;
      background-color: #f4f7fc;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: rgb(82, 82, 211);
      padding: 500px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    h1{
      text-align: center;
      font-size : 32px;
      color : white
      
    }
</style>
</head>
<body>
  <div class="container">
    <h1>LOGIN TO SKYVIEWHEALTH</h1>
    <form action="loginp.php" method="post">
      <input type="text" placeholder="Email" required name ="Email"><br>
      <input type="password" placeholder="Password" required name ="Password"><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>