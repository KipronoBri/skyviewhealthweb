<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkyviewHealth - Register</title>
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
    h2 {
      text-align: center;
      font-size : 32px;
      color : white
      
    }
    input[type="text"],
    input[type="email"],
    input[type="password"]
     {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    .message {
      text-align: center;
      color: #f44336;
      font-size: 14px;
      margin-top: 10px;
    }
    .success {
      color: green;
    }
    .link {
      text-align: center;
      margin-top: 15px;
    }
    .link a {
      color: #4CAF50;
      text-decoration: none;
    }
    .confirm{}
    
  </style>
</head>
<body>

  <div class="container">
    <h2>REGISTRATION</h2>

    <form action="register.php" method="post" >
      <input type="text" id="name" placeholder="Full Name" required name="name"><br>
      <input type="email" id="email" placeholder="Email" required name="email"><br>
      <input type="password" id="password" placeholder="Password" required name="password"><br>
      <input class="confirm" type="confirm password" id="confirmPassword" placeholder="confirm password" required name="confirm"><br>
     

      <button type="submit">Register</button>
    </form>

    <div class="message" id="message"></div>

    <div class="link">
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
  </div>

  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      if (password !== confirmPassword) {
        document.getElementById('message').textContent = 'Passwords do not match!';
        document.getElementById('message').classList.remove('success');
        return;
      }

      // Simulate saving the data (normally, you'd use a backend API here)
      localStorage.setItem('user', JSON.stringify({ name, email, password }));

      document.getElementById('message').textContent = 'Registration successful!';
      document.getElementById('message').classList.add('success');
      
      // After a delay, redirect to login page
      setTimeout(() => {
        window.location.href = 'login.html';
      }, 2000);
    });
  </script>

</body>
</html>