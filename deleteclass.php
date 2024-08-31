<?php
include "db_con.php";

if(isset($_GET['S_no']) && !empty($_GET['S_no'])) {
    $S_no = $_GET['S_no'];
    $sql_select = "SELECT * FROM cabinproblems WHERE S_no = $S_no";
    $result_select = $con->query($sql_select);
    $row = $result_select->fetch_assoc();
    $status=$row['status'];
    if($status=="Processing"){
        $sql_delete = "DELETE FROM classproblems WHERE S_no = $S_no";
        if ($con->query($sql_delete) === TRUE) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $con->error;
        }
    }
    else{
        echo "cannot delete still queued";
    }
} else {
    echo "Invalid request.";
}
?>
