<!DOCTYPE html>
        <html lang="en">
        <head>
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
            .img{
                width: 50px;
                height: 50px;
            }
            
            body {
                background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display:block;
            align-items: center;
            justify-content: center;
            }
            .hello{
                display: inline-block;
                margin-left: 390px;
                font-size: 40px;
                text-align: center;
                align-items: center;
                padding: 0;
                border: none;
                justify-content: space-between;
                padding: 50px;
                background: none;
            }
            .button-container {
                text-align: center;
                padding: 20px;
                margin-top: 0px;
                
                }
            .button {
                display: inline-block;
                margin: 10px;
                padding: 0;
                border: none;
                justify-content: space-between;
                padding: 50px;
                background: none;
                }
            .but{
                display: inline-block;
                border: none;
                border-radius: 50%;
                width: 180px;
                height: 180px;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                font-size: 100px;
                background-color: #4CAF50;
                color: #ffffff;
                border-style: solid;
                border-color: black;
                cursor: pointer;
                }
            #add{
                background-color: #0f4;
                font-size: 45px;
                }
            #change{
                background-color: cyan ;
                margin-bottom:25px;
                font-size: 45px;
                }
            #home{
                    background-color: red;
                    font-size: 45px;
                }
            </style>
        </head>
        <body>
        <header><marquee>Welcome to Faculty Home Page </marquee></header>
            <div class="hello">
              <h1>Hello, Admin </h1>
            </div>
            <div class="button-container">
                <div class="button">
                    <button class="but" id="add" onclick="window.open('add.php', '_self')">
                        Add 
                    </button>
                  
                </div>
                <div class="button">
                    <button class="but" id="change" onclick="window.open('update.php', '_self')">
                        Update
                    </button>
                  
                </div>
                <div class="button">
                    <button class="but" onclick="window.open('fac_query.php', '_self')" id="home">
                        Home
                    </button>
                 
                </div>
          </div>
        </body>
        </html>
        