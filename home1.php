<?php
    session_start();
     if(isset($_SESSION['id']) && isset($_SESSION['username']))
     {
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Student_Portal</title>
    </head>
    <style>
        *{
            margin:0% ;
            padding: 0%;
        
        }
        body{
            background-color:rgb(237, 232, 220);
        }
        .ab{
            background-color: darkgrey;
            text-align: center;
            color: black;
            margin-bottom: 10px;;
            font-size: larger;
        }
        .container{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        
        }
        .abb{
           margin:auto;
           background-image: linear-gradient(120deg,rgb(7, 7, 117),white,rgb(8, 8, 113));
           text-align: center;
           margin-top: 10%;
           margin-bottom: 10%;
           width: 100%;
           height: auto;

        }
        .item1{
            width: 100px;
            height: 100px;
            border: 2px solid black;
            background-color:red;
            text-align: center;
            font-size: large;
            border-radius: 50px;
        }
        a{
            margin: auto;
        }
        .item2{
            width: 100px;
            height: 100px;
            border: 2px solid black;
            background-color: rgb(98, 237, 98);
            
            text-align: center;
            border-radius: 50px;
            font-size: large;
        }
        
    </style>
    <body>
        <div class="ab">
        <h1 align='cente'><ins>FACULTY PORTAL</ins></h1>
        <marquee behavior="" direction="right" style="color:blue;">Don't Keep Waiting for a Better Tomorrow.</marquee>
        </div>
        <div class="abb">
        <h1>Hello,<?php echo $_SESSION['username']; ?></h1>
        <h2><?php echo $_SESSION['id']; ?></h2>
        </div>
        <div class="container">
            <div ><a href="fac_query.php" target="_blank"><input type="button" value="Prost" name="prost" class="item2"></a></div>
        <div ><a href="logout1.php"><input type="button" value="Log Out" name="logout" class="item1"></a></div>
        
    </div>
    </body>
    </html>
    <?php
     }
     else
     {
        header ("Location:loginpage.php");
        exit();
     }
?>