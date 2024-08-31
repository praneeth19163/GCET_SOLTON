<html>
    <head>
        <style>
            h1{
                background-color: rgb(14, 5, 99);
                font-size: 30px;
                text-align: center;
                font-family: 'Times New Roman', Times, serif;
                color: chocolate;
                margin-top: 0px;
            }
            #issue{
                margin-top: 20px;
                align-items: center;
                display: inline-block;
                text-align: left;
            }
            .issue{
                padding: 20px;
                font-weight: bold;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                align-items: center;
            }
            .button-container {
            text-align: center;
            margin-top: 20px;
        }
            #align{
                text-align: center;
            }
            a{
                text-decoration: none;
            }
            .button-container {
            text-align: center;
            margin-top: 20px;
        }
        </style>
    </head>
    <body>
        <h1>Faculty Issue Zones</h1>
        <div id="align">
            <ol id="issue">
                <li class="issue"><a href="labts.php">Lab Maintenance</a></li>
                <li class="issue"><a href="cabints.php">Cabin</a></li>
                <li class="issue"><a href="classts.php">Class Room</a></li>
                <li class="issue"><a href="busts.php">Transport</a></li>
            </ol>
        </div>
        <div class="button-container">
            <a href="fac_query.php" class="btn btn-success">Home</a>
        </div>
    </body>
</html>