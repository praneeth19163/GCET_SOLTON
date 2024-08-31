<?php
    session_start();
    include "db_con.php";

    if(isset($_POST['user']) && isset($_POST['password']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $username =validate($_POST['user']);
    $pass =validate($_POST['password']);
    $error=array();
    
    if(empty($username))
    {array_push($errors,"User name is required");
        header ("Location:loginpage.php?error=User name is required");
    }
    else if(empty($pass))
    {
        header ("Location:loginpage.php?error=Password is required");
    }
    $sql = "SELECT * FROM registration WHERE id='$username' AND password='$pass' AND role='student'";
    
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_assoc($result);
        if($row['id'] === $username && $row['password'] === $pass)
        {
            
         echo '<script type="text/javascript">';
         echo 'alert("hello")';
         echo '</script>';
            $_SESSION['username']=$row['name'];
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            header ("Location:home.php");
            exit();
        }
        else
        {array_push($errors,"Incorrect Password or username");
            header("Location:loginpage.php?error=Incorrect Password or username");
            
        
            exit();
        }
    }
    else
    {
        header("Location:loginpage.php");
        exit();
    }
?>