<?php
include "db_con.php";

$sql = "SELECT * FROM objectfound";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
            border: 1px solid black;
        }

        .table th, .table td {
            border: 1px solid black;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
        }

        a:hover {
            color: #45a049;
        }

        .home-link {
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }

        .home-link:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div class="head"><ins>OBJECT MANAGEMENT</ins></div>
    <div class="container">
        <div class="cont">
            <h1>Object List</h1>
            <h4>Manage your found objects...</h4>
        </div>
        <table class="table" align="center">
            <thead>
                <tr>
                    <th>Object Specification</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['object_specification'] . '</td>';
                        echo '<td>' . $row['mobile_no'] . '</td>';
                        echo '<td><a href="delete_object.php?id=' . $row['id'] . '" onclick="return confirmDelete()">Delete</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No objects found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a class="home-link" href="object.php">Home</a>
    <script>
        function confirmDelete() {
            return confirm("Do you really want to delete this object?");
        }
    </script>
</body>
</html>
