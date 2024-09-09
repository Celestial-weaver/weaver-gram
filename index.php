<!-- 1.1.1.2 -->
<html>
    <head>
        <title>Weaver Gram Login</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
    <?php
    session_start();
    $DBservername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBdatabasename = "weaver_gram";
    $con =new mysqli($DBservername,$DBusername,$DBpassword,$DBdatabasename);
    ?>
        <section>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="box">
                <div class="square" style="--i:0;"></div>
                <div class="square" style="--i:1;"></div>
                <div class="square" style="--i:2;"></div>
                <div class="square" style="--i:3;"></div>
                <div class="square" style="--i:4;"></div>
                <div class="container">
                    <form method="POST" class="form">
                        <h2>Login Form</h2>
                        <form>
                            <div class="inputbox">
                                <input type="text" placeholder="username" name="username">
                            </div>
                            <div class="inputbox">
                                <input type="password" placeholder="password" name="password">
                            </div>
                            <div class="inputbox">
                                <input type="submit" placeholder="username" name="submit">
                            </div>
                            <p class="forget">
                            <?php
                            if(isset($_POST['submit'])){
                                $user_username = $_POST['username'];
                                $user_password = $_POST['password'];
                                $query = "select password from passwords where username='$user_username'";
                                $results = $con->query($query);
                                while($row = $results->fetch_assoc()){
                                    $fetched_password = $row['password'];
                                    if($user_password != ""){
                                        if($fetched_password == $user_password){
                                            $_SESSION["user_username"] = $user_username;
                                            header("location: php/main.php");
                                            exit;
                                        }
                                    }
                                }
                                echo "Invalid credentials";
                            }
                            ?>
                            </p>
                            <p class="forget">Forgot Password? <a href="php/forgot_password.php">Click Here</a></p>
                            <p class="forget">Dont have an account ? <a href="php/sign_up.php">Sign Up here</a></p>
                        </form>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

