<?php
include "db_con.php";

$sql = "SELECT * FROM transport";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport List</title>
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
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .home-link:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div class="head"><ins>Transport Management</ins></div>
    <div class="container">
        <div class="cont">
            <h1>Transport List</h1>
        </div>
        <table class="table" align="center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Bus No</th>
                    <th>Transport Problem</th>
                    <th>Mobile Number</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['bus_no'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['mobile'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td><a href="edit_transport.php?S_no=' . htmlspecialchars($row['S_no']) . '" class="btn btn-info">Edit</a><br>
                        <a href="delete_transport.php?S_no=' . htmlspecialchars($row['S_no']) . '" onclick="return confirmDelete()" class="btn btn-danger">Delete</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No records found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="ts.php" class="btn btn-success">Home</a>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Do you really want to delete this record?");
        }
    </script>
</body>
</html>
