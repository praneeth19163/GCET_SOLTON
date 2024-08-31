<?php
    $book_no = $_GET['book_no'];
    $book_name = $_GET['book_name'];
    $book_stock = $_GET['book_stock'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Book Details</h2>
    <table>
        <tr>
            <th>Book Number</th>
            <th>Book Name</th>
            <th>Book Stock</th>
        </tr>
        <tr>
            <td><?php echo $book_no; ?></td>
            <td><?php echo $book_name; ?></td>
            <td><?php echo $book_stock; ?></td>
        </tr>
    </table>
    <br><br>
    <a href="library.php" target="_self"><button>Home</button></a>
</body>
</html>
