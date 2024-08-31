<?php
include "db_con.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['S_no'])) {
    $S_no = $_GET['S_no'];
    $S_no = $_GET['S_no'];
    $sql_select = "SELECT * FROM cabinproblems WHERE S_no = $S_no";
    $result_select = $con->query($sql_select);
    $row = $result_select->fetch_assoc();
    $status=$row['status'];
    if($status=="Processing"){
        $sql = "DELETE FROM transport WHERE S_no=$S_no";
        if ($con->query($sql) === TRUE) {
        echo "<script>
            alert('Problem deleted successfully');
            document.location.href='busts.php';
            </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    else{
        echo "cannot delete still queued";
    }
    
} else {
    header("Location: busts.php");
    exit();
}
?>
