<?php
session_start(); 

if(isset($_POST['search'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];

    
    if (!empty($book_name)) {
        $sql = "select * from books where book_name='$book_name'";
    }

    if (!empty($book_author)) {
        $sql = "select * from books where book_author='$book_author'";
    }
    if (!empty($book_name) && !empty($book_author)) {
        $sql = "select * from books where book_author='$book_author' and book_name='$book_name'";
    }
   $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Search Results</title>";
        echo "<style>";
        echo "body {";
        echo "    font-family: Arial, sans-serif;";
        echo "    background-color: #f5f5f5;";
        echo "    margin: 0;";
        echo "    padding: 0;";
        echo "}";
        echo "header {";
        echo "    color: blue;";
        echo "    background-color: rgb(11, 226, 162);";
        echo "    font-size: 40px;";
        echo "    text-align: center;";
        echo "    font-family: 'Times New Roman', Times, serif;";
        echo "    border-radius: 10px;";
        echo "    top: 0px;";
        echo "    position: fixed;";
        echo "    width: 100%;";
        echo "    left: 0px;";
        echo "    z-index: 1;";
        echo "}";
        echo "table {";
        echo "    width: 80%;";
        echo "    margin: 20px auto;";
        echo "    border-collapse: collapse;";
        echo "    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);";
        echo "}";
        echo "table th, table td {";
        echo "    padding: 10px;";
        echo "    text-align: left;";
        echo "    border: 1px solid #ddd;";
        echo "}";
        echo "table th {";
        echo "    background-color: #f2f2f2;";
        echo "}";
        echo "table tr:nth-child(even) {";
        echo "    background-color: #f9f9f9;";
        echo "}";
        echo "table tr:hover {";
        echo "    background-color: #f2f2f2;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<h2 style='text-align: center;'>Search Results:</h2>";
        echo "<table>";
        echo "<tr><th>Book No</th><th>Book Name</th><th>Book Author</th><th>Book Publisher</th><th>Book Version</th><th>Book Stock</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['book_no']."</td>";
            echo "<td>".$row['book_name']."</td>";
            echo "<td>".$row['book_author']."</td>";
            echo "<td>".$row['book_publisher']."</td>";
            echo "<td>".$row['book_version']."</td>";
            echo "<td>".$row['book_stock']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</body>";
        echo "</html>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("No records found")';
        echo '</script>';
    }

    $conn->close();
}
?>
