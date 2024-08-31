<?php
include "db_con.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $S_no = $_POST['S_no'];
    $status = $_POST['status'];

    $sql = "UPDATE cabinproblems SET status = ? WHERE S_no = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $status, $S_no);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
