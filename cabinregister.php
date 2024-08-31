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
    $block = $_POST["block"];
    $floor = $_POST["floor"];
    $room = $_POST["room"];
    $description = $_POST["description"];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');

    if ($stmt = $conn->prepare('INSERT INTO cabinproblems (name, id, blockno, floorno, cabinno, description, time) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param("sssssss", $name, $id, $block, $floor, $room, $description, $date);
        $stmt->execute();

        echo '<script type="text/javascript">';
        echo 'alert("Your problem is successfully registered")';
        echo '</script>';

        $subject = "Cabin Problem Registered";
        $message = "A Cabin Problem has been registered by $name in Block $block, Floor $floor, Room $room. Description: $description";

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
            document.location.href='cabinregister.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
            alert('Failed to send notification.');
            document.location.href='cabinregister.php';
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
    <title>Cabin Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .head {
            text-align: center;
            font-size: 25px;
            background-color: aliceblue;
            padding: 15px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .head marquee {
            margin-top: 10px;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input-field, .textarea-field {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .textarea-field {
            height: 100px;
            resize: none;
        }
        .home-button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            margin-left:0px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .s {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .s:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1><ins>CABIN MANAGEMENT</ins></h1>
        <marquee behavior="scroll" direction="left">Find a solution to your problem by registering your problem here...</marquee>
    </div>
    <form action="cabinregister.php" method="post" id="form" >
        <div class="wrapper">
            <input type="text" name="block" id="block" placeholder="Enter Block No" class="input-field" required>
            <input type="text" name="floor" id="floor" placeholder="Enter Floor No" class="input-field" required>
            <input type="text" name="room" id="room" placeholder="Enter Cabin No" class="input-field" required>
            <textarea name="description" id="description" placeholder="Describe your problem here..." class="textarea-field" required></textarea>
            <input type="submit" value="Register" name="submit" class="s"><br>
            <button class="home-button" onclick="window.location.href='cabin.php'">Home</button>

        </div>
    </form>
</body>
</html>
