
<?php
include "db_con.php";
?>
<html>
    <head>
        <title>Student_Login</title>
        <style>
            body{
                background-image: linear-gradient(120deg,rgb(7, 7, 117),white,rgb(8, 8, 113));
            }
            .pic{
                margin-top: 30%;
                width: 145px;
            height: 145px;
            border: 3px solid black;
            border-radius: 50%;
            margin: auto;
            background-image: url("faculty1.png");
            background-repeat: no-repeat;
            background-size: cover;
            }
            .error{
                color: black;
                font-size: large;
               
            }
            
            .login{
                background-color: white;
                background-image: linear-gradient(240deg,rgb(254, 254, 204),white,rgb(175, 232, 175));
                color: black;
                margin:auto;
                width:fit-content;
                height: auto;
                text-align: center;
                padding: 10px;
                padding-bottom: 10px;
                margin-top: 5px;
                animation-name: login;
                animation-duration: 3s;
                animation-iteration-count: infinite;
                
            }
            @keyframes login{
                0%{background-image: linear-gradient(120deg,white,rgb(175, 232, 175),rgb(254, 254, 204));}
                50%{background-image: linear-gradient(180deg,rgb(175, 232, 175),rgb(254, 254, 204),white);}
                100%{background-image: linear-gradient(240deg,rgb(254, 254, 204),white,rgb(175, 232, 175));}
            }
            .loginbtn:hover{
                background-color: aqua;
            }

        </style>
    </head>
    <body>
     
        <div class="pic">
        </div>
        <div class="login">
    
            <form action="login1.php" name="form" method="post">
       
  
                <table align="center" cellspacing="50">
                    <tr>
                        <th>Username</th>
                        <td><input type="text"  name="user" placeholder="Enter your Id" required></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password"  name="password" placeholder="Enter Password" required></td>
                    </tr>
                </table>
                <input  type="submit" name='submit' value="Login" style="background-image: linear-gradient(69deg,rgb(239, 223, 193),lightyellow); padding: 5px; font-size:medium; cursor:pointer;" >
            </form>
            <br>
            Forgot Password <a href="forgot.php"style="text-decoration:none;" >Click...</a>
        </div>
        <div class="error">
        <?php
         if(isset($_GET['error'])){?>
           <p class="error"><?php echo $_GET['error']; ?></p>
       <?php }?>
        </div>
    </body>
</html>