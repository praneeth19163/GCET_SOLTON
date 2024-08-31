<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header{
                color: blue;
                background-color: rgb(11, 226, 162);
                font-size: 40px;
                text-align: center;
                font-family:'Times New Roman', Times, serif;
                border-radius: 10px;
                top: 0px;
                position: fixed;
                width: 100%;
                left: 0px;
                z-index: 1;
            }
        body{
            background-size: cover;
            background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .form{
                width:40rem;
                margin: auto;
                color:white;
                margin-top: 150px;
                background-color:#001199;
                border-radius: 12px;
                align-items:center;
                height:450px;
            }
            .img{
                width: 50px;
                height: 50px;
                align-self: baseline;
            }
            .user{
            width: 100px;
            height: 30px;
            font-size: larger;
            background-color: rgb(154, 235, 154);
        }
        .data{
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .name{
            width: 200px;
            height: 30px;
            font-size: large;
        }
    </style>
</head>
<body>
<form action="view_search.php" class="form" method="post" name="f1">
        <h1 align="center">Search Book</h1>
  <br>  
    <center>
    <div class="mainContainer">
        <p class="data">Book Name:<input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name" class="name"></p>
        <p class="data">Book Author:<input type="text" placeholder="Enter Book Author" autocomplete="off" name="book_author" class="name"></p>
        <br>
        <input  type="submit" value="Search" class="user" name="search">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Home" class="user" onclick="window.open('library.php', '_self')">&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="reset" value="Clear" class="user">
        <br> 
    </div>
    </center>
</form>
</body>
</html>