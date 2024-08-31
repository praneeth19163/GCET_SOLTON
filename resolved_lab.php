<?php
include "db_con.php";
$sql = "select * from labresolved";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Enquiry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        .head {
            text-align: center;
            color: darkgoldenrod;
            background-color: aliceblue;
            font-size: 40px;
            padding: 10px;
            top: 0px;
            width: 100%;
            height: 10%;
            background-image: url("problem.jpg");
            background-size: 10% 10%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: antiquewhite;
            border: 2px solid black;
        }
        
        .cont {
            text-align: center;
            margin: 20px;
            color: azure;
            background-color: black;
            margin-bottom: 50px;
            border: 2px solid black;
            margin-left: auto;
            margin-right: auto;
            width: fit-content;
        }
        
        .table {
            margin-left: auto;
            margin-right: auto;
        }
        
        .table, th, td {
            border: 1px solid;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="head"><ins>LAB MANAGMENT</ins> </div>
    <div class="container">
        <div class="cont">
            <h1>Lab Resolved Problems:</h1>
            <h4>Resolved Problems...</h4>
        </div>
        <table class="table" align="center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Block NO</th>
                    <th>Lab NO</th>
                    <th>Problem Type</th>
                    <th>Problem</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['blockno']; ?></td>
                            <td><?php echo $row['labno']; ?></td>
                            <td><?php echo $row['problemtype']; ?></td>
                            <td><?php echo $row['problem']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="delete_data.php" class="btn btn-success">Delete</a>
        </div>
    </div>
</body>
</html>
