<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Codes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            padding: 20px;
            text-align: center;
            background-image:url('Student.jpg');
        }

        table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        caption {
            caption-side: top;
            margin-bottom: 10px;
            font-size: 1.2em;
            font-weight: bold;
        }

        .home-button {
            margin-top: 20px;
        }

        .home-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .home-button button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <table>
        <caption><h1>SKYVIEWHEALTH DEVELOPERS</h1></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Unique Code</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kiprono Brian Chepkwony</td>
                <td>COM/047/23</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ian Kigen Bett</td>
                <td>COM/030/23</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kipsang Kibiwott Justus</td>
                <td>COM/028/23</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Kevin Kipkoech </td>
                <td>COM/031/23</td>
            </tr>
        </tbody>
    </table>

    <div class="home-button">
        <button onclick="location.href='Home.php'">Go to Home Page</button>
    </div>

</body>
</html>
