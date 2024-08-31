<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $computers = isset($_POST['computers']) && is_numeric($_POST['computers']) ? $_POST['computers'] : null;

    if (DateTime::createFromFormat('Y-m-d', $date) !== FALSE) {
        $timestamp = strtotime($date);
        $dayOfWeek = date('l', $timestamp);  

        if ($computers !== null && $computers > 0) {
            $sql1 = "
                SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6, f.no_of_computers
                FROM block1 b
                JOIN faculty_lab f ON b.lab_name = f.lab_no
                WHERE b.day_of_week='$dayOfWeek' AND f.no_of_computers >= $computers
            ";
            $sql2 = "
                SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6, f.no_of_computers
                FROM block2 b
                JOIN faculty_lab f ON b.lab_name = f.lab_no
                WHERE b.day_of_week='$dayOfWeek' AND f.no_of_computers >= $computers
            ";
        } else {
            $sql1 = "
                SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6
                FROM block1 b
                WHERE b.day_of_week='$dayOfWeek'
            ";
            $sql2 = "
                SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6
                FROM block2 b
                WHERE b.day_of_week='$dayOfWeek'
            ";
        }
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
    } else {
        echo "<h2>Invalid date format. Please enter a date in YYYY-MM-DD format.</h2>";
        exit();
    }
} else {
    header("Location: input_date.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab Schedule for <?php echo $dayOfWeek; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
       <h2>Lab schedule for <?php echo $dayOfWeek; ?></h2>
        <h2>Block1</h2>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Lab Name</th>
                    <?php if ($computers !== null && $computers > 0): ?>
                        <th>Number of Computers</th>
                    <?php endif; ?>
                    <th>Period 1</th>
                    <th>Period 2</th>
                    <th>Period 3</th>
                    <th>Period 4</th>
                    <th>Period 5</th>
                    <th>Period 6</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . ($row['lab_name']) . '</td>';
                        if ($computers !== null && $computers > 0){
                            echo '<td>' . ($row['no_of_computers']) . '</td>';
                        }
                        echo '<td>' . ($row['period_1'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_2'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_3'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_4'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_5'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_6'] == 'F' ? 'F' : '-') . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">No schedules found for this day.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <h2>Block2</h2>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Lab Name</th>
                    <?php if ($computers !== null && $computers > 0): ?>
                        <th>Number of Computers</th>
                    <?php endif; ?>
                    <th>Period 1</th>
                    <th>Period 2</th>
                    <th>Period 3</th>
                    <th>Period 4</th>
                    <th>Period 5</th>
                    <th>Period 6</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . ($row['lab_name']) . '</td>';
                        if ($computers !== null && $computers > 0){
                            echo '<td>' . ($row['no_of_computers']) . '</td>';
                        }
                        echo '<td>' . ($row['period_1'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_2'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_3'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_4'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_5'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_6'] == 'F' ? 'F' : '-') . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">No schedules found for this day.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="date.php">Back</a>
    </div>
</body>
</html>
