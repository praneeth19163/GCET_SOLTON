<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'dt');
if (mysqli_connect_error()) {
    exit("Error connecting to Database");
}
if (isset($_POST["submit"])) {
    $name = $_SESSION['username'];
    $id = $_SESSION['id'];
    $bus_no = $_POST["bus_no"];
    $description = $_POST["description"];
    $mobile = $_POST["mobile"];
    date_default_timezone_set('Asia/Kolkata');
    $date=date('d-m-y h:i:s');
    if ($stmt = $conn->prepare('INSERT INTO transport (name, id, bus_no, description, mobile,time) VALUES (?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param("ssssss", $name, $id, $bus_no, $description, $mobile, $date);
        $stmt->execute();

        echo '<script type="text/javascript">';
        echo 'alert("Your problem is successfully registered")';
        echo '</script>';

        $subject = "Transport Problem Registered";
        $message = "A Transport Problem has been registered by $name. Bus No: $bus_no. Description: $description";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'addulapraneethkumarreddy@gmail.com';
            $mail->Password = 'odnoslbqgihkgyfm';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('addulapraneethkumarreddy@gmail.com');
            $mail->addAddress('addulapraneethkumarreddy@gmail.com');

            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo "<script>
            alert('Notification sent successfully.');
            document.location.href='transport_register.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
            alert('Failed to send notification.');
            document.location.href='transport_register.php';
            </script>";
        }
    } else {
        die("Something went wrong");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Transport Problem</title>
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
        .head {
            text-align: center;
            font-size: 25px;
            background-color: aliceblue;
            padding: 5px;
        }
        .wrapper {
            margin: 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }
        label {
            display: block;
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            max-width: 400px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .home-button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            margin-left:0px;
            border-radius: 5px;
            margin-right:40px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
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
        footer {
            text-align: center;
            color: cadetblue;
            background-color: darkgrey;
            bottom: 0px;
            position: fixed;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1><ins>Transport Griviences</ins></h1>
        <marquee behavior="" direction="left">Report your transport problems here...</marquee>
    </div>
    <form action="transport_register.php" method="post" id="form">
        <div class="wrapper">
            <label for="bus_no">Bus Number:</label>
            <input type="text" id="bus_no" name="bus_no" required>
            <label for="description">Description of Problem:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required>
        </div>
        <button type="submit" name="submit">Register</button>
        <button class="home-button" onclick="window.location.href='transport.php'">Home</button>
    </form>
</body>
</html>
