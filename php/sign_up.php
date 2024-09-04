<html>
    <head>
        <title>Weaver Gram Sign up</title>
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
    <?php
    $DBservername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBdatabasename = "weaver_gram";
    $con = new mysqli($DBservername,$DBusername,$DBpassword,$DBdatabasename);
    session_start();
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
                        <h2>Sign Up Form</h2>
                        <form>
                            <div class="inputbox">
                                <input type="text" placeholder="username" name="username">
                            </div>
                            <div class="inputbox">
                                <input type="password" placeholder="password" name="password">
                            </div>
                            <div class="inputbox">
                                <input type="number" placeholder="Phone no." name="phone_no" maxlength="10">
                            </div>
                            <div class="inputbox">
                                <input type="submit" placeholder="username" name="submit">
                            </div>
                            <p class="forget">
                            <?php
                            if(isset($_POST['submit'])){
                                $user_username = $_POST['username'];
                                $user_password = $_POST['password'];
                                $user_phone_no = $_POST['phone_no'];
                                $feed = "insert into userdata(username , password , phone_no ) values('$user_username','$user_password','$user_phone_no')";
                                if($con->query($feed)){
                                    $create_friend_list = "create table ".$user_username."friends_list(friend_name varchar(50))";
                                    $add_password_in_database = "insert into passwords(username,password) values('$user_username','$user_password')" ;
                                    echo "Sign Up Successful";
                                } else{
                                    echo "Something is wrong";
                                }
                            }
                            ?>
                        </form>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

