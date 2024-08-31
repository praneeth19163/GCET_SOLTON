
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0%;
            padding: 0%;
        }
        .head{
            text-align: center;
            font-size: 25px;
            background-color:aliceblue;
            padding: 5px;
            
        }
        .wrapper{
            margin: 10%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-content: center;
            flex-wrap: wrap;
        }
        #block,#labno,#problemtype,#problem{
            text-align: center;
            color: white;
            background-color: black;
            font-size: large;
        }
        .s{
            margin-left: 46vw;
            text-align: center;
            background-color:aliceblue;
            color: black;
            font-size: larger;
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
        footer{
                text-align: center;
                color: cadetblue;
               background-color:darkgrey;
                bottom: 0px;
                position: fixed;
                width: 100%;
                
            }
    </style>
</head>
<body>
    <div class="head">
    <h1><ins>LAB MANAGEMENT</ins></h1>
    <marquee behavior="" direction="left">Find solution to your problem by registering your problem here...</marquee>
    </div>
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
    $labno = $_POST["labno"];
    $problemtype = $_POST["problemtype"];
    $problem = $_POST["problem"];
    $description = $_POST["description"];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');

    if ($block != "-1" && $labno != "-1" && $problemtype != "-1" && $problem != "-1" && !empty($description)) {
        if ($block == 1) {
            $block = "Block 1";
        } else if ($block == 2) {
            $block = "Block 2";
        } else if ($block == 3) {
            $block = "Block 3";
        } else if ($block == 4) {
            $block = "Block 4";
        } else if ($block == 5) {
            $block = "Block 5";
        }

        if ($labno == 1) {
            $labno = "lab 1, 223";
        } else if ($labno == 2) {
            $labno = "lab 2, 307";
        } else if ($labno == 3) {
            $labno = "lab 3, 108";
        } else if ($labno == 4) {
            $labno = "lab 4, G09";
        } else if ($labno == 5) {
            $labno = "lab 5, 107";
        }

        if ($problemtype == 1) {
            $problemtype = "Lab Equipment";
        } else if ($problemtype == 2) {
            $problemtype = "Computers";
        }

        if ($stmt = $conn->prepare('INSERT INTO lab (name, id, blockno, labno, problemtype, problem, description, time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
            $stmt->bind_param("ssssssss", $name, $id, $block, $labno, $problemtype, $problem, $description, $date);
            $stmt->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Your problem is successfully registered")';
            echo '</script>';

            $subject = "Lab Problem Registered";
            $message = "A Lab Problem has been registered by $name in $block $labno. ProblemType: $problemtype Problem: $problem Description: $description";

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
                document.location.href='labregister.php';
                </script>";
            } catch (Exception $e) {
                echo "<script>
                alert('Failed to send notification.');
                document.location.href='labregister.php';
                </script>";
            }
        } else {
            die("Something went wrong");
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
}
?>

<form action="labregister.php" method="post" id="form" onsubmit="return validateForm()">
        <div class="wrapper">
            <select name="block" id="block" required>
                <option value="-1">Select Block no</option>
                <option value="1">Block 1</option>
                <option value="2">Block 2</option>
                <option value="3">Block 3</option>
                <option value="4">Block 4</option>
                <option value="5">Block 5</option>
            </select>
            <select name="labno" id="labno" required>
                <option value="-1">Select Lab no</option>
                <option value="1">Lab 1, 223</option>
                <option value="2">Lab 2, 307</option>
                <option value="3">Lab 3, 108</option>
                <option value="4">Lab 4, G09</option>
                <option value="5">Lab 5, 107</option>
            </select>
            <select name="problemtype" id="problemtype" required>
                <option value="-1">Select Problem Type</option>
                <option value="1">Lab Equipment</option>
                <option value="2">Computers</option>
            </select>
            <select name="problem" id="problem" required>
                <option value="-1">Select Problem</option>
            </select>
            <textarea name="description" id="description" placeholder="Describe your problem..." class="textarea-field" required></textarea>
        </div>
        <input type="submit" value="Register" name="submit" class="s">
        <div class="button-container">
            <button class="home-button" onclick="window.location.href='lab.php'">Home</button>
        </div>
    </form>
    <script>
        let prost = [
            {
                protype: "Lab Equipment",
                code: 1,
                problems: ["Wifi Connection", "Projector", "Chairs", "Fans", "Windows"]
            },
            {
                protype: "Computers",
                code: 2,
                problems: ["CPU", "Mouse", "Keyboard", "Computer Desk", "Malfunction"]
            }
        ];
        let type = document.querySelector("#problemtype");
        let pro = document.querySelector("#problem");

        type.onchange = function() {
            pro.options.length = 0;
            if (type.value != -1) {
                for (let ele of prost) {
                    if (type.value == ele.code) {
                        let problems = ele.problems;
                        let op = document.createElement('option');
                        op.value = -1;
                        op.innerText = "Select Problem";
                        pro.options[0] = op;
                        let i = 1;
                        for (let p of problems) {
                            let op = document.createElement('option');
                            op.value = p;
                            op.innerText = p;
                            pro.options[i] = op;
                            i++;
                        }
                    }
                }
            }
        }

        function validateForm() {
            let block = document.querySelector("#block").value;
            let labno = document.querySelector("#labno").value;
            let problemtype = document.querySelector("#problemtype").value;
            let problem = document.querySelector("#problem").value;
            let description = document.querySelector("#description").value;

            if (block == "-1" || labno == "-1" || problemtype == "-1" || problem == "-1" || description.trim() === "") {
                alert("Please fill all the fields");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>