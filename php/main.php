<html>
    <head>
        <title>Weaver Gram</title>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <?php
        // php connection establishment
        session_start();    
        $DBservername = "localhost";
        $DBusername = "root";
        $DBpassword = "";
        $DBdatabasename = "weaver_gram";
        $con =new mysqli($DBservername,$DBusername,$DBpassword,$DBdatabasename);
        $user_username = $_SESSION['user_username'];
        ?>
        
        <!-- background element  -->
        <section class="background">
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="box">
                <div class="square" style="--i:0;"></div>
                <div class="square" style="--i:1;"></div>
                <div class="square" style="--i:2;"></div>
                <div class="square" style="--i:3;"></div>
                <div class="square" style="--i:4;"></div>
                <div class="container"></div>
            </div>
        </section>
        <nav class="nav-bar">

        </nav>
        <hr>
        <div class="main-div">
            <!-- working for friends list  -->
            <div class="friends-list">
                <?php
                $fetch_friends_list = "select * from ".$user_username."_friends_list";
                $friends_list_results = $con->query($fetch_friends_list);
                if($friends_list_results->num_rows > 0){
                    while($row = $friends_list_results->fetch_assoc()){
                        $friend = $row['friend_name'];
                        echo "
                            <form method='POST'>
                                <button class='friend_name' name='friend_button'>$friend </button>
                                <input type='text' id='hidden_button_for_friends' value='$friend' name='friend_name' readonly> 
                            </form>        
                        ";
                    }
                } else {
                    echo "<button class='friend_name' name='friend_button'> Your Friends list is empty <br> Try search bar to make friends</button>";
                }
                ?>
            </div>

            <!-- working for chat part  -->
            <div class="chat_box">
                <?php
                if(isset($_POST['friend_button'])){
                    $friend_name = $_POST['friend_name'];
                    $fetch_friend_chat = "select * from ".$user_username."_".$friend_name."_chat";
                    $chat_results = $con->query($fetch_friend_chat);
                    while($row = $chat_results->fetch_assoc()){
                        $sender = $row['sender'];
                        $message = $row['message'];
                        if($sender == $user_username){
                            echo "<div class='message_box_right message_box'>" ;
                        } else{
                            echo "<div class='message_box_left message_box'>" ;
                        }
                ?>
                                <p><?php echo $message;?></p>
                            </div>    
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>


