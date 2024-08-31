<?php
include "db_con.php";

if(isset($_GET['S_no']) && !empty($_GET['S_no'])) {
    $S_no = $_GET['S_no'];

    $sql_select = "SELECT * FROM lab WHERE S_no = $S_no";
    $result_select = $con->query($sql_select);
    $row = $result_select->fetch_assoc();
    $status=$row['status'];
    if($status=="Processing"){
        if ($result_select->num_rows > 0) {
            $row = $result_select->fetch_assoc();
    
            $sql_insert = "INSERT INTO labresolved (name, id, blockno, labno, problemtype, problem, time) 
                           VALUES ('".$row['name']."', '".$row['id']."', '".$row['blockno']."', '".$row['labno']."', 
                                   '".$row['problemtype']."', '".$row['problem']."', NOW())";
            $con->query($sql_insert);
    
            $sql_delete = "DELETE FROM lab WHERE S_no = $S_no";
            if ($con->query($sql_delete) === TRUE) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        } else {
            echo "Record not found.";
        }
    } 
    else {
            echo "Cannot Delete Record Still Queued";
        }
}
    
?>
