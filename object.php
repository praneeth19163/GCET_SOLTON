<html>
    <head>
        <title>Lab Management</title>
        <style>
            *{
                margin: 0%;
                padding: 0%;
            }
            
            header{
                text-align: center;
                color: cadetblue;
                font-size: 40px;
                top: 0px;
                width: 100%;
                height: 10%;
                background-image: url("problem.jpg");
                background-size: 10% 10%;
                background-attachment: fixed ;
                background-repeat: no-repeat;
                background-color: antiquewhite;
        
            }
    
            .container{
                
              margin-top: 15%;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                background-color: aliceblue;
            }
            .item1{
              width: 200px;
              height: 200px;
              font-size: larger;
              border: 2px solid black;
              background-image:linear-gradient(120deg,red,orange);
              border-radius: 30px;
            
            }
            .item2{
              width: 200px;
              height: 200px;
              font-size: larger;
              border: 2px solid black;
              background-image:linear-gradient(120deg,lightgreen,orange);
              border-radius: 30px
            }
            footer{
                text-align: center;
                color: cadetblue;
               background-color: aqua;
                bottom: 0px;
                position: fixed;
                width: 100%;
                
            }
            .home-button {
            display: block; 
            margin-top:30px; 
            background-color: green;
            border-radius: 5px;
            color: white;
            font-size: 40px;
            cursor: pointer;
        }
            h1{
                color: green;
            }
        </style>
    </head>
    <body>
        
        <header><ins>OBJECTFOUND BOT</ins></header>
        <div class="container">
        <div ><a href="register_object_form.php" ><input type="button" value="Register Object Found" name="prost" class="item1"></a>
    
        </div>
        <div><a href="view_object.php" ><input type="button" value="View Object List" name="prost" class="item2"></a>
            
        </div>
        </div>
        <button class="home-button" onclick="window.location.href='stu_query.php';">Home</button>

    </body>
</html>