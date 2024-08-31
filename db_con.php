<?php
    $host="localhost";
    $user="root";
    $password="";
    $db_name="dt";
    $con=mysqli_connect($host,$user,$password,$db_name);
    if(!$con)
    {
        echo "Connection Failed";
    }
    
?>