<?php
include "db_con.php";
$sql="select * from transport";
$result=$con->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transport Enquiry</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            *{
                margin: 0%;
                padding: 0%;
            }
            
            .head{
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
                background-attachment: fixed ;
                background-repeat: no-repeat;
                background-color: antiquewhite;
                border: 2px solid black;

            
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
            .cont{
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
            .table{
                margin-left: auto;
                margin-right: auto;
            
            }
            .table,th,td{
                border: 1px solid;
            }

        </style>
    </head>
    <body>
        <div class="head"><ins>TRANSPORT GRIVIENCES</ins> </div>
        <div class="container">
            <div class="cont" >
            <h1>Transport Enquiry:</h1>
            <h4>Know status of your problem...</h4>
            </div>
            <table class="table" align="center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Bus NO</th>
                        <th>Problem</th>
                        <th>Mobile</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['bus_no'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td><?php echo $row['time'];?></td>
                                <td><?php echo $row['status'];?></td>
                            </tr>
                            <?php }
                    }?>
                    
                </tbody>
            </table>
        </div>
        <div class="button-container">
            <button class="home-button" onclick="window.location.href='transport.php'">Home</button>
        </div>
    </body>
</html>