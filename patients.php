<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 420px;
            background: #fff;
            margin: 60px auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Patient</h2>

    <form action="patients1.php" method="POST">

        <label>Full Name:</label>
        <input type="text" name="patientName" required>

        <label>Age:</label>
        <input type="number" name="age" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>

        <label>Phone Number:</label>
        <input type="text" name="phone" required>

        <label>Address:</label>
        <textarea name="address" rows="3" required></textarea>

        <label>Date of Birth:</label>
        <input type="date" name="dob" required>

        <button type="submit">Save Patient</button>

    </form>
</div>

</body>
</html>
