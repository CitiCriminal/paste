<?php 
require 'configuration/config.php';

//Maintenance

$sql = "SELECT maintenance FROM settings";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
    $maintenance_mode = $row['maintenance'];

    if($maintenance_mode == "1"){
        header("Location: maintenance/index");
        exit;
    }else{
    
?>

<html>
    <head>
        <title>Paste</title>
        <link rel="stylesheet" href="assets/style.css" type="text/css">
        <link rel="stylesheet" href="assets/custom-scrollbar.css" type="text/css">
        <link rel="stylesheet" href="assets/header.css" type="text/css">

    </head>
    <body>
        <div class="header">
            <?php 
            $sql = "SELECT logo FROM settings";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){ 
                while($logo = mysqli_fetch_assoc($result)){?>
                    <img src="<?php echo $logo['logo']; ?>" class="logo" alt="">
                <?php
                }
            }
            ?>
            <div class="header-btn">
                <a href="index">Paste</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="new">Recent Pastes</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="search">Search</a>
            </div>
            <div class="socials">
                <?php 
                $sql = "SELECT discord FROM settings";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($discord = mysqli_fetch_assoc($result)){ ?>

                    <a class="discord" href="https://<?php echo $discord['discord']?>">
                    <img class="discord-img" src="img/discord.png">
                </a>
                <?php
                    }
                }
                ?>
                <?php 
                    $sql = "SELECT telegram FROM settings";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($telegram = mysqli_fetch_assoc($result)){ ?>
                <a class="discord" href="https://<?php echo $telegram['telegram']; ?>">
                    <img class="telegram-img" src="img/telegram.png">
                </a>
                <?php
                    }
                }else{
                }
                ?>
            </div>
        </div>
        <div class="ad">
            <?php 
            $sql = "SELECT * FROM ad LIMIT 2";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){?>
                <a href="<?php echo $row["link"]; ?>">
                    <img src="<?php echo $row["img"]?>" alt="" class="ad-img">
                </a>
            <?php
            }
            ?>
        </div>
        <div class="posts">
            <h1>Posts:</h1>
            <?php 
            $sql = "SELECT * FROM pastes";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){ ?>
                <h1><?php echo mysqli_num_rows($result); ?></h1>
            <?php
            }else{
                echo "0";
            }
            ?>
        </div>

        <div class="news">
            <h1>Message of the day:</h1>
            <?php 
            $sql = "SELECT message FROM settings";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)> 0){ 
                while($message = mysqli_fetch_assoc($result)){ ?>
            <h1><?php echo $message['message']; ?></h1>
                
                <?php

                }
            }
            ?>

        </div>
        <form method="POST">
            <?php 
            if(isset($_POST["submit"])){ 
                $title = mysqli_real_escape_string($conn, $_POST["title-paste"]);
                $content = mysqli_real_escape_string($conn, $_POST["text-paste"]);

                if($title == ""){ 
                    echo "<h1>Title is empty!</h1>";
                }else{ 
                    if($content == ""){ 
                        echo "<h1>Content is empty</h1>";
                    }else{ 
                        $sql = "INSERT INTO pastes (paste_name, paste_content) VALUES ('".$title."', '".$content."')";
                        header("Location: index");

                        if(!mysqli_query($conn, $sql)){ 
                            echo "<h1>Something went wrong.</h1>";
                        }
                    }
                }
            }
            ?>
            <div class="panel">
                <?php 
                $sql = "SELECT sitename FROM settings";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($sitename = mysqli_fetch_assoc($result)){?>

                <p class="site-name"><?php echo $sitename['sitename']; ?></p>
                <?php
                    }
                }
                ?>
                <input type="text" name="title-paste" placeholder="title" class="panel-input">
                <div class="textarea-div">
                    <textarea name="text-paste" id="text" cols="30" rows="10"></textarea>
                </div>
                <input class="btn" type="submit" value="Post" name="submit">
            </div>
        </form>
    </body>
</html>

<?php 
    }
}
?>