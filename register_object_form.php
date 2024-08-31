<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Object Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        textarea,
        input[type="text"] {
            width: calc(100% - 20px);
            max-width: 400px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Register Object Found</h2>
    <form action="register_object.php" method="POST">
        <label for="specification">Object Specification:</label><br>
        <textarea id="specification" name="specification" rows="4" cols="50" required></textarea><br>
        <label for="mobile">Mobile Number:</label><br>
        <input type="text" id="mobile" name="mobile" required><br><br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <a href="object.php">Home</a>
</body>
</html>
