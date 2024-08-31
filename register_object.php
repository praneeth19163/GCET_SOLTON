<?php
include "db_con.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $specification = $_POST['specification'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO objectfound (object_specification, mobile_no) VALUES ('$specification', '$mobile')";
    if ($con->query($sql) === TRUE) {
        
        header("Location: register_object_form.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
