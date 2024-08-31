<?php
include "db_con.php";

$sql = "TRUNCATE labresolved";
$result = $con->query($sql);

if ($result === TRUE) {
    echo "<script>
                alert('data deleted');
                document.location.href='resolved_lab.php';
                </script>";
    exit();
} else {
    echo "Error: " . $con->error;
}
?>
