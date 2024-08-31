<!DOCTYPE html>
<html>

<head>
    <title>
        21R11A0L6 REGISTRARTION
    </title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-image: url("geethanjali.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .register {
            background-color: aliceblue;
            width: 40%;
            padding-left: 10px;
            height: auto;

        }

        .input {
            margin-top: 8px;
            text-align: center;
        }

        p {
            margin-bottom: 0%;
        }

        .flex {
            display: flex;
            text-align: center;
        }

        .dob {
            margin-left: 30%;
        }

        .occupation {
            margin-left: 3%;
        }
        .danger{
            color: red;
            text-align: center;
        }
        .s{
            color:orange;
            text-align:center;
        }
    </style>
</head>

<body>
    <div class="register">
        <div class="form">
            <header align="center">
                <h3>Registration</h3>
            </header>
            <?php
            $conn=mysqli_connect('localhost','root','','dt');
            if(mysqli_connect_error()){
                exit("Error connecting to Database");
            }
            if(isset($_POST["submit"])){
               $name=$_POST["name"];
               $id=$_POST["id"];
               $email=$_POST["email"];
               $password=$_POST["password"];
               $dob=$_POST["dob"];
               $role=$_POST["role"];
               $rp=$_POST["rp"];
            $errors=array();
        
            if(strlen($password)<8){
                array_push($errors,"password is too weak");
            }
            if($password!=$rp){
                array_push($errors,"password is not matched");
            }
            
            if($stmt=$conn->prepare( 'SELECT * FROM registration WHERE id = ?')){
                $stmt->bind_param('s',$_POST['id']);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows()>0){
                    array_push($errors,"id already exists!");
                }
            }
           
            if(count($errors)>0){
                foreach($errors as $error){
                    echo "<div class='danger'>$error</div>";
                }
            }
            else{
            
                if($stmt=$conn->prepare('INSERT INTO registration (name,id,email,password,dob,role) VALUES ( ?, ?, ?, ?, ?, ? )')){
                    
                    $stmt->bind_param("ssssss",$name,$id,$email,$password,$dob,$role);
                    $stmt->execute();
                    
         echo '<script type="text/javascript">';
         echo 'alert("successfully registered")';
         echo '</script>';
                }
            else{
                    die("Something went wrong");
                }
               }
        }
            ?>
            <form action="registration.php" method="post" id="form">
                <div class="name">
                    <div class="input">
                        <input type="text" placeholder="Enter your Full name" name="name" id="name" required>
                        <i class="icon fas fa-user"></i>
                    </div>
                </div>
                <div class="idno">
                    <div class="input">
                        <input type="text" placeholder="Enter Identity number" name="id" id="id" required>
                        <i class="icon fas fa-address-card"></i>
                    </div>
                </div>
                <div class="email">
                    <div class="input">
                        <input type="email" placeholder="Enter your Email" name="email" id="email" required>
                        <i class="icon fas fa-envelope"></i>
                    </div>
                </div>
                <div class="password">
                    <div class="input">
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>
                        <i class="icon fas fa-lock"></i>
                    </div>
                </div>
                <div class="check password">
                    <div class="input">
                        <input type="password" placeholder="Re-enter password" name="rp" id="rp" required>
                        <i class="icon fas fa-lock"></i>
                     </div>
                </div>

                <div class="gender">
                    <div class="input">
                        <input type="radio" name="gender" id="male"  value="male">
                        <label for="male">Male</label>
                        <i class="icon fas fa-male "></i>
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>
                        <i class="icon fas fa-female "></i>
                    </div>
                </div>
                <div class="flex">
                    <div class="dob">
                        <div class="input">
                            <p>Date of Birth</p>
                            <input type="date" name="dob" id="dob" required>
                        </div>
                    </div>
                    <div class="occupation">
                        <div class="input">
                            <p>Role</p>
                            <select name="role" id="role">
                                <option value="Faculty">Faculty</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="select_btn">
                    <div class="input">
                    <input type="submit" value="Register" name="submit">
                    </div>
                </div>
                <div class="reset_btn">
                    <div class="input">
                        <input type="reset" value="Clear">
                    </div>
                </div>
                <div class="message">
                    <div class="input">
                        <p>already registerd then <a href="pro132.html" target="f5">Login</a> </p>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
</body>

</html>