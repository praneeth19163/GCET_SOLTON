<?php
include "db_con.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM objectfound WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "<script>
        alert('Object deleted successfully');
        document.location.href='view_object.php';
        </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    header("Location: view_object.php");
    exit();
}
?>
