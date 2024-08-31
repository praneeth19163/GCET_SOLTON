<?php
include "db_con.php";
$sql = "select * from cabinproblems";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cabin Enquiry</title>
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
    <div class="head"><ins>CABIN MANAGMENT</ins> </div>
    <div class="container">
        <div class="cont">
            <h1>Cabin Enquiry:</h1>
            <h4>Know status of your problem...</h4>
        </div>
        <table class="table" align="center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Block NO</th>
                    <th>Floor NO</th>
                    <th>Cabin No</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
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
                            <td><?php echo $row['floorno']; ?></td>
                            <td><?php echo $row['cabinno']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="editcabin.php?S_no=<?php echo $row['S_no']; ?>" class="btn btn-info">Edit</a>
                                <a href="deletecabin.php?S_no=<?php echo $row['S_no']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="ts.php" class="btn btn-success">Home</a>
        </div>
    </div>
</body>
</html>
