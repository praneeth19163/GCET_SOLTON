<!DOCTYPE html>
<html>
<head>
    <title>Lab Maintanence</title>
    <style>
        * {
            margin: 0%;
            padding: 0%;
        }
        
        header {
            text-align: center;
            color: cadetblue;
            font-size: 40px;
            width: 100%;
            height: 10%;
            background-image: url("problem.jpg");
            background-size: 10% 10%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: antiquewhite;
        }
        
        .container {
            margin-top: 15%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            background-color: aliceblue;
        }
        
        .item1, .item2 {
            width: 200px;
            height: 200px;
            font-size: larger;
            border: 2px solid black;
            border-radius: 30px;
            margin-bottom: 20px; /* Added margin between buttons and footer */
        }
        
        .item1 {
            background-image: linear-gradient(120deg, red, orange);
        }
        
        .item2 {
            background-image: linear-gradient(120deg, lightgreen, orange);
        }
        
        footer {
            text-align: center;
            color: cadetblue;
            background-color: aqua;
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px 0; 
        }
        
        .home-button {
            display: block; 
            margin-top:30px;
            margin-left:670px;
            background-color: #4CAF50;
            border-radius: 5px;
            color: white;
            font-size: 40px;
            cursor: pointer;
        }
        
        h1 {
            color: green;
        }
    </style>
</head>
<body>
    <header><ins>LAB MAINTANENCE</ins></header>
    <div class="container">
        <div>
            <a href="labregister.php"><input type="button" value="Register Your Problem" name="prost" class="item1"></a>
        </div>

        <div>
            <a href="labenquiry.php"><input type="button" value="Enquire Your Problem" name="prost" class="item2"></a>
        </div>

    </div>
    <button class="home-button" onclick="window.location.href='stu_query.php';">Home</button>

    <footer>
        <h1>Geethanjali College of Engineering and Technology.</h1>
        <h2>Contact: B. Shiva Sharan (Lab Manager)</h2>
        <h3>Mobile-NO: 9182346190</h3>
    </footer>
</body>
</html>
