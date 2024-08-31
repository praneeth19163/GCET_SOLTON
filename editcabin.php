<!DOCTYPE html>
<html>
<head>
    <title>Edit Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Status</h2>
        <form action="cabinupdate.php" method="POST">
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="Queued">Queued</option>
                    <option value="Processing">Processing</option>
                </select>
            </div>
            <input type="hidden" name="S_no" value="<?php echo $_GET['S_no']; ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
